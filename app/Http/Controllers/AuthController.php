<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    // 顯示註冊表單
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // 處理註冊 
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone'    => 'required|string|max:15',
            'gender'   => 'required|string',
            'preferences' => 'array|max:3',  // 限制最多選三個
            'avatar'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // 圖片上傳
        ]);

        // 處理圖片上傳
        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->preferences = $request->preferences; 
        $user->avatar = $avatarPath;  // 儲存圖片檔案路徑
        $user->role = 'user'; // 預設為 user
        $user->save();
    
        return redirect('/')->with('message', '註冊成功');
    }

    // 顯示登入表單
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // 處理登入
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // 如果登入成功，則重新生成 session
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }
        
        // 如果登入失敗，則返回錯誤訊息
        return back()->withErrors([
            'email' => '帳號或密碼錯誤',
        ]);
    }

    // 處理登出
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // 顯示所有註冊使用者
    public function showUsers()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    // 更新使用者角色
    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'role' => 'required|in:user,moderator,admin'
        ]);

        $user->role = $validated['role'];
        $user->save();

        return redirect('/users')->with('message', '角色已更新');
    }

    // 刪除使用者
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // 刪除頭像檔案（如果有）
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->delete();

        return redirect()->back()->with('message', '使用者已刪除成功');
    }

    public function showProfile() 
    {
        return view('auth.profile');
    }

    // 更新個人檔案
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->route('profile')->with('success', '資料更新成功');
    }

    // 顯示更改密碼頁面
    public function showChangePassword()
    {
        return view('auth.change-password');
    }

    // 處理密碼更新
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors(['current_password' => '目前密碼錯誤']);
        }

        $user = auth()->user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('password.change')->with('success', '密碼更新成功');
    }
}