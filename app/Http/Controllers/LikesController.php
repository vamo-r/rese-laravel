<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LikesController extends Controller
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
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Like $like)
    {
        $likes_data = $like->getLikes();

        return response()->json($likes_data, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Like $like)
    {
        $shop_id = $request->shop_id;
        $like_data = $like->checkLike($shop_id);

        if($like_data) {
            $like->deleteLike($shop_id);

            return response()->json(['like' => false], Response::HTTP_OK);
        } else {
            $like->saveLike($request);

            return response()->json(['like' => true], Response::HTTP_OK);
        }
    }
}
