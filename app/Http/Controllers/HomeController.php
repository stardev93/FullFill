<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        // $woocommerce = new Client(
        //     'https://bulkeditor.nappies.co.nz/', 
        //     'ck_f8019647f78b1d092d2e4b1d9022f8c52c2b8eaa', 
        //     'cs_c245908ac474a7faca3979d5912ceef1c596dcbd', 
        //     [ 
        //         'wp_api' => true, 
        //         'version' => 'wc/v3/products',
        //       //  'query_string_auth' => true
        //     ]);

        $wooInfos = DB::select('SELECT * FROM wooapis WHERE user_id = ?', [auth()->user()->id]);
        

        $woocommerce = new Client(
            'https://bulkeditor.nappies.co.nz/', 
            'ck_f8019647f78b1d092d2e4b1d9022f8c52c2b8eaa', 
            'cs_c245908ac474a7faca3979d5912ceef1c596dcbd', 
            [ 
                'wp_api' => true, 
                'version' => 'wc/v3/orders',
              //  'query_string_auth' => true
            ]);

        $orderDatas  = $woocommerce->get('');

        //$orderDatas = json_encode($orderDatas);
      //  print_r($orderDatas);
        return view('home', compact('orderDatas', 'wooInfos'));
    }

    
}
