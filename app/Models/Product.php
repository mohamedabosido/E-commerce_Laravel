<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory , SoftDeletes;

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function purchase_transactions(){
        return $this->hasMany(PurchaseTransaction::class);
    }
}
