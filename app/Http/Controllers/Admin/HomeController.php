<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect('admin/user')->with('loggedInNotification', 'User is already logged in!'); // Redirect to the home page or any other page
        }
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
//        $user = User::where('email', $request->email)
//            ->where('level', [Constant::user_level_host, Constant::user_level_admin]) //level host/admin
//            ->first();

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => [Constant::user_level_host, Constant::user_level_admin],
        ];

//        var_dump($credentials);

        $remember = $request->remember;

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('admin');
        }else {
            return back()->with('notification', 'Login failed! Wrong credentials or missing access permission!');
        }


//        if ($user && Hash::check($request->password, $user->password)) {
//            Auth::login($user, $request->remember);
//            return redirect()->intended('admin'); //Mặc định là trang chủ
////            return redirect('');
//        } else {
//            return back()->with('notification', 'Login failed. Check your entered information!');
////            return back()->with('notification', 'Đăng nhập không thành công, vui lòng kiểm tra lại thông tin đã nhập!');
//        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('admin/login');
    }
}
