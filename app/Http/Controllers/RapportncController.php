<?php

namespace App\Http\Controllers;
use App\ac_ap;
use App\rapportnc;
use App\action_immed;
use App\photo_nc;


use Illuminate\Http\Request;

class RapportncController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nc = rapportnc::
        join('action_immeds', 'rapportncs.id_rapportnc', '=', 'action_immeds.id_rapportnc')
      ->join('photo_ncs', 'rapportncs.id_rapportnc', '=', 'photo_ncs.id_rapportnc')
      ->join('articles', 'rapportncs.id_article', '=', 'articles.id_article')
      ->join('clients', 'rapportncs.id_client', '=', 'clients.id_client')

     

     ->get();


    
      return response()->json($nc);
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
         // test //
        request()->validate([
            'photo_ok' => 'required',
            'photo_nok' => 'required',
            'photo_idant' => 'required',
            'photo_ok.*' => 'mimes:png,jpg,jpeg',
            'photo_nok.*' => 'mimes:png,jpg,jpeg',
            'photo_idant.*' => 'mimes:png,jpg,jpeg',
        ]);
     


       $RapportNC = rapportnc::create([

            'id_article' => $request->code_produit,
            'id_lot' => $request->num_lot_date,
            'nr_fnc' => $request->nr_fnc,
            'sujet_non_conformite' => $request->sujet_non_conformite,
            'qte_nc' => $request->qte_nc,
            'process' => $request->process,
            'id_client' => $request->nom_client,
            'occurance_defaut' => $request->occurance_defaut,
            ]);
            $RapportNCs= $RapportNC->id_rapportnc;
            
            //return response()->json($RapportNC);

            $action_immed = action_immed::create([
            'id_rapportnc' => $RapportNCs,

            'ac_immed' => $request->ac_immed,
            'date_ac_immed' => $request->date_ac_immed,
            'date_verf_ac_immed' => $request->date_verf_ac_immed,
            ]);

            //// upload photo
            $photo_ok_name;
            if($request->hasfile('photo_ok')){
                $photo_ok_name= $request->file('photo_ok')->getClientOriginalName();
                
                $request->file('photo_ok')->move(public_path().'/files/' , $photo_ok_name );  
            }
            $photo_nok_name ;
            if($request->hasfile('photo_nok')){
                $photo_nok_name= $request->file('photo_nok')->getClientOriginalName();
                
                $request->file('photo_nok')->move(public_path().'/files/' , $photo_nok_name );  
            }
            $photo_idant_name;
            if($request->hasfile('photo_idant')){
                $photo_idant_name= $request->file('photo_idant')->getClientOriginalName();
                
                $request->file('photo_idant')->move(public_path().'/files/' , $photo_idant_name );  
            }
            $photo_nc = photo_nc::create([
                
            'id_rapportnc' => $RapportNCs,

            'photo_ok' =>$photo_ok_name,
            'photo_nok' => $photo_nok_name,
            'photo_idant' => $photo_idant_name,

            ]);
            if($RapportNC){
                if($action_immed){
                    if($photo_nc){
                        return response()->json(["status" => 200]);
                    }                
                }           
             }
           

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\rapportnc  $rapportnc
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $rapportnc = rapportnc::where('rapportncs.id_rapportnc','=',$id)
        ->join('action_immeds', 'rapportncs.id_rapportnc', '=', 'action_immeds.id_rapportnc')
        ->join('photo_ncs', 'rapportncs.id_rapportnc', '=', 'photo_ncs.id_rapportnc')
        ->join('articles', 'rapportncs.id_article', '=', 'articles.id_article')
        ->join('clients', 'rapportncs.id_client', '=', 'clients.id_client')->get();
        return response()->json($rapportnc);

  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\rapportnc  $rapportnc
     * @return \Illuminate\Http\Response
     */
    public function edit(rapportnc $rapportnc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\rapportnc  $rapportnc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
  
     
        $RapportNC = rapportnc::where('rapportncs.id_rapportnc', $id)->first();

        $RapportNC ->id_article = $request->code_produit;
        $RapportNC ->id_lot = $request->num_lot_date;
        $RapportNC ->nr_fnc = $request->nr_fnc;
        $RapportNC ->sujet_non_conformite = $request->sujet_non_conformite;
        $RapportNC ->qte_nc = $request->qte_nc;
        $RapportNC ->process = $request->process;
        $RapportNC ->id_client = $request->nom_client;
        $RapportNC ->occurance_defaut = $request->occurance_defaut;
        $RapportNC->save();

        $ac_med = action_immed::where('action_immeds.id_rapportnc', $id)->first();

        $ac_med ->ac_immed = $request->ac_immed;
        $ac_med ->date_ac_immed = $request->date_ac_immed;
        $ac_med ->date_verf_ac_immed = $request->date_verf_ac_immed;
        $ac_med->save();



        return response()->json($RapportNC); 
        return response()->json($ac_med); 
    
        
       }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\rapportnc  $rapportnc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rapportnc = rapportnc::where('id_rapportnc','=',$id);
        $rapportnc->delete();
        $photo = photo_nc::where('id_rapportnc','=',$id);
        $photo->delete();
        $action_immed = action_immed::where('id_rapportnc','=',$id);
        $action_immed->delete();
        $ac_ap = ac_ap::where('id_rapportnc','=',$id);
        $ac_ap->delete();

        return response()->json($ac_ap);
    }
}
