<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;


class UserController extends Controller
{

    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index()
    {
        $data = [
            'title' => 'Create User',
            'users' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
}


    public function create()
    {
        $kelas = $this->kelasModel->getKelas();
    
        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];
    
        return view('create_user', $data);
    }

   public function store(Request $request)
{
    $this->userModel->create([
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

    return redirect()->to('/user');
}

public function profile($id)
{
    $user = $this->userModel::find($id);
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

