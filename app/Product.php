<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[ 'name'];

    public function inStock()
    {
        return $this->stock()->where('in_stock', true)->exists();
    }
    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
}
