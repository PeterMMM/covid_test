<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use DB;
use App\User;
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

    public function userList()
    {
        $users = User::where('type',0)->get();
        return view('admin/users',['users'=>$users]);
    }


    /*
    * Booking Detail Page
    */

    public function bookingDetail($id)
    {

        if (!Session::get('admin_login')) {
            return view('admin.login', ['error' => 'Login to access this page!']);
        }

        $booking = DB::table('bookings')
        ->select('bookings.id AS booking_id', 'book_status.name AS booking_status', 'fields.*')
        ->leftJoin('book_status','bookings.status_id','=','book_status.id')
        ->leftJoin('fields','bookings.field_id','=','fields.id')
        ->where('bookings.id',$id)
        ->first();
        // dd($booking);
        return view('admin.booking.detail', ['booking' => $booking]);
    }
}
