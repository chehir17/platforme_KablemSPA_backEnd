<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use App\suiviclient;
use App\scrap;
use App\supercontrole;
use App\suivifournisseur;
use App\notification;

use App\projet;
use App\photo_suivi_client;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class SuiviclientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suivi_clients = suiviclient::
        //join('projets', 'suiviclients.id_suiviclient', '=', 'projets.id_suiviclient')
        //->join('photo_suivi_clients', 'suiviclients.id_suiviclient', '=', 'photo_suivi_clients.id_suiviclient')
     //   ->join('clients', 'suiviclients.id_client', '=', 'clients.id_client')
     //   ->join('articles', 'suiviclients.id_article', '=', 'articles.id_article')
     //   ->join('suivifournisseurs', 'suiviclients.id_suivifournisseur', '=', 'suivifournisseurs.id_suivifournisseur')
        get();
        return response()->json($suivi_clients);    }

        public function ppm1()
        {
            $result = DB::Table('pieces')->get(); 

            $cnq= suiviclient::where('suiviclients.type_incidant','=',"Réclamation client")->selectRaw(" sum(nbr_piec_ko) AS data, 
        DATE_FORMAT(created_at, '%m') AS new_date, 
        MONTH(created_at) AS month")->groupBy('new_date')->get();
        
for ($i=0; $i <count($cnq) ; $i++) { 
    $numdata = $cnq[$i]->data ;
    $pic = $result[$i]->client;
    $ss[$i][0]=($numdata / $pic ) *1000000 ;
    $ss[$i][1]= $cnq[$i]->month;}


    return response()->json($ss);   
        }

        public function ppm2()
        {
            $result = DB::Table('pieces')->get(); 

            $cnq= suiviclient::where('suiviclients.type_incidant','=',"Alerte")->selectRaw(" sum(nbr_piec_ko) AS data, 
        DATE_FORMAT(created_at, '%m') AS new_date, 
        MONTH(created_at) AS month")->groupBy('new_date')->get();
        

for ($i=0; $i <count($cnq) ; $i++) { 
    $numdata = $cnq[$i]->data ;
    $pic = $result[$i]->p1_p2;
    $ss[$i][0]=($numdata / $pic ) *1000000 ;
    $ss[$i][1]= $cnq[$i]->month;}

    return response()->json($ss);   
        }
        public function ppm3()
        {
            $result = DB::Table('pieces')->get(); 

            $cnq= suiviclient::where('suiviclients.type_incidant','=',"Réclamation interne group")->selectRaw(" sum(nbr_piec_ko) AS data, 
        DATE_FORMAT(created_at, '%m') AS new_date, 
        MONTH(created_at) AS month")->groupBy('new_date')->get();
      

for ($i=0; $i <count($cnq) ; $i++) { 
    $numdata = $cnq[$i]->data ;
    $pic = $result[$i]->p3;
 $ss[$i][0]=($numdata / $pic ) *1000000 ;
 $ss[$i][1]= $cnq[$i]->month;
}

    return response()->json($ss);   
        }
     
       public function cnq_mon()
        {
           
            $result =  suiviclient:: selectRaw(" sum(cout_non_quat_s_rec) AS data, DATE_FORMAT(created_at, '%m') AS new_date, 
            MONTH(created_at) AS month")->groupBy('new_date')->get(); 
            $result1 =  scrap::selectRaw(" sum(h_interne) AS data,DATE_FORMAT(created_at, '%m') AS new_date, 
            MONTH(created_at) AS month")->groupBy('new_date')->get();  
            $result2 =  suivifournisseur::selectRaw(" sum(cout_tret) AS data,DATE_FORMAT(created_at, '%m') AS new_date, 
            MONTH(created_at) AS month")->groupBy('new_date')->get();  
            $result3 =  supercontrole::selectRaw(" sum(heurs_internedépensées) AS data,DATE_FORMAT(created_at, '%m') AS new_date, 
            MONTH(created_at) AS month")->groupBy('new_date')->get();  

        
$tab[]= array_merge($result->toArray(),$result1->toArray(),$result2->toArray(),$result3->toArray());
//$grouped = array_sum($tab->data)->array_group_by($tab[0],'new_date');


$groups = array();

foreach ($tab[0] as $item) {
    $key = $item['new_date'];
    if (!array_key_exists($key, $groups)) {

        $groups[$key] = array(
            'id' => $item['new_date'],
            'data' => $item['data'],
        );
    } else {
      
        $groups[$key]['data'] = $groups[$key]['data'] + $item['data'];
    }
}
if ( array_key_exists("01",$groups)  ) {
    $final[0]=$groups["01"];
    }
    if (array_key_exists("02",$groups)) {
        $final[1]=$groups["02"];
            }
         if (array_key_exists("03",$groups) ){
            $final[02]=$groups["03"];
            }
            if (array_key_exists("04",$groups)) {
                $final[03]=$groups["04"];
                }
                if (array_key_exists("05",$groups) ){
                    $final[04]=$groups["05"];
                    }
                    if (array_key_exists("06",$groups) ){
                        $final[05]=$groups["06"];
                        }
                        if (array_key_exists("07",$groups) ){
                            $final[06]=$groups["07"];
                            }
                            
                            if (array_key_exists("08",$groups) ){
                                $final[07]=$groups["08"];
                                }
                                if (array_key_exists("09",$groups) ){
                                    $final[8]=$groups["09"];
                                    }
                                if (array_key_exists("10",$groups) ){
                                    $final[9]=$groups["10"];
                                    }
                                  
                                        if (array_key_exists("11",$groups) ){
                                            $final[10]=$groups["11"];
                                            }
                                            if (array_key_exists("12",$groups)) {
                                                $final[11]=$groups["12"];
                                                }
                     return response()->json($final);   
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
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
                'photo_ok.*' => 'mimes:png,jpg,jpeg',
                'photo_nok.*' => 'mimes:png,jpg,jpeg',
                ]);
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

        $suivi_clients = suiviclient::create([
            'num_rec_cli' => $request->num_rec_cli,
            'date_rec_cli' => $request->date_rec_cli,
            'zone' => $request->zone,    
            'id_client' => $request->nom_client,
            'id_article' => $request->ref_prod,        
            'desc_deff' => $request->desc_deff,        
            'nbr_piec_ko' => $request->nbr_piec_ko,        
            'type_incidant' => $request->type,
            'id_suivifournisseur' => $request->num_rec_four,
            'recurence' => $request->recurence,
            'statut' => $request->statut,
            'cout_non_quat_s_rec' => $request->cout_non_quat_s_rec,
            'nom_projet' => $request->nom_projet,        
            'phase_projet' => $request->phase_projet,
            'photo_ok' => $photo_ok_name,        
            'photo_nok' => $photo_nok_name,
            ]);
          
 
              
                // upload image Suivi Client
            
  
            $dt1 = Carbon::now()->addDay(1);
            $dt5 = Carbon::now()->addDay(5);
                            $one_day = notification::create([
                                'titre' => "N'oublier d'envoyer QR", 
                                'notif_body' => "N'oublier d'envoyer QR",         
                                'visibility' => 0,
                                'id_user' => $request->id_user,
                                'created_at' => $dt1,          
                                ]);
                                $five_day = notification::create([
                                    'titre' => "N'oublier d'envoyer 8D", 
                                    'notif_body' => "N'oublier d'envoyer 8D",         
                                    'visibility' => 0,
                                    'id_user' => $request->id_user,
                                    'created_at' => $dt5,          
                                    ]);


            if($suivi_clients){
               
                        return response()->json($request->id_user);
                    }
      
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\suiviclient  $suiviclient
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $suivi_clients = suiviclient::where('suiviclients.id_suiviclient','=',$id)
     
        ->get();
        return response()->json($suivi_clients);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\suiviclient  $suiviclient
     * @return \Illuminate\Http\Response
     */
    public function edit(suiviclient $suiviclient)
    {
        //
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\suiviclient  $suiviclient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $suivi_client = suiviclient ::where('suiviclients.id_suiviclient', $id)->first();
        $suivi_client ->num_rec_cli = $request->num_rec_cli;
        $suivi_client ->date_rec_cli = $request->date_rec_cli;
        $suivi_client ->zone = $request->zone;
        $suivi_client ->desc_deff = $request->desc_deff;
        $suivi_client ->nbr_piec_ko = $request->nbr_piec_ko;
        $suivi_client ->type_incidant = $request->type;
        $suivi_client ->recurence = $request->recurence;
        $suivi_client ->statut = $request->statut;
        $suivi_client ->cout_non_quat_s_rec = $request->cout_non_quat_s_rec;
        $suivi_client ->id_client  = $request->nom_client ;
        $suivi_client ->id_article  = $request->ref_prod ;
        $suivi_client ->id_suivifournisseur = $request->num_rec_four;
        $suivi_client ->nom_projet = $request->nom_projet;
        $suivi_client ->phase_projet = $request->phase_projet;
        
        $suivi_client->save();
        
    

    
        return response()->json($suivi_client);    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\suiviclient  $suiviclient
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {

        $suivi_client = suiviclient::where('id_suiviclient','=',$id);

        $suivi_client->delete();
        return response()->json($suivi_client);
    }
}
