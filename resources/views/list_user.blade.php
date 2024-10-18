@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h4 class="mb-0 font-weight-bold">List User</h4>
                </div>
                <div class="card-body p-4">
                    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah Pengguna Baru</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Foto</th> <!-- New column for photo -->
                                    <th scope="col">Nama</th>
                                    <th scope="col">NPM</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->npm }}</td>
                                        <td>{{ $user->nama_kelas }}</td>
                                        <td>
                                            @if($user->foto)
                                            <img src="{{ asset($user->foto) }}" alt="Foto {{ $user->nama }}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 10px;">
                                            @else
                                                <img src="{{ asset('upload/img/logo laravel.jpg') }}" alt="Default Foto" style="width: 50px; height: auto; border-radius: 50%;">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-info">Detail</a>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
