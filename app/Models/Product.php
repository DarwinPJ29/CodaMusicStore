<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasUlids;

    protected $guarded = [];

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
    public function deliverys()
    {
        return $this->hasMany(Delivery::class);
    }
    public function stocks()
    {
        return $this->hasOne(Stock::class);
    }
}
