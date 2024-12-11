<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Certificate</title>
    <style>
        /* Body Style */
        body {
            background-color: #121212; /* Gelap */
            color: #ffffff; /* Teks putih */
            font-family: 'Arial', sans-serif; /* Font standar */
            margin: 0;
            padding: 20px;
        }

        /* Container Style */
        .container {
            max-width: 600px;
            background-color: #1f1f1f; /* Kontainer gelap */
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 5px 30px rgba(0, 255, 85, 0.5); /* Bayangan hijau */
            margin: auto;
            transition: transform 0.3s ease;
        }

        .container:hover {
            transform: scale(1.02); /* Efek zoom saat hover */
        }

        /* Heading */
        h1 {
            text-align: center;
            color: #00e676; /* Hijau Cyber */
            font-size: 2.5em;
            margin-bottom: 30px;
            font-weight: bold;
            text-shadow: 3px 3px 10px rgba(0, 255, 85, 0.7); /* Efek cahaya pada teks */
        }

        /* Form Label */
        .form-label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #64b5f6; /* Biru muda */
        }

        /* Form Input Control */
        .form-control {
            background-color: #333;
            color: #ffffff;
            border: 1px solid #00e676; /* Border hijau cyber */
            border-radius: 5px;
            padding: 12px;
            width: 100%;
            margin-bottom: 20px;
            transition: border-color 0.3s ease;
            font-size: 1em;
        }

        .form-control::placeholder {
            color: #bbb;
        }

        .form-control:focus {
            border-color: #00e676; /* Border hijau cyber saat fokus */
            outline: none;
            background-color: #444; /* Background lebih terang saat fokus */
        }

        /* Button */
        button[type="submit"] {
            background-color: #00e676; /* Hijau Cyber */
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 15px;
            width: 100%;
            cursor: pointer;
            font-weight: bold;
            font-size: 1.2em;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button[type="submit"]:hover {
            background-color: #00c853; /* Warna hijau lebih gelap */
            transform: translateY(-2px); /* Efek tombol mengangkat */
        }

        /* File Input */
        .form-group small {
            color: #bbb;
            font-size: 0.9em;
        }

        .form-group .file-link {
            color: #00e676; /* Link hijau cyber */
        }

        .form-group .file-link:hover {
            color: #00c853; /* Hover link hijau lebih gelap */
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 2em;
            }

            button[type="submit"] {
                padding: 12px;
                font-size: 1em;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Certificate</h1>

        <form action="{{ route('admin.certificate.update', $certif->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name" class="form-label">Certificate Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $certif->name) }}" required>
            </div>

            <div class="form-group">
                <label for="issued_by" class="form-label">Issued By</label>
                <input type="text" id="issued_by" name="issued_by" class="form-control" value="{{ old('issued_by', $certif->issued_by) }}" required>
            </div>

            <div class="form-group">
                <label for="issued_at" class="form-label">Issued At</label>
                <input type="date" id="issued_at" name="issued_at" class="form-control" value="{{ old('issued_at', $certif->issued_at) }}" required>
            </div>

            <div class="form-group">
                <label for="file" class="form-label">Certificate File</label>
                <input type="file" id="file" name="file" class="form-control">
                <small>Current file: <a href="{{ asset('storage/' . $certif->file) }}" target="_blank" class="file-link">View Certificate</a></small>
            </div>

            <button type="submit">Update Certificate</button>
        </form>
    </div>
</body>

</html>
