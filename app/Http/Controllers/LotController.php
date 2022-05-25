<?php

namespace App\Http\Controllers;

use App\lot;
use Illuminate\Http\Request;

class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lots = lot::orderBy('id_lot', 'desc')->join('articles','articles.id_article', '=','lots.id_article')->get();
        return response()->json($lots);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lots = lot::create([
            'num_lot' => $request->num_lot,
            'date_prod' => $request->date_prod,
            'qnt_produit' => $request->qnt_produit,
            'id_article' => $request->id_article,

            ]);
        if($lots){
            return response()->json(["status" => 200]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lots = lot::where('lots.id_lot','=',$id)->get();
        return response()->json($lots);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function edit(lot $lot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $lots = lot::where('id_lot','=', $id)->firstOrFail();
        $lots ->num_lot = $request->num_lot;
        $lots ->date_prod = $request->date_prod;
        $lots ->qnt_produit = $request->qnt_produit;
        $lots->save();
        return response()->json($lots); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lots = lot::where('id_lot','=',$id);
        $lots->delete();
        return response()->json($lots);
    }
}
