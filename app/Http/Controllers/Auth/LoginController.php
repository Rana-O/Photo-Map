<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user) {
        Log::debug('HOGEHOGE');
        //api_tokenにランダムなストリングを入れる
        $user = User::find(Auth::id());
        $user->api_token = str_random(60);
        $user->save();
        // dd($user);
    }

    public function logout(Request $request) {
        //ログアウト時にapi_tokenをnullにする
        $user = $request->user();
        $user->update(['api_token' =>null]);
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');
    }



    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/mypage';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
