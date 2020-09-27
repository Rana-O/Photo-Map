<?php

namespace App\Http\Controllers\Mypage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class editController extends Controller
{
    public function store(Request $request) {   
        $header = $request->header('Authorization');
        Log::debug('---$header---');    
        Log::debug($header);  

        $splited = explode(" ", $header);
        Log::debug('---$splited---');
        Log::debug($splited);

        $access_token = $splited[1];
        Log::debug('---$access_token---');
        Log::debug("'$access_token'");
        
        if ($splited[0] != "Bearer") {
            // 処理続行できない条件を満たしているので400にして終了。
            abort(400);
            return;
        }
        // Bearerでアクセスとーくんが送られてきている。
        // sessionのアクセストークンが同じものを探し出す
        $session = \App\Session::where('access_token', $access_token)->first();
        Log::debug('$session');
        Log::debug($session);
        $user = $session->user()->first();


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
}
