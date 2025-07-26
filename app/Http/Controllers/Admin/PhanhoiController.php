<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Phanhoi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class PhanhoiController extends Controller
{
    public function index(Request $request)
    {
        $query = Phanhoi::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

     

        $phanHois = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.phanhoi.index', compact('phanHois'));
    }

    public function create()
    {
        return view('admin.phanhoi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'note' => 'required',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ], [
            'name.required' => 'Tiêu đề không được để trống.',
            'name.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'name.string' => 'Tiêu đề phải là một chuỗi ký tự.',

            'note.string' => 'Mô tả ngắn phải là một chuỗi ký tự.',

            'note.required' => 'Nội dung không được để trống.',

            'avatar.image' => 'Tệp tải lên phải là hình ảnh.',
            'avatar.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg hoặc gif.',

        ]);

        $data = $request->only('name', 'note');
    

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('/assetsadmin/uploads/tin_tuc'), $imageName);
            $data['avatar'] = '/assetsadmin/uploads/tin_tuc/' . $imageName;
        }

        Phanhoi::create($data);
      
        return redirect()->route('phanhoi.admin.index')->with('success', 'Thêm phản hồi thành công.');
    }

    public function edit(Phanhoi $phanhoi)
    {
    
        return view('admin.phanhoi.edit', compact('phanhoi'));
    }

    public function update(Request $request, Phanhoi $phanhoi)
    
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'note' => 'required',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ], [
            'name.required' => 'Tiêu đề không được để trống.',
            'name.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'name.string' => 'Tiêu đề phải là một chuỗi ký tự.',

            'note.string' => 'Mô tả ngắn phải là một chuỗi ký tự.',

            'note.required' => 'Nội dung không được để trống.',

            'avatar.image' => 'Tệp tải lên phải là hình ảnh.',
            'avatar.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg hoặc gif.',

        ]);

        $data = $request->only('name', 'note');
        if ($request->hasFile('avatar')) {
            if ($phanhoi->avatar && File::exists(public_path($phanhoi->avatar))) {
                File::delete(public_path($phanhoi->avatar));
            }
            $image = $request->file('avatar');
            $imageName = time() . '_' . $image->getClientOriginalName();
         $image->move(public_path('/assetsadmin/uploads/tin_tuc'), $imageName);
            $data['avatar'] = '/assetsadmin/uploads/tin_tuc/' . $imageName;
        }

        $phanhoi->update($data);
        return redirect()->route('phanhoi.admin.index')->with('success', 'Cập nhật phản hồi thành công.');
    }

    public function destroy(Phanhoi $phanhoi)
    {
        if ($phanhoi->avatar && File::exists(public_path($phanhoi->avatar))) {
            File::delete(public_path($phanhoi->avatar));
        }

        $phanhoi->delete();

        return redirect()->route('phanhoi.admin.index')->with('success', 'Xóa tin tức thành công.');
    }
    }
