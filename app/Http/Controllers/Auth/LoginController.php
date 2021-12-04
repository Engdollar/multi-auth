<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
   public function __construct(){
        $this->middleware(['guest']);
    }
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            if(auth()->user()->role == 1){
                return redirect()->route('admin');

            }elseif(auth()->user()->role == 2){
                return redirect()->route('user');
            }
        }
        else{
            return redirect()->route('login')->with('error','Email and password is not valid');
        }
    }
}
