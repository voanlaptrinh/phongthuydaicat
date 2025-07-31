<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
     public function __construct()
    {
        // Kiểm tra quyền của người dùng để tạo, sửa, xóa hợp đồng
        $this->middleware('can:Xem người dùng')->only(['index']);
        $this->middleware('can:Thêm người dùng')->only(['create', 'store']);
        $this->middleware('can:Sửa người dùng')->only(['edit', 'update']);
        $this->middleware('can:Xóa người dùng')->only(['destroy']);
    }
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'roles' => 'nullable|array'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->roles) {
            $user->syncRoles($request->roles);
        }

        return redirect()->route('admin.users.index')->with('success', 'Tạo tài khoản thành công');
    }

    public function edit(User $user)
    {
         if ($user->email === 'superadmin@example.com') {
            return redirect()->route('admin.users.index')->with('error', 'Không được phép sửa tài khoản Super Admin.');
        }

        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
          // ===============================================
        if ($user->email === 'superadmin@example.com') {
            return redirect()->route('admin.users.index')->with('error', 'Không được phép cập nhật tài khoản Super Admin.');
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'roles' => 'nullable|array'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        if ($request->roles) {
            $user->syncRoles($request->roles);
        }

        return redirect()->route('admin.users.index')->with('success', 'Cập nhật tài khoản thành công');
    }

    public function destroy(User $user)
    {
          if ($user->email === 'superadmin@example.com') {
            return redirect()->route('admin.users.index')->with('error', 'Không được phép xóa tài khoản Super Admin.');
        }
        
        // Bảo vệ không cho tự xóa chính mình
        if (auth()->user()->id == $user->id) {
            return redirect()->route('admin.users.index')->with('error', 'Bạn không thể tự xóa chính mình.');
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Xóa tài khoản thành công');
    }
}
