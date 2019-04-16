<?php
/**
 * User: admin
 * Date: 2018/9/13
 * Time: 9:46
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Common\AdminController;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;

class RoleController extends AdminController
{


    public function showRoleList(Request $request)
    {
        $role_list = Role::all();
        $data = [];
        data_set($data, 'breadcrumb', $this->breadcrumb);
        $data['data'] = $role_list;

        return view('admin.role.list', $data);
    }

    public function roleList(Request $request)
    {

    }

    public function createRole(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ], [
            'name.required' => '角色名称不能为空'
        ]);

        return 1111;
    }
}