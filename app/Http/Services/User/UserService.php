<?php

namespace App\Http\Services\User;

use App\Http\Controllers\MainController;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserService
{
    public function create($request)
    {
        try {
            User::create([
                'name' => (string) $request->input('name'),
                'phone' => (string) $request->input('phone'),
                'address' => (string) $request->input('address'),
                'email' => (string) $request->input('email'),
                'password' => (string) bcrypt($request->input('password')),
                'type' => 0
            ]);

            session()->flash('success', 'Tạo bác sĩ thành công');
             //dd ($request->input());
         } catch (\Exception $err) {
             session()->flash('error', $err->getMessage());
             return false;
         }

         return true;
    }

    public function get()
    {
        return User::orderByDesc('id')->paginate(15);
    }

    public function destroy($request)
    {
        $user = User::where('id', $request->input('id'))->first();
        if ($user) {
            $user->delete();
            return true;
        }

        return false;
    }

}
