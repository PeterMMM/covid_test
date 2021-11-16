<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
class AdminController extends Controller
{
    public function login(Request $request)
    {
      $validator = Validator::make($request->all(), [
         'email'=>'required',
         'password'=>'required'
      ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }else{
            if ($request->email == 'admin@testpj.com' && $request->password == 'adminAB!@Z') {
                session()->put('admin_login', true);
                return redirect('admin/dashboard');
            }else{
                return view('admin.login', ['error' => 'Fail to login!']);
            }
        }
    }

    public function logout()
    {
        session()->forget('admin_login');
        return view('admin.login');
    }
}
