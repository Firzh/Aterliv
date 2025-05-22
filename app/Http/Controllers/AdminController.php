<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSampah;
use App\Models\LokasiDaurUlang;
use App\Models\PenjemputanSampah;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalJenisSampah = JenisSampah::count();
        $totalLokasi = LokasiDaurUlang::count();
        $totalPenjemputan = PenjemputanSampah::count();
        $totalUsers = User::where('role', 'user')->count();
        
        $permintaanTerbaru = PenjemputanSampah::with('user')
                              ->orderBy('created_at', 'desc')
                              ->take(5)
                              ->get();
        
        $permintaanMenunggu = PenjemputanSampah::where('status', 'menunggu')->count();
        $permintaanDiproses = PenjemputanSampah::where('status', 'diproses')->count();
        $permintaanSelesai = PenjemputanSampah::where('status', 'selesai')->count();
        
        return view('admin.dashboard', compact(
            'totalJenisSampah',
            'totalLokasi',
            'totalPenjemputan',
            'totalUsers',
            'permintaanTerbaru',
            'permintaanMenunggu',
            'permintaanDiproses',
            'permintaanSelesai'
        ));
    }
    
    public function index()
    {
        // Contoh ambil semua user dan kirim ke view admin.users
        $users = User::all();

        return view('admin.users', compact('users'));
    }

    public function userList()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
    
    public function destroy(User $user)
    {
        if(auth()->user()->id === $user->id) {
            return redirect()->back()->with('error', 'Anda tidak bisa menghapus akun sendiri.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }

    public function toggleAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->role = $user->role === 'admin' ? 'user' : 'admin';
        $user->save();

        return redirect()->back()->with('success', 'Status role berhasil diubah.');
    }


}