<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Categeory;

class UserController extends Controller
{
    public function index(){
        $data = Admin::filter(request(['search', 'category', 'penulis']))->latest()->paginate(10)->withQueryString();
        $category = Categeory::all();
        $title = 'Home';

        return view('index', compact('data', 'title', 'category'));
    }

    public function show(Admin $data){
        $title = 'Preview Book';
        return view('preview', compact('data', 'title'));
    }
}
