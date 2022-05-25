<?php

namespace App\Http\Controllers;

use App\article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = article::orderBy('id_article', 'desc')->get();
        return response()->json($article);   
     }

     public function getforadd()
     {
         $article = article::orderBy('id_article', 'desc')->get();
         return response()->json($article);   
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
        $article = article::create([
            'code_artc' => $request->code_artc,
            'nom_artc' => $request->nom_artc,
            'type' => $request->type
            ]);
        if($article){
            return response()->json(["status" => 200]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = article::where('articles.id_article','=',$id)->get();
        return response()->json($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
  /*  public function edit(article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = article::where('id_article', $id)->firstOrFail();
        $article ->code_artc = $request->code_artc;
        $article ->nom_artc = $request->nom_artc;
        $article ->type = $request->type;
        $article->save();
        return response()->json($article); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = article::where('id_article','=',$id);
        $article->delete();
        return response()->json($article);
    }
}
