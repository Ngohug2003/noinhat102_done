<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'discount' => 'nullable|integer|between:0,100',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'galleries.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    /**
     * Custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'category_id.required' => 'Danh mục là bắt buộc.',
            'category_id.exists' => 'Danh mục không hợp lệ.',
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'price.required' => 'Giá sản phẩm là bắt buộc.',
            'price.integer' => 'Giá sản phẩm phải là số nguyên.',
            'discount.between' => 'Giảm giá phải nằm trong khoảng từ 0 đến 100.',
            'image_path.image' => 'Hình ảnh không hợp lệ.',
            'galleries.*.image' => 'Gallery chỉ chấp nhận hình ảnh.',
        ];
    }
}

