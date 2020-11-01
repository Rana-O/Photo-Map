<?php

namespace App\Http\Controllers\Mypage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    //ログイン時にaccess_tokenを生成
    public function create() {
        if (ログインしたら) {
           $access_token = (string) Str::uuid();
           
        } else {

        }
    }

    //ログアウト時にaccess_tokenを削除
    public function drop() {
        if (ログアウトしたら) {
            $access_token 
        }
    }
}
