<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {

//        if(request()->has('search')) {
//            $products = $products->where('title', 'like', '%' . request()->get('search','') . '%');
//        }


        return view('main');
    }
}
