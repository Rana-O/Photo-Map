<?php

namespace App\Http\Controllers\Mypage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class editController extends Controller
{
    public function store(Request $request) {   
        $header = $request->header('Authorization');
        Log::debug('---$header---');    
        Log::debug($header);  

        $splited = explode(" ", $header);
        Log::debug('---$splited---');
        Log::debug($splited);

        $api_token = $splited[1];
        Log::debug('---$api_token---');
        Log::debug("'$api_token'");
        
        if ($splited[0] != "Bearer") {
            // 処理続行できない条件を満たしているので400にして終了。
            abort(400);
            return;
        }
        // Bearerでアクセスとーくんが送られてきている。
        // sessionのアクセストークンが同じものを探し出す
        $user = \App\User::where('api_token', $api_token)->first();
        Log::debug('$user');
        Log::debug($user);


        Log::debug("--request--");
        Log::debug("$request");

        Log::debug('hogehoge');
        $post = new \App\Post();

        // latLngとcaptionを取得する
        $form = $request->all();
        Log::debug('---form---');
        Log::debug($form);
        Log::debug($post);
        $post->fill($form);
        

        // ファイル名を取得、blobデータを保存する
        if (isset ($request['photo'])) {
            $path = $request->file('photo')->store('public/photo');
            Log::debug('---path---');
            Log::debug($path);
            Log::debug('---post---');
            Log::debug($post);
            // $post = new \App\Post();
            $post->photo = basename($path);
        } else {
            abort(400);
        }

        $user->posts()->save($post);
        Log::debug($post);
        return view('mypage');
    }

    public function jump() {
        // http://localhost:8080?apiKey=xxxxxx
        Log::debug('---LOG---');
        // dd(Auth::user());
        return redirect()->away('http://localhost:8080/edit?apiKey='.Auth::user()->api_token);
    }
}
