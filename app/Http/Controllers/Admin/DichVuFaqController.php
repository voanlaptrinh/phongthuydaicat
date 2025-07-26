<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DichVu;
use App\Models\DichVuFaq;
use Illuminate\Http\Request;

class DichVuFaqController extends Controller
{
   public function index(DichVu $dichvu)
    {
        $faqs = $dichvu->faqs()->latest()->paginate(10);
        return view('admin.dich_vu_faqs.index', compact('dichvu', 'faqs'));
    }

    public function create(DichVu $dichvu)
    {
        return view('admin.dich_vu_faqs.create', compact('dichvu'));
    }

    public function store(Request $request, DichVu $dichvu)
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

       
        $validated['dich_vu_id'] = $dichvu->id;

        DichVuFaq::create($validated);

        return redirect()->route('admin.dichvu.faqs.index', $dichvu->id)->with('success', 'Thêm câu hỏi thành công.');
    }

    public function edit(DichVu $dichvu, DichVuFaq $faq)
    {
        return view('admin.dich_vu_faqs.edit', compact('dichvu', 'faq'));
    }

    public function update(Request $request, DichVu $dichvu, DichVuFaq $faq)
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

        $faq->update($validated);

        return redirect()->route('admin.dichvu.faqs.index', $dichvu->id)->with('success', 'Cập nhật thành công.');
    }

    public function destroy(DichVu $dichvu, DichVuFaq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.dichvu.faqs.index', $dichvu->id)->with('success', 'Đã xóa câu hỏi.');
    }
}
