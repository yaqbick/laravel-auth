@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-9 col-lg-8 mx-auto">
      <h3 class="login-heading mb-4">Type your email</h3>
      @if ($errors->has('authentication'))
                  <div class="alert alert-danger" role="alert">{{ $errors->first('authentication') }}</div>
      @endif     
        <form action="{{url('auth/sendEmail')}}" method="POST" id="logForm">
        {{ csrf_field() }}
        <div class="form-label-group">
          <input type="email" name="emailToReset" id="inputEmail" class="form-control" placeholder="Email address" >
          <label for="inputEmail"></label>
        </div>
        <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">send</button>
        </form>
        </div>
        </div>
@endsection