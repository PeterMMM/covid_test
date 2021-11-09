@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body" style="text-align: center;">
                    <a href="{{ url('auth/google') }}" class=" ml-auto mr-auto mt-4 mb-2 btn btn-lg btn-danger">
                        Login with Gmail
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
