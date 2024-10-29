<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Categeory;
use App\Models\Pencipta;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        if (request()->getRequestUri() == "/admin") {
            return redirect('/admin?page=1');
        }
        $cache_key = 'book_cache_' . md5(request()->fullUrl());
        $data = Cache::remember($cache_key,2592000, function(){
            return Admin::filter(request(['search', 'category', 'penulis']))->latest()->paginate(12)->withQueryString();
        });
        $category = Categeory::all();
        $title = 'Admin Dashboard';

        return view('admin/index', compact('data', 'title', 'category'));
    }
    public function destroy(Admin $admin){
        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Data Berhasil Dihapus');
    }
    public function edit(Admin $admin){
        $title = 'Edit Buku';
        $category = Categeory::all();
        return view('admin/edit', compact('admin', 'title', 'category'));
    }

    public function create(){
        $title = 'Tambah Buku Baru';
        $category = Categeory::all();

        return view('admin/create', compact('title', 'category'));
    }

    public function store(Request $request){
        try {
            $request->validate([
                'judul' => 'required',
                'penulis' => 'required',
                'category' => 'required',
                'nama-penerbit' => 'required',
                'sinopsis' => 'required',
                'tahun-terbit' => 'required|digits:4|integer|max:' . date('Y'),
            ]);

            $category =  Categeory::firstOrCreate([
                'nama' => $request['category']
            ]);
            $penulis = Pencipta::firstOrCreate([
                'nama' => ucfirst($request['penulis'])
            ]);
            $data = [
                'judul' => $request['judul'],
                'pencipta_id' => $penulis->id,
                'nama_penerbit' => $request['nama-penerbit'],
                'tahun_terbit' => $request['tahun-terbit'],
                'kategori_id' => $category->id,
                'sinopsis' => $request['sinopsis'],
            ];

            if ($request->hasFile('cover')) {
                $img = $request->file('cover');
                $img->storeAs('public/cover', $img->hashName());
                $data['cover'] = $img->hashName();

            }

            Admin::create($data);

            return redirect()->route('admin.index')->with('success', 'Data Buku Berhasil Ditambahkan');
        } catch (\Throwable $e) {
            return redirect()->route('admin.create')->withInput()->with('error', 'Ada Kesalahan Saat Menambahkan Data Baru, Error : ' . $e->getMessage());
        }
    }
    public function update(Request $request, Admin $admin){
        try {
            $request->validate([
                'judul' => 'required',
                'penulis' => 'required',
                'category' => 'required',
                'nama-penerbit' => 'required',
                'sinopsis' => 'required',
                'tahun-terbit' => 'required|digits:4|integer|max:' . date('Y'),
            ]);
            $category =  Categeory::firstOrCreate([
                'nama' => $request['category']
            ]);
            $penulis = Pencipta::firstOrCreate([
                'nama' => ucfirst($request['penulis'])
            ]);
            $data = [
                'judul' => $request['judul'],
                'pencipta_id' => $penulis->id,
                'nama_penerbit' => $request['nama-penerbit'],
                'tahun_terbit' => $request['tahun-terbit'],
                'kategori_id' => $category->id,
                'sinopsis' => $request['sinopsis'],
            ];
            if ($request->hasFile('cover')) {
                Storage::delete('public/cover/'.$admin['cover']);
                $img = $request->file('cover');
                $img->storeAs('public/cover', $img->hashName());
                $data['cover'] = $img->hashName();
            }

            $admin->update($data);
            return redirect()->route('admin.index')->with('success', 'Data Buku Berhasil Diubah');
        } catch (\Throwable $e) {
            return redirect()->route('admin.edit')->withInput()->with('error', 'Ada Kesalahan Saat Mengubah Data, Error : ' . $e->getMessage());
        }
    }
}
