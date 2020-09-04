@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('Mypage\ProfileController@update') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>
                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" value="{{ Auth::user()->password}}">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" value="{{ Auth::user()->password}}">
                            </div>
                        </div> -->

                        <div class="form-group row">
                        <label for="user_image" class="col-md-4 col-form-label text-md-right">{{ __('Profile Image') }}</label>
                        <div class="col-md-6">
                            @empty (Auth::user()->user_image)
                            
                            @else
                            <img class="user-image" src="{{asset('user_image/'. Auth::user()->user_image) }}">
                            @endempty
                            <input type="checkbox" class="btn btn-primary" value="true">画像を削除
                            <input id="user_image" type="file" class="form-control-file" name="user_image" value="{{ Auth::user()->user_image }}">
                        </div>
                    </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">   
                                <input type="submit" class="btn btn-primary" value="{{ __('Update') }}">
                                <!--<form action="{{ action('Mypage\ProfileController@myprofile') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>-->

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
