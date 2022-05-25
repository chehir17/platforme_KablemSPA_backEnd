<?php

namespace App\Http\Controllers;

use App\supercontrole;
use App\client;
use App\article;
use Illuminate\Http\Request;

class SupercontroleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supercontroles = supercontrole::
           get();
      return response()->json($supercontroles);
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
        
        $supercontroles = supercontrole::create([
            'id_article' => $request->code_artc,     
            'rev_projet' => $request->rev_projet,     
            'id_client' => $request->nom_client,
            'type_controle' => $request->type_controle,
            'doc_réfirance' => $request->doc_refirance,
            'methode_controle' => $request->methode_controle,
            'date_début' => $request->date_debut,
            'durée_estimé' => $request->duree_estime,
            'traçibilité_cablage' => $request->tracibilite_cablage,
            'traçibilité_carton' => $request->tracibilite_carton,
            'heurs_internedépensées' => $request->heurs_internedepensees,
            'date_final' => $request->date_final,
            ]);
            if($supercontroles){
                return response()->json(["status" => 200]);
            } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\supercontrole  $supercontrole
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supercontroles = supercontrole::where('supercontroles.id_supercontrole','=',$id)->get();
        return response()->json($supercontroles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\supercontrole  $supercontrole
     * @return \Illuminate\Http\Response
     */
   /* public function edit(supercontrole $supercontrole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\supercontrole  $supercontrole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $supercontrole = supercontrole ::where('supercontroles.id_supercontrole','=',$id)->first();
        $supercontrole ->id_article  = $request->code_artc ;
        $supercontrole ->rev_projet = $request->rev_projet;
        $supercontrole ->id_client = $request->nom_client;
        $supercontrole ->type_controle = $request->type_controle;
        $supercontrole ->doc_réfirance = $request->doc_refirance;
        $supercontrole ->methode_controle = $request->methode_controle;
        $supercontrole ->date_début = $request->date_debut;
        $supercontrole ->durée_estimé	= $request->duree_estime;
        $supercontrole ->traçibilité_cablage = $request->tracibilite_cablage;
        $supercontrole ->traçibilité_carton = $request->tracibilite_carton;
        $supercontrole ->heurs_internedépensées = $request->heurs_internedepensees;
        $supercontrole ->date_final = $request->date_final;

        $supercontrole->save();

        return response()->json($supercontrole); 


       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\supercontrole  $supercontrole
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supercontroles = supercontrole::where('id_supercontrole','=',$id);
        $supercontroles->delete();
        return response()->json($supercontroles);
    }
}
