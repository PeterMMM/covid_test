@extends('layouts.admin')

@section('content')
        <div id="wrapper">

   
            <div id="page-wrapper">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Bookings</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Breif data for booking list
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Booking id</th>
                                                    <th>Booking status</th>
                                                    <th>Booking User Name</th>
                                                    <th>Boooking User email</th>
                                                    <th>More</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             @foreach ($bookings as $book)
                                              <tr class="odd gradeX">
                                                <td>{{$book->booking_id}}</td>
                                                <td>{{$book->booking_status}}</td>
                                                <td>{{$book->booking_user_name}}</td>
                                                <td>{{$book->booking_user_email}}</td>
                                                <td><a href="{{route('admin.booking.detail',$book->booking_id)}}">Detail</a></td>
                                                <td>
                                                    <a href="{{url('booking/status/update/'.$book->booking_id.'/1')}}" class="btn btn-info">Pending</a>
                                                    <a href="{{url('booking/status/update/'.$book->booking_id.'/2')}}" class="btn btn-danger">Reject</a>
                                                    <a href="{{url('booking/status/update/'.$book->booking_id.'/3')}}" class="btn btn-success">Confirm</a>
                                                </td>
                                              </tr>
                                             @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                    <div class="well">
                                        <p>Data in this dashboard are the internal use of Covid Test booking system.</p>
                                       <!--  <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                        <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a> -->
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
function updateStatus(id, status){
    console.log('form'+id+' '+status);
};
</script>
@endpush
