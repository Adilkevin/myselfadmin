<?php
/**
 * User: admin
 * Date: 2018/9/6
 * Time: 16:53
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Common\AdminController;
use App\Models\Category;
use App\Models\Role;
use App\Models\Types;
use Illuminate\Http\Request;


class CategoryController extends AdminController
{

    public function showCateList(Request $request)
    {
        $data = array();
        $user = $request->user();

        $data = array(
            'admin_name' => $user->name
        );


        return view('admin.index.cate', $data);
    }

    public function showCateAdd(Request $request)
    {
        $user = $request->user();
        $data = array();
        $mode = $request->input('mode');
        if ($mode)
        {
            $cate_mod = Category::where('id', $mode);
            if ($cate_mod)
            {
                $cate = $cate_mod->first();
                $data = array(
                    'name' => $cate->name,
                    'sort' => $cate->sort,
                    'parent_id' => $cate->parent_id,
                    'type_id'   => $cate->type_id,
                    'id'   => $cate->id,
                );
            }
        }

        return view('admin.cate.cate_add', $data);
    }


    public function cateList(Request $request)
    {

        $data = array();
        $user = $request->user();
        $cate_arr = Category::where('user_id', $user->id)
                ->where('is_delete', 0)
                ->where('parent_id', 0)
                ->orWhere('user_id', 0)
                ->orderBy('sort', 'DESC')
                ->get();


        foreach ($cate_arr as $cate)
        {
            $cate['type_name'] = $cate->Types->name;
        }


        $page = 1;
        $total = 0;
        $data = array();

        $cp = $request->get('cp');
        $ps = $request->get('ps');

        $page = ceil($cate_arr->count() / $ps);
        $total = $cate_arr->count();
        if ($total)
        {
            $current_page_index = $cp / $ps;
            $chunks = $cate_arr->chunk($ps);
            $chunk = $chunks[$current_page_index];

            foreach ($chunk as $type) {
                $data[] = $type;
            }
        }

        return response()->json(['page' => $page, 'rows' => $data, 'total' => $total]);
    }

    public function queryFirstLevelNav(Request $request)
    {
        $data = array();
        $user = $request->user();

        $first_nav_arr = Category::where('user_id', $user->id)
                ->where('parent_id', 0)
                ->where('is_delete', 0);
        if ($first_nav_arr->exists())
        {
            $first_nav = $first_nav_arr->get();

            foreach ($first_nav as $key => $nav) {
                $data[$key]['id'] = $nav->id;
                $data[$key]['text'] = $nav->name;
            }
        }

        return $data;
    }

    public function saveNav(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:10',
            'sort' => 'required',
            'types' => 'required',
            'parents' => 'required'
        ]);

        $user = $request->user();
        $data = array();

        $name      = $request->input('name');
        $nav_types = $request->input('types');
        $sort      = $request->input('sort');
        $parent_id = $request->input('parents');
        $id        = $request->input('id');

        if ($id)
        {
            $data['way'] = '修改';
        }
        else
        {
            $data['way'] = '添加';
        }

        $nav = Category::where('user_id', $user->id)
                ->where('name', $name)
                ->where('type_id', $nav_types)
                ->where('parent_id', $parent_id);
        if ($nav->exists())
        {
            return failed('失败', $data);
        }

        if ($id) //存在 即为修改
        {
            $cate = Category::find($id);
            $cate->sort      = $sort;
            $cate->parent_id = $parent_id;
            $cate->type_id   = $nav_types;
            $cate->user_id   = $user->id;
            $cate->name      = $name;
            $cate->save();
            return succeed('成功', $data);
        }

        $cate = new Category();
        $cate->sort      = $sort;
        $cate->parent_id = $parent_id;
        $cate->type_id   = $nav_types;
        $cate->user_id   = $user->id;
        $cate->name      = $name;
        $cate->save();

        return succeed('成功', $data);
    }

    public function cateDelete(Request $request)
    {
        $user = $request->user();
        $id   = $request->input('id');

        $cate = Category::where('id', $id)->get();

        $result = Category::where('id', $id)
                    ->orWhere('parent_id', $id)
                    ->update(['is_delete' => self::DELETE_STATUS]);

        if ($result)
        {
            return succeed('删除成功');
        }
        else
        {
            return failed('删除失败');
        }

    }

    public function cateDetail(Request $request)
    {
        $data = array();
        $user = $request->user();
        $id = $request->input('mode');

        $cate = Category::where('id', $id)->first();

        $data = array(
            'name' => $cate->name,
            'type_name' => $cate->types->name,
            'id'   => $cate->id,
            'parent_id' => $cate->parent_id
        );

        if ($cate->parent_id != 0)
        {
            $data['parent_name'] = Category::where('id', $cate->parent_id)->first()->name;
        }
        
        return view('admin.cate.cate_detail', $data);
    }

}