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

    public function area() {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }

    public function genre() {
        return $this->belongsTo(Genre::class, 'genre_id', 'id');
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function getAllShops()
    {
        $shops = $this->with('area:id,name', 'genre:id,name')->get();
        return $shops;
    }

    public function getShopDetails($id)
    {
        $shop = $this->with('area:id,name', 'genre:id,name')->where('id', $id)->get();
        return $shop;
    }
}
