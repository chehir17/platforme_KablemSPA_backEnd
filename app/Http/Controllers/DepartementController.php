<?php

namespace App\Http\Controllers;
use DateTime;

use App\departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departements = departement::orderBy('id_departement', 'desc')->get();
        return response()->json($departements);
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
        $departements = departement::create([
            'nom_departement' => $request->nom_departement,
            ]);
        if($departements){
            return response()->json(["status" => 200]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departement = departement::where('departements.id_departement','=',$id)->get();
        return response()->json($departement);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\departement  $departement
     * @return \Illuminate\Http\Response
     */
    /*public function edit(departement $departement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $departement = departement::where('id_departement', $id)->firstOrFail();
        $departement ->nom_departement = $request->nom_departement;
        $departement->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departement = departement::where('id_departement','=',$id);
        $departement->delete();
        return response()->json($departement);
    }
}
