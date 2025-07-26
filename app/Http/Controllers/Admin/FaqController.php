<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
     public function index(Request $request)
    {
        $query = Faq::query();

        $faqs = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.faqs.index', compact('faqs'));
    }
    public function create()
    {
      
        return view('admin.faqs.create');
    }
     public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
            
        ], [
            'question.required' => 'Vui lòng nhập tiêu đề.',
            'question.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'answer.required' => 'Vui lòng nhập tiêu đề.',
            'answer.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
        ]);

        Faq::create($validatedData);


        return redirect()->route('faqs.admin.index')->with('success', 'Thêm câu hỏi thường gặp thành công.');
    }
    public function edit(Faq $faq)
    {
      
        return view('admin.faqs.edit', compact('faq'));
    }
    public function update(Request $request, Faq $faq)

    {
         $validatedData = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
            
        ], [
            'question.required' => 'Vui lòng nhập tiêu đề.',
            'question.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'answer.required' => 'Vui lòng nhập tiêu đề.',
            'answer.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
        ]);
        $faq->update($validatedData);
        return redirect()->route('faqs.admin.index')->with('success', 'Cập nhật câu hỏi thường gặp thành công.');
    }
    public function destroy( Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faqs.admin.index')->with('success', 'Xóa câu hỏi thường gặp thành công.');
    }
}
