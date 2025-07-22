<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home.index');
    }
    public function faqs(){
        return view('faqs.index');
    }
    public function contact(){
        return view('contact.index');
    }
}
