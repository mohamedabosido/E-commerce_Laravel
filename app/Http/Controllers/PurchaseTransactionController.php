<?php

namespace App\Http\Controllers;

use App\Models\PurchaseTransaction;
use Illuminate\Http\Request;

class PurchaseTransactionController extends Controller
{
    public function index(Request $request)
    {
        $paginat = 10;
        $purchase_transactions = PurchaseTransaction::withTrashed()->with('product')->with('product.store')->paginate($paginat);
        return view('admin.purchase_transactions.index')->with('purchase_transactions', $purchase_transactions);
    }

    public function show($id)
    {
        $purchase_transaction = PurchaseTransaction::withTrashed()->findOrFail($id);
    }

    public function create()
    {
        return view('admin.purchase_transaction.create');
    }
    public function store(Request $request)
    {
        $product_id = $request['product_id'];
        $purchase_price = $request['purchase_price'];

        $purchase_transaction = new PurchaseTransaction();

        $purchase_transaction->product_id = $product_id;
        $purchase_transaction->purchase_price = $purchase_price;
        $purchase_transaction->save();

        return redirect()->back()->with('success', 'Product bought Successfully!');
    }


    public function edit($id)
    {
        $purchase_transaction = PurchaseTransaction::withTrashed()->findOrFail($id);
        return view('admin.purchase_transaction.edit')->with('purchase_transaction', $purchase_transaction);
    }

    public function update(Request $request, $id)
    {
        $purchase_transaction = PurchaseTransaction::withTrashed()->findOrFail($id);

        $product_id = $request['product_id'];
        $purchase_price = $request['purchase_price'];
        //timestamp

        $purchase_transaction->product_id = $product_id;
        $purchase_transaction->purchase_price = $purchase_price;
        //timestamp

        $purchase_transaction->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        PurchaseTransaction::destroy($id);
        return redirect()->back();
    }

    public function restore($id)
    {
        PurchaseTransaction::withTrashed()->where('id', $id)->restore();
        return redirect()->back();
    }

    public function report()
    {
        $purchase_transactions_prdoucts =  PurchaseTransaction::with('product')->get()->groupBy('product_id');
        //    dd($purchase_transactions_prdoucts->toArray());
        return view('admin.purchase_transactions.report')->with('purchase_transactions_prdoucts' ,$purchase_transactions_prdoucts);
    }
}
