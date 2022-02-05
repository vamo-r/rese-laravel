<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'image_url',
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

    public function userslike() {
        return $this->belongsToMany(User::class, 'likes')
            ->as('likes');
    }

    public function getAllShops()
    {
        $shops = $this->with('area:id,name', 'genre:id,name')->orderBy('id', 'asc')->get();
        return $shops;
    }

    public function getShopDetails($id)
    {
        $shop = $this->with('area:id,name', 'genre:id,name')->where('id', $id)->get();
        return $shop;
    }
}
