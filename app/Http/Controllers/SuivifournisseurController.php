<?php

namespace App\Http\Controllers;

use App\suivifournisseur;
use App\fournisseur;
use App\article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuivifournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suivifournisseurs = suivifournisseur::
            get();
        return response()->json($suivifournisseurs);
    }


    public function ppm4()
    {
        $result = DB::Table('pieces')->get(); 

        $cnq= suivifournisseur::where('suivifournisseurs.id_fournisseur','=',"KABLEM SPA")->selectRaw(" sum(tot_pcs_ko) AS data, 
    DATE_FORMAT(created_at, '%m') AS new_date, 
    MONTH(created_at) AS month")->groupBy('new_date')->get();
  $ss1 = array();

for ($i=0; $i <count($cnq) ; $i++) { 
$numdata = $cnq[$i]->data ;
$pic = $result[$i]->frns;
$ss1[$i][0]=($numdata / $pic ) *1000000 ;
$ss1[$i][1]= $cnq[$i]->month;
}

return response()->json($ss1);   
    }



    public function getforadd()
    {
        $suivifournisseur = suivifournisseur::orderBy('id_suivifournisseur', 'desc')->get();
        return response()->json($suivifournisseur);   
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
        $suivifournisseurs = suivifournisseur::create([
            'id_article' => $request->code_artc, 
            'id_fournisseur' => $request->nom_four,         
            'desc_prob' => $request->desc_prob,
            'pcs_ko_detecte' => $request->pcs_ko_detecte,
            'triage' => $request->tirage,
            'tot_pcs_ko' => $request->tot_pcs_ko,
            'decision' => $request->decision,
            'derogation' => $request->derogation,
            'cout_tret' => $request->cout_tret,
            'statut' => $request->statut,
            'notes' => $request->notes,
            'piece_joint' => $request->piece_joint,
            'class' => $request->class,

            ]);
            if($suivifournisseurs){
                return response()->json(["status" => 200]);
            } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\suivifournisseur  $suivifournisseur
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suivifournisseurs = suivifournisseur::where('suivifournisseurs.id_suivifournisseur','=',$id)->get();
        return response()->json($suivifournisseurs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\suivifournisseur  $suivifournisseur
     * @return \Illuminate\Http\Response
     */
    /*public function edit(suivifournisseur $suivifournisseur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\suivifournisseur  $suivifournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $suivifournisseurs = suivifournisseur ::where('suivifournisseurs.id_suivifournisseur','=',$id)->first();
        $suivifournisseurs ->id_article  = $request->code_artc ;
        $suivifournisseurs ->id_fournisseur = $request->nom_four;
        $suivifournisseurs ->desc_prob = $request->desc_prob;
        $suivifournisseurs ->pcs_ko_detecte = $request->pcs_ko_detecte;
        $suivifournisseurs ->triage = $request->triage;
        $suivifournisseurs ->tot_pcs_ko = $request->tot_pcs_ko;
        $suivifournisseurs ->decision = $request->decision;
        $suivifournisseurs ->derogation	= $request->derogation;
        $suivifournisseurs ->cout_tret = $request->cout_tret;
        $suivifournisseurs ->statut = $request->statut;
        $suivifournisseurs ->notes = $request->notes;
        $suivifournisseurs ->piece_joint = $request->piece_joint;
        $suivifournisseurs ->class = $request->class;

        $suivifournisseurs->save();
        return response()->json($suivifournisseurs);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\suivifournisseur  $suivifournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suivifournisseurs = suivifournisseur::where('id_suivifournisseur','=', $id);
        $suivifournisseurs->delete();
        return response()->json($suivifournisseurs);
    }
}
