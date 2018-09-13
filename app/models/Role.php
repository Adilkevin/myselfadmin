<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role as Adminrole;

class Role extends Adminrole
{
    //
    protected $table = "roles";

    protected $guard_name = 'admins';

}
