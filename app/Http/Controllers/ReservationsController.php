<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReservationsController extends Controller
{
    /**
     * Create a new LikesController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Reservation $reservation)
    {
        $reservations_data = $reservation->getReservations();

        return response()->json(['reservations_data' => $reservations_data], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, Reservation $reservation)
    {
        $request->validate([
            'date' => ['required', 'string', 'max:10'],
            'time' => ['required', 'string', 'max:5'],
            'number' => ['required', 'integer'],
        ]);

        $reservation_data = $reservation->checkReservation($request);

        if($reservation_data) {
            return response()->json(['error' => 'この時間は既に予約があります'], Response::HTTP_CONFLICT);
        } else if(!$reservation_data) {
            $reservation->reserveShop($request);

            return response()->json('Reservation completed', Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, Reservation $reservation)
    {
        $shop_id = $request->shop_id;
        $reservation->deleteReservation($shop_id);

        return response()->json('Reservation delete', Response::HTTP_OK);
    }
}
