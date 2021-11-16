<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Field;
use App\Booking;
use App\DefaultUserHasBooking;
use DB;
use Session;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createBooking(Request $request)
    {
        // dd(request()->all());

        //insert into fields
        $field = new Field;
        if(isset($request->name)) {
            $field->name = $request->name;
        }
        if(isset($request->address)) {
            $field->address = $request->address;
        }
        if(isset($request->email)) {
            $field->email = $request->email;
        }
        if(isset($request->phone)) {
            $field->mobile_number = $request->phone;
        }
        if(isset($request->age)) {
            $field->age = $request->age;
        }
        if(isset($request->gender)) {
            $field->gender = $request->gender;
        }
        if(isset($request->q_location)) {
            $field->city = $request->q_location;
        }
        if(isset($request->select_test)) {
            $field->test_type = $request->select_test;
        }
        if(isset($request->q_doc)) {
            $field->document = $request->q_doc;
        }
        if(isset($request->q_drive)) {
            $field->test_location = $request->q_drive;
        }
        if(isset($request->antigen_test_location)) {
            $field->antigen_test_location = $request->antigen_test_location;
        }
        if(isset($request->anti_test_location)) {
            $field->antibody_test_location = $request->anti_test_location;
        }
        if(isset($request->person_no)) {
            $field->person_no = $request->person_no;
        }
        if(isset($request->pcr_location)) {
            $field->pcr_location = $request->pcr_location;
        }
        if(isset($request->cb_pcr_location)) {
            $field->cb_pcr_location = $request->cb_pcr_location;
        }
        if(isset($request->cb_antigen_location)) {
            $field->cb_antigen_location = $request->cb_antigen_location;
        }
        if(isset($request->cm_pcr_location)) {
            $field->cm_pcr_location = $request->cm_pcr_location;
        }
        if(isset($request->cm_antigen_location)) {
            $field->cm_antigen_location = $request->cm_antigen_location;
        }
        if(isset($request->pk_pcr_location)) {
            $field->pk_pcr_location = $request->pk_pcr_location;
        }
        if(isset($request->pk_pcr_no_cer_location)) {
            $field->pk_pcr_no_cer_location = $request->pk_pcr_no_cer_location;
        }
        if(isset($request->pk_antigen_location)) {
            $field->pk_antigen_location = $request->pk_antigen_location;
        }
        if(isset($request->drive_through_pcr_test)) {
            $field->drive_through_pcr_test = $request->drive_through_pcr_test;
        }
        if(isset($request->demand_location)) {
            $field->demand_location = $request->demand_location;
        }
        if(isset($request->car_detail)) {
            $field->car_detail = $request->car_detail;
        }
        if(isset($request->home_address)) {
            $field->home_address = $request->home_address;
        }
        if(isset($request->add_info) && isset($request->app_time)) {
            $field->app_date_time = $request->add_info.' '.$request->app_time;
        }
        if(isset($request->add_info)) {
            $field->add_info = $request->add_info;
        }
        $field->save();

        $field_id = $field->id;

        //insert into booking 
        $booking = new Booking;
        $booking->status_id = 1;
        $booking->field_id = $field_id;
        $booking->save();
        $booking_id = $booking->id;

        //insert into default_user_has_booking
        $bookinguser = new DefaultUserHasBooking;
        $bookinguser->user_id = $request->user_id;
        $bookinguser->booking_id = $booking_id;
        $bookinguser->save();

        return response()->json([
            'status' => 'testing',
            'message' => 'good',
            'data' => request()->all()
        ], 200);
    }

    public function bookingList()
    {
        if (!Session::get('admin_login')) {
            return view('admin.login', ['error' => 'Login to access this page!']);
        }

        $bookings= DB::table('bookings')
        ->select('bookings.id AS booking_id', 'book_status.name AS booking_status', 'fields.name AS booking_user_name','fields.email AS booking_user_email')
        ->leftJoin('book_status','bookings.status_id','=','book_status.id')
        ->leftJoin('fields','bookings.field_id','=','fields.id')
        ->get();
        // dd($bookings);
        return view('admin.dashboard', ['bookings' => $bookings]);
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
}
