<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsFaq;
use Illuminate\Http\Request;

class NewsFaqConcontroller extends Controller
{
    public function __construct()
    {
        // Kiểm tra quyền của người dùng để tạo, sửa, xóa hợp đồng
        $this->middleware('can:Xem câu hỏi tin tức')->only(['index']);
        $this->middleware('can:Thêm câu hỏi tin tức')->only(['create', 'store']);
        $this->middleware('can:Sửa câu hỏi tin tức')->only(['edit', 'update']);
        $this->middleware('can:Xóa câu hỏi tin tức')->only(['destroy']);
    }
    public function index(News $news)
    {
        $faqs = $news->faqs()->latest()->paginate(10);
        return view('admin.news_faqs.index', compact('news', 'faqs'));
    }

    public function create(News $news)
    {
        return view('admin.news_faqs.create', compact('news'));
    }

    public function store(Request $request, News $news)
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
        $validated['news_id'] = $news->id;

        NewsFaq::create($validated);

        return redirect()->route('admin.news.faqs.index', $news->id)->with('success', 'Thêm câu hỏi thành công.');
    }

    public function edit(News $news, NewsFaq $faq)
    {
        return view('admin.news_faqs.edit', compact('news', 'faq'));
    }

    public function update(Request $request, News $news, NewsFaq $faq)
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

        return redirect()->route('admin.news.faqs.index', $news->id)->with('success', 'Cập nhật thành công.');
    }

    public function destroy(News $news, NewsFaq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.news.faqs.index', $news->id)->with('success', 'Đã xóa câu hỏi.');
    }
}
