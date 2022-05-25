<?php

namespace App\Http\Controllers;

use App\notification;
use App\User;
use DateTime;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {$dt = new DateTime();
        $notification = notification::orderBy('id_notif', 'desc')->where('notifications.created_at','<=',$dt)->where('notifications.visibility','!=',1)->get();
        return response()->json($notification);
    }

    public function afficheToResponsable(){
        $dt = new DateTime();

        $notification = notification::where('notifications.created_at','<=',$dt)
        ->get();
        return response()->json($notification);
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
        
        $notifications = notification::create([
            'titre' => $request->titre, 
            'notif_body' => $request->notif_body,         
            'visibility' => $request->visibility,
            'departement' => $request->departement,
            'id_user' => $request->id_user,
            ]);
            if($notifications){
                return response()->json(["status" => 200]);
            } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $dt = new DateTime();

        $user = User::where('users.id_user','=',$id)->get();
$usrole = $user[0]->role;
if ($usrole != "admin") {

        $notification = notification::where('notifications.id_user','=',$user[0]->id_user ) ->where('notifications.visibility','==',0)->orWhere('notifications.departement','=',$user[0]->id_departement)
        ->where('notifications.visibility','==',0)->where('notifications.created_at','<=',$dt)
        ->get();
}
    
    else if ($usrole == "admin") {
        $notification = notification::where('notifications.visibility','=',3)->where('notifications.created_at','<=',$dt)
        ->get();
         }

        return response()->json($notification);   
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $notif = notification ::where('notifications.id_notif','=',$id)->first();
      
        $notif ->visibility = $request->visibility;
      
        $notif->save();
        return response()->json($notif);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(notification $notification)
    {
        //
    }
}
