<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\last;
use App\Http\Resources\last as lastResource;
use DB;

class lastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // get articles 
         $articles = last::paginate(10);
         //return collection of articles as a resource
         return lastResource::collection($articles);
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
        
        $article = $request->isMethod('put') ? last::findOrFail 
        ($request->last_id) : new last;

       
 
        $article->id = $request->input('last_id');
        // $article = new last();
        // $last->id = $request->input('last_id');
        $article->name = $request->input('name');
        $article->department = $request->input('department');
    

       if($article->save()){

            
            return new lastResource($article);
        
       }

        // $ins = DB::table('lasts')->insert(

        //         [
        //             'name' => $request->name,
        //             'department' => $request->department
        //         ]
        // );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = last::findorFail($id);
        return new lastResource($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = last::findorFail($id);
        if($article->delete()){
            return new lastResource($article);
        }
    }
}
