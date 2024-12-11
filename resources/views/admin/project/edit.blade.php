<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Proyek</title>

    <!-- Link to Google Fonts and Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
            color: #333;
            padding: 30px;
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .alert {
            background-color: #27ae60;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #2ecc71;
            text-align: center;
        }

        /* Form Styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-weight: 600;
            font-size: 1.1rem;
        }

        input, textarea {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="file"] {
            padding: 5px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            font-weight: 600;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .back-btn {
            display: inline-block;
            padding: 12px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 20px;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .back-btn:hover {
            background-color: #2980b9;
        }

        .image-preview {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        .image-preview img {
            max-width: 150px;
            border-radius: 5px;
        }

        .error-message {
            color: #e74c3c;
            font-size: 0.9rem;
            margin-top: 5px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Edit Proyek</h1>

        @if(session('success'))
            <div class="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Back to Project List -->
        <a href="{{ route('admin.project.index') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar Proyek
        </a>

        <!-- Form for editing project -->
        <form action="{{ route('admin.project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="title">Judul Proyek:</label>
                <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}" required>
                @error('title')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="description">Deskripsi:</label>
                <textarea id="description" name="description" required>{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="tools">Alat/Tools:</label>
                <input type="text" id="tools" name="tools" value="{{ old('tools', $project->tools) }}">
                @error('tools')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="image">Gambar Proyek (Opsional):</label>
                <input type="file" id="image" name="image">
                @if($project->image_path)
                    <div class="image-preview">
                        <p>Gambar Saat Ini:</p>
                        <img src="{{ asset('storage/' . $project->image_path) }}" alt="Current Image">
                    </div>
                @endif
                @error('image')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">
                Perbarui Proyek
            </button>
        </form>
    </div>

</body>
</html>
