<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // pastikan ini ada
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;




class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // ambil semua produk
        return view('admin.products.index', compact('products')); // kirim ke view
    }

    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403); // Forbidden
        }

        return view('admin.products.create');   
    }

    public function store(Request $request)
    {

        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload gambar
        $imagePath = $request->file('image')->store('products', 'public');

        // Simpan data produk
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show($id)
    {
        return 'Detail produk (belum dibuat)';
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'price']);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($product->image && \Storage::exists('public/' . $product->image)) {
                \Storage::delete('public/' . $product->image);
            }

            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && \Storage::exists('public/' . $product->image)) {
            \Storage::delete('public/' . $product->image);
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
    public function userProductList()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

     public function exchange($id)
    {
        $user = Auth::user();
        $product = Product::findOrFail($id);

        if ($user->points < $product->price) {
            return redirect()->route('products.index')->with('error', 'Poin Anda tidak cukup untuk menukar produk ini.');
        }

        // Kurangi poin user
        $user->points -= $product->price;
        $user->save();

        // Di sini kamu bisa tambah logic lain,
        // misal simpan data penukaran produk di tabel lain, kirim notifikasi, dll.

        return redirect()->route('products.index')->with('success', 'Berhasil menukar produk: ' . $product->name);
    }

}
