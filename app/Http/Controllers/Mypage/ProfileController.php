<?php

namespace App\Http\Controllers\Mypage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    // 機能追加
    public function myprofile() {
        return view('mypage.myprofile');
    }

    // public function showProfile() {
        // $auth = Auth::users();
        // return view('user.myprofile', ['auth' => $auth]);
        //$user = Auth::user();
        //$id = Auth::id();
    //}

}
