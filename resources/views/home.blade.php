@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Covid Test
                    @auth
                        <b style="float: right;">Welcome {{ Auth::user()->name }}!</b>
                    @else
                        Not login.
                    @endauth
                </div>
                <div class="card-body" >
                    @auth
                        <span>Form</span>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
