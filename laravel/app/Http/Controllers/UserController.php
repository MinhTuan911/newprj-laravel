<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }

    //ham dang xuat
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logged out successfully!');
    }
    //ham dang nhap

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard')->with('success', 'Welcome back!');
        }
        return back()->withErrors(['email' => 'Invalid credentials.']);
    }
     
    //ham dang ky 
    public function register(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
}
//ham xem danh sach user
public function listUser()
{
    if (Auth::check()) {
        $users = User::paginate(2);
        return view('crud_user.list', ['users' => $users]);
    }

    return redirect("login")->withSuccess('You are not allowed to access');
}
//ham xem thong tin chi tiet
public function readUser(Request $request) {

    $user_id = $request->get('id');
    $user = User::find($user_id);

    return view('crud_user.read', ['users' => $user]);
}
//update user
public function updateUser(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        'password' => 'nullable|string|min:6|confirmed',
    ]);

    // Tìm kiếm người dùng
    $user = User::findOrFail($id);
    $user2 = User::findOrFail($id);

    // Gán các giá trị mới cho người dùng
    $user->name = $request->input('name');
    $user->email = $request->input('email');

    // Lấy mật khẩu mới từ request
    $newPassword = $request->input('password');

    // So sánh mật khẩu mới với mật khẩu hiện tại
    if ($newPassword !== null && $newPassword !== '' && \Illuminate\Support\Facades\Hash::check($newPassword, $user->password) == false) {
        // Mật khẩu mới khác mật khẩu hiện tại, mã hóa và cập nhật mật khẩu mới
        $user->password = \Illuminate\Support\Facades\Hash::make($newPassword);
    }
    else // nếu không có thì gán lại mk cũ
    {
        $user->password = $user2->password;
    }
    // Lưu thông tin người dùng vào cơ sở dữ liệu
    $user->save();

    return redirect("listuser")->withSuccess('User updated successfully');
}
//edit
public function editUser($id)
{
    $user = User::findOrFail($id);
    return view('crud_user.edit', compact('user')); //Đường dẫn đến template thư mục
}
//xoa user
public function deleteUser($id)
    {
        $user = User::findOrFail($id);  // Tìm người dùng theo ID
        $user->delete();  // Xóa người dùng khỏi cơ sở dữ liệu
        return redirect()->route('listuser')->with('success', 'User deleted successfully');
    }

}
