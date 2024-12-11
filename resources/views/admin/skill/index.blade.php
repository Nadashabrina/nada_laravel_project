<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skills Management</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #121212;
            color: #e0e0e0;
            line-height: 1.6;
            padding-bottom: 50px;
            font-size: 16px;
            overflow-x: hidden;
            
        }

        /* Header Section */
        .header {
            background: linear-gradient(135deg, #00bcd4, #008080);
            color: white;
            padding: 100px 20px;
            text-align: center;
            border-bottom: 4px solid #00bcd4;
            box-shadow: 0px 10px 50px rgba(0, 188, 212, 0.3);
            margin-bottom: 50px;
        }

        .header h1 {
            font-size: 4rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 20px;
            text-shadow: 0px 0px 15px rgba(0, 188, 212, 0.7);
        }

        .header p {
            font-size: 1.2rem;
            font-weight: 300;
            margin-bottom: 30px;
        }

        
        .skill-actions {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            align-items: center; /* Menjaga tombol tetap di tengah secara vertikal */
        }

        /* Skills Cards */
        .skills-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 40px;
            padding: 30px 20px;
        }

        .skill-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .skill-card:hover {
            transform: translateY(-10px);
            box-shadow: 0px 15px 50px rgba(0, 0, 0, 0.4);
        }

        .skill-card h2 {
            font-size: 2rem;
            color: #00bcd4;
            margin-bottom: 20px;
            font-weight: 600;
            text-transform: capitalize;
        }

        .skill-card p {
            font-size: 1.1rem;
            color: #ddd;
            margin-bottom: 50px;
        }


        
        /* Floating Action Button (FAB) */
        .fab {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #00bcd4;
            padding: 15px;
            border-radius: 50%;
            font-size: 1.8rem;
            color: white;
            text-align: center;
            box-shadow: 0px 5px 30px rgba(0, 188, 212, 0.3);
            transition: all 0.3s ease;
        }

        .fab:hover {
            transform: scale(1.1);
            background-color: #008080;
        }

        .skill-actions {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

/* Umum untuk tombol */
.btn {
    font-size: 1rem;
    padding: 12px 20px;
    border-radius: 30px;
    transition: 0.3s ease;
    text-decoration: none;
    display: inline-block; /* Supaya tombol memiliki lebar otomatis */
    width: 100%; /* Membuat tombol lebar penuh dalam kontainer, agar tidak meluber */
    text-align: center; /* Pastikan teks di tengah */
    min-width: 120px; /* Menjaga ukuran tombol tidak terlalu kecil */
}

/* Styling khusus untuk tombol edit */
.btn-edit {
    background-color: #673ab7;
    color: white;
    box-shadow: 0 5px 15px rgba(103, 58, 183, 0.3);
}

/* Hover effect untuk tombol edit */
.btn-edit:hover {
    background-color: #512da8;
    transform: scale(1.05);
    box-shadow: 0 10px 30px rgba(103, 58, 183, 0.4);
}

/* Styling khusus untuk tombol delete */
.btn-delete {
    background-color: #f44336;
    color: white;
    box-shadow: 0 5px 15px rgba(244, 67, 54, 0.3);
}

/* Hover effect untuk tombol delete */
.btn-delete:hover {
    background-color: #e53935;
    transform: scale(1.05);
    box-shadow: 0 10px 30px rgba(244, 67, 54, 0.4);
}

/* Kontainer yang menampung kedua tombol Edit dan Delete */
.skill-actions {
    display: flex;
    justify-content: space-between;  /* Membuat tombol tersebar dengan jarak di antara */
    gap: 10px; /* Jarak antara tombol */
    align-items: center; /* Menjaga tombol tetap sejajar vertikal */
    width: 100%; /* Pastikan kontainer mengambil seluruh lebar */
}

/* Menjaga tombol di dalam skill card agar terlihat sejajar secara vertikal */
.skill-card {
    display: flex;
    flex-direction: column; /* Membuat elemen-elemen dalam skill card disusun secara vertikal */
    justify-content: space-between; /* Memberi jarak antar elemen dalam skill card */
    height: 100%; /* Membuat card memiliki tinggi penuh */
}

/* Untuk tombol dalam tooltip */
.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 5px;
    padding: 5px;
    position: absolute;
    z-index: 1;
    bottom: 100%;
    left: 50%;
    margin-left: -60px;
    opacity: 0;
    transition: opacity 0.3s;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}
        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2.5rem;
            }

            .skills-wrapper {
                grid-template-columns: 1fr 1fr;
                gap: 30px;
            }

            .btn-create {
                font-size: 1rem;
                padding: 12px 25px;
            }
        }
    </style>
</head>

<body>

    <!-- Header Section -->
    <div class="header">
        <h1>Skills Management</h1>
        <p>Enhance Your Abilities and Track Your Progress</p>
    </div>

    <!-- Skills Cards Section -->
    <div class="skills-wrapper">
        @foreach ($skills as $skill)
        <div class="skill-card">
            <h2>{{ $skill->name }}</h2>
            <p>{{ $skill->description }}</p>

            <div class="skill-actions">
                <div class="tooltip">
                    <a href="{{ route('skill.edit', $skill) }}" class="btn btn-edit"><i class="fas fa-edit"></i> Edit</a>
                    <span class="tooltiptext">Edit Skill</span>
                </div>

                <form action="{{ route('skill.destroy', $skill) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <div class="tooltip">
                        <button type="submit" class="btn btn-delete"><i class="fas fa-trash-alt"></i> Delete</button>
                        <span class="tooltiptext">Delete Skill</span>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Floating Action Button (FAB) -->
    <a href="{{ route('skill.create') }}" class="fab">
        <i class="fas fa-plus"></i>
    </a>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Animate Progress Bar based on the skill level

        // SweetAlert2 Confirmation for Delete
        const deleteForms = document.querySelectorAll('form[method="POST"]');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#00bcd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // SweetAlert2 Success Message after deletion
        @if (session('success'))
        Swal.fire({
            title: 'Success!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
        @endif
    </script>

</body>

</html>
