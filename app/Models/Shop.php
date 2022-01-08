<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function getAllShops()
    {
        $shops = $this->all();
        return $shops;
    }

    public function getShopDetails($id)
    {
        $shop = $this->where('id', $id)->get();
        return $shop;
    }
}
