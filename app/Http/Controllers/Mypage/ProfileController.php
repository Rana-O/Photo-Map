<?php

namespace App\Http\Controllers\Mypage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;



class ProfileController extends Controller
{
    // 機能追加
    public function myprofile() {
        return view('mypage.myprofile');
    }

    public function edit(Request $request) {
        return view('mypage.edit');
    }

    public function update(Request $request, User $user) {
        $profile = Auth::getUser();
        //$formを変える
        $form = $request->all();
        unset($form['_token']);
        $profile->fill($form);
         Log::debug('$profile');
        // Log::debug($request->id);

        if (isset($request['user_image'])) {
            $path = $request->file('user_image')->store('public/user_image');
            $profile->user_image = basename($path);
            Log::debug($path);
        } elseif (isset($request->remove)) {
            $profile->user_image = null;
        
        }
        
        $profile->save();

        Log::debug($form);
        return view('mypage.myprofile');
   }
}