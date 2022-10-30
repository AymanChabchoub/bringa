<?php

namespace App\Http\Controllers;
use App\Models\client;
use Illuminate\Http\Request;
use App\Models\article;
use App\Models\categorie;
use DB;

class clientcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
      


        $articles=DB::table('categories')->join('articles','categories.id','=','articles.categorie_id')->select('articles.*','categories.nom')->get();
        $categories=categorie::all();
        return view('client_template',compact('articles','categories'));
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
        $client=DB::table('users')->Join('role_user','users.id','=','role_user.user_id')->where('role_user.role_id','=',2)->select('id','email')->get();
       foreach($client as $request)
       {
        DB::insert('insert into clients(id,email) values(?,?)',([$request->id,$request->email]));
       }

       
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
    public function search(request $request)
    {
        $articles=article::orderBy('id','desc')->where('libelle','LIKE','%'.$request->article.'%');
        if($request->category!='ALL')$articles->where('category_id',$request->category);
        $articles=$articles->get();
        $categories=categorie::all();

       return view('client_template',compact('categories','articles'));
    }
}
