<?php
/**
 * User: admin
 * Date: 2018/9/13
 * Time: 9:46
 */

namespace App\Http\Controllers\Admin;


use App\Models\Role;
use App\User;
use Illuminate\Http\Request;

class RoleController
{
    public function showRoleList(Request $request)
    {
        $data = array();
        $user = $request->user();

        $data = array(
            'admin_name' => $user->name
        );

        return view('admin.index.role', $data);
    }

    public function roleList(Request $request)
    {
        $data = array();
        $page = 1;
        $total = 0;
        $user = $request->user();

        if (!$user->hasRole('admin')) {
            return response()->json(['page' => $page, 'rows' => $data, 'total' => $total]);
        }

        $role_arr_mod = Role::where('id', '>', 0);
        if ($role_arr_mod->exists())
        {
            $role_arr = $role_arr_mod->get();
            foreach ($role_arr as $item)
            {
                $item['admins'] = User::role($item->name)->get()->toArray();
            }
        }



        $data = array();

        $cp = $request->get('cp');
        $ps = $request->get('ps');

        $page = ceil($role_arr->count() / $ps);
        $total = $role_arr->count();
        if ($total)
        {
            $current_page_index = $cp / $ps;
            $chunks = $role_arr->chunk($ps);
            $chunk = $chunks[$current_page_index];

            foreach ($chunk as $role) {
                $data[] = $role;
            }
        }

        return response()->json(['page' => $page, 'rows' => $data, 'total' => $total]);
    }
}