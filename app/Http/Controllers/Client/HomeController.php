<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\DatLichTuVan;
use App\Models\DichVu;
use App\Models\Faq;
use App\Models\News;
use App\Models\Phanhoi;
use App\Models\PhongThuy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $phanhoi = Phanhoi::all();
        return view('home.index', compact('phanhoi'));
    }
    public function faqs()
    {
        $faqs = Faq::orderBy('created_at', 'desc')->paginate(10);

        return view('faqs.index', compact('faqs'));
    }
    public function contact()
    {
        return view('contact.index');
    }
    public function storecontact(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email',
            'address' => 'nullable|string|max:255',
            'loai_dich_vu' => 'nullable|string|max:255',
            'mo_ta' => 'nullable|string|max:1000',
        ]);
        Contact::create($data);

        return response()->json(['status' => 'success', 'message' => 'Gửi liên hệ thành công!']);
    }
    public function news()
    {
        $news = News::orderBy('created_at', 'desc')->take(3)->get();

        $baiVietMoiNhat = PhongThuy::latest()->first();
        $cacBaiVietConLai = PhongThuy::where('id', '!=', optional($baiVietMoiNhat)->id)
            ->latest()
            ->take(3) // tùy số lượng bạn muốn hiện
            ->get();
        return view('news.index', compact('news', 'baiVietMoiNhat', 'cacBaiVietConLai'));
    }
    public function newsdetail(News $news)
    {
        return view('news.detail', compact('news'));
    }
    public function phongthuydetail(PhongThuy $phongthuy)
    {
        return view('news.phongthuyshow', compact('phongthuy'));
    }
    public function newslist()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(6);
        return view('news.list', compact('news'));
    }
    public function dichvus()
    {
        $dichvu = DichVu::orderBy('created_at', 'desc')->get();
        return view('dichvu.index', compact('dichvu'));
    }
    public function dichvusdetail(DichVu $dichvu)
    {
        return view('dichvu.detail', compact('dichvu'));
    }
    public function storedatlichtuvan(Request $request)
    {
        // 1. Validate dữ liệu từ backend (Luôn luôn làm bước này)
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email|max:255',
            'message' => 'nullable|string',
        ], [
            'fullname.required' => 'Họ và tên là bắt buộc.',
            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        // 2. Lưu vào database
        try {
            DatLichTuVan::create([
                'fullname' => $request->fullname,
                'phone' => $request->phone,
                'email' => $request->email,
                'message' => $request->message,
            ]);

            // 3. Trả về thông báo thành công
            return response()->json([
                'success' => true,
                'message' => 'Cảm ơn bạn đã đặt lịch! Chúng tôi sẽ liên hệ lại với bạn sớm nhất.'
            ]);
        } catch (\Exception $e) {
            // 4. Báo lỗi nếu có vấn đề khi lưu
            return response()->json([
                'success' => false,
                'message' => 'Đã có lỗi xảy ra. Vui lòng thử lại sau.'
            ], 500);
        }
    }
}
