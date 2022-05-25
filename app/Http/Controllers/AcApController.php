<?php

namespace App\Http\Controllers;

use App\ac_ap;
use Illuminate\Http\Request;

class AcApController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acap = ac_ap::get();
        return response()->json($acap);

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
        $ac_ap = ac_ap::create([

            'acap' => $request->ac_ap,
            'type' => $request->type,
            'id_rapportnc' => $request->u_id,
            
            ]);
            if($ac_ap){
                return response()->json(["status" => 200]);
            
            
            }
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\ac_ap  $ac_ap
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $acap = ac_ap::where('id_rapportnc','=',$id)->get();
        return response()->json($acap);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ac_ap  $ac_ap
     * @return \Illuminate\Http\Response
     */
    public function edit(ac_ap $ac_ap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ac_ap  $ac_ap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ac_ap $ac_ap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ac_ap  $ac_ap
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ac_ap = ac_ap::where('id_acap','=',$id);
        $ac_ap->delete();
        return response()->json($ac_ap);
    }
}
