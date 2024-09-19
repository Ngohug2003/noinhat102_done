<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        try {
            // Kiểm tra xem có file nào được gửi trong request hay không
            if ($request->hasFile('file')) {
                // Lưu file vào thư mục public/uploads
                $filePath = $request->file('file')->store('uploads', 'public');

                // Trả về đường dẫn của file đã lưu
                return response()->json(['location' => Storage::url($filePath)]);
            }

            return response()->json(['error' => 'No file uploaded'], 400);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
