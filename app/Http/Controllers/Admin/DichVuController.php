<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DichVu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DichVuController extends Controller
{
    public function __construct()
    {
        // Kiểm tra quyền của người dùng để tạo, sửa, xóa hợp đồng
        $this->middleware('can:Xem kiến thức dịch vụ')->only(['index']);
        $this->middleware('can:Thêm kiến thức dịch vụ')->only(['create', 'store']);
        $this->middleware('can:Sửa kiến thức dịch vụ')->only(['edit', 'update']);
        $this->middleware('can:Xóa kiến thức dịch vụ')->only(['destroy']);
    }
    public function index()
    {
        $newsList = DichVu::latest()->paginate(10);
        return view('admin.dich_vu.index', compact('newsList'));
    }

    public function create()
    {
        return view('admin.dich_vu.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'tag' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'content' => 'required|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'images2' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề.',
            'tag.required' => 'Vui lòng nhập thẻ.',
            'description.required' => 'Vui lòng nhập mô tả.',
            'content.required' => 'Vui lòng nhập nội dung.',
            'images.image' => 'Tệp phải là hình ảnh.',
            'images.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif.',
            'images2.image' => 'Tệp phải là hình ảnh.',
            'images2.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif.',
        ]);

        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('/assetsadmin/uploads/tin_tuc'), $imageName);
            $validated['images'] = '/assetsadmin/uploads/tin_tuc/' . $imageName;
        }
        if ($request->hasFile('images2')) {
            $image = $request->file('images2');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('/assetsadmin/uploads/tin_tuc'), $imageName);
            $validated['images2'] = '/assetsadmin/uploads/tin_tuc/' . $imageName;
        }

        DichVu::create($validated);
        return redirect()->route('dichvu.admin.index')->with('success', 'Thêm phong thủy thành công.');
    }
    public function detail(DichVu $dichvu)
    {
        return view('admin.dich_vu.detail', compact('dichvu'));
    }
    public function edit(DichVu $dichvu)
    {
        return view('admin.dich_vu.edit', compact('dichvu'));
    }
    public function update(Request $request, DichVu $dichvu)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'tag' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'content' => 'required|string',
                'images' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'images2' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ], [
                'title.required' => 'Vui lòng nhập tiêu đề.',
                'tag.required' => 'Vui lòng nhập thẻ.',
                'description.required' => 'Vui lòng nhập mô tả.',
                'content.required' => 'Vui lòng nhập nội dung.',
                'images.image' => 'Tệp phải là hình ảnh.',
                'images.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif.',
                'images2.image' => 'Tệp phải là hình ảnh.',
                'images2.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif.',
            ]);

            if ($request->hasFile('images')) {
                $image = $request->file('images');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('/assetsadmin/uploads/tin_tuc'), $imageName);
                $validated['images'] = '/assetsadmin/uploads/tin_tuc/' . $imageName;
            }
            if ($request->hasFile('images2')) {
                $image = $request->file('images2');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('/assetsadmin/uploads/tin_tuc'), $imageName);
                $validated['images2'] = '/assetsadmin/uploads/tin_tuc/' . $imageName;
            }

            $dichvu->update($validated);

            return redirect()->route('dichvu.admin.index')->with('success', 'Cập nhật dịch vụ thành công.');
        } catch (\Exception $e) {
            // Ghi log lỗi nếu cần: \Log::error($e);
            return redirect()->back()
                ->withInput()
                ->with('error', 'Đã xảy ra lỗi khi cập nhật dịch vụ: ' . $e->getMessage());
        }
    }
     public function destroy(DichVu $dichvu)
    {
         if ($dichvu->images && File::exists(public_path($dichvu->images))) {
            File::delete(public_path($dichvu->images));
        }
         if ($dichvu->images2 && File::exists(public_path($dichvu->images2))) {
            File::delete(public_path($dichvu->images2));
        }
        $dichvu->delete();
        return redirect()->back()->with('success', 'Xóa dịch vụ thành công.');
    }
}
