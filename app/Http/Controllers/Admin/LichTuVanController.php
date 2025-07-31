<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DatLichTuVan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class LichTuVanController extends Controller
{
    public function __construct()
    {
        // Kiểm tra quyền của người dùng để tạo, sửa, xóa hợp đồng
        $this->middleware('can:Xem lịch tư vấn của khách hàng')->only(['index']);
        $this->middleware('can:Sửa trạng thái lịch tư vấn khách hàng')->only(['updateStatus']);
    }
    public function index(Request $request)
    {
        $query = DatLichTuVan::query();

        if ($request->filled('fullname')) {
            $query->where('fullname', 'like', '%' . $request->fullname . '%');
        }
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
        if ($request->filled('phone')) {
            $query->where('phone', 'like', '%' . $request->phone . '%');
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
       
        $lichtuvans = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.lich_tu_van.index', compact('lichtuvans'));
    }
     public function updateStatus(Request $request, $id)
    {
        // Validate dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'status' => 'required|string|in:Mới,Đã tư vấn,Đã hủy',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Trạng thái không hợp lệ.'], 422);
        }

        $lichtuvan = DatLichTuVan::find($id);

        if (!$lichtuvan) {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy lịch tư vấn.'], 404);
        }

        $lichtuvan->status = $request->status;
        $lichtuvan->save();

        return response()->json(['success' => true, 'message' => 'Cập nhật trạng thái thành công.']);
    }
}
