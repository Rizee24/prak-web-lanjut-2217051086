<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function create() {
    return view('create_user', [
        'kelas' => Kelas::all(),
    ]);
   }

   public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'npm' => [
            'required',
            'string',
            'max:10',
            'min:10', 
            'regex:/^[0-9]+$/', // Pastikan hanya angka yang diterima
        ],
        'kelas_id' => 'required|exists:kelas,id',
    ], [
        'npm.max' => 'NPM tidak boleh lebih dari 10 karakter.',
        'npm.min' => 'NPM tidak boleh kurang dari 10 karakter',
        'npm.regex' => 'NPM hanya boleh terdiri dari angka.',
    ]);

    $user = UserModel::create($validatedData);

    return redirect()->route('user.profile', ['id' => $user->id]);
}

public function profile($id)
{
    $user = UserModel::find($id);
    if (!$user) {
        return redirect()->route('user.create')->with('error', 'User not found');
    }

    return view('profile', [
        'nama' => $user->nama,
        'npm' => $user->npm,
        'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
    ]);
}

}

