<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\User;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('changePassword');
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'current_password' => 'required',

            'new_password' => 'required',

            'new_confirm_password' => 'same:new_password',

        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        
        return view('/home');
    } 
}
