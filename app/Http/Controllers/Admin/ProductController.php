<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        return 'Form tambah produk (belum dibuat)';
    }

    public function store(Request $request)
    {
        return 'Simpan produk (belum dibuat)';
    }

    public function show($id)
    {
        return 'Detail produk (belum dibuat)';
    }

    public function edit($id)
    {
        return 'Form edit produk (belum dibuat)';
    }

    public function update(Request $request, $id)
    {
        return 'Update produk (belum dibuat)';
    }

    public function destroy($id)
    {
        return 'Hapus produk (belum dibuat)';
    }
}
