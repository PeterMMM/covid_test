@extends('layouts.login')

@section('content')
<div class="container">    
    <form style="max-width: 300px;align-content: center;" class="m-auto" method="POST" action="{{ route('admin.login') }}">
        @csrf
      <h3>Admin Login</h3>
      @if ($errors->any())
        @foreach ($errors->all() as $error)
           <br><br><span class="alert alert-danger">{{ $error }}</span><br>
        @endforeach
      @endif
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
      </div>
      <button type="submit" class="tn btn-lg btn-success btn-block">
        {{ __('Login') }}
    </button>
    </form>

</div>
@endsection

@push('scripts')
<script>
</script>
@endpush
