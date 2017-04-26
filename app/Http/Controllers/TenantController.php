<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tenant;
use App\Tenant_Manager;
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
                -> join('tenant_manager', 'tenant.id', '=', 'tenant_manager.tenantid')
                -> join('users', 'tenant_manager.userid', '=', 'users.id')
                -> select('tenant.*', 'users.username')
                -> get();

        //get logged in user info
        $loginuser = DB::table('users')
                ->where('login',1)
                ->get();

        return view('tenant.index', compact('tenants','loginuser'))->with(['page_title'=>'Tenants']);
    }

    /**
     * Show the form for creating a new tenant.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get tenant managers
        $temanagers = DB::table('users')
                ->where('admin',0)
                ->get();

        //get logged in user info
        $loginuser = DB::table('users')
                ->where('login',1)
                ->get();
        return view('tenant.create', compact('temanagers','loginuser'))->with('page_title', "Create New Tenant");
    }

    /**
     * Store a newly created tenant in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['tenantname' => 'required|unique:tenant,tenantname', 'domain' => 'required|unique:tenant,domain', 'version' => 'required']);

        $tenant = new Tenant;
        $tenant->tenantname = $request->input("tenantname");
        $tenant->domaintype = $request->input("provisintype");
        $tenant->domain = $request->input("domain");
        $tenant->databasetype = $request->input("dbtype");
        $tenant->version = $request->input("version");
        $tenant->customized = 0;
        $tenant->save();

        $tenantmanager = new Tenant_Manager;
        $tenantmanager->tenantid = $tenant->id;
        $tenantmanager->userid = $request->input("defaulttenantmanager");
        $tenantmanager->roleid = 1;
        $tenantmanager->save();

        return redirect()->route('tenant.index')->with(['message' => 'New Tenant ('.$tenant->tenantname.') Created']);
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
        $tenant = Tenant::findOrFail($id);

        //get tenant managers
        $temanagers = DB::table('users')
                ->where('admin',0)
                ->get();

        //get logged in user info
        $loginuser = DB::table('users')
                ->where('login',1)
                ->get();
        return view('tenant.edit', compact('tenant','temanagers','loginuser'))->with(['page_title'=>'Edit tenant']);
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
        $this->validate($request, ['tenantname' => 'required|unique:tenant,tenantname,'.$id, 'domain' => 'required|unique:tenant,domain,'.$id, 'version' => 'required']);

        $tenant = Tenant::findOrFail($id);
        $tenant->tenantname = $request->input("tenantname");
        $tenant->domaintype = $request->input("provisintype");
        $tenant->domain = $request->input("domain");
        $tenant->databasetype = $request->input("dbtype");
        $tenant->version = $request->input("version");
        $tenant->customized = 0;
        $tenant->save();

        DB::table('tenant_manager')->where('tenantid',$id)->update(['userid'=>$request->input('defaulttenantmanager')]);
 
        return redirect()->route('tenant.index')->with('message', 'User ('.$tenant->tenantname.') updated');
    }

    /**
     * Remove the specified tenant from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tenant = Tenant::findOrFail($id);
        DB::table('tenant') -> where('id', $id) -> delete();
        DB::table('tenant_manager') -> where('tenantid', $id) -> delete();

        return redirect()->route('admin.index')->with('message', 'User ('.$tenant->tenantname.') deleted');
    }
}
