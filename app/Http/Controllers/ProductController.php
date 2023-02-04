<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest\EditProductRequest;
use App\Http\Requests\ProductRequest\ProductRequest;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $paginate = 10;
        $products = Product::with('store')->paginate($paginate);
        foreach ($products as $product) {
            $product->photo = Storage::url($product->photo);
        }
        return view('admin.product.index')->with('products', $products);
    }
    public function deleted(Request $request)
    {
        $paginate = 10;
        $products = Product::onlyTrashed()->with('store')->paginate($paginate);
        foreach ($products as $product) {
            $product->photo = Storage::url($product->photo);
        }
        return view('admin.product.deleted')->with('products', $products);
    }

    public function create()
    {
        $stores = Store::all();
        return view('admin.product.create')->with('stores', $stores);
    }
    public function store(ProductRequest $request)
    {
        $photo = $request->file('photo');  //getFile
        $path = '/images/products/' . (time() + rand(1, 1000)) . '.' . $photo->getClientOriginalExtension();    //path
        Storage::disk('public')->put($path, file_get_contents($photo));
        $name = $request['name'];
        $description = $request['description'];
        $base_price = $request['base_price'];
        $discount_price = $request['discount_price'];
        if ($request['is_discount'] == 'on') {
            $is_discount = true;
        } else {
            $is_discount = false;
        }
        $store_id = $request['store_id'];
        $product = new Product();
        $product->photo = $path;
        $product->name = $name;
        $product->description = $description;
        $product->base_price = $base_price;
        $product->discount_price = $discount_price;
        $product->is_discount = $is_discount;
        $product->store_id = $store_id;

        $product->save();

        return redirect()->back()->with('toast_success', 'Product was created');
    }


    public function edit($id)
    {
        $stores = Store::all();
        $product = Product::findOrFail($id);
        return view('admin.product.edit')->with('product', $product)->with('stores', $stores);
    }

    public function update(EditProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->has('photo')) {
            $photo = $request->file('photo');  //getFile
            $path = '/images/products/' . (time() + rand(1, 1000)) . '.' . $photo->getClientOriginalExtension();    //path
            Storage::disk('public')->put($path, file_get_contents($photo));
            $product->photo = $path;
        }

        $name = $request['name'];
        $description = $request['description'];
        $base_price = $request['base_price'];
        $discount_price = $request['discount_price'];
        if ($request['is_discount'] == 'on') {
            $is_discount = true;
        } else {
            $is_discount = false;
        }
        $store_id = $request['store_id'];

        $product->name = $name;
        $product->description = $description;
        $product->base_price = $base_price;
        $product->discount_price = $discount_price;
        $product->is_discount = $is_discount;
        $product->store_id = $store_id;

        $product->save();

        return redirect()->back()->with('toast_success', 'Product was updated');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->back()->with('toast_success', 'Product was deleted');
    }

    public function restore($id)
    {
        Product::withTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('toast_success', 'Product was restored');
    }

}
