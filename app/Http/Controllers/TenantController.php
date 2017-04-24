<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tenant;
use Illuminate\Support\Facades\DB;

class TenantController extends Controller
{
    /**
     * Display a listing of the tenants.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = DB::table('tenant')
                -> where('')
                -> get();

        return view('tenant.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new tenant.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tenant.create')->with('page_title', "Create New Tenant");
    }

    /**
     * Store a newly created tenant in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified tenant.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified tenant.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tenant = DB::table('tenant')
                -> get();

        return view('admin.edit', compact('user'));
    }

    /**
     * Update the specified tenant in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified tenant from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = DB::table('tenant')
                -> get();
        $user->deleted = 1;
        $user->save();

        return redirect()->route('admin.index')->with('message', 'User ('.$user->username.') deleted');
    }
}
