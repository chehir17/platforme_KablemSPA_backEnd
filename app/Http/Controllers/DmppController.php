<?php

namespace App\Http\Controllers;

use App\Dmpp;
use App\piece;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DmppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dmpp = Dmpp::
          join('clients', 'dmpps.id_client', '=', 'clients.id_client')
        ->join('articles', 'dmpps.id_article', '=', 'articles.id_article')
        ->join('lignes', 'dmpps.id_ligne', '=', 'lignes.id_ligne')
        
        ->get();
        return response()->json($dmpp);
    }
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $fichdmpps = Dmpp::create([
            'id_ligne' => $request->ligne,
            'post' => $request->post,
            'id_article' => $request->ref,
            'nature' => $request->nature,        
            'zone' => $request->zone,        
            'date_sou' => $request->date_sou,        
            'type_dmpp' => $request->type,        
            'id_client' => $request->desc_cli,        
            'cout_estimative' => $request->cout_estimative,        
            'etat_actu' => $request->etat_actu,        
            'etat_modif' => $request->etat_modif,        
            'objectif_modif' => $request->objectif_modif,        
            ]);
        if($fichdmpps){
            return response()->json(["status" => 200]);
        }    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dmpp  $dmpp
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $dmpp = Dmpp::where('dmpps.id_dmpp','=',$id)

       -> join('clients', 'dmpps.id_client', '=', 'clients.id_client')
      ->join('articles', 'dmpps.id_article', '=', 'articles.id_article')
      ->join('lignes', 'dmpps.id_ligne', '=', 'lignes.id_ligne')->get();
      return response()->json($dmpp);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dmpp  $dmpp
     * @return \Illuminate\Http\Response
     */
    public function edit(Dmpp $dmpp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dmpp  $dmpp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
          

        $dmpp = Dmpp::where('dmpps.id_dmpp', $id)->first();

        $dmpp ->id_ligne = $request->ligne;
        $dmpp ->post = $request->post;
        $dmpp ->id_article = $request->ref;
        $dmpp ->nature = $request->nature;
        $dmpp ->zone = $request->zone;
        $dmpp ->type_dmpp = $request->type;
        $dmpp ->id_client = $request->desc_cli;
        $dmpp ->cout_estimative = $request->cout_estimative;


        $dmpp ->etat_actu = $request->etat_actu;
        $dmpp ->etat_modif = $request->etat_modif;
        $dmpp ->objectif_modif = $request->objectif_modif;
        $dmpp->save();

        return response()->json($dmpp); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dmpp  $dmpp
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $fichdmpp = Dmpp::where('id_dmpp','=',$id);
        $fichdmpp->delete();
        return response()->json($fichdmpp);    }
}
