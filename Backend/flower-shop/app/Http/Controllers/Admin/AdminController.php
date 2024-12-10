<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'orders_count' => Order::count(),
            'revenue' => Order::where('status', 'completed')->sum('total'),
            'products_count' => Product::count(),
            'customers_count' => User::where('role', 'customer')->count(),
        ];

        $recent_orders = Order::with(['user', 'products'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_orders'));
    }

    public function products()
    {
        $products = Product::paginate(10);
        return view('admin.products', compact('products'));
    }

    public function orders()
    {
        $orders = Order::with(['user', 'products'])->paginate(10);
        return view('admin.orders', compact('orders'));
    }

    public function customers()
    {
        $customers = User::where('role', 'customer')->paginate(10);
        return view('admin.customers', compact('customers'));
    }
}
