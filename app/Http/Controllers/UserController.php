<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
     return view('profile');
    }

  public function create() {
    return view('create_user');
   }

   public function store(Request $request)
{
    // Ambil data dari request
    $data = [
        'nama' => $request->input('nama'),
        'npm' => $request->input('npm'),
        'kelas' => $request->input('kelas'),
    ];

    // Kirim data ke view profile
    return view('profile', compact('data'));
}

}

