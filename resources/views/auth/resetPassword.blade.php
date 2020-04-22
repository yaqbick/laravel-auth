@extends('layouts.app')
@section('content')
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Login</h3>
               <form action="{{url('/auth/reset-password')}}" method="POST" id="logForm">
             
                 {{ csrf_field() }}
                 <div class="form-label-group">
                  <input type="email" name="login" id="inputEmail" class="form-control" placeholder="Email address" value="{{$email}}">
                  <label for="inputEmail"></label>

                 <div class="form-label-group">
                  <input type="password" name="password" id="Password" class="form-control" placeholder="new password">
                  <label for="inputPassword"></label>
                  @if ($errors->has('password'))
                  <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
                  @endif  
 
                  @if ($errors->has('authentication'))
                  <div class="alert alert-danger" role="alert">{{ $errors->first('authentication') }}</div>
                  @endif       
                </div> 
 
                <div class="form-label-group">
                  <input type="password" name="repeatPassword" id="repeatPassword" class="form-control" placeholder="repeat password">
                  <label for="inputPassword"></label>
                  @if ($errors->has('repeatPassword'))
                  <div class="alert alert-danger" role="alert">{{ $errors->first('repeatPassword') }}</div>
                  @endif  
                </div>
                 {!!$captcha!!}
                  <p><input type="text" name="captcha"></p>
                  @if ($errors->has('captcha'))
                  <div class="alert alert-danger" role="alert">{{ $errors->first('captcha') }}</div>
                  @endif     
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign In</button>
              </form>
            </div>
          </div>
        </div>     
@endsection