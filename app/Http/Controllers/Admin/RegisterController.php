<?php
/**
 * User: leeray
 * Date: 2018/7/23
 * Time: 10:10
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Common\AdminController;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends AdminController
{
    use RegistersUsers;

    protected $redirectTo = '/admin/login';

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
//        dd($request->all());
        event(new Registered($user = $this->create($request->all())));

//        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255|unique:admins',
//            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
                'username' => $data['username'],
                'name'     => $data['username'],
                'password' => Hash::make($data['password']),
                'email'    => '',
            ]);
    }

    public function showRegistrationForm()
    {
        return view('admin.users.register');
    }

}