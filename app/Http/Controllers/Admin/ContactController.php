<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        // Kiểm tra quyền của người dùng để tạo, sửa, xóa hợp đồng
        $this->middleware('can:Xem liên hệ')->only(['index']);
     
    }
    public function index(Request $request){
       
        $query = Contact::query();

        if ($request->filled('username')) {
            $query->where('username', 'like', '%' . $request->username . '%');
        }
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

    
        $dsLienHe = $query->latest()->paginate(10);
        return view('admin.contact.index',compact('dsLienHe'));
    }
}
