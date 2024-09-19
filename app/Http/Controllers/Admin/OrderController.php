<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    public function index(){
        $orders = Order::with(['orderItems', 'customer.province', 'customer.district', 'customer.ward'])->get();
        return view('pages.Admin.Orders.index', compact('orders'));
    }
    public function show($id){
        $order = Order::with(['customer', 'customer.province', 'customer.district', 'customer.ward', 'orderItems.product'])
                       ->findOrFail($id);

        return view('pages.Admin.Orders.show', compact('order'));
    }
}
  
