<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman About</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
    /* General Styles */
    body {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        background: #121212;
        color: #fff;
    }

    /* Header Section */
    header {
        background: linear-gradient(135deg, #00FF95, #00D1FF);
        color: white;
        text-align: center;
        padding: 20px 0;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    h1 {
        font-size: 32px;
        margin: 0;
        font-weight: bold;
    }

    /* Tombol Panah Kembali */
    .back-arrow-btn {
        padding: 10px;
        background-color: #00D1FF;
        color: #fff;
        border: 2px solid #00D1FF;
        border-radius: 50%;
        font-size: 18px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin: 15px;
        position: absolute;
        top: 3px; /* Mengatur posisi ke atas */
        left: 1px; /* Mengatur posisi ke kiri */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    }

    .back-arrow-btn:hover {
        background-color: #00B0D9;
        box-shadow: 0 0 20px #00B0D9, 0 0 30px #00B0D9;
        transform: scale(1.05);
    }

    .back-arrow-btn i {
        transition: transform 0.3s ease;
    }

    .back-arrow-btn:hover i {
        transform: translateX(-3px);
    }

    /* Container with Flexbox */
    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 20px;
        margin: 20px;
        padding-top: 60px; /* Menambahkan ruang untuk tombol panah */
    }

    /* Content Section */
    .content {
        flex: 2;
        background-color: rgba(255, 255, 255, 0.1);
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.2);
        max-width: 70%;
    }

    .content h2 {
        font-size: 28px;
        color: #00FF95;
        margin-bottom: 10px;
    }

    .content p {
        font-size: 16px;
        color: #ccc;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    /* Sidebar Section */
    .sidebar {
        flex: 1;
        background-color: rgba(255, 255, 255, 0.1);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.2);
        max-width: 25%;
    }

    .sidebar h3 {
        font-size: 20px;
        color: #00FF95;
        margin-bottom: 15px;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
    }

    .sidebar ul li {
        margin: 12px 0;
    }

    .sidebar ul li a {
        color: #fff;
        text-decoration: none;
        font-size: 16px;
        transition: color 0.3s ease;
    }

    .sidebar ul li a:hover {
        color: #00D1FF;
        text-decoration: underline;
    }

    /* Button Styles */
    button.neon-btn, button.edit-btn, button.delete-btn {
        padding: 10px 20px;
        font-size: 14px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        margin: 10px 0;
        width: 100%;
    }

    button.neon-btn {
        background-color: transparent;
        color: #00FF95;
        border: 2px solid #00FF95;
    }

    button.neon-btn:hover {
        background-color: #00FF95;
        color: #121212;
        box-shadow: 0 0 20px #00FF95, 0 0 30px #00FF95, 0 0 40px #00FF95;
        transform: scale(1.05);
    }

    button.edit-btn {
        background-color: #444444;
        color: #fff;
        border: 1px solid #666666;
    }

    button.edit-btn:hover {
        background-color: #666666;
        color: #f1f1f1;
        border-color: #888888;
        transform: scale(1.05);
    }

    button.delete-btn {
        background-color: #d32f2f;
        color: #fff;
        border: 1px solid #b71c1c;
    }

    button.delete-btn:hover {
        background-color: #b71c1c;
        color: #fff;
        border-color: #f44336;
        transform: scale(1.05);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }

        .content, .sidebar {
            flex: 1 1 100%;
            margin-bottom: 20px;
        }

        .content {
            max-width: 100%;
        }

        .sidebar {
            max-width: 100%;
        }
    }
    </style>
</head>
<body>

    <header>
        <h1>Halaman About</h1>
    </header>

    <!-- Tombol Panah Kembali ke Dashboard Admin -->
    <a href="{{ route('admin.dashboard') }}">
        <button class="back-arrow-btn">
            <i class="fas fa-arrow-left"></i>
        </button>
    </a>

    <div class="container">
        <!-- Content Area -->
        <div class="content">
            <!-- Tombol untuk menuju form pembuatan About -->
            <a href="{{ route('admin.about.create') }}">
                <button class="neon-btn">Buat Halaman About</button>
            </a>

            @if($about)
                <h2>{{ $about->title }}</h2>
                <p>{{ $about->content }}</p>

                <!-- Tombol Edit -->
                <a href="{{ route('admin.about.edit', $about->id) }}">
                    <button class="edit-btn">Edit Halaman About</button>
                </a>

                <!-- Tombol Hapus -->
                <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus halaman ini?')" class="delete-btn">Hapus Halaman About</button>
                </form>
            @else
                <p>Belum ada informasi tentang kami.</p>
            @endif
        </div>

        <!-- Sidebar Area -->
        <div class="sidebar">
            <h3>Informasi Penting</h3>
            <ul>
                <li><a href="{{ route('admin.certificate.index') }}">Certificate</a></li>
                <li><a href="{{ route('admin.contacts.index') }}">Contact</a></li>
                <li><a href="{{ route('skill.index') }}">Skills</a></li>
            </ul>
        </div>
    </div>

</body>
</html>
