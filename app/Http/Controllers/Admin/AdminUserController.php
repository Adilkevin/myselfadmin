<?php
/**
 * User: admin
 * Date: 2018/9/12
 * Time: 10:38
 */

namespace App\Http\Controllers\Admin;


use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminUserController
{

    public function showAdminList()
    {
        return view('admin.index.admin');
    }

    public function adminList(Request $request)
    {
        $data = array();
        $page = 1;
        $total = 0;
        $user = $request->user();

        if (!$user->hasRole('admin'))
        {
            return response()->json(['page' => $page, 'rows' => $data, 'total' => $total]);
        }
        $admin_arr = User::role('manager')->where('id', '!=', $user->id)->get();

        $data = array();

        $cp = $request->get('cp');
        $ps = $request->get('ps');

        $page = ceil($admin_arr->count() / $ps);
        $total = $admin_arr->count();
        if ($total)
        {
            $current_page_index = $cp / $ps;
            $chunks = $admin_arr->chunk($ps);
            $chunk = $chunks[$current_page_index];

            foreach ($chunk as $admin) {
                $data[] = $admin;
            }
        }

        return response()->json(['page' => $page, 'rows' => $data, 'total' => $total]);
    }

    public function showAdminAdd(Request $request)
    {
        $data = array();
        $role_mod = Role::where('name', '!=', 'admin');

        if ($role_mod->exists())
        {
            $role_arr = $role_mod->get();
            foreach ($role_arr as $key => $role)
            {
                $data['role'][$key]['id']   = $role->id;
                $data['role'][$key]['name'] = $role->name;
            }
        }

        return view('admin.admin.admin_add', $data);
    }

}