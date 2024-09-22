<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        .form-container {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
            width: 420px;
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease-in-out;
        }

        .form-container:hover {
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
        }

        h1 {
            margin-bottom: 25px;
            color: #444;
            font-weight: 600;
            text-align: center;
        }

        .form-container::before {
            content: "";
            position: absolute;
            top: -50px;
            right: -50px;
            background: rgba(255, 75, 75, 0.5);
            width: 120px;
            height: 120px;
            border-radius: 50%;
            z-index: 0;
            transition: all 0.5s;
        }

        .form-container:hover::before {
            top: -30px;
            right: -30px;
            background: rgba(255, 75, 75, 0.7);
        }

        .form-label {
            font-weight: 600;
            color: #666;
            margin-bottom: 10px;
        }

        .form-control {
            border: 2px solid #eee;
            border-radius: 15px;
            padding: 12px 20px;
            font-size: 16px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #6a11cb;
            box-shadow: 0 5px 15px rgba(81, 203, 238, 0.7);
        }

        input::placeholder {
            color: #999;
        }

        .btn-custom {
            background-color: #ff4c4c;
            color: white;
            width: 100%;
            border-radius: 15px;
            padding: 15px;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 5px 15px rgba(255, 75, 75, 0.5);
        }

        .btn-custom:hover {
            background-color: #ff1a1a;
            transform: translateY(-5px);
        }

        .btn-custom:active {
            background-color: #e60000;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-group input {
            padding-left: 40px;
        }

        .form-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #666;
        }

    </style>
</head>
<body>
    <div class="form-container">
        <h1>Form User</h1>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="mb-3 form-group">
                <label for="nama" class="form-label">Nama:</label>
                <i class="bi bi-person"></i>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
            </div>
            <div class="mb-3 form-group">
                <label for="npm" class="form-label">NPM:</label>
                <i class="bi bi-card-text"></i>
                <input type="text" class="form-control" id="npm" name="npm" placeholder="Masukkan NPM" required>
            </div>
            <div class="mb-3 form-group">
                <label for="kelas" class="form-label">Kelas:</label>
                <i class="bi bi-people"></i>
                <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan Kelas" required>
            </div>
            <button type="submit" class="btn btn-custom">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
