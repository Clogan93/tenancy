<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        //get user info
        $loginuser = DB::table('users')
                ->where('login',1)
                ->get();
        if($loginuser[0]->admin == 1)
            return view('admin.index', compact('users','loginuser'))->with('page_title', "Admin Dashboard");
        else
            return view('admin.index', compact('users','loginuser'))->with(['page_title'=>'Tenancy Manager']);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create')->with('page_title', "Create New User");
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['username' => 'required|unique:users,username', 'fullname' => 'required', 'password' => 'required']);

        $user = new User;
        $user->username = $request->input("username");
        $user->fullname = $request->input("fullname");
        $user->password = $request->input("password");
        if($request->input("isadmin") == "on")
            $user->admin = 1;
        else
            $user->admin = 0;
        $user->deleted = 0;
        $user->save();

        return redirect()->route('admin.index')->with(['message' => 'New User ('.$user->username.') Created']);
    }

    /**
    * Display the specified user.
    *
    * @param  int  $id
    * @return Response
    */
    public function show($id)
    {
        //
    }

    /**
    * Show the form for editing the specified user.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.edit', compact('user'));
    }

    /**
    * Update the specified user in storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['username' => 'required|unique:users,username,'.$id, 'fullname' => 'required', 'password' => 'required']);
                
        $user = User::findOrFail($id);
        $user->username = $request->input("username");
        $user->fullname = $request->input("fullname");
        $user->password = $request->input("password");
        if($request->input("isadmin") == "on")
            $user->admin = 1;
        else
            $user->admin = 0;
        $user->deleted = 0;
        $user->save();

        return redirect()->route('admin.index')->with('message', 'User ('.$user->username.') updated');
    }

    /**
   * Remove the specified user from storage.
   *
   * @param  int  $id
   * @return Response
   */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->deleted = 1;
        $user->save();

        return redirect()->route('admin.index')->with('message', 'User ('.$user->username.') deleted');
    }
}
