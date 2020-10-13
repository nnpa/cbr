<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestController extends Controller
{
    //json
    public function show(){
        $currencyID    = request('currencyID');

        $from    = request('from');
        $to      = request('to');
        
        $date_eu   = str_replace("/", ".", $to);
        $time_to   = strtotime($date_eu);
        
        
        $date_eu    = str_replace("/", ".", $from);
        $time_from    = strtotime($date_eu);
        
        $sql = "select * from currency where currencyID = '" . $currencyID . "' AND public_date BETWEEN ". $time_from ." AND  " . $time_to ; 
        $currency = DB::select($sql);
        
        //http://cbrlocal/rest?from=11/09/2020&to=10/10/2020&currencyID=R01035
        $json = json_encode($currency,JSON_UNESCAPED_UNICODE);
        echo $json;
        //var_dump($currency);exit;
    }
    
    public function index(){
        return view('welcome');
    }
    
    public function search(){
        $date      = request('date');
        $date_eu   = str_replace("/", ".", $date);
        $time      = strtotime($date_eu);

        $sql  = "select * from currency where public_date = '" . $time . "'"; 
        $data = DB::select($sql);
        
        //var_dump($data);
        return view('welcome',[
            "data" => $data
        ]);
    }
}
