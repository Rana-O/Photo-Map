{{-- layouts/layout.blade.phpを読み込む --}}
@extends('layouts.layout')
@section('content')
<div class="top-contents">
    <div class="top-message-container">
        <font size="7">自分だけの</font>
        <font size="7">思い出を</font>
        <font size="7">地図に残そう</font>
    </div>
    <div class="login-container">
        <div class="login-box">
            <form method="POST" action="{{ route('login') }}">
            @csrf
                <p class="login-header"><big>{{ __('messages.Login') }}</big></p>
                <label for="email">
                    <p class="normal-text">{{ __('messages.E-mail Address') }}</p><input id="email" type="email" name="email" class="@error('email') is-invalid @enderror" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>
                <label class="password" for="password">
                    <p class="normal-text">{{ __('messages.Password') }}</p><input type="password" id="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> 
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>
                <label class="remember-me">
                    <p class="small-p"><input type="checkbox" id="remember" class="check-box" name="remember" {{ old('remember') ? 'checked' : '' }}>{{ __('messages.Remember Me') }}</p>
                </label>
                <div class="submit-btn-container">
                    <button type="submit" class="submit-btn frame-btn">
                        {{ __('messages.Login') }}
                    </button>
                </div>
                @if (Route::has('password.request'))
                    <p class="small-p">パスワードを忘れた方は<a class="link" href="{{ route('password.request') }}">コチラ</a></p>
                @endif
            </form>
        </div>
    </div>    
</div>
@endsection