<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShopsController extends Controller
{
    /**
     * Create a new ShopsController instance.
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
    public function index(Shop $shop)
    {
        $shops_data = $shop->getAllShops();
        return response()->json(['shops_data' => $shops_data], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop, $id)
    {
        $shop_data = $shop->getShopDetails($id);
        return response()->json(['shop_data' => $shop_data], Response::HTTP_OK);
    }
}
