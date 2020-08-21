@extends('layouts.mypage-layout')

@section('content')
    <div class="container">
        <div class="profile-detail">
            <h2>My Profile</h2>        
            <ul>
                <li>User Name:&nbsp;&nbsp;&nbsp; {{ Auth::user()->name }}</li>
                <li>User Id:&nbsp;&nbsp;&nbsp; {{Auth::user()->id }}</li>
                <li>Email:&nbsp;&nbsp;&nbsp; {{Auth::user()->email }}</li>
                <li>Password &nbsp;&nbsp;&nbsp; {{Auth::user()->password }}</li>
                <li>User Image&nbsp;&nbsp;&nbsp; {{Auth::user()->user_image }}</li>
            </ul>
        </div>
    </div>
@endsection