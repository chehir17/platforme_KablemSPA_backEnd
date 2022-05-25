<?php

namespace App\Http\Controllers;

use App\fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseur = fournisseur::orderBy('id_fournisseur', 'desc')->get();
        return response()->json($fournisseur);
    }

    
    public function getfournisseurSF(){
        $fournisseurs = fournisseur::orderBy('id_fournisseur', 'desc')->get();
        return response()->json($fournisseurs);
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
        $fournisseur = fournisseur::create([
            'nom_four' => $request->nom_four,
            'ref' => $request->ref,
            'classification' =>  $request->classification
    
            ]);
        if($fournisseur){
            return response()->json(["status" => 200]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fournisseur = fournisseur::where('id_fournisseur',$id)->get();
        return response()->json($fournisseur);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    /*public function edit(fournisseur $id)
    {
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $fournisseur = fournisseur ::where('id_fournisseur', $id)->firstOrFail();
        $fournisseur ->nom_four = $request->nom_four;
        $fournisseur ->ref = $request->ref;
        $fournisseur ->classification = $request->classification; 
        $fournisseur->save();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fournisseur = fournisseur::where('id_fournisseur','=',$id);
        $fournisseur->delete();
        return response()->json($fournisseur);
    }
}