<?php

namespace App\Http\Controllers\Common;

use App\Http\IEnum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller implements IEnum
{
    public $breadcrumb = [
        '/admin/index' => '首页',
    ];

    public function __construct()
    {
        $current_action = getCurrentAction();
        $this->breadcrumb['#'] = trans('breadcrumb.' . data_get($current_action, 'controller'));
        $this->breadcrumb['current'] = trans('breadcrumb.' . $current_action['method']);


    }
}
