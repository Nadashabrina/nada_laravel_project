<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skills Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Basic Reset */
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #4e73df, #1cc88a); /* Gradient Background */
            margin: 0;
            padding: 0;
            color: #fff;
        }

        .container {
        max-width: 1200px;
        margin: 50px auto;
        padding: 50px;
        background-color: #2c3e50;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1); /* Bayangan lebih dramatis */
        overflow: hidden;
        color: #333;
        position: relative;
        z-index: 1;
        border: 1px solid #ddd; /* Border tipis yang halus */
    }

    /* Menambahkan efek hover pada container untuk memberikan kesan interaktif */
    .container:hover {
        transform: translateY(-5px); /* Efek sedikit terangkat saat hover */
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.2); /* Bayangan lebih dalam */
        transition: all 0.3s ease;
    }

    /* Efek internal Glow */
    .container::before {
        content: '';
        position: absolute;
        top: -10px;
        left: -10px;
        right: -10px;
        bottom: -10px;
        background: rgba(0, 200, 83, 0.1); /* Glow dengan warna hijau */
        border-radius: 20px;
        z-index: -1;
    }
        h1 {
            text-align: center;
            color: #2196F3;
            font-size: 40px;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .btn-primary {
            background-color: #2196F3;
            color: #fff;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .btn-primary i {
            margin-right: 10px;
        }

        .btn-primary:hover {
            background-color: #1e88e5;
            transform: translateY(-2px);
        }

        /* Table Styling */
        .table-responsive {
            margin-top: 40px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: 700;
        }

        td {
            background-color: #f9f9f9;
            color: #333;
        }

        tr:hover td {
            background-color: #e0f2f1;
            cursor: pointer;
        }

        /* Buttons inside table */
        .btn-warning, .btn-danger {
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            font-weight: 600;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
        }

        .btn-warning i, .btn-danger i {
            margin-right: 8px;
        }

        .btn-warning {
            background-color: #FFEB3B;
            color: #333;
        }

        .btn-warning:hover {
            background-color: #FF9800;
        }

        .btn-danger {
            background-color: #F44336;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #D32F2F;
        }

        /* Style for File Link (View Certificate) */
        .file-link {
            color: #4CAF50;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .file-link:hover {
            color: #388E3C;
            transform: translateY(-2px);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            h1 {
                font-size: 28px;
            }

            th, td {
                font-size: 12px;
                padding: 10px;
            }

            .btn-primary, .btn-warning, .btn-danger {
                font-size: 12px;
                padding: 8px 12px;
            }

            .container {
                padding: 20px;
                margin: 20px;
            }
        }

        /* Smooth Transition for Button Hover */
        a, button {
            transition: transform 0.2s ease;
        }

        a:hover, button:hover {
            transform: scale(1.05);
        }


        
    </style>
</head>

<body>
    <div class="container">
        <h1>Certificate Management</h1>
        <a href="{{ route('admin.certificate.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Create Certificate
        </a>

        <div class="table-responsive">
            <table id="skillsTable" class="table display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Issued By</th>
                        <th>Issued At</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($certificates as $certif)
                    <tr>
                        <td>{{ $certif->id }}</td>
                        <td>{{ $certif->name }}</td>
                        <td>{{ $certif->issued_by }}</td>
                        <td>{{ $certif->issued_at }}</td>
                        <td>
                            @if($certif->file)
                            <a href="{{ asset('storage/' . $certif->file) }}" target="_blank" class="file-link">View Certificate</a>
                            @else
                            No file uploaded
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.certificate.edit', $certif) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.certificate.destroy', $certif) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            $('#skillsTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true
            });

            // SweetAlert2 Confirmation for Delete
            const deleteForms = document.querySelectorAll('form[method="POST"]');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function (event) {
                    event.preventDefault(); // Prevent the default form submission
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#4CAF50',
                        cancelButtonColor: '#F44336',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit the form after confirmation
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
        });
    </script>
</body>

</html>
