<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\OrderPlaced;
use App\Models\Product;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class CartController extends Controller
{
    public function showProduct($id)
    {

        $product = Product::findOrFail($id);
        return view('pages.Client.trang-chi-tiet-sp', compact('product'));
    }
    public function addToCart(Request $request)
    {
        // Lấy thông tin sản phẩm từ request
        $productId = $request->input('product_id');
        $name = $request->input('name');
        $image = $request->input('image');
        $quantity = $request->input('quantity');
        $price = $request->input('price');
        $product = Product::findOrFail($productId);

        // Tạo mảng sản phẩm
        $cartItem = [
            'id' => $productId,
            'name' => $name,
            'image' => $image,
            'quantity' => $quantity,
            'price' => $price,
            'slug' => route('products.show', $product->slug)

        ];

        // Lấy giỏ hàng hiện tại từ session
        $cart = session()->get('cart', []);

        // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng
        if (isset($cart[$productId])) {
            // Cập nhật số lượng sản phẩm
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // Thêm sản phẩm mới vào giỏ hàng
            $cart[$productId] = $cartItem;
        }

        // Lưu giỏ hàng vào session
        session()->put('cart', $cart);

        // Xử lý thêm hoặc mua ngay
        if ($request->input('action') === 'buy_now') {
            return redirect()->route('cart.checkout');
        }

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }
    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('Pages.Client.Cart', compact('cart'));
    }
    public function updateCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->input('quantity');

            // Cập nhật giỏ hàng trong session
            session()->put('cart', $cart);

            // Tính toán tổng giá mới của sản phẩm
            $new_total_price = $cart[$id]['price'] * $cart[$id]['quantity'];

            return response()->json([
                'success' => true,
                'new_total_price' => $new_total_price
            ]);
        }

        return response()->json(['success' => false]);
    }
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.view')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
    }


    public function checkout()
    {
        return view('Pages.Client.checkout');
    }
    public function placeOrder(Request $request)
    {
        $cart = session()->get('cart', []);

        // Tính tổng giá tiền (price * quantity)
        $totalPrice = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));
        //  dd($cart);

        // Validate các trường nhập liệu

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'province_id' => 'required|exists:provinces,id', // Validate tỉnh thành
            'district_id' => 'required|exists:districts,id', // Validate quận huyện
            'ward_id' => 'required|exists:wards,id',         // Validate phường xã
            'delivery_time' => 'required|in:0,1',
            'payment_method' => 'required|in:0,1',
            'note' => 'nullable|string',
        ]);

        try {
            // Lưu thông tin khách hàng vào bảng customers
            DB::transaction(function () use ($request, $cart, $totalPrice) {
                $customerId = DB::table('customers')->insertGetId([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'address' => $request->input('address'),
                    'province_id' => $request->input('province_id'), // Lưu province_id
                    'district_id' => $request->input('district_id'), // Lưu district_id
                    'ward_id' => $request->input('ward_id'),         // Lưu ward_id
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $token = Str::random(12);
                // Lưu đơn hàng vào bảng orders
                $order = DB::table('orders')->insertGetId([
                    'customer_id' => $customerId,
                    'delivery_time' => $request->input('delivery_time'),
                    'payment_method' => $request->input('payment_method'),
                    'note' => $request->input('note'),
                    'total_price' => $totalPrice,
                    'token' => $token,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Lưu chi tiết đơn hàng vào bảng order_items
                foreach ($cart as $item) {
                    DB::table('order_items')->insert([
                        'order_id' => $order,
                        'product_id' => $item['id'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
                $province = DB::table('provinces')->where('id', $request->input('province_id'))->value('name');
                $district = DB::table('districts')->where('id', $request->input('district_id'))->value('name');
                $ward = DB::table('wards')->where('id', $request->input('ward_id'))->value('name');
                // dd($province ,$district ,$ward);
                $orderDetails = [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'phone' => $request->input('phone'),
                    'phone' => $request->input('phone'),
                    'delivery_time' => $request->input('delivery_time') == 0 ? 'Trong giờ hành chính' : 'Ngoài giờ hành chính',
                    'payment_method' => $request->input('payment_method') == 0 ? 'Thanh Toán Tiền Mặt' : 'Thanh Toán Chuyển khoản',
                    'province' => $province,
                    'district' => $district,
                    'ward' => $ward,
                    'address' => $request->input('address'),
                    'total_price' =>number_format($totalPrice, 0, ',', '.'),
                    'items' => array_map(function ($item ,$index) {
                        return [
                            'index' => $index + 1,
                            'name' => $item['name'],
                            'quantity' => $item['quantity'],
                            'link' => $item['slug'],
                            'price' => number_format($item['price'], 0, ',', '.'),
                            'total' => number_format($item['price'] * $item['quantity'], 0, ',', '.'),

                        ];
                    }, $cart,array_keys($cart)),
                ];
                Mail::to($request->input('email'))->send(new OrderPlaced($orderDetails));
            });


            // Xóa giỏ hàng sau khi đặt hàng thành công
            session()->forget('cart');

            return redirect()->route('cart.view')->with('success', 'Đặt hàng thành công, chúng tôi sẽ gửi hóa đơn vào gmail của bạn sớm nhất!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error: ' . $th->getMessage());
        }
    }
}
