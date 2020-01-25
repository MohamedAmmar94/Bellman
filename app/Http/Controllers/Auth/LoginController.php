<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;

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

    
	use AuthenticatesUsers{
		logout as performLogout;
	}
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	
	public function showLoginForm(){
		 return view ("auth.login");
	 }
	public function login(Request $request){
		//dd($request);
		if(!empty($request)){
			
				
				if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
					$details = Auth::guard('web')->user();
					$user = $details;
					return redirect('/admin/home');
				} else {
					return Redirect::back()->withErrors(['Login Field', 'check your information and try again ']);
			
				}
		}
	}
	public function logout(Request $request)
	{
		//dd();
		$this->performLogout($request);
		return redirect("/login");
	}
}
