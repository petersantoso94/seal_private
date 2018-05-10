<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB;
use App\Quotation;
use Socialite;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->scopes(['user_link'])->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request)
    {
        //$user = Socialite::driver('facebook')->user();
        $providerUser = Socialite::driver('facebook')
                ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
                ->user();
        if($providerUser){
			$request->session()->put('fb_id',$providerUser->id);
			$request->session()->put('fb_name',$providerUser->name);
			$request->session()->put('fb_email',$providerUser->email);
            return redirect()->route('register');
        }else{
            return redirect()->route('register');
        }
//        return $user->token;
    }
}
