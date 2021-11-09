@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Contacts
                    @auth
                        <b style="float: right;">Welcome {{ Auth::user()->name }}!</b>
                    @else
                        Not login.
                    @endauth
                </div>
                <div class="card-body" >
                    @auth
                        @if(isset($contacts))
                        <ul class="list-group">
                            @foreach($contacts as $contact)
                            <li class="list-group-item">
                                {{$contact->name}}
                            </li>
                            @endforeach
                        </ul>
                        <br>
                        <span>{{ $contacts->links() }}</span>
                        @else
                            No contact.
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
