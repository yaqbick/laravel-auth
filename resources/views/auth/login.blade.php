@extends('layouts.app')
@section('content')
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Login</h3>
               <form action="{{url('/auth/login')}}" method="POST" id="logForm">
             
                 {{ csrf_field() }}
                 @if(session('message'))
                <div class="alert alert-success" role="alert">{{session('message')}}</div>
                 @endif
                <div class="form-label-group">
                  <input type="email" name="login" id="inputEmail" class="form-control" placeholder="Email address" >
                  <label for="inputEmail"></label>
 
                  @if ($errors->has('login'))
                  <div class="alert alert-danger" role="alert">{{ $errors->first('login') }}</div>
                  @endif 
                  @if ($errors->has('authentication'))
                  <div class="alert alert-danger" role="alert">{{ $errors->first('authentication') }}</div>
                  @endif       
                </div> 
 
                <div class="form-label-group">
                  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
                  <label for="inputPassword"></label>
                   
                  @if ($errors->has('password'))
                  <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
                  @endif  
                </div>
                {!!$captcha!!}
                  <p><input type="text" name="captcha"></p>
                  @if ($errors->has('captcha'))
                  <div class="alert alert-danger" role="alert">{{ $errors->first('captcha') }}</div>
                  @endif    
 
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign In</button>
                <div class="text-center">If you have an account?
                  <a class="small" href="{{url('auth/register')}}">Sign Up</a></div>
                <div class="text-center">Forgot your password?
                  <a class="small" href="{{url('auth/getAddress')}}">reset password</a></div>
              </form>
            </div>
          </div>
        </div>     
@endsection