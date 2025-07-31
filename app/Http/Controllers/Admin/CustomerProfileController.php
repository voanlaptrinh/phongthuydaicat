<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerProfile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerProfileController extends Controller
{
    public function __construct()
    {
        // Kiểm tra quyền của người dùng để tạo, sửa, xóa hợp đồng
        $this->middleware('can:Xem hồ sơ khách hàng quản lý')->only(['index']);
        $this->middleware('can:Thêm hồ sơ khách hàng quản lý')->only(['create', 'store']);
        $this->middleware('can:Sửa hồ sơ khách hàng quản lý')->only(['edit', 'update']);
        $this->middleware('can:Xóa hồ sơ khách hàng quản lý')->only(['destroy']);
    }
    private $statuses = [
        'waiting' => 'Đang chờ',
        'consulting' => 'Đang tư vấn',
        'info_sent' => 'Đã gửi thông tin',
        'info_received' => 'Đã tiếp nhận đầy đủ thông tin',
        'handed_over' => 'Đã bàn giao cho chuyên gia',
        'result_received' => 'Đã nhận kết quả của chuyên gia',
        'result_relayed' => 'Đã phản hồi kết quả cho khách hàng',
        'collecting_feedback' => 'Thu thập đánh giá',
        'completed' => 'Đã hoàn tất'
    ];
    public function index(Request $request)
    {
        $query = CustomerProfile::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
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

        $statuses = $this->statuses;
        // KIỂM TRA 3: Lấy giá trị 'status' từ URL và gán vào biến $searchStatus
        $searchStatus = $request->input('status');

        // Nếu có $searchStatus, thì thêm điều kiện lọc
        if ($searchStatus) {
            $query->where('status', $searchStatus);
        }
        $customerProfiles = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.customerprofile.index', compact('customerProfiles', 'statuses', 'searchStatus'));
    }
    public function create()
    {
        $statuses = $this->statuses;
        return view('admin.customerprofile.create', compact('statuses'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'zalo' => 'nullable|string|max:50',
            'email' => 'nullable|email|unique:customer_profiles,email',
            'facebook_url' => 'nullable|url|max:255',
            'service_type' => 'required|string|max:255',
            'reception_date' => 'required|date',
            'status' => ['required', Rule::in(array_keys($this->statuses))],
            'note' => 'nullable|string',
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'phone.max' => 'Số điện thoại không được vượt quá 20 ký tự.',
            'zalo.max' => 'Zalo không được vượt quá 50 ký tự.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại trong hệ thống.',
            'facebook_url.url' => 'Đường dẫn Facebook không hợp lệ.',
            'facebook_url.max' => 'Đường dẫn Facebook không được vượt quá 255 ký tự.',
            'service_type.required' => 'Vui lòng chọn loại dịch vụ.',
            'reception_date.required' => 'Vui lòng chọn ngày tiếp nhận.',
            'reception_date.date' => 'Ngày tiếp nhận không hợp lệ.',
            'status.required' => 'Vui lòng chọn trạng thái.',
            'status.in' => 'Trạng thái không hợp lệ.',
        ]);

        CustomerProfile::create($validatedData);


        return redirect()->route('khachhangquanly.admin.index')->with('success', 'Thêm khách hàng thành công.');
    }
    public function getDetails(CustomerProfile $customerProfile)
    {
        // Dùng lại mảng status đã định nghĩa ở đầu controller
        $statusText = $this->statuses[$customerProfile->status] ?? $customerProfile->status;

        // Trả về một JSON response với các dữ liệu cần thiết
        return response()->json([
            'id' => $customerProfile->id,
            'customer_code' => $customerProfile->customer_code,
            'name' => $customerProfile->name,
            'phone' => $customerProfile->phone,
            'zalo' => $customerProfile->zalo,
            'email' => $customerProfile->email,
            'facebook_url' => $customerProfile->facebook_url,
            'service_type' => $customerProfile->service_type,
            // Định dạng lại ngày cho dễ đọc
            'reception_date' => $customerProfile->reception_date->format('d/m/Y'),
            'status' => $statusText, // Trả về text tiếng Việt của trạng thái
            'note' => $customerProfile->note,
            'created_at' => $customerProfile->created_at->format('H:i:s d/m/Y'),
            'updated_at' => $customerProfile->updated_at->format('H:i:s d/m/Y'),
        ]);
    }
    public function edit(CustomerProfile $khachhangquanly)
    {
        $statuses = $this->statuses;
        return view('admin.customerprofile.edit', compact('khachhangquanly', 'statuses'));
    }
    public function update(Request $request, CustomerProfile $khachhangquanly)

    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'zalo' => 'nullable|string|max:50',
            'email' => [
                'nullable',
                'email',
                Rule::unique('customer_profiles', 'email')->ignore($khachhangquanly->id),
            ],
            'facebook_url' => 'nullable|url|max:255',
            'messenger' => 'nullable|string|max:255', // ✅ nếu bạn đã thêm trường này
            'service_type' => 'required|string|max:255',
            'reception_date' => 'required|date',
            'status' => ['required', Rule::in(array_keys($this->statuses))],
            'note' => 'nullable|string',
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'phone.max' => 'Số điện thoại không được vượt quá 20 ký tự.',
            'zalo.max' => 'Zalo không được vượt quá 50 ký tự.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại trong hệ thống.',
            'facebook_url.url' => 'Đường dẫn Facebook không hợp lệ.',
            'facebook_url.max' => 'Đường dẫn Facebook không được vượt quá 255 ký tự.',
            'messenger.max' => 'Messenger không được vượt quá 255 ký tự.',
            'service_type.required' => 'Vui lòng chọn loại dịch vụ.',
            'reception_date.required' => 'Vui lòng chọn ngày tiếp nhận.',
            'reception_date.date' => 'Ngày tiếp nhận không hợp lệ.',
            'status.required' => 'Vui lòng chọn trạng thái.',
            'status.in' => 'Trạng thái không hợp lệ.',
        ]);
        $khachhangquanly->update($validatedData);
        return redirect()->route('khachhangquanly.admin.index')->with('success', 'Cập nhật khách hàng thành công.');
    }
    public function destroy(CustomerProfile $khachhangquanly)
    {


        $khachhangquanly->delete();

        return redirect()->route('khachhangquanly.admin.index')->with('success', 'Xóa  khách hàng  thành công.');
    }
}
