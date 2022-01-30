<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getReservations()
    {
        $reservations_data = $this->where('user_id', Auth::user()->id)->with('shop:id,name')->get();
        return $reservations_data;
    }

    public function checkReservation($request)
    {
        $reservation_data = $this->whereDate('date', $request->date)->whereTime('time', $request->time)->where('user_id', Auth::user()->id)->exists();
        return $reservation_data;
    }

    public function reserveShop($request)
    {
        $this->shop_id = $request->shop_id;
        $this->user_id = Auth::user()->id;
        $this->fill($request->all());
        $this->save();
    }

    public function deleteReservation($shop_id)
    {
        $this->where('shop_id', $shop_id)->where('user_id', Auth::user()->id)->delete();
    }
}
