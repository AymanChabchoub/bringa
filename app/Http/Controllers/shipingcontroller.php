<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shiping;
use App\Models\payment;
use App\Models\client;
use App\Models\ordre;
use Session;
use PDF;
use DB;
use Cart;
class shipingcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $client_id=client::get('id');
        Session::put('id',$client_id);
       

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
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['pays']=$request->pays;
        $data['villes']=$request->villes;
        $data['address']=$request->address;
        $data['zip']=$request->zip;
        $data['tel']=$request->tel;
        $shiping_id=shiping::insertGetId($data);
        Session::put('shiping_id',$shiping_id);
       
        return view ('payment');

    }
    public function payment()
    {
        return view('payment');
    }
    public function pdf()
    {   
        $pdf=PDF::loadView('payment')->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('payment.pdf');
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
    public function place_order(request $request)
    {  
        $payment_method=$request->payment;
        $pdata=array();
        $pdata['payment_method']=$payment_method;
        $pdata['status']='pending';
        $payment_id=payment::insertGetId($pdata);
        
        
       
        $client_id=DB::table('clients')->get('id')->first();
        $client_id=array($client_id);
        $odata=array();
        foreach ($client_id as $client_id)
        {
        $odata['codcl']=$client_id->id;
        }
        $odata['codsh']=Session::get('shiping_id');
        $odata['codpay']=$payment_id;
        $odata['total']=Cart::getTotal();
        $odata['status']='pending';
        $order_id=ordre::insertGetId($odata);
        
        $cartcollection=Cart::getContent();
        $odatad=array();
        foreach($cartcollection as $cart)
        {
            $odatad['codord']=$order_id;
            $odatad['codart']=$cart->id;
            $odatad['article_name']=$cart->name;
            $odatad['article_price']=$cart->price;
            $odatad['article_sales_quantity']=$cart->quantity;
        }
        DB::table('order_details')->insert($odatad);
        

        if($payment_method=='cash')
        {   

            Cart::clear();
            return View('exampleEasycheckout');
        }       

    }

    
}
