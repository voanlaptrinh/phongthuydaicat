<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function __construct()
    {
        // Kiểm tra quyền của người dùng để tạo, sửa, xóa hợp đồng
        $this->middleware('can:Xem tin tức')->only(['index']);
        $this->middleware('can:Thêm tin tức')->only(['create', 'store']);
        $this->middleware('can:Sửa tin tức')->only(['edit', 'update']);
        $this->middleware('can:Xóa tin tức')->only(['destroy']);
    }
    public function index()
    {
        $newsList = News::latest()->paginate(10);
        return view('admin.news.index', compact('newsList'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'tag' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'content' => 'required|string',
            'active' => 'nullable|boolean',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'metatitle' => 'required|string|max:255',
            'metadescription' => 'required|string|max:255',
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề.',
            'tag.required' => 'Vui lòng nhập thẻ.',
            'description.required' => 'Vui lòng nhập mô tả.',
            'content.required' => 'Vui lòng nhập nội dung.',
            'images.image' => 'Tệp phải là hình ảnh.',
            'images.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif.',
            'metatitle.required' => 'Vui lòng nhập tiêu đề.',
            'metatitle.max' => 'Tiêu đề không được quá 255 ký tự',
            'metadescription.required' => 'Vui lòng nhập mô tả.',
            'metadescription.max' => 'Mô tả không được quá 255 ký tự',

        ]);

        // Nếu checkbox không được chọn thì sẽ không có trong request => mặc định false
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('/assetsadmin/uploads/tin_tuc'), $imageName);
            $validated['images'] = '/assetsadmin/uploads/tin_tuc/' . $imageName;
        }

        News::create($validated);

        return redirect()->route('news.admin.index')->with('success', 'Thêm tin tức thành công.');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }
    public function detail(News $news)
    {
        return view('admin.news.detail', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'tag' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'content' => 'required|string',
                'images' => 'nullable|image|mimes:jpeg,png,jpg,gif',
               'metatitle' => 'required|string|max:255',
        'metadescription' => 'required|string|max:255',
            ], [
                'title.required' => 'Vui lòng nhập tiêu đề.',
                'tag.required' => 'Vui lòng nhập thẻ.',
                'description.required' => 'Vui lòng nhập mô tả.',
                'content.required' => 'Vui lòng nhập nội dung.',
                'images.image' => 'Tệp phải là hình ảnh.',
                'images.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif.',
                'metatitle.required' => 'Vui lòng nhập tiêu đề.',
                'metatitle.max' => 'Tiêu đề không được quá 255 ký tự',
                'metadescription.required' => 'Vui lòng nhập mô tả.',
                'metadescription.max' => 'Mô tả không được quá 255 ký tự',
            ]);

            if ($request->hasFile('images')) {
                $image = $request->file('images');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('/assetsadmin/uploads/tin_tuc'), $imageName);
                $validated['images'] = '/assetsadmin/uploads/tin_tuc/' . $imageName;
            }

            $news->update($validated);

            return redirect()->route('news.admin.index')->with('success', 'Cập nhật tin tức thành công.');
        } catch (\Exception $e) {
            // Ghi log lỗi nếu cần: \Log::error($e);
            return redirect()->back()
                ->withInput()
                ->with('error', 'Đã xảy ra lỗi khi cập nhật tin tức: ' . $e->getMessage());
        }
    }

    public function destroy(News $news)
    {
        if ($news->images && File::exists(public_path($news->images))) {
            File::delete(public_path($news->images));
        }
        $news->delete();
        return redirect()->back()->with('success', 'Xóa tin tức thành công.');
    }
}
