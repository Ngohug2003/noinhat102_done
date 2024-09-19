<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExporProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Gallerie;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(10); // Paginate results
        return view('pages.Admin.Products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = category::all();
        return view('pages.Admin.Products.create_product', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $dataProduct =  [
                    'category_id' => $request->category_id,
                    'name' => $request->name,
                    'price' => $request->price,
                    'discount' => $request->discount,
                    'short_description' => $request->short_description,
                    'description' => $request->description,
                ];

                if ($request->hasFile('image')) {
                    $dataProduct['image'] = $request->file('image')->store('public/products');
                }

                $product = Product::create($dataProduct);

                if ($request->hasFile('galleries')) {
                    foreach ($request->file('galleries') as $image) {
                        $imagePath = $image->store('public/galleries', 'public'); // Store the image in the public storage
                        Gallerie::create([
                            'product_id' => $product->id,
                            'image' => $imagePath
                        ]);
                    }
                }
              
            });

            return redirect()->back()->with('success', 'Thêm sản phẩm thành công');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::with('category', 'galleries')->findOrFail($id);
        $categories = Category::all(); // Lấy tất cả các danh mục
        return view('pages.Admin.Products.edit_product', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $product = Product::findOrFail($id);

                $dataProduct = [
                    'category_id' => $request->category_id,
                    'name' => $request->name,
                    'price' => $request->price,
                    'discount' => $request->discount,
                    'short_description' => $request->short_description,
                    'description' => $request->description,
                ];

                if ($request->hasFile('image')) {
                    if ($product->image) {
                        Storage::disk('public')->delete($product->image);
                    }
                    $dataProduct['image'] = $request->file('image')->store('public/products', 'public');
                }
                $product->update($dataProduct);

                // Xóa các hình ảnh được đánh dấu
                if ($request->has('delete_galleries')) {
                    Gallerie::whereIn('id', $request->delete_galleries)->each(function ($gallery) {
                        Storage::disk('public')->delete($gallery->image);
                        $gallery->delete();
                    });
                }

                if ($request->hasFile('galleries')) {
                    // Lưu các hình ảnh mới vào gallery
                    foreach ($request->file('galleries') as $image) {
                        $imagePath = $image->store('public/galleries', 'public');
                        Gallerie::create([
                            'product_id' => $product->id,
                            'image' => $imagePath
                        ]);
                    }
                }
            });

            return redirect()->back()->with('success', 'Cập nhật sản phẩm thành công');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::transaction(function () use ($id) {
             
                $product = Product::findOrFail($id);
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }
                // Xóa các hình ảnh trong gallery của sản phẩm
                Gallerie::where('product_id', $product->id)->each(function ($gallery) {
                    Storage::disk('public')->delete($gallery->image); // Xóa hình ảnh khỏi thư mục lưu trữ
                    $gallery->delete(); // Xóa bản ghi hình ảnh khỏi cơ sở dữ liệu
                });

       
                $product->delete();
            });

            
            return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được xóa thành công');
        } catch (\Throwable $th) {
        
            return back()->with('error', $th->getMessage());
        }
    }
    public function exportUsers(Request $request){
        return Excel::download(new ExporProduct, 'Prodcuts22.xlsx');
    }
}
