<?php

namespace App\Http\Controllers;

use App\client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $client = client::orderBy('id_client', 'desc')->get();
            return response()->json($client);
        
    }

    public function getclientSSC(){
        
            $client = client::orderBy('id_client', 'desc')->get();
            return response()->json($client);
          
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
        $client = client::create([
            'nom_client' => $request->nom_client,
            'ref' => $request->ref,
            ]);
        if($client){
            return response()->json(["status" => 200]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = client::where('id_client',$id)->get();
        return response()->json($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\client  $client
     * @return \Illuminate\Http\Response
     */
    /*public function edit(client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = client::where('id_client', $id)->firstOrFail();
        $client ->nom_client = $request->nom_client;
        $client ->ref = $request->ref;
        $client->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = client::where('id_client','=',$id);
        $client->delete();
        return response()->json($client);
    }
}
