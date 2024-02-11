<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;

class MainController extends Controller
{
    public function index() {
//        if(request()->has('search')) {
//            $products = $products->where('title', 'like', '%' . request()->get('search','') . '%');
//        }

        $templates = Template::latest()->get();

        return view('main', compact('templates'));
    }
}
