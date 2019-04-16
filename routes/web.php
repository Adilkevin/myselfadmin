<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'Admin\IndexController@home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function ($route) {
    Route::get('login', 'UsersController@showLoginForm')->name('login');
//    Route::get('login', 'UsersController@showLoginForm')->name('admin/login');

    Route::post('login', 'UsersController@login');
    Route::get('logout', 'UsersController@logout')->name('logout');
    Route::any('myselfregister', 'RegisterController@register')->name('myselfregister');
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
});



Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => []], function ($route) {
//    $route->get('/', 'IndexController@home');

    $route->get('home', 'IndexController@home');

    $route->get('getadmins', 'UsersController@adminsList');

    //类型
    $route->get('types_list', 'TypesController@showTypeList')->name('types');
    $route->get('query_types_list', 'TypesController@typeList');
    $route->get('types_add', 'TypesController@showTypeAdd');
    $route->any('query_types_edit', 'TypesController@typeEdit');
    $route->post('types_delete', 'TypesController@typeDelete');
    $route->post('types_list_all', 'TypesController@typeLIstAll');

    //栏目
    $route->get('category', 'CategoryController@showCateList')->name('category');
    $route->get('query_cate_list', 'CategoryController@cateList');
    $route->get('cate_add', 'CategoryController@showCateAdd');
    $route->post('save_nav', 'CategoryController@saveNav');
    $route->post('level_nav', 'CategoryController@queryFirstLevelNav');
    $route->get('cate_detail', 'CategoryController@cateDetail');
    $route->post('nav_delete', 'CategoryController@cateDelete');
    $route->post('nav_list_all', 'CategoryController@typeLIstAll');

    //后台
    $route->get('admin', 'AdminUserController@showAdminList')->name('admins');
    $route->get('query_admin_list', 'AdminUserController@adminList');
    $route->get('admin_add', 'AdminUserController@showAdminAdd');
    $route->get('role', 'RoleController@showRoleList')->name('roles');
    $route->get('query_role_list', 'RoleController@roleList');


    //后台首页
    $route->get('index', 'IndexController@home');

    //角色列表
    $route->get('role-list', 'RoleController@showRoleList');





//    $route::group([], function ($rout) {
//        $rout->any('adminsForgetpwd', 'UsersController@adminsForgetpwd');
//    });
});


