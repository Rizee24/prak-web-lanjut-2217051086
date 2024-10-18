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
    $request->validate([
        'nama' => 'required|string|max:255',
        'npm' => 'required|string|max:10',
        'kelas_id' => 'required|integer',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $fotoPath = 'upload/img/logo laravel.jpg'; 

    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        // Menyimpan file foto di folder 'uploads'
        $fotoPath = 'upload/img/' . time() . '_' . $foto->getClientOriginalName();
        $foto->move(public_path('upload/img'), $fotoPath);
    }

    $this->userModel->create([
        'nama' => $request->input('nama'),
        'npm' => $request->input('npm'),
        'kelas_id' => $request->input('kelas_id'),
        'foto' => $fotoPath, // Menyimpan path foto
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

// public function show($id)
// {
//     $user = $this->userModel->getUser($id);

//     $data = [
//         'title' => 'profile',
//         'user' => $user,
//     ];

//     // Mengembalikan view profile dengan data user
//     return view('profile', [
//         'nama' => $user->nama,
//         'npm' => $user->npm,
//         'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan', // Menggunakan operator null coalescing
//         'foto' => $user->foto ?? 'upload/img/logo laravel.jpg'
//     ]);
// }
public function show($id)
{
    $user = UserModel::findOrFail($id);
    $kelas = Kelas::find($user->kelas_id);

    $title = 'Detail ' . $user->nama;

    return view('show_user', compact('user', 'kelas', 'title'));
}


public function edit($id)
{
    $user = UserModel::findOrFail($id);
    $kelasModel = new Kelas();
    $kelas = $kelasModel->getKelas();
    $title = 'Edit User';
    
    return view('edit_user', compact('user', 'kelas', 'title'));
}

public function update(Request $request, $id)
{
    $user = UserModel::findOrFail($id);

    $request->validate([
        'nama' => 'required|string|max:255',
        'npm' => 'required|string|max:10',
        'kelas_id' => 'required|integer',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $user->nama = $request->nama;
    $user->npm = $request->npm;
    $user->kelas_id = $request->kelas_id;

    if ($request->hasFile('foto')){
        $fileName = time() . '_' . $request->foto->getClientOriginalName();
        $request->foto->move(public_path('upload/img'), $fileName);
        $user->foto = 'upload/img/' . $fileName;
    }

    $user->save();

    return redirect()->route('user.index')->with('success', 'Data user berhasil diperbarui!');
}

// UserController.php

public function destroy($id)
{
    $user = UserModel::findOrFail($id);

    $user->delete();

    return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
}


}

