<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\DichVu;
use App\Models\Faq;
use App\Models\News;
use App\Models\Phanhoi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $phanhoi = Phanhoi::all();
        return view('home.index',compact('phanhoi'));
    }
    public function faqs(){
        $faqs = Faq::orderBy('created_at', 'desc')->paginate(10);
       
        return view('faqs.index', compact('faqs'));
    }
    public function contact(){
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
    public function news(){
         $news = News::orderBy('created_at', 'desc')->take(3)->get();
    return view('news.index', compact('news'));
    }
    public function newsdetail(News $news){
        return view('news.detail', compact('news'));
    }
    public function newslist(){
         $news = News::orderBy('created_at', 'desc')->paginate(6);
        return view('news.list', compact('news'));
    }
    public function dichvus(){
          $dichvu = DichVu::orderBy('created_at', 'desc')->get();
        return view('dichvu.index',compact('dichvu'));
    }
    public function dichvusdetail(DichVu $dichvu){
        return view('dichvu.detail',compact('dichvu'));
    }

}
