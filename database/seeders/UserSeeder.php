<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = Role::create(['name' => 'admin', 'slug' => 'administrator']);
        $moderator = Role::create(['name' => 'moderator', 'slug' => 'manager']);
        $customer = Role::create(['name' => 'customer', 'slug' => 'user']);

        $permissions = [
            'categories' => ['create', 'read', 'edit', 'delete'],
            'products' => ['create', 'read', 'edit', 'delete'],
            'orders' => ['create', 'read', 'edit', 'delete'],
            'customers' => ['create', 'read', 'edit', 'delete'],
        ];

        foreach ($permissions as $group => $actions) {
            foreach ($actions as $action) {
                Permission::create(['name' => "{$action} {$group}", 'group' => $group]);
            }
        }

        $admin->givePermissionTo('create categories', 'read categories', 'edit categories', 'delete categories', 'create products', 'read products', 'edit products', 'delete products', 'create orders', 'read orders', 'edit orders', 'delete orders', 'create customers', 'read customers', 'edit customers', 'delete customers');
        $moderator->givePermissionTo('create categories', 'read categories', 'edit categories', 'create products', 'read products', 'edit products', 'create orders', 'read orders', 'edit orders', 'create customers', 'read customers', 'edit customers');
        $customer->givePermissionTo('read products', 'read orders');


        User::firstOrCreate(['email' => 'admin@gmail.com'], ['name' => 'Main Admin', 'phone_number' => fake()->phoneNumber(), 'password' => 'password'])->assignRole(['admin']);
        User::firstOrCreate(['email' => 'moderator@gmail.com'], ['name' => 'Main Moderator', 'phone_number' => fake()->phoneNumber(), 'password' => 'password'])->assignRole(['moderator']);
        User::firstOrCreate(['email' => 'user@gmail.com'], ['name' => 'Main user', 'phone_number' => fake()->phoneNumber(), 'password' => 'password'])->assignRole(['customer']);

        User::factory(30)->create();
    }
}
