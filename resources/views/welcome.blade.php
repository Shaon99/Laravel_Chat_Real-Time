@extends('layouts.app')
@section('content')

<div id="login-container">
    <div id="left-column"></div>
    <div id="login-container">
      <div id="left-column"></div>
      <div id="branding">
        <img src="{{url('images/logo.png')}}" />
        <h1>Login - Chat Application</h1>
      </div>
      <div id="login-form">
        @if(Session::get('error'))
        <div class="wrong-credential">
            {{ Session::get('error') }}
        </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <input  class="input" type="text" name="email"  placeholder="enter mobile or email" />
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          <input class="input" type="password" name="password" placeholder="enter password" />
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          <input class="input" type="submit" value="Login" />
        </form>
      </div>
    </div>
@endsection
