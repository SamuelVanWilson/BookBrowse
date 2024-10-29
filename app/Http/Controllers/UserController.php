<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Categeory;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function index(){
        if (request()->getRequestUri() == "/") {
            return redirect('/?page=1');
        }
        $cache_key = 'user_cache_'.md5(request()->fullUrl());
        $data = Cache::remember($cache_key,2592000, function(){
            return Admin::filter(request(['search', 'category', 'penulis']))->latest()->paginate(10)->withQueryString();
        });
        $category = Categeory::all();
        $title = 'Home';

        return view('index', compact('data', 'title', 'category'));
    }

    public function show(Admin $data){
        $title = 'Preview Book';
        return view('preview', compact('data', 'title'));
    }
}
