<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant_Manager extends Model
{
	protected $table = 'tenant_manager';
    protected $fillable = ['tenantid','userid','roleid'];
}
