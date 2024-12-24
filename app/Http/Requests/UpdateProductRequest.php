<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2|max:255',
            'sku' => 'required|string|max:255',
            'barcode' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:1000',
            'description' => 'required',
            'images' => 'nullable|array|min:1|max:10',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif',
            'image_urls' => 'nullable|array',
            'variations' => 'nullable|array',
            'variations.*.id' => 'nullable|integer',
            'variations.*.type' => 'nullable|string|max:255',
            'variations.*.value' => 'required_with:variations.*.variation_type,string|max:255',
            'variations.*.price' => 'required_with:variations.*.variation_type,numeric|min:0',
            'variations.*.stock_quantity' => 'required_with:variations.*.variation_type,integer|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'change_tax' => 'required|boolean',
            'in_stock' => 'required|boolean',
            'category' => 'required|string|exists:categories,name',
            'status' => 'required|in:publish,shedule,inactive',
            'publish_on' => 'required_if:status,shedule|date',
        ];
    }
}
