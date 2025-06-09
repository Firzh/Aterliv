<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penjemputan;


class PenjemputanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjemputan = \App\Models\Penjemputan::all(); // Ambil semua data
        return view('admin.penjemputan.index', compact('penjemputan'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus(Request $request, $id)
    {
        $penjemputan = Penjemputan::findOrFail($id);
        $penjemputan->status = $request->input('status');
        $penjemputan->save();

        // Tambah poin saat status diproses
        if (strtolower($request->status) === 'diproses') {
            $user = $penjemputan->user;

            if ($user) {
                $user->points += 10;

                // Log untuk debugging
                \Log::info('User ID: ' . $user->id . ' mendapatkan poin. Poin sekarang: ' . $user->points);

                $user->save();
            }
        }

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
