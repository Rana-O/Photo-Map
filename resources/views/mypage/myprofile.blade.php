@extends('layouts.myprofile-layout')

@section('content')
    <div class="container">
        <div class="profile-detail">
            <h2>My Profile</h2>        
            <ul>
                <li>User Id: {{Auth::user()->id }}</li>
                <li>User Name: {{ Auth::user()->name }}</li>
                <li>Email: {{Auth::user()->email }}</li>
                <!-- <li>Password  {{Auth::user()->password }}</li> -->
                <li>User Image
                     @empty (Auth::user()->user_image)
                     
                     @else
                     <img class="user-image" src="{{asset('user_image/'. Auth::user()->user_image) }}">
                     @endempty
                    
                </li>
                <br>
                <div class="logout-btn">
                    <button class="btn btn-primary" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <!-- <button class="btn btn-primary edit-btn"  href="{{ url('mypage/myprofile/edit') }}">
                        {{ __('Edit Profile') }}
                    </button>
                    <form action="{{ url('mypage/myprofile/edit') }}" method="GET" style="display: none;">
                        @csrf
                    </form> -->
                    <a href="{{ url('mypage/myprofile/edit') }}">
                        <button type="button" class="btn btn-primary">Edit Profile</button>
                    </a>
                </div>
            </ul>
        </div>
    </div>
@endsection