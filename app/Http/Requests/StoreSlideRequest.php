<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSlideRequest extends FormRequest
{
    public function authorize()
    {
        // Set to true if the user is authorized to make this request
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'gallery_images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề của slide là bắt buộc.',
            'gallery_images.*.image' => 'Mỗi tệp trong gallery phải là hình ảnh hợp lệ.',
        ];
    }
}
