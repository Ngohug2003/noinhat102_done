<?php

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController as UserController;
use App\Http\Controllers\Admin\SlideController as SlideController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\PostController as ClientPostController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\ImageUploadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'FormLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/password', function () {
        return view('pages.Auth.password');
    })->name('auth.password');

    Route::get('/register', function () {
        return view('pages.Auth.register');
    })->name('auth.register');
});

/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------
*/
Route::prefix('/')->group(function () {
    // Home page and contact page
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('lien-le', function() {
        return view('Pages.Client.trang-lien-he');
    })->name('lien-he');

    // Sản phẩm
    Route::get('san-pham', [ProductController::class, 'index'])->name('products.index');
    Route::get('san-pham/{slug}', [ProductController::class, 'show'])->name('products.show');

    // giỏ hàng và checkout
    Route::get('/cart/view', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('cart/place-order', [CartController::class, 'placeOrder'])->name('placeOrder');

    // tin tức 
    Route::get('/trang-tin-tuc', [ClientPostController::class, 'index'])->name('trang-tin-tuc');
    Route::get('/trang-chi-tiet-tin/{slug}', [ClientPostController::class, 'show'])->name('Client.postShow');


});

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected by Auth Middleware)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('auth')->group(function () {
    
    Route::get('/', function () {
        $user = session('user');
        if (!$user) {
            return redirect()->route('auth.login')->withErrors('Vui lòng đăng nhập trước.');
        }
        return view('pages.Admin.index', ['user' => $user]);
    })->name('admin.index');

    // Quản lý tin tức
    Route::get('/tintuc', [AdminPostController::class, 'index'])->name('listTinTuc');
    Route::get('/tintuc/create', [AdminPostController::class, 'create'])->name('admin.tintuc');
    Route::post('/tintuc', [AdminPostController::class, 'store'])->name('admin.Storetintuc');
    Route::get('/tintuc/{slug}', [AdminPostController::class, 'edit'])->name('admin.edittintuc');
    Route::put('/tintuc/{slug}', [AdminPostController::class, 'update'])->name('admin.updatetintuc');
    Route::delete('/tintuc/{slug}', [AdminPostController::class, 'destroy'])->name('admin.destroytintuc');

    // Quản lý danh mục sản phẩm
    Route::get('/danhmuc-sanpham', [AdminCategoryController::class, 'index'])->name('listDanhMuc');
    Route::get('/danhmuc-sanpham/create', [AdminCategoryController::class, 'create'])->name('admin.createdanhmuc');
    Route::post('/danhmuc-sanpham', [AdminCategoryController::class, 'store'])->name('admin.StoreCategory');
    Route::get('/danhmuc-sanpham/{id}', [AdminCategoryController::class, 'edit'])->name('admin.editCategory');
    Route::put('/danhmuc-sanpham/{id}', [AdminCategoryController::class, 'update'])->name('admin.updateDanhMuc');
    Route::delete('/danhmuc-sanpham/{id}', [AdminCategoryController::class, 'destroy'])->name('admin.destroyDanhMuc');

    // Quản lý sản  phẩm
    Route::get('/sanpham', [AdminProductController::class, 'index'])->name('listSanpham');
    Route::get('/sanpham/create', [AdminProductController::class, 'create'])->name('admin.createsSanpham');
    Route::post('/sanpham', [AdminProductController::class, 'store'])->name('admin.StoreProduct');
    Route::get('/sanpham/{id}', [AdminProductController::class, 'edit'])->name('admin.editProduct');
    Route::put('/sanpham/{id}', [AdminProductController::class, 'update'])->name('admin.updateProduct');
    Route::delete('/sanpham/{id}', [AdminProductController::class, 'destroy'])->name('admin.destroyProduct');
    Route::get('export-users', [AdminProductController::class, 'exportUsers'])->name('export');

    // Quản lý user
    Route::get('/User', [UserController::class, 'index'])->name('listUser');
    Route::get('/User/create', [UserController::class, 'create'])->name('admin.createsUser');
    Route::post('/User', [UserController::class, 'store'])->name('admin.StoreUser');

    // quản lý đơn hàng
    Route::get('/order', [AdminOrderController::class, 'index'])->name('listOrder');
    Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('orders.show');

    // QUản lý Slider 
    Route::get('/Slide', [SlideController::class, 'index'])->name('listSlider');

    Route::get('/Slide/create', [SlideController::class, 'create'])->name('admin.createsSlider');
    Route::post('/Slide', [SlideController::class, 'store'])->name('admin.StoreSlider');
    Route::get('/Slide/{id}', [SlideController::class, 'edit'])->name('admin.editSlider');
    Route::put('/Slide/{id}', [SlideController::class, 'update'])->name('admin.updateSlider');
    Route::delete('/Slide/{id}', [SlideController::class, 'destroy'])->name('admin.destroySlider');
    // Route::post('/admin/slider/update-status', [SlideController::class, 'updateStatus'])->name('admin.updateSliderStatus');
    Route::post('/admin/slides/update-status', [SlideController::class, 'updateStatus'])->name('admin.updateSliderStatus');
Route::get('/admin/slides/check-active-slides', [SlideController::class, 'checkActiveSlides'])->name('admin.checkActiveSlides');

   
    // Image upload
    Route::post('/upload_image', [ImageUploadController::class, 'uploadImage'])->name('upload.image');
});
