<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\article;
class cartcontroller extends Controller
{   
    public function add(request $request)
    {
        $quantite=$request->quantite;
        $id=$request->id;
        

        $articles=article::where('id',$id)->first();
        $data['id'] =$articles->id;
        $data['name'] = $articles->libelle;
        $data['price'] = $articles->prix;
        $data['quantity'] = $quantite;
        $data['attributes'] =[ $articles->image];
        Cart::add($data);
        cardarray();
        return redirect()->back();
        

    }
    public function delete($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }
}
