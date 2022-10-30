<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Http\Models\client;


class DashboardController extends Controller
{
    public function index()
   {$nom=DB::table('users')->Join('role_user','users.id','=','role_user.user_id')->where('role_user.role_id','=',1)->select('users.*')->get();
    $nom_c=DB::table('users')->Join('role_user','users.id','=','role_user.user_id')->where('role_user.role_id','=',3)->select('users.*')->get();
       
    if(Auth::user()->hasRole('user')){
            return view('userdash');
       }elseif(Auth::user()->hasRole('blogwriter')){
            return view('sd');
       }elseif(Auth::user()->hasRole('admin')){
        return view('layout',compact('nom','nom_c'));
   }
   }
   public function myprofile()
   {
    return view('myprofile');
   }
   public function profile_admin()
   {
       return view('profile_admin');
   }
   public function postcreate()
   {
    return view('postcreate');
   }
   
}
