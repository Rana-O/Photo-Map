<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_image' =>['nullable']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    

    public function create(array $request)
    {

        //$image = $request['user_image'];
        //Log::debug('image:'.$image);  
        //$image_path = $image->store('public');
        //$user->image = $image_path;
        //$user->save();

        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        
    }

    protected function authenticated(Request $request, $user) {
        //api_tokenにランダムなストリングを入れる
        $user->update(['api_token' => str_random(60)]);
    }

    public function logout(Request $request) {
        //ログアウト時にapi_tokenをnullにする
        $user = $request->user();
        $user = update(['api_token' =>null]);
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');
    }


    
}
