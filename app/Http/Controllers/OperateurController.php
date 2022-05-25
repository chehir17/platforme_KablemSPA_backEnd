<?php

namespace App\Http\Controllers;

use App\operateur;
use App\User;


use Illuminate\Http\Request;

class OperateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $op = operateur::join('users', 'operateurs.id_user', '=', 'users.id_user')
        ->get();
        return response()->json($op);   
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\operateur  $operateur
     * @return \Illuminate\Http\Response
     */
    public function show(operateur $operateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\operateur  $operateur
     * @return \Illuminate\Http\Response
     */
    public function edit(operateur $operateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\operateur  $operateur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, operateur $operateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\operateur  $operateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(operateur $operateur)
    {
        //
    }
}
