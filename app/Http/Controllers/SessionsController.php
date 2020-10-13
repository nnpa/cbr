<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SessionsController extends Controller
{
    public function create(){
        return view('sessions.create');
    }
    
    public function destroy(){
        auth()->logout();
        
        return redirect()->home();
    }
    
    public function store(){
       // if(! auth()->attempt(request(['email','password']))){
            //return back()->withErrors([
         //       'message' => 'plese check your data'
          //  ]);
      //  }
        //найти юзер с таким именем и паролем
        // если нет создать ошибку
        //если есть авторизовать         auth()->login($user);
        // var_dump(request('email')); exit;
        $email    = request('email');
        $password = request('password');
        
       // $sql  = "select * from users where email = '" . $email . "' AND password = '" . $password . "'";
       // $user = DB::select($sql);
        
        $user = User::where('email', $email)->first();

         if(empty($user)){
             return back()->withErrors([
                'message' => 'plese check your data'
           ]);
         }
        
        if($user->password != $password){
            return back()->withErrors([
                'message' => 'plese check your data'
           ]);
        }
        
        auth()->login($user);

        return redirect()->home();
    }
}
