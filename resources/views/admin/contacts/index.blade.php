<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.2/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        /* Global Styling */
        body {
            background: linear-gradient(135deg, #4e73df, #1cc88a); /* Gradient Background */
            font-family: 'Roboto', sans-serif;
            color: #fff;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: #2c3e50;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 1200px;
            padding: 30px;
        }

        h1 {
            text-align: center;
            color: #fff;
            font-weight: bold;
            margin-bottom: 40px;
            font-size: 2.5rem;
        }

        .btn {
            font-size: 16px;
            padding: 12px 24px;
            border-radius: 50px;
            letter-spacing: 0.5px;
            transition: all 0.3s ease-in-out;
            text-transform: uppercase;
            font-weight: bold;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #1cc88a;
            border: none;
        }

        .btn-primary:hover {
            background-color: #17a673;
            transform: translateY(-3px);
        }

        .card {
            background-color: #34495e;
            border-radius: 12px;
            padding: 20px;
            margin: 20px 0;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .card-title {
            color: #fff;
            font-size: 1.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .card-title i {
            margin-right: 10px; /* Spacing between icon and name */
        }

        .card-subtitle {
            color: #ecf0f1;
            margin-top: 5px;
        }

        .card-body p {
            color: #ecf0f1;
            font-size: 1rem;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }

        .btn-action {
            padding: 10px 15px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 500;
        }

        .btn-warning {
            background-color: #f39c12;
            border: none;
        }

        .btn-danger {
            background-color: #e74c3c;
            border: none;
        }

        .btn-warning:hover {
            background-color: #e67e22;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 2rem;
            }

            .card {
                margin: 15px 0;
            }
        }

    </style>
</head>
<body>
<div class="container">
    <h1>Contact List</h1>

    <!-- Button for Adding Contact -->
    <div class="text-center mb-4">
        <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary">
            <i class="fas fa-user-plus"></i> Add New Contact
        </a>
    </div>

    <!-- Display Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Card Grid to Display Contacts -->
    <div class="row">
        @foreach($contacts as $contact)
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-user"></i> {{ $contact->name }}
                        </h5>
                        <h6 class="card-subtitle mb-2">{{ $contact->email }}</h6>
                        <p class="card-text"><strong>Phone:</strong> {{ $contact->notelp }}</p>
                        <p class="card-text">{{ $contact->description }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.contacts.edit', $contact->id) }}" class="btn btn-warning btn-action">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <!-- Delete Form with SweetAlert -->
                        <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" style="display:inline;" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-action">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.2/dist/sweetalert2.all.min.js"></script>

<script>
    // Check if session contains success message for Edit or Delete
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            showConfirmButton: true,
        });
    @endif

    // Delete confirmation with SweetAlert
    const deleteForms = document.querySelectorAll('.delete-form');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent form submission

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form
                    form.submit();
                }
            });
        });
    });
</script>

</body>
</html>
