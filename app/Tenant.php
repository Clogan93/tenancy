<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
	protected $table ='tenant';
    protected $fillable = ['tenantname', 'domaintype', 'domain', 'databasetype', 'version'];
}
