<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function postLogin(Request $req){
        $validation = $req->validate([
            "login" => 'required|min:5|max:32'
        ]);
      //dd($req->input("login"));
    }
}
