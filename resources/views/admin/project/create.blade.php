<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Proyek Baru</title>
    <!-- Link ke CSS atau framework yang Anda gunakan -->
</head>
<body>
    <h1>Tambah Proyek Baru</h1>

    <!-- Menampilkan pesan sukses setelah form berhasil disubmit -->
    @if(session('success'))
        <div style="color: green;">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="title">Judul Proyek:</label>
            <input type="text" name="title" id="title" required value="{{ old('title') }}">
            @error('title')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Deskripsi:</label>
            <textarea name="description" id="description" required>{{ old('description') }}</textarea>
            @error('description')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="tools">Alat/Tools (Opsional):</label>
            <input type="text" name="tools" id="tools" value="{{ old('tools') }}">
            @error('tools')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="image">Gambar (Opsional):</label>
            <input type="file" name="image" id="image">
            @error('image')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 15px; border-radius: 5px;">Simpan Proyek</button>
        </div>
    </form>

    <br>
    <a href="{{ route('admin.project.index') }}" style="text-decoration: none; color: #4CAF50;">Kembali ke Daftar Proyek</a>
</body>
</html>
