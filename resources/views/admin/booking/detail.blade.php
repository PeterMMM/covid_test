@extends('layouts.admin')

@section('content')
        <div id="wrapper">

   
            <div id="page-wrapper">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Detail Page</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="height: 50px;">
                                    Detail
                                    <span style="float:right">
                                        @if($booking->booking_status != 'Pending')<a href="{{url('booking/status/update/'.$booking->booking_id.'/1/m')}}" class="btn btn-info" style="width:100px">Pending</a>
                                        @endif
                                        @if($booking->booking_status != 'Reject')
                                        <a href="{{url('booking/status/update/'.$booking->booking_id.'/2/m')}}" class="btn btn-danger" style="width:100px">Reject</a>
                                        @endif
                                        @if($booking->booking_status != 'Confirm')
                                        <a href="{{url('booking/status/update/'.$booking->booking_id.'/3/m')}}" class="btn btn-success" style="width:100px">Confirm</a>
                                        @endif
                                    </span>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Label</th>
                                                    <th>Information</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @if(!empty($booking->booking_id))
                                              <tr class="odd gradeX">
                                                <td>Booking Id</td>
                                                <td>{{$booking->booking_id}}</td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->booking_status))
                                              <tr class="odd gradeX">
                                                <td>Booking Status</td>
                                                <td>{{$booking->booking_status}}</td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->name))
                                              <tr class="odd gradeX">
                                                <td>Customer Name</td>
                                                <td>{{$booking->name}}</td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->address))
                                              <tr class="odd gradeX">
                                                <td>Customer's Address</td>
                                                <td>{{$booking->address}}</td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->email))
                                              <tr class="odd gradeX">
                                                <td>Customer's Email</td>
                                                <td>{{$booking->email}}</td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->mobile_number))
                                              <tr class="odd gradeX">
                                                <td>Customer's Phone</td>
                                                <td>{{$booking->mobile_number}}</td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->age))
                                              <tr class="odd gradeX">
                                                <td>Customer's Age</td>
                                                <td>{{$booking->age}}</td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->gender))
                                              <tr class="odd gradeX">
                                                <td>Customer's Gender</td>
                                                <td>{{$booking->gender}}
                                                    @if($booking->gender == 0)
                                                        Male
                                                    @elseif($booking->gender == 1)
                                                        Female
                                                    @else
                                                        Other
                                                    @endif
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->city))
                                              <tr class="odd gradeX">
                                                <td>Customer's City</td>
                                                <td>
                                                    @if($booking->city == 'bk')
                                                        Bangkok
                                                    @elseif($booking->city == 'pk')
                                                        Phuket
                                                    @elseif($booking->city == 'ks')
                                                        Koh Samui
                                                    @elseif($booking->city == 'cm')
                                                        Chiang Mai
                                                    @elseif($booking->city == 'cb')
                                                        Chonburi
                                                    @endif
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->test_type))
                                              <tr class="odd gradeX">
                                                <td>Selected Test</td>
                                                <td>
                                                    @if($booking->test_type == 'st1')
                                                        RT-PCR(PCR)
                                                    @elseif($booking->test_type == 'st2')
                                                        Antigen
                                                    @elseif($booking->test_type == 'st3')
                                                        Antibody
                                                    @elseif($booking->test_type == 'st4')
                                                        RT-PCR(PCR) with Medical Certificate + Fit to Fly
                                                    @endif
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->document))
                                              <tr class="odd gradeX">
                                                <td>Selected Test</td>
                                                <td>
                                                    {{$booking->document}}
                                                    @if($booking->document == 'a')
                                                        Medical Certificate/Fit to Fly
                                                    @elseif($booking->document == 'b')
                                                        Lab Report Only
                                                    @endif
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->q_drive))
                                              <tr class="odd gradeX">
                                                <td>Test at</td>
                                                <td>
                                                    {{$booking->q_drive}}
                                                    @if($booking->q_drive == 'a')
                                                        Test at Clinic
                                                    @elseif($booking->q_drive == 'b')
                                                        Test at Drive Through(Car)
                                                    @elseif($booking->q_drive == 'c')
                                                        Test at Home, Hotel or Office
                                                    @endif
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->test_location))
                                              <tr class="odd gradeX">
                                                <td>Test Location</td>
                                                <td>
                                                    {{$booking->test_location}}
                                                    @if($booking->test_location == 1)
                                                        Latphrao 130, Bangkapi Center...
                                                    @endif
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->antigen_test_location))
                                              <tr class="odd gradeX">
                                                <td>Antigen Test Location </td>
                                                <td>
                                                    {{$booking->antigen_test_location}}
                                                    @if($booking->antigen_test_location == 1)
                                                        Latphrao 130, bakgkapai ....................
                                                    @elseif($booking->antigen_test_location == 2)
                                                        Sukhumvit 48,................................
                                                    @elseif($booking->antigen_test_location == 3)
                                                        Soi Chat San,................................
                                                    @elseif($booking->antigen_test_location == 4)
                                                        (PRE-PAY) Sukhumvit 49......................
                                                    @elseif($booking->antigen_test_location == 5)
                                                        (PRE-PAY) Sukhumvit 49(Without Certificate..
                                                    @elseif($booking->antigen_test_location == 6)
                                                        (PRE-PAY) Sukhumvit 1 Road..
                                                    @endif
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->antibody_test_location))
                                              <tr class="odd gradeX">
                                                <td>Antibody Test Location</td>
                                                <td>
                                                    {{$booking->antibody_test_location}}
                                                    @if($booking->antibody_test_location == 1)
                                                        Lahrao 130.........
                                                    @elseif($booking->antibody_test_location == 2)
                                                        Soi Chat Sn, Huai.........
                                                    @elseif($booking->antibody_test_location == 3)
                                                        Sukhumvi 48,............1200THB.
                                                    @elseif($booking->antibody_test_location == 4)
                                                        Sukhumvi 48,............24000THB
                                                    @elseif($booking->antibody_test_location == 5)
                                                        The Racquet Club,.......1300 THB
                                                    @elseif($booking->antibody_test_location == 6)
                                                        The Racquet Club,.......2300 THB
                                                    @endif
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->person_no))
                                              <tr class="odd gradeX">
                                                <td>Patient Numbers</td>
                                                <td>
                                                    {{$booking->person_no}}
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->pcr_location))
                                              <tr class="odd gradeX">
                                                <td>PCR Test Location</td>
                                                <td>
                                                    {{$booking->pcr_location}}
                                                    @if($booking->pcr_location == 1)
                                                        Latphrao 130, Bangkapi Center,......
                                                    @elseif($booking->pcr_location == 2)
                                                        Sukhumvit 48,.........
                                                    @elseif($booking->pcr_location == 3)
                                                        (PRE-PAY) 3HOURS EXPRESS PCR RESULT WITH .CERT.
                                                    @elseif($booking->pcr_location == 4)
                                                        (PRE-PAY)Sukhumvit 49 Center.......
                                                    @elseif($booking->pcr_location == 5)
                                                        (PRE-PAY)Phuthamonthon Saii  1Road............
                                                    @elseif($booking->pcr_location == 6)
                                                        (PRE-PAY)6HOURS RESULT at Phutthamonth Sa
                                                    @elseif($booking->pcr_location == 7)
                                                        (PRE-PAY)Certi with QR, Sukhumvit 49      ........
                                                    @elseif($booking->pcr_location == 8)
                                                        Soi Chat San,....
                                                    @endif
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->cb_pcr_location))
                                              <tr class="odd gradeX">
                                                <td>Chonburi PCR Test Location</td>
                                                <td>
                                                    {{$booking->cb_pcr_location}}
                                                    @if($booking->cb_pcr_location == 1)
                                                        Soi Huayakapi 3, Sukhu....
                                                    @endif
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->cb_antigen_location))
                                              <tr class="odd gradeX">
                                                <td>Chonburi Antigen Test Location</td>
                                                <td>
                                                    {{$booking->cb_antigen_location}}
                                                    @if($booking->cb_antigen_location == 1)
                                                        Soi Huaykapi 3, Sukhumvit Road.....
                                                    @endif
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->cm_pcr_location))
                                              <tr class="odd gradeX">
                                                <td>Chiang Mai PCR Test Location</td>
                                                <td>
                                                    {{$booking->cm_pcr_location}}
                                                    @if($booking->cm_pcr_location == 1)
                                                        Kotchasam Road, Tambon Chang......
                                                    @endif
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->cm_antigen_location))
                                              <tr class="odd gradeX">
                                                <td>Chiang Mai Antigen Test Location</td>
                                                <td>
                                                    {{$booking->cm_antigen_location}}
                                                    @if($booking->cm_antigen_location == 'a')
                                                        
                                                    @elseif($booking->cm_antigen_location == 'b')
                                                        
                                                    @endif
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->pk_pcr_location))
                                              <tr class="odd gradeX">
                                                <td>Phuket PCR Test with Certificate Location</td>
                                                <td>
                                                    {{$booking->pk_pcr_location}}
                                                    @if($booking->pk_pcr_location == 1)
                                                        Chaofah East Rd, Vic.......
                                                    @elseif($booking->pk_pcr_location == 2)
                                                        Test at Phuket Airport.......
                                                    @endif
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->pk_pcr_no_cer_location))
                                              <tr class="odd gradeX">
                                                <td>Phuket PCR Test without Certificate Location</td>
                                                <td>
                                                    {{$booking->pk_pcr_no_cer_location}}
                                                    @if($booking->pk_pcr_no_cer_location == 1)
                                                        Chaofah East Rd.....
                                                    @elseif($booking->pk_pcr_no_cer_location == 2)
                                                        Test at Phuket .......
                                                    @endif
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->pk_antigen_location))
                                              <tr class="odd gradeX">
                                                <td>Phuket Antigen Test Location</td>
                                                <td>
                                                    {{$booking->pk_antigen_location}}
                                                    @if($booking->pk_antigen_location == 1)
                                                        Latphrao 130, bakgkapai .....
                                                    @elseif($booking->pk_antigen_location == 2)
                                                        Sukhumvit 48,......
                                                    @elseif($booking->pk_antigen_location == 3)
                                                        Soi Chat San, ..............
                                                    @elseif($booking->pk_antigen_location == 4)
                                                        (PRE-PAY) Sukhumvit 49........
                                                    @elseif($booking->pk_antigen_location == 5)
                                                        (PRE-PAY) Sukhumvit 49(Without Certificate...
                                                    @elseif($booking->pk_antigen_location == 6)
                                                        (PRE-PAY) Sukhumvit 1 Road,......
                                                    @endif
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->drive_through_pcr_test))
                                              <tr class="odd gradeX">
                                                <td>Drive-through PCR Test Location</td>
                                                <td>
                                                    {{$booking->drive_through_pcr_test}}
                                                    @if($booking->drive_through_pcr_test == 1)
                                                        Latphrao 130, Bangkapi Center....
                                                    @elseif($booking->drive_through_pcr_test == 2)
                                                        (WITH JAPANESE FORM) Latphrao 130...........
                                                    @endif
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->demand_location))
                                              <tr class="odd gradeX">
                                                <td>On-Demand Location PCR Test with Certificate Details and Rate (Pre-payment Needed)</td>
                                                <td>
                                                    {{$booking->demand_location}}
                                                    @if($booking->demand_location == 1)
                                                        Within Bangkok and Surrounding Aras - 5.....
                                                    @elseif($booking->demand_location == 2)
                                                        Within Nonthaburi, Pathumthani.......
                                                    @elseif($booking->demand_location == 3)
                                                        EXPRESS # HOURS RESULT ............
                                                    @endif
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->car_detail))
                                              <tr class="odd gradeX">
                                                <td>Cart Detail</td>
                                                <td>
                                                    {{$booking->car_detail}}
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->home_address))
                                              <tr class="odd gradeX">
                                                <td>Home, Hotel, Office Address</td>
                                                <td>
                                                    {{$booking->home_address}}
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->app_date_time))
                                              <tr class="odd gradeX">
                                                <td>Cart Detail</td>
                                                <td>
                                                    {{$booking->app_date_time}}
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->add_info))
                                              <tr class="odd gradeX">
                                                <td>Addtional Information</td>
                                                <td>
                                                    {{$booking->add_info}}
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->q_drive))
                                              <tr class="odd gradeX">
                                                <td>Addtional Information</td>
                                                <td>
                                                    {{$booking->q_drive}}
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->dob))
                                              <tr class="odd gradeX">
                                                <td>Addtional Information</td>
                                                <td>
                                                    {{$booking->dob}}
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->nationality))
                                              <tr class="odd gradeX">
                                                <td>Addtional Information</td>
                                                <td>
                                                    {{$booking->nationality}}
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->passport))
                                              <tr class="odd gradeX">
                                                <td>Passport Number</td>
                                                <td>
                                                    {{$booking->passport}}
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->hotel_name))
                                              <tr class="odd gradeX">
                                                <td>Hotel Name</td>
                                                <td>
                                                    {{$booking->hotel_name}}
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->arrival_flight_number))
                                              <tr class="odd gradeX">
                                                <td>Flight Arrival Number</td>
                                                <td>
                                                    {{$booking->arrival_flight_number}}
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->arrival_date_time))
                                              <tr class="odd gradeX">
                                                <td>Arrival Date</td>
                                                <td>
                                                    {{$booking->arrival_date_time}}
                                                </td>
                                              </tr>
                                              @endif
                                              @if(!empty($booking->updated_at))
                                              <tr class="odd gradeX">
                                                <td>Submitted Date</td>
                                                <td>
                                                    {{$booking->updated_at}}
                                                </td>
                                              </tr>
                                              @endif    
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                    <div class="well">
                                        <p>Data in this dashboard are the internal use of Covid Test booking system.</p>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
@endsection

@push('scripts')
<script>
</script>
@endpush
