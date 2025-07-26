<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhongThuy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class PhongThuyController extends Controller
{
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
        'description' => 'required|string|max:255',
        'content' => 'required|string',
        'images' => 'nullable|image|mimes:jpeg,png,jpg,gif',
    ], [
        'title.required' => 'Vui lòng nhập tiêu đề.',
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
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề.',
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
