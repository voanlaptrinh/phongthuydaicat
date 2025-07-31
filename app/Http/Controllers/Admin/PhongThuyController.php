<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhongThuy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class PhongThuyController extends Controller
{
    public function __construct()
    {
        // Kiểm tra quyền của người dùng để tạo, sửa, xóa hợp đồng
        $this->middleware('can:Xem kiến thức phong thủy')->only(['index']);
        $this->middleware('can:Thêm kiến thức phong thủy')->only(['create', 'store']);
        $this->middleware('can:Sửa kiến thức phong thủy')->only(['edit', 'update']);
        $this->middleware('can:Xóa kiến thức phong thủy')->only(['destroy']);
    }
    public function index()
    {
        $newsList = PhongThuy::latest()->paginate(10);
        return view('admin.phong_thuy.index', compact('newsList'));
    }

    public function create()
    {
        return view('admin.phong_thuy.create');
    }

  public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'tag' => 'required|string|max:255',
        'metatitle' => 'required|string|max:255',
        'metadescription' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'content' => 'required|string',
        'images' => 'nullable|image|mimes:jpeg,png,jpg,gif',
    ], [
        'title.required' => 'Vui lòng nhập tiêu đề.',
        'title.max' => 'Tiêu đề không được quá 255 ký tự',
        'metatitle.required' => 'Vui lòng nhập tiêu đề.',
        'metatitle.max' => 'Tiêu đề không được quá 255 ký tự',
        'metadescription.required' => 'Vui lòng nhập mô tả.',
        'metadescription.max' => 'Mô tả không được quá 255 ký tự',
        'tag.required' => 'Vui lòng nhập thẻ.',
        'description.required' => 'Vui lòng nhập mô tả.',
        'content.required' => 'Vui lòng nhập nội dung.',
        'images.image' => 'Tệp phải là hình ảnh.',
        'images.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif.',
     
    ]);

    if ($request->hasFile('images')) {
        $image = $request->file('images');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('/assetsadmin/uploads/tin_tuc'), $imageName);
        $validated['images'] = '/assetsadmin/uploads/tin_tuc/' . $imageName;
    }

    PhongThuy::create($validated);
    return redirect()->route('phongthuy.admin.index')->with('success', 'Thêm phong thủy thành công.');
}

    public function edit(PhongThuy $phongthuy)
    {
        return view('admin.phong_thuy.edit', compact('phongthuy'));
    }
    public function detail(PhongThuy $phongthuy)
    {
        return view('admin.phong_thuy.detail', compact('phongthuy'));
    }

    public function update(Request $request, PhongThuy $phongthuy)
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

        $phongthuy->update($validated);

        return redirect()->route('phongthuy.admin.index')->with('success', 'Cập nhật phong thủy thành công.');
    } catch (\Exception $e) {
        // Ghi log lỗi nếu cần: \Log::error($e);
        return redirect()->back()
            ->withInput()
            ->with('error', 'Đã xảy ra lỗi khi cập nhật phong thủy: ' . $e->getMessage());
    }
}

    public function destroy(PhongThuy $phongthuy)
    {
         if ($phongthuy->images && File::exists(public_path($phongthuy->images))) {
            File::delete(public_path($phongthuy->images));
        }
        $phongthuy->delete();
        return redirect()->back()->with('success', 'Xóa phong thủy thành công.');
    }
}
