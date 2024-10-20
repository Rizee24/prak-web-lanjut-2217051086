@extends('layouts.app')

@section('content')
<div class="form-container">
    <h1>{{ $title }}</h1>
    <ul class="list-unstyled">
        <li class="form-group d-flex justify-content-center">
            @if($user->foto)
                <img src="{{ asset($user->foto) }}" alt="Foto {{ $user->nama }}" style="width: 150px; height: 150px; object-fit: cover; border-radius: 10px;">
            @else
                <img src="{{ asset('upload/img/logo laravel.jpg') }}" alt="Default Foto" style="width: 100px; height: auto; border-radius: 50%;">
            @endif
        </li>
        <li class="form-group">
            <strong>Nama:</strong> <span class="form-control-plaintext">{{ $user->nama }}</span>
        </li>
        <li class="form-group">
            <strong>NPM:</strong> <span class="form-control-plaintext">{{ $user->npm }}</span>
        </li>
        <li class="form-group">
            <strong>Kelas:</strong> <span class="form-control-plaintext">{{ $kelas->find($user->kelas_id)->nama_kelas ?? 'Kelas tidak ditemukan' }}</span>
        </li>
    </ul>
    <a href="{{ route('user.index') }}" class="btn btn-custom">Kembali ke List User</a>
</div>
@endsection
