<?php

namespace App\Http\Controllers;
use DateTime;

use App\Planaction;
use App\Action;
use App\notification;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PlanactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     
    public function index()
    {
        $plan_action = Planaction::
       join('users','planactions.id_user','=','users.id_user')
        ->get();
        return response()->json($plan_action);
    /*    $posts = DB::table('planactions')->join('users','planactions.id_user','=','users.id_user')->get()->toArray();
$comments = DB::table('actions')->get()->toArray();

foreach($posts as &$post)
{
    $post->comments = array_filter($comments, function($comment) use ($post) {
        return $comment->id_planaction === $post->id_planaction;
    });
}

      /*  $plan_action = Planaction:: 
        join('actions', 'planactions.id_planaction', '=' ,'actions.id_planaction')
        ->join('users','planactions.id_user','=','users.id_user')->get();*/
    }

    public function index100()
    {
        $plan_action = Planaction::where('planactions.level','=',null)->
       join('users','planactions.id_user','=','users.id_user')
        ->get();
        return response()->json($plan_action);
  

      
    }
   
   
    public function bydep()
    {

        $plan_action = Planaction:: where('planactions.status','=',"done" )
        ->get()->groupBy('departement');
    
        return response()->json($plan_action);
    }
    public function bydep1()
    {

        $plan_action = Planaction:: where('planactions.status','!=',"done" )
        ->join('users','planactions.id_user','=','users.id_user')->get()->groupBy('departement');

        return response()->json($plan_action);
    }

    public function bydep_retard()
    {
        $dt = new DateTime();

        $plan_action = Planaction:: where( 'planactions.status','!=',"done" )->where ('planactions.date_cloture','<', $dt)->join('users','planactions.id_user','=','users.id_user')->get()->groupBy('departement');
      
        return response()->json($plan_action);
    }
    public function byuser($id)
    {
        $dt = new DateTime();

        $plan_action = Planaction:: where('planactions.id_user','=',$id)->where('planactions.status','!=','done')->count();
        $plan_action1 = Planaction:: where('planactions.id_user','=',$id)->where('planactions.status','=','done')->count();
        $plan_action2 = Planaction:: where('planactions.id_user','=',$id)->where('planactions.status','!=','done')->where('planactions.date_cloture','<',$dt)->count();

        $tab[0]=$plan_action2;
        $tab[1]=$plan_action1;
        $tab[2]=$plan_action;

      
        return response()->json($tab);
    }
    public function actionDone(){
        $planaction = Planaction:: count();
    
        $planaction_done = Planaction:: where('planactions.status','=','done')->count();
        if($planaction_done != 0){
            $sum=($planaction_done/$planaction) * 100;
        }else{
            $sum = 0 ;
        }
        return response()->json($sum);
        }
     
        public function actionOnRetard (){
            $dt = new DateTime();    
            $planaction1 = Planaction::count();
            $planaction2 = Planaction:: where('planactions.date_cloture','<', $dt)->where('planactions.status','!=','done' )->count();
            $planaction3 = Planaction:: where('planactions.status','!=','done' )->count();
           $notdonenotretard = $planaction3-$planaction2;
           $done = $planaction1 - $planaction3;

           $ddone = ($done / $planaction1) *100;
          $notdoneret =($notdonenotretard / $planaction1)*100;

            $tab[0] = $ddone;
            $tab[1] = $notdoneret;
         $tab[2] = 100 - ($ddone + $notdoneret);
            return response()->json($tab);
        }
       
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  /*  public function create()
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
        $plan_action = Planaction::create([
            'prob' => $request->prob,
            'departement' => $request->departement,
            'cause' => $request->cause,
            'support' => $request->support,
            'id_user' => $request->responsable,
            'status' => $request->status,
            'date_debut' => $request->date_debut,
            'date_cloture' => $request->date_cloture,
            'contol_effic' => $request->contol_effic,
            'progress' => $request->progress,
            'annul' => $request->annul,
            'id_scrap' => $request->id_scrap ,
            'id_rapportnc' => $request->id_rapportnc ,
            'id_supercontrole' => $request->id_supercontrole ,
            'id_suivifournisseur' => $request->id_suivifournisseur ,
            'id_suiviclient' => $request->id_suiviclient  ,
            'id_dmpp' => $request->id_dmpp ,
            'level'=>$request->level,
            'editeur'=>$request->editeur,
            'zone' => $request->zone,
            'origine' => $request->origine,
            'action' => $request->action,  
            'note' => $request->note,  

            ]);
  

       
            
        if($plan_action){
            return response()->json(["status" => 200]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Planaction  $planaction
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $plan_action = Planaction::where('planactions.id_planaction','=',$id)
        ->join('users','planactions.id_user','=','users.id_user')
        ->get();
        return response()->json($plan_action);  
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Planaction  $planaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Planaction $planaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Planaction  $planaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $planaction = Planaction ::where('planactions.id_planaction','=',$id)->first();
        $planaction ->departement = $request->departement;
        $planaction ->prob = $request->prob;
        $planaction ->cause = $request->cause;
        $planaction ->support = $request->support;
        $planaction ->date_debut = $request->date_debut;
        $planaction ->date_cloture = $request->date_cloture;
        $planaction ->id_user = $request->responsable;
        $planaction ->contol_effic = $request->contol_effic;
        $planaction ->progress = $request->progress;
        $planaction ->annul = $request->annul;
        $planaction ->id_scrap = $request->id_scrap;
        $planaction ->id_rapportnc = $request->id_rapportnc;
        $planaction ->id_supercontrole = $request->id_supercontrole;
        $planaction ->id_suivifournisseur = $request->id_suivifournisseur;
        $planaction ->id_suiviclient = $request->id_suiviclient;
        $planaction ->id_dmpp = $request->id_dmpp;
        $planaction ->origine = $request->origine;
        $planaction ->action = $request->action;
        $planaction ->note = $request->note;
        $planaction->save();


        $action = Action ::where('actions.id_planaction','=',$id)->first();
        $action ->zone = $request->zone;

        $action->save();
        return response()->json($action);
     
    }
    public function update1(Request $request,  $id)
    {
        $planaction = Planaction ::where('planactions.id_planaction','=',$id)->first();
      
        $planaction ->progress = $request->prg1;
        $planaction ->status = $request->sts1;
        $planaction->save();
        $ac= $planaction->sts1;

        if ($request->sts1 =="done") {
      $msg ="Le Plan d'action N° $id a été fermé ";
        $noti = notification::create([
            'titre' => $msg, 
            'notif_body' => "fermiture d'une action",         
            'visibility' => 3
        ]);
        }
                

            


    
        return response()->json($planaction);
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Planaction  $planaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      

        $Planaction = Planaction::where('id_planaction','=',$id);

        $Planaction->delete();
        return response()->json($Planaction);
    }
}
