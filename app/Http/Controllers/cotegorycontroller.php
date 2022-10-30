<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorie;
use App\Models\article;
use DB;
class cotegorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=categorie::all();
        return view('liste_categorie',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/createc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'nom'=>'required',
            'is_online'=>'required',
            'image'=>'required|image|mimes:jpg,jpeg,png,gif,svg',

                        

            
        ]);
        $image=$request->file('image');
        $destinationPath='img/';
        $profileImage=date('YmdHis').".".$image->getClientOriginalExtension();
        $image->move($destinationPath,$profileImage);
        $validateData['image']=$profileImage;
        
        $etudiants=categorie::create($validateData);
        return redirect ('/categories');
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
        $categories=categorie::find($id);
        return view('edit_category',['categorie'=>$categorie]);
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
        $categories=categorie::all();
        $data=categorie::find($id);
        $data->nom=$request->nom;
        $data->is_online=$request->is_online;
        $data->image=$request->image;
        $data->update();
        $data->save();
        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories=categorie::find($id);
        
        if($categories!=null)
        {   echo('delete');
            $categories->delete();
            return redirect('/articles');
        }
    }
    public function recherche()
    {
        $data=DB::table('categories')->Join("articles",'categories.id','=','articles.id')->select("categories.nom")->get();
        compact($data);
    }
   
}
