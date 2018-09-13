<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Types extends Model
{
    //
    protected $table = "types";


    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
