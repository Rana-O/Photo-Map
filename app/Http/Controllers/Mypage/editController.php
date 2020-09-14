<?php

namespace App\Http\Controllers\Mypage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class editController extends Controller
{
    public function store(Request $request) {
        Log::debug('hogehoge');
        $post = new \App\Post();

        // latLngとcaptionを取得する
        Log::debug('hoge');
        $form = $request->all();
        Log::debug($form);
        Log::debug($post);
        $post->fill($form);
        

        // ファイル名を取得、blobデータを保存する
        if (isset ($request['photo'])) {
            $path = $request->file('photo')->store('public/photo');
            Log::debug('---path---');
            Log::debug($path);
            // $post = new \App\Post();
            $post->photo = basename($path);
        } else {
            abort(400);
        }

        $post->save();
        return view('mypage');
    }
}
