<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhongThuy;
use App\Models\PhongThuyFaq;
use Illuminate\Http\Request;

class PhongThuyFaqController extends Controller
{
     public function __construct()
    {
        // Kiểm tra quyền của người dùng để tạo, sửa, xóa hợp đồng
        $this->middleware('can:Xem câu hỏi kiến thức phong thủy')->only(['index']);
        $this->middleware('can:Thêm câu hỏi kiến thức phong thủy')->only(['create', 'store']);
        $this->middleware('can:Sửa câu hỏi kiến thức phong thủy')->only(['edit', 'update']);
        $this->middleware('can:Xóa câu hỏi kiến thức phong thủy')->only(['destroy']);
    }
  public function index(PhongThuy $phongThuy)
    {
        $faqs = $phongThuy->faqs()->latest()->paginate(10);
        return view('admin.phong_thuy_faqs.index', compact('phongThuy', 'faqs'));
    }

    public function create(PhongThuy $phongThuy)
    {
        return view('admin.phong_thuy_faqs.create', compact('phongThuy'));
    }

    public function store(Request $request, PhongThuy $phongThuy)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ], [
            'question.required' => 'Vui lòng nhập câu hỏi.',
            'question.string'   => 'Câu hỏi phải là chuỗi.',
            'question.max'      => 'Câu hỏi không được vượt quá 255 ký tự.',

            'answer.required'   => 'Vui lòng nhập câu trả lời.',
            'answer.string'     => 'Câu trả lời phải là chuỗi.',
        ]);

       
        $validated['phong_thuy_id'] = $phongThuy->id;

        PhongThuyFaq::create($validated);

        return redirect()->route('admin.phongthuy.faqs.index', $phongThuy->id)->with('success', 'Thêm câu hỏi thành công.');
    }

    public function edit(PhongThuy $phongThuy, PhongThuyFaq $faq)
    {
        return view('admin.phong_thuy_faqs.edit', compact('phongThuy', 'faq'));
    }

    public function update(Request $request, PhongThuy $phongThuy, PhongThuyFaq $faq)
    {
       $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ], [
            'question.required' => 'Vui lòng nhập câu hỏi.',
            'question.string'   => 'Câu hỏi phải là chuỗi.',
            'question.max'      => 'Câu hỏi không được vượt quá 255 ký tự.',

            'answer.required'   => 'Vui lòng nhập câu trả lời.',
            'answer.string'     => 'Câu trả lời phải là chuỗi.',
        ]);


        $validated['active'] = $request->has('active');
        $faq->update($validated);

        return redirect()->route('admin.phongthuy.faqs.index', $phongThuy->id)->with('success', 'Cập nhật thành công.');
    }

    public function destroy(PhongThuy $phongThuy, PhongThuyFaq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.phongthuy.faqs.index', $phongThuy->id)->with('success', 'Đã xóa câu hỏi.');
    }
}
