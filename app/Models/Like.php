<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Like extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function getLikes()
    {
        $likes_data = User::find(Auth::user()->id)->likes()->with('area:id,name', 'genre:id,name')->get();
        return $likes_data;
    }

    public function checkLike($shop_id)
    {
        $like_data = $this->where('shop_id', $shop_id)->where('user_id', Auth::user()->id)->exists();
        return $like_data;
    }

    public function saveLike($request)
    {
        $this->shop_id = $request->shop_id;
        $this->user_id = Auth::user()->id;
        $this->save();
        return;
    }

    public function deleteLike($shop_id)
    {
        $this->where('shop_id', $shop_id)->where('user_id', Auth::user()->id)->delete();
    }
}
