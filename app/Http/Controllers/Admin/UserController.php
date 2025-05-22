<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function makeAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'admin';
        $user->save();
        return redirect()->back()->with('success', 'Berhasil menjadikan sebagai Admin');
    }

    public function makeUser($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'user';
        $user->save();
        return redirect()->back()->with('success', 'Berhasil menjadikan sebagai User');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'admin') {
            return redirect()->back()->with('error', 'Tidak bisa menghapus sesama admin.');
        }

        $user->delete();
        return redirect()->back()->with('success', 'User berhasil dihapus.');
    }
}
