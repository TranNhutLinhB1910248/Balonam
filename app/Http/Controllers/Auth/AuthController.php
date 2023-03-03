<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('admin.users.login');
    }

    public function googleRedirect() {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback(){
        $user = Socialite::driver('google')->user();
        $check = User::where([
            'email' => $user->email,
        ])->first();
        // dd($check);
        if ($check) {
            Auth::login($check);
            return redirect()->route(route: 'user');
        } else {
            return redirect('admin/users/login')->with('error', 'Thất bại!');
        }
    } 
}
