<?php

namespace App\Http\Controllers;
use DateTime;
use Carbon\Carbon;
use App\action;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
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

        $action = action::create([
            'id_planaction' => $request->u_id,
            'zone' => $request->zone,
            'origine' => $request->origine,
            'action' => $request->action,            

            ]);   
         }

    /**
     * Display the specified resource.
     *
     * @param  \App\action  $action
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $action = action::where('id_planaction','=',$id)->get();
        return response()->json($action);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\action  $action
     * @return \Illuminate\Http\Response
     */
    public function edit(action $action)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\action  $action
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, action $action)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\action  $action
     * @return \Illuminate\Http\Response
     */
    public function destroy(action $action)
    {
        //
    }
}
