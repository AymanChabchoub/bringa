<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\article;
use App\Models\categorie;
use App\Models\lignecommande;
use DB;

class articlecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=DB::table('categories')->Join("articles",'categories.id','=','articles.categorie_id')->select("articles.*","categories.nom")->get();
       
        return view('liste_article',compact('articles'));
        


    }
    
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(categorie $categories)
    {   $categories=categorie::all();
        return view('/create',compact('categories'));
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
            'libelle'=>'required',
            'prix'=>'required',
            'quantite'=>'required',
            'image'=>'required|image|mimes:jpg,jpeg,png,gif,svg',
            'categorie_id'=>'required'

            
        ]);
        $image=$request->file('image');
        $destinationPath='img/';
        $profileImage=date('YmdHis').".".$image->getClientOriginalExtension();
        $image->move($destinationPath,$profileImage);
        $validateData['image']=$profileImage;
        $etudiants=article::create($validateData);
        return redirect ('/articles');
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
        $article=article::find($id);
        return view('edit',['article'=>$article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {   
        $articles=article::all();
        $data=article::find($id);
        $data->libelle=$request->libelle;
        $data->prix=$request->prix;
        $data->quantite=$request->quantite;
        $data->image=$request->image;
        $data->update();
        $data->save();
        return redirect('/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $article=article::find($id);
        
        if($article!=null)
        {   echo('delete');
            $article->delete();
            return redirect('/articles');
        }
   
    }
   
    public function recherche(request $request)
    {
        $id=$request->id;
        $article=article::find($id);
        
        return view('result_recherche',compact('article'));


    }
    public function ViewByCategorie(request $request)
    {
        $produits=Produit::where('categorie_id',$request->id);
    }
    public function recherche2()
    {
        
        $articles=article::all();
        
       
        
    }
    public function enter_in_a_date()
    {
        return view ('articles_vendu_par_date');
    }
    public function article_vendu_par_date(request $request)
    {
        
        $articles=DB::table('ligne_commandes')->Join('articles','ligne_commandes.cod_art',"=","articles.id")->whereYear('ligne_commandes.created_at','=',"{$request->date}")->select("articles.*")->get();
        $articles=DB::table('categories')->Join("articles",'categories.id','=','articles.categorie_id')->select("articles.*","categories.nom")->get();
        return View('liste_article',compact('articles'));        
    }
    public function adr()
    {
        return view('sauvgareder_adresse_ip\index');
    }
}
