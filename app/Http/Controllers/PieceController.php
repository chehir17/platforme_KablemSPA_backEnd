<?php

namespace App\Http\Controllers;
use App\piece;

use Illuminate\Http\Request;

class PieceController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $piece = piece::get();
        return response()->json($piece);    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $piece = piece::create([
            'client' => $request->client,
            'p1_p2' => $request->p1_p2,
            'p3' => $request->p3,
            'month' => $request->month,        
               
            ]);
        if($piece){
            return response()->json(["status" => 200]);
        }    }
        public function show( $id)
        {
            $scrap = piece::where('pieces.id_piece','=',$id)->get();
            return response()->json($scrap);     }
    }