<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categorySlug = $request->input('category');
    
        if ($categorySlug) {
            $category = Category::where('slug', $categorySlug)->first();
    
            if ($category) {
                $products = $category->products()->select('name', 'price', 'image', 'slug', 'id')->get(); // Thêm 'slug' vào select
                return view('pages.Client.trang-san-pham', [
                    'products' => $products,
                    'selectedCategory' => $category,
                ]);
            } else {
                return redirect()->route('products.index')->with('error', 'Danh mục không tồn tại.');
            }
        } else {
            $products = Product::select('name', 'price', 'image', 'slug', 'id')->get(); // Thêm 'slug' vào select
            return view('pages.Client.trang-san-pham', compact('products'));
        }
    }
    public function show($slug = null, $categorySlug = null)
    {
        if ($slug) {
            // Lấy sản phẩm theo slug
            $product = Product::where('slug', $slug)->with('category', 'galleries')->first();

            if ($product) {
                return view('pages.Client.trang-chi-tiet-sp', [
                    'product' => $product,
                    'isProduct' => true,
                    'isCategory' => false,
                ]);
            } else {
                return redirect()->route('products.index');
            }
        } elseif ($categorySlug) {
            // Lấy danh mục theo slug
            $category = Category::where('slug', $categorySlug)->first();

            if ($category) {
                // Lấy sản phẩm theo danh mục
                $products = $category->products()->get();

                return view('pages.Client.trang-danh-muc', [
                    'category' => $category,
                    'products' => $products,
                    'isProduct' => false,
                    'isCategory' => true,
                ]);
            } else {
                return redirect()->route('products.index');
            }
        }

        return redirect()->route('products.index');
    }
}
