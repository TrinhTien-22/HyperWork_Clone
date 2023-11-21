<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function adminlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('id', 1)->first();

        if ($admin->email != $request->email || $admin->password != $request->password) {
            // throw ValidationException::withMessages([
            //     'email' => ['The provided credentials are incorrect.'],
            // ]);
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Nếu xác thực thành côngg có thể cập nhật mật khẩu
        // để sử dụng bcrypt như sau:
        // $admin->update(['password' => bcrypt($request->password)]);


        $token = $admin->createToken('authToken')->plainTextToken;

        return response()->json(['token' => $token], 200);
    }
    public function adminlogout()
    {
        // Đăng xuất người dùng
        Auth::logout();

        return response()->json(['message' => 'Logout successful'], 200);
    }
}
