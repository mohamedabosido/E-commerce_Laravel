<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteController extends Controller
{
    public function index()
    {
        $stores = Store::limit(3)->get();
        foreach ($stores as $store) {
            $store->logo = Storage::url($store->logo);
        }
        return view('site.home')->with('stores', $stores);
    }

    public function products(Request $request)
    {
        $paginate = 8;
        $products = Product::select()->paginate($paginate);
        foreach ($products as $product) {
            $product->photo = Storage::url($product->photo);
        }
        return view('site.product.products')->with('products', $products);
    }

    public function search(Request $request)
    {
        $paginate = 8;
        $keyword = $request['keyword'];
        $products = Product::with('store')->where('name', 'LIKE', "%$keyword%")->paginate($paginate);
        foreach ($products as $product) {
            $product->photo = Storage::url($product->photo);
        }
        return view('site.product.search')->with('products', $products);
    }

    public function stores(Request $request)
    {
        $paginate = 6;
        $stores = Store::select()->paginate($paginate);
        foreach ($stores as $store) {
            $store->logo = Storage::url($store->logo);
        }
        return view('site.store.stores')->with('stores', $stores);
    }

    public function store($id)
    {
        $store = Store::with('products')->findOrFail($id);
        foreach ($store->products as $product) {
            $product->photo = Storage::url($product->photo);
        }
        return view('site.store.store')->with('store', $store);
    }
}
