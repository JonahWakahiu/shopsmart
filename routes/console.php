<?php

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


Schedule::call(function () {
    $now = Carbon::now('Africa/Nairobi');

    $updatedCount = Product::where('status', 'sheduled')
        ->where('published_on', '<=', $now)
        ->update(['status' => 'published']);

    Log::info("$updatedCount products published at $now.");
})->everyMinute();
