<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            // 'views' => 'integer|min:0',
            // 'status' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường tên là bắt buộc.',
            'name.string' => 'Tên phải là chuỗi ký tự.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'content.required' => 'Trường nội dung là bắt buộc.',
            'content.string' => 'Nội dung phải là chuỗi ký tự.',
            // 'views.integer' => 'Số lượt xem phải là một số nguyên.',
            // 'views.min' => 'Số lượt xem không được nhỏ hơn 0.',
            // 'status.boolean' => 'Trạng thái phải là giá trị boolean.',
            'image.image' => 'File tải lên phải là một hình ảnh.',
            'image.mimes' => 'Hình ảnh phải thuộc định dạng: jpeg, png, jpg, hoặc gif.',
            'image.max' => 'Dung lượng hình ảnh không được vượt quá 2048KB.',
        ];
    }
}
