<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login',[
            'title' => 'Đăng nhập'
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->input());
        $this -> validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required|min:5|max:12',
            'type'
        ]);

        if (Auth::attempt([
            'email' => $request->input(key: 'email'),
            'password' => $request->input(key: 'password'),
            'type' => 0
        ], $request->input(key: 'remember'))){
            return redirect()->route(route: 'admin');

        }elseif(Auth::attempt([
            'email' => $request->input(key: 'email'),
            'password' => $request->input(key: 'password'),
            'type' => 1
        ], $request->input(key: 'remember'))){
            return redirect()->route(route: 'user');

        }
        session()->flash('error', 'Email hoặc password không đúng !!!');
        return redirect()->back();
    }

    public function index1()
    {
        return view('admin.users.register',[
            'title' => 'Đăng ký'
        ]);
    }

    public function store1(Request $request)
    {
        $this -> validate($request, [
            'name' => 'required',
            'phone' => 'required|min:10',
            'address' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            're_password' => 'required|same:password',
        ],
        [
            'name.required' => 'Vui lòng nhập tên',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.min' => 'Số điện thoại không đủ 10 số',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Không đúng định dạng email',
            'email.unique' => 'Email đã được đăng kí',
            'password.required' => 'Vui lòng nhập passwod',
            'password.min' => 'Mật khẩu ít nhất 5 kí tự',
            're_password.required'=> 'Vui lòng nhập lại password',
            're_password.same' => 'Mật khẩu không giống nhau',
        ]);

        // dd($request->input());
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        if ($user->id)
        {
            return redirect('admin/users/login');
        }

        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
