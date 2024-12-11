<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Background and page style */
        body {
            background: linear-gradient(135deg, #0a192f, #4e5b73); /* Cyberpunk Gradient */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #f1f1f1;
            overflow-x: hidden;
        }

        .container {
            background-color: #1e2a35;
            border-radius: 12px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            padding: 40px;
            margin-top: 50px;
            animation: slideIn 0.8s ease-out;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #D9A8B3; /* Neon Green */
            margin-bottom: 30px;
            text-align: center;
            text-shadow: 0 0 10px rgba(0, 255, 153, 0.8); /* Neon Glow */
        }

        /* Form Elements */
        .form-label {
            font-size: 1.1rem;
            font-weight: 600;
            color: #c9d1d9;
        }

        .form-control {
            border-radius: 8px;
            font-size: 1rem;
            border: 1px solid #4e5b73;
            padding: 12px;
            background-color: #2e3b49;
            color: #f1f1f1;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #D9A8B3; /* Neon Green */
            box-shadow: 0 0 0 0.2rem rgba(0, 255, 153, 0.5);
        }

        textarea.form-control {
            resize: vertical;
        }

        .btn {
            border-radius: 50px;
            padding: 12px 25px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #D9A8B3; /* Neon Green */
            border: none;
        }

        .btn-primary:hover {
            background-color: #00cc7a; /* Darker Neon Green */
            transform: scale(1.05);
        }

        .btn-secondary {
            background-color: #4e5b73;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #394c61;
            transform: scale(1.05);
        }

        .mb-3 {
            margin-bottom: 1.5rem;
        }

        .mb-4 {
            margin-bottom: 2rem;
        }

        /* Animation for form */
        @keyframes slideIn {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* Glowing Text Effect */
        .glow-text {
            color: #D9A8B3;
            text-shadow: 0 0 10px rgba(0, 255, 153, 0.8);
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="glow-text">Edit Contact</h1>
    <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $contact->name }}" required>
        </div>

        <!-- Email Field -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email }}" required>
        </div>

        <!-- Phone Field -->
        <div class="mb-3">
            <label for="notelp" class="form-label">Phone</label>
            <input type="text" class="form-control" id="notelp" name="notelp" value="{{ $contact->notelp }}" required>
        </div>

        <!-- Description Field -->
        <div class="mb-4">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $contact->description }}</textarea>
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>

<!-- Bootstrap Icons -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.min.js"></script>

</body>
</html>
