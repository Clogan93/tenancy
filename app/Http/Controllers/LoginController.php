<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Display Login page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	//get remembered user info
    	$remembereduser = DB::table('users')
    			->where('remember_token',"1")
    			->get();
        return view('login', compact('remembereduser'));
    }

    /**
     * Submits Login.
     *
     * @return \Illuminate\Http\Response
     */
    public function signin(Request $request)
    {
    	$this->validate($request, ['username' => 'required', 'password' => 'required']);

    	$username = $request->input('username');
    	$password = $request->input('password');

    	//check if there is user with username
    	$usercount = DB::table('users')
    			->where('username', $username)
    			->count();

    	//check if username and password match
    	$usermatchcount = DB::table('users')
    			->where('username', $username)
    			->where('password', $password)
    			->count();

    	//get user info
    	$loginuser = DB::table('users')
    			->where('username',$username)
    			->where('password', $password)
    			->get();

    	//remember password
    	if($request->input('inputrememberme') == "on")
    		$remember = "1";
    	else
    		$remember = "0";

    	$users = DB::table('users')
    			->get();
    	if($usercount == 0)
	   		return redirect('login')->with(['userError' => 'There is no user with that username']);
	   	else if($usermatchcount == 0)
	   		return redirect('login')->with(['userError' => 'Username and password do not match']);
	   	else if($loginuser[0]->deleted == 1)
	   		return redirect('login')->with(['userError' => 'That user is deleted']);
	   	else if($loginuser[0]->admin == 1){
	   		DB::table("users")
	   			->where('remember_token', "1")
	   			->update(['remember_token' => "0"]);
	   		DB::table("users")
	   			->where('id', $loginuser[0]->id)
	   			->update(['remember_token' => $remember, 'login' => 1]);
	        return view('admin.index',compact('users','loginuser'))->with(['page_title'=>'Admin Dashboard']);
	   	}else{
	   		DB::table("users")
	   			->where('remember_token', "1")
	   			->update(['remember_token' => "0"]);
	   		DB::table("users")
	   			->where('id', $loginuser[0]->id)
	   			->update(['remember_token' => $remember, 'login' => 1]);
	        return view('admin.index',compact('users','loginuser'))->with(['page_title'=>'Tenancy Manager']);
	   	}
    }
}
