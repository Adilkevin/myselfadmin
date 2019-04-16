<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Common\AdminController;
use App\Models\Types;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use PHPUnit\Util\Type;


class UsersController extends AdminController
{

    use AuthenticatesUsers;

    public $redirectTo = '/admin/home';

    public function username()
    {
        return 'username';
    }

    public function showLoginForm(Request $request)
    {
        $user = $request->user();
        if ($user) {
            return redirect('/admin/home');
        }

//        dd($request->user());
        return view('admin.users.login');
    }

    public function adminsList(Request $request)
    {
        $admins = DB::table('admins')->paginate(15);

        $data = array(
            'admins' => $admins,
        );

        return view('admin.users.admins', $data);
    }

    public function adminsForgetpwd()
    {

        $data = array(

        );

        return view('admin.users.adminsforget', $data);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    protected function loggedOut(Request $request)
    {
        return redirect('/admin/login');
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required',
            'password' => 'required|string',
            'captcha' => 'required|captcha',
        ],[
            $this->username() . '.required' => '用户名必填',
            'password.required' => '请填写密码',
            'captcha.required' => '请填写验证码',
            'captcha.captcha' => '验证码错误',
        ]);


    }




}
