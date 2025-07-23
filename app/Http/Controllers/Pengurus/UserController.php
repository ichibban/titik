<?php
namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        // Cek role
        if (auth()->user()->role !== 'pengurus') {
            abort(403, 'Akses ditolak');
        }

        return view('pengurus.tambah-anggota');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'pengurus') {
            abort(403, 'Akses ditolak');
        }

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|in:anggota,bajang,jabang',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('dashboard')->with('success', 'Anggota berhasil ditambahkan.');
    }
}
