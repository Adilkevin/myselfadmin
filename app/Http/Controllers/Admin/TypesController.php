<?php
/**
 * User: admin
 * Date: 2018/9/10
 * Time: 11:42
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Common\AdminController;
use App\Models\Types;
use Illuminate\Http\Request;

class TypesController extends AdminController
{

    public function showTypeList(Request $request)
    {
        $data = array();
        $user = $request->user();

        $data = array(
            'admin_name' => $user->name
        );

        return view('admin.index.types', $data);
    }

    public function typeList(Request $request)
    {
        $data = array();
        $user = $request->user();
        $type_arr = Types::where('user_id', $user->id)
                ->orWhere('user_id', 0)
                ->get();

        $page = 1;
        $total = 0;
        $data = array();

        $cp = $request->get('cp');
        $ps = $request->get('ps');

        $page = ceil($type_arr->count() / $ps);
        $total = $type_arr->count();

        $current_page_index = $cp / $ps;
        $chunks = $type_arr->chunk($ps);
        $chunk = $chunks[$current_page_index];

        foreach ($chunk as $type) { // 循环获得教案已经发布的班级信息
            $data[] = $type;
        }

        return response()->json(['page' => $page, 'rows' => $data, 'total' => $total]);

    }

    public function showTypeAdd(Request $request)
    {
        $data = array();
        $id = $request->input('mode');
        $type = $request->input('type');
        $types_mod = Types::where('id', $id);

        if ($types_mod->exists()) {
            $types = $types_mod->first();
            $data = array(
                'id'     => $types->id,
                'name'   => $types->name,
                'remark' => $types->remark
            );
        }
        $data['type'] = $type;

        return view('admin.type.types_add', $data);
    }


    public function typeEdit(Request $request)
    {
        $user = $request->user();
        $data = $request->all();

        $name = $request->input('name');
        $remark = $request->input('remark');
        $mode = $request->input('mode');

        if ($mode) { //表示为修改
            $types = Types::find($mode);
            $types->name = $name;
            $types->remark = $remark;
            $types->save();
            $data['way'] = '修改';
        } else {
            $is_exist = Types::where('name', $name);
            if ($is_exist->exists()) {
                return failed('该类型已存在');
            }

            $types = new Types();
            $types->name = $name;
            $types->remark = $remark;
            $types->user_id = $user->id;

            $types->save();
            $data['way'] = '保存';
        }

        return succeed('成功', $data);
    }

    public function typeDelete(Request $request)
    {
        $id = $request->input('id');
        $user = $request->user();

        $result = Types::where('id', $id)
                ->where('user_id', $user->id)
                ->delete();
        if ($result == 1) {
            return succeed('删除成功');
        }

        return failed('删除失败');
    }

    public function typeLIstAll(Request $request)
    {
        $user = $request->user();
        $data = array();
        $type_arr = Types::where('user_id', $user->id)
                ->orWhere('user_id', 0)
                ->get();

        foreach ($type_arr ?: array() as $key => $type) {
            $data[$key]['id'] = $type->id;
            $data[$key]['text'] = $type->name;
        }


        return $data;
    }

}