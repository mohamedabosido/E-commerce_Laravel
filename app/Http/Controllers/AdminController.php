<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PurchaseTransaction;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stores = Store::all();
        $products = Product::all();
        $users = User::all();
        $purchase_transactions = PurchaseTransaction::all();
        $total_sales = 0;
        foreach($purchase_transactions as $purchase_transaction){
            $total_sales += $purchase_transaction->purchase_price;
        }

        return view('admin.admin')->with('stores', $stores)->with('products', $products)->with('users', $users)->with('total_sales', $total_sales);
    }
}
