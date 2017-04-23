<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

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
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		//check if there is logged in user
		$loginusercount = DB::table('users')
    			->where('login', 1)
    			->count();

		return view('welcome')->with(['loggedin'=>$loginusercount]);
	}

	public function signout()
	{
		//update login status
		DB::table('users')
    			->where('login', 1)
    			->update(['login' => 0]);

    	//check if there is logged in user
		$loginusercount = DB::table('users')
    			->where('login', 1)
    			->count();

		return view('welcome')->with(['loggedin'=>$loginusercount]);
	}


}
