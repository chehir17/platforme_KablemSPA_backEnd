<?php

namespace App\Http\Controllers;

use App\scrap;
use App\odl;
use App\operateur;

use Illuminate\Http\Request;

class ScrapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
    $scrap = scrap::
 get();
    return response()->json($scrap);    }


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
        $registre_scraps = scrap::create([
        'zone_affe_prob' => $request->zone_affec_prob,
        'annulation' => $request->annulation,
        'desc_prob' => $request->desc_prob,
        'cout_unit' => $request->costa_U,
        'machine' => $request->machine,
        'desc_acmo' => $request->Desc_acmo,
        'mini' => $request->mini,
        'table_elec' => $request->table_elec,
        'qnt_scrap' => $request->qnt_scrap,
        'valeur_scrap' => $request->valeur_scrap,
        'cause_prob' => $request->cause_prob,
        'classification_cause' => $request->class_route_cause,
        'ac_immed_prend' => $request->ac_immed_prend,
        'rebut_remplacer' => $request->rebut_remp,
        'N_pecRec' => $request->num_pcs_recup,
        'qnt_rebF' => $request->qnt_rebut_final,
        'h_interne' => $request->h_inter_dep_rework,
        'h_externe' => $request->h_ext_dep,
        'cout_final' => $request->cout_final,
        'res_pos' => $request->resultat_pos_tri,
        'ac_corr_suppl' => $request->ac_correct_supp,
        'N_ac_corr_ex' => $request->num_ac_correc_ext,
        'note' => $request->note,
        'poids_rebut' => $request->poids_rebut,
        'id_ligne'=>$request->ligne_assemb,
        'compilateur'=>$request->compilateur,
        'id_lot'=>$request->qnt_lot,
        'date_production1'=>$request->date_prod,
        'id_article'=>$request->id_article,
        'odl_rep' => $request->odl_rel_logic,        
        'new_odl' => $request->nouv_odl,
        'level'=>$request->level,
        'id_user' => $request->oper_1,

        ]);

       if($registre_scraps){
        return response()->json(["status" => 200]);
    }   

        }

    /**
     * Display the specified resource.
     *
     * @param  \App\scrap  $scrap
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $scrap = scrap::where('scraps.id_scrap','=',$id)
     ->get();
        return response()->json($scrap);     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\scrap  $scrap
     * @return \Illuminate\Http\Response
     */
    public function edit(scrap $scrap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\scrap  $scrap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $registre_scrap = scrap::where('scraps.id_scrap', $id)->first();

            $registre_scrap -> zone_affe_prob =  $request->zone_affec_prob;
            $registre_scrap -> annulation =  $request->annulation;
            $registre_scrap -> desc_prob =  $request->desc_prob;
            $registre_scrap -> cout_unit =  $request->costa_U;
            $registre_scrap -> machine =  $request->machine;
            $registre_scrap -> desc_acmo =  $request->Desc_acmo;
            $registre_scrap -> mini =  $request->mini;
            $registre_scrap -> table_elec =  $request->table_elec;
            $registre_scrap -> qnt_scrap =  $request->qnt_scrap;
            $registre_scrap -> valeur_scrap =  $request->valeur_scrap;
            $registre_scrap -> cause_prob =  $request->cause_prob;
            $registre_scrap -> classification_cause =  $request->class_route_cause;
            $registre_scrap -> ac_immed_prend =  $request->ac_immed_prend;
            $registre_scrap -> rebut_remplacer =  $request->rebut_remp;
            $registre_scrap -> N_pecRec =  $request->num_pcs_recup;
            $registre_scrap -> qnt_rebF =  $request->qnt_rebut_final;
            $registre_scrap -> h_interne =  $request->h_inter_dep_rework;
            $registre_scrap -> h_externe =  $request->h_ext_dep;
            $registre_scrap -> cout_final =  $request->cout_final;
            $registre_scrap -> res_pos =  $request->resultat_pos_tri;
            $registre_scrap -> ac_corr_suppl =  $request->ac_correct_supp;
            $registre_scrap -> N_ac_corr_ex =  $request->num_ac_correc_ext;
            $registre_scrap -> note =  $request->note;
            $registre_scrap -> poids_rebut =  $request->poids_rebut;
            $registre_scrap -> id_ligne = $request->ligne_assemb;
            $registre_scrap -> compilateur = $request->compilateur;
            $registre_scrap -> id_lot =$request->qnt_lot;
            $registre_scrap -> odl_rep = $request->odl_rel_logic;       
            $registre_scrap -> new_odl = $request->nouv_odl;
            $registre_scrap -> id_user = $request->oper_1;       

            $registre_scrap->save();


          


           if($registre_scrap){
            return response()->json(["status" => 200]);
        }   
  
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\scrap  $scrap
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $projet = scrap::where('id_scrap','=',$id);
        $projet->delete();

    
        return response()->json($projet);    }
}
