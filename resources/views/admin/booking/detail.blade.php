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
                                <div class="panel-heading">
                                    Detail information of submission.
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
                                              <tr class="odd gradeX">
                                                <td>Booking Id</td>
                                                <td>{{$booking->booking_id}}</td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Booking Status</td>
                                                <td>{{$booking->booking_status}}</td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Customer Name</td>
                                                <td>{{$booking->name}}</td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Customer's Address</td>
                                                <td>{{$booking->address}}</td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Customer's Email</td>
                                                <td>{{$booking->email}}</td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Customer's Phone</td>
                                                <td>{{$booking->mobile_number}}</td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Customer's Age</td>
                                                <td>{{$booking->age}}</td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Customer's Gender</td>
                                                <td>{{$booking->gender}}</td>
                                              </tr>
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
                                              <!-- Edit start here -->
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
                                              <tr class="odd gradeX">
                                                <td>Test Location</td>
                                                <td>
                                                    {{$booking->test_location}}
                                                    @if($booking->test_location == 'a')
                                                        Test at Clinic
                                                    @elseif($booking->test_location == 'b')
                                                        Test at Drive Through(Car)
                                                    @elseif($booking->test_location == 'c')
                                                        Test at Home, Hotel or Office
                                                    @endif
                                                </td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Antigen Test Location </td>
                                                <td>
                                                    {{$booking->antigen_test_location}}
                                                    @if($booking->antigen_test_location == 'a')
                                                        
                                                    @elseif($booking->antigen_test_location == 'b')
                                                        
                                                    @endif
                                                </td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Selected Test</td>
                                                <td>
                                                    {{$booking->antibody_test_location}}
                                                    @if($booking->antibody_test_location == 'a')
                                                        
                                                    @elseif($booking->antibody_test_location == 'b')
                                                        
                                                    @endif
                                                </td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Patient Numbers</td>
                                                <td>
                                                    {{$booking->person_no}}
                                                </td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Selected Test</td>
                                                <td>
                                                    {{$booking->pcr_location}}
                                                    @if($booking->pcr_location == 'a')
                                                        
                                                    @elseif($booking->pcr_location == 'b')
                                                        
                                                    @endif
                                                </td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Selected Test</td>
                                                <td>
                                                    {{$booking->cb_pcr_location}}
                                                    @if($booking->cb_pcr_location == 'a')
                                                        
                                                    @elseif($booking->cb_pcr_location == 'b')
                                                        
                                                    @endif
                                                </td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Selected Test</td>
                                                <td>
                                                    {{$booking->cb_antigen_location}}
                                                    @if($booking->cb_antigen_location == 'a')
                                                        
                                                    @elseif($booking->cb_antigen_location == 'b')
                                                        
                                                    @endif
                                                </td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Selected Test</td>
                                                <td>
                                                    {{$booking->cm_pcr_location}}
                                                    @if($booking->cm_pcr_location == 'a')
                                                        
                                                    @elseif($booking->cm_pcr_location == 'b')
                                                        
                                                    @endif
                                                </td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Selected Test</td>
                                                <td>
                                                    {{$booking->cm_antigen_location}}
                                                    @if($booking->cm_antigen_location == 'a')
                                                        
                                                    @elseif($booking->cm_antigen_location == 'b')
                                                        
                                                    @endif
                                                </td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Selected Test</td>
                                                <td>
                                                    {{$booking->pk_pcr_location}}
                                                    @if($booking->pk_pcr_location == 'a')
                                                        
                                                    @elseif($booking->pk_pcr_location == 'b')
                                                        
                                                    @endif
                                                </td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Selected Test</td>
                                                <td>
                                                    {{$booking->pk_pcr_no_cer_location}}
                                                    @if($booking->pk_pcr_no_cer_location == 'a')
                                                        
                                                    @elseif($booking->pk_pcr_no_cer_location == 'b')
                                                        
                                                    @endif
                                                </td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Selected Test</td>
                                                <td>
                                                    {{$booking->pk_antigen_location}}
                                                    @if($booking->pk_antigen_location == 'a')
                                                        
                                                    @elseif($booking->pk_antigen_location == 'b')
                                                        
                                                    @endif
                                                </td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Selected Test</td>
                                                <td>
                                                    {{$booking->drive_through_pcr_test}}
                                                    @if($booking->drive_through_pcr_test == 'a')
                                                        
                                                    @elseif($booking->drive_through_pcr_test == 'b')
                                                        
                                                    @endif
                                                </td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Selected Test</td>
                                                <td>
                                                    {{$booking->demand_location}}
                                                    @if($booking->demand_location == 'a')
                                                        
                                                    @elseif($booking->demand_location == 'b')
                                                        
                                                    @endif
                                                </td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Cart Detail</td>
                                                <td>
                                                    {{$booking->car_detail}}
                                                </td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Cart Detail</td>
                                                <td>
                                                    {{$booking->home_address}}
                                                </td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Cart Detail</td>
                                                <td>
                                                    {{$booking->app_date_time}}
                                                </td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Addtional Information</td>
                                                <td>
                                                    {{$booking->add_info}}
                                                </td>
                                              </tr>
                                              <tr class="odd gradeX">
                                                <td>Submitted Date</td>
                                                <td>
                                                    {{$booking->updated_at}}
                                                </td>
                                              </tr>
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
