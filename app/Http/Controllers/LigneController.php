<?php

namespace App\Http\Controllers;

use App\ligne;
use Illuminate\Http\Request;

class LigneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lignes = ligne::orderBy('lignes.id_ligne', 'desc')->get();
        return response()->json($lignes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
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
        $lignes = ligne::create([
            'nom_ligne' => $request->nom_ligne,
            ]);
        if($lignes){
            return response()->json(["status" => 200]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ligne  $ligne
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ligne = ligne::where('lignes.id_ligne','=',$id)->get();
        return response()->json($ligne);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ligne  $ligne
     * @return \Illuminate\Http\Response
     */
    /*public function edit(ligne $ligne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ligne  $ligne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ligne = ligne::where('id_ligne', $id)->firstOrFail();
        $ligne ->nom_ligne = $request->nom_ligne;
        $ligne->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ligne  $ligne
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ligne = ligne::where('id_ligne','=',$id);
        $ligne->delete();
        return response()->json($ligne);
    }
}
