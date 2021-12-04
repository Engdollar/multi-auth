<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.register');
    }


    public function store(Request $request ){

        $this->validate($request, [
            'FirstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirmpassword' => 'required|same:password',
        ]);

        $user = new User;

        $user->fName = $request['FirstName'];
        $user->lName = $request['lastName'];
        $user->email = $request['email'];
        $user->role = 2;
        $user->password = Hash::make($request['password']);
        if( $user->save()){
            Auth::attempt(['email' => $request['email'], 'password' => $request['password']]);
            if(auth()->user()->role == 1){
                return redirect()->route('admin')->with('success','Hi Admin Welcome to your Dashboard');

            }elseif(auth()->user()->role == 2){
                return redirect()->route('user')->with('success','Hi User Welcome to your Dashboard');
            }
        }else{
            return redirect()->route('register')->with('error','user is not registered');
        }



    }
}
