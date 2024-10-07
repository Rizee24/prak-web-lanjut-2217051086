<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .profile-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .profile-pic {
            width: 120px;
            height: 120px;
            background-color: #e9ecef;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .profile-pic img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .profile-info {
            width: 100%;
        }
        .profile-info .info-box {
            background-color: #e9ecef;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="profile-container text-center">
        <div class="profile-pic">
        <img src="{{ asset('assets/img/pp kosong.png') }}" alt="Foto Profil">
        </div>
        
        <div class="profile-info">
            <div class="info-box">Nama: {{ $nama }}</div>
            <div class="info-box">Kelas: {{ $nama_kelas ?? 'Kelas tidak ditemukan' }}</div>
            <div class="info-box">NPM: {{ $npm }}</div>
        </div>
    </div>
</body>
</html>
