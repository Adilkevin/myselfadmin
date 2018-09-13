<?php
/**
 * User: admin
 * Date: 2018/9/10
 * Time: 10:26
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'left_nav';

    public function types()
    {
        return $this->hasOne('App\Models\Types', 'id', 'type_id');
    }
}