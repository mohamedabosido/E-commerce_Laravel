<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Http\Requests\StoreRequest\EditStoreRequest;
use App\Http\Requests\StoreRequest\StoreRequest;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $paginat = 10;
        $stores = Store::paginate($paginat);
        foreach ($stores as $store) {
            $store->logo = Storage::url($store->logo);
        }
        return view('admin.store.index')->with('stores', $stores);
    }
    public function deleted(Request $request)
    {
        $paginat = 10;
        $stores = Store::onlyTrashed()->paginate($paginat);
        foreach ($stores as $store) {
            $store->logo = Storage::url($store->logo);
        }
        return view('admin.store.deleted')->with('stores', $stores);
    }

    public function create()
    {
        return view('admin.store.create');
    }
    public function store(StoreRequest $request)
    {

        $logo = $request->file('logo');  //getFile
        $path = '/images/stores/' . (time() + rand(1, 1000)) . '.' . $logo->getClientOriginalExtension();    //path
        Storage::disk('public')->put($path, file_get_contents($logo)); //upload

        $name = $request['name'];
        $address = $request['address'];

        $store = new Store();

        $store->logo = $path;
        $store->name = $name;
        $store->address = $address;
        $store->save();

        return redirect()->back()->with('toast_success', 'Store was created');
    }


    public function edit($id)
    {
        $store = Store::where('id', $id)->get()->first();
        return view('admin.store.edit')->with('store', $store);
    }

    public function update(EditStoreRequest $request, $id)
    {
        $store = Store::findOrFail($id);

        if ($request->has('logo')) {
            $logo = $request->file('logo');  //getFile
            $path = '/images/stores/' . (time() + rand(1, 1000)) . '.' . $logo->getClientOriginalExtension();    //path
            Storage::disk('public')->put($path, file_get_contents($logo));
            $store->logo = $path;
        }
        $name = $request['name'];
        $address = $request['address'];

        $store->name = $name;
        $store->address = $address;

        $store->save();

        return redirect()->back()->with('toast_success', 'Store was updated');
    }

    public function destroy($id)
    {
        Store::destroy($id);
        return redirect()->back()->with('toast_success', 'Store was deleted');
    }

    public function restore($id)
    {
        Store::withTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('toast_success', 'Store was restored');
    }
}
