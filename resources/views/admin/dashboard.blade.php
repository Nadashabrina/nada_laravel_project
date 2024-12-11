 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/admin.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        font-family: 'Arial', sans-serif;
        background-color: #0d1b2a;
        color: #e0e1dd;
        display: flex;
        min-height: 100vh;
        transition: background-color 0.5s ease, color 0.5s ease;
    }
/* Transisi halus */
    .sidebar, .main-content, .header, table, th, td {
        transition: background-color 0.5s ease, color 0.5s ease;
    }

    /* Sidebar */
    .sidebar {
        width: 250px;
        background-color: #ffffff; /* Warna dasar gelap */
        color: #fe6694;
        display: flex;
        flex-direction: column;
        padding: 20px;
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        border-right: 2px solid #4cc9f0; /* Border berwarna biru terang */
        box-shadow: 3px 0 10px rgba(0, 0, 0, 0.5);
    }

    /* Judul sidebar */
    .sidebar h2 {
        text-align: center;
        margin-bottom: 30px;
        font-size: 22px;
        color: #D9A8B3; /* Biru terang */
        text-transform: uppercase;
        letter-spacing: 1.5px;
    }

    /* Tautan di sidebar */
    .sidebar a {
        display: flex;
        align-items: center;
        color: #D9A8B3; /* Warna teks */
        padding: 12px;
        text-decoration: none;
        margin: 10px 0;
        transition: background 0.3s, color 0.3s;
        border-radius: 5px;
        font-size: 16px;
    }

    /* Ikon di tautan */
    .sidebar a i {
        margin-right: 10px;
        font-size: 1.2rem;
        color: #4cc9f0; /* Ikon berwarna biru terang */
    }

    /* Efek hover pada tautan */
    .sidebar a:hover {
        background: #415a77; /* Kembali ke warna hover sebelumnya */
        color: #4cc9f0; /* Warna teks saat hover */
        box-shadow: inset 5px 0 0 #4cc9f0; /* Efek shadow dalam */
    }

    /* Main Content dan header bisa tetap sesuai yang sebelumnya */
    .main-content {
        /* Tambahkan gaya untuk konten utama jika perlu */
    }
    /* Toggle Button */
    .toggle-btn {
        padding: 8px;
        background-color: #4cc9f0;
        color: #1b263b;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s, color 0.3s;
        box-shadow: 0 4px 10px rgba(76, 201, 240, 0.4);
        margin-top: -35px;
        margin-left: -0px;
    }
    .toggle-btn i {
        font-size: 1.2rem;
        transition: transform 0.5s ease, color 0.5s ease;
    }
    .toggle-btn:hover {
        background-color: #3a86ff;
        transform: scale(1.05);
    }

    /* Main Content */
    .main-content {
        margin-left: 250px;
        padding: 20px;
        width: calc(100% - 250px);
        display: flex;
        flex-direction: column;
        gap: 20px;
        background-color: #D9A8B3;
        color: white;
    }

    /* Light Mode */
    .light-mode {
        background-color: #f0f0f0;
        color: #1b263b;
    }
    .light-mode .sidebar {
        background-color: #e0e1dd;
        color: #1b263b;
        border-right-color: #3a86ff;
    }
    .light-mode .sidebar a {
        color: #1b263b;
    }
    .light-mode .sidebar a:hover {
        background-color: #f5f5f5;
    }
    .light-mode .main-content {
        background-color: #f9f9f9;
    }
    .light-mode .header {
        background-color: #e0e1dd;
        color: #3a86ff;
    }
    .light-mode table th {
        background-color: #3a86ff;
        color: #f9f9f9;
    }

    .header {
        background-color: #fff;
        color: #D9A8B3;
        padding: 15px;
        text-align: center;
        font-size: 1.8rem;
        border: 2px solid #415a77;
        border-radius: 8px;
        margin-bottom: 20px;
        position: relative;
        text-transform: uppercase;
        letter-spacing: 1.2px;
    }
.button {
    padding: 10px 15px;
    background-color: #4cc9f0;
    color: #0a192f;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    text-align: center;
    text-decoration: none;
    transition: background-color 0.3s;
    display: inline-block;
    position: relative;
}
.button:hover {
    background-color: #3a86ff;
}
.button.loading::after {
    content: '';
    position: absolute;
    right: 10px;
    top: 50%;
    width: 16px;
    height: 16px;
    margin-top: -8px;
    border: 2px solid white;
    border-top: 2px solid transparent;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}
@keyframes spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

/* Table Style */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}
th, td {
    border: 2px solid #4cc9f0;
    padding: 12px 15px;
    text-align: left;
    color: #000;
}
th {
    background-color: #4cc9f0;
    color: #0a192f;
    text-transform: uppercase;
}
tr {
    background-color: #fff;
    transition: background-color 0.3s;
}
tr:hover {
    background-color: #415a77;
}
/* Table Header Hover Effect */
th:hover {
    background-color: #3a86ff;
}
/* Responsive */
@media (max-width: 768px) {
    .sidebar {
        width: 200px;
    }
    .main-content {
        margin-left: 200px;
        width: calc(100% - 200px);
    }
}
@media (max-width: 576px) {
    .sidebar {
        width: 100%;
        position: relative;
        height: auto;
    }
    .main-content {
        margin-left: 0;
        width: 100%;
    }
}

</style>

</head>
<body>
<div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="{{ route('admin.about.index') }}"><i class="fas fa-info-circle"></i> About</a>
    <a href="{{ route('admin.project.index') }}"><i class="fas fa-project-diagram"></i> Project</a>
    <a href="{{ route('skill.index') }}"><i class="fas fa-pencil-alt"></i> Edit Skill</a>
    <a href="{{ route('admin.certificate.index') }}"><i class="fas fa-scroll"></i> Certificate</a>
    <a href="{{ route('admin.contacts.index') }}" class="btn btn-primary"><i class="fas fa-address-book"></i> Lihat Kontak
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="fas fa-sign-out-alt"></i> Logout
</a>

</div>
    
<div class="main-content">
    <div class="header">
        Welcome to Admin Dashboard
        <div class="toggle-btn" id="theme-toggle">
            <i class="fas fa-moon"></i>
        </div>
    </div>

<!-- SweetAlert2 CSS and JavaScript -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4/animate.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Theme Toggle and SweetAlert for Dark/Light Mode
    document.getElementById('theme-toggle').addEventListener('click', function () {
        document.body.classList.toggle('light-mode');
        let icon = this.querySelector('i');
        
        // Rotate and toggle icons
        icon.classList.toggle('fa-moon');
        icon.classList.toggle('fa-sun');
        icon.style.transition = 'transform 0.8s ease';
        icon.style.transform = document.body.classList.contains('light-mode') ? 'rotate(360deg)' : 'rotate(-360deg)';
        
        Swal.fire({
            title: document.body.classList.contains('light-mode') ? 'Light Mode Activated!' : 'Dark Mode Activated!',
            icon: 'info',
            iconColor: '#4cc9f0',
            confirmButtonText: 'OK',
            confirmButtonColor: '#4cc9f0',
            background: document.body.classList.contains('light-mode') ? '#e0e1dd' : '#1b263b',
            color: document.body.classList.contains('light-mode') ? '#1b263b' : '#e0e1dd',
            showClass: { popup: 'animate__animated animate__fadeInDown' },
            hideClass: { popup: 'animate__animated animate__fadeOutUp' },
            backdrop: 'rgba(0, 0, 0, 0.4)', // Blur effect for focus on popup
        });
    });

    // Show welcome popup on page load
    window.onload = showWelcomePopup;

    // Function to show row details when table row is clicked
    document.querySelectorAll('tbody tr').forEach(row => {
        row.addEventListener('click', () => showRowDetails(row));
    });

    // Show Welcome Popup
    function showWelcomePopup() {
        Swal.fire({
            title: 'Welcome Back, Sir!',
            text: 'You can manage your data from here!',
            icon: 'success',
            confirmButtonText: 'Let\'s Go!',
            background: '#1b263b',
            color: '#e0e1dd',
            iconColor: '#4cc9f0',
            confirmButtonColor: '#4cc9f0',
            backdrop: 'rgba(0, 0, 0, 0.5)',
            showClass: { popup: 'animate__animated animate__fadeInDown' },
            hideClass: { popup: 'animate__animated animate__fadeOutUp' },
            customClass: { popup: 'custom-popup' }
        });
    }

    // Function to show row details in a SweetAlert popup
    function showRowDetails(row) {
        const rowData = row.querySelectorAll('td');
        
        Swal.fire({
            title: 'Detail: ' + rowData[1].innerText,
            text: rowData[2].innerText,
            icon: 'info',
            background: '#1b263b',
            color: '#e0e1dd',
            confirmButtonColor: '#4cc9f0',
            showClass: { popup: 'animate__animated animate__bounceIn' },
            hideClass: { popup: 'animate__animated animate__bounceOut' },
            backdrop: 'rgba(0, 0, 0, 0.4)' // Slightly darker backdrop for detail view
        });
    }

    // Add Custom CSS for popup styling
    const style = document.createElement('style');
    style.innerHTML = `
        .custom-popup {
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.6);
            padding: 1em 1.5em;
            font-family: Arial, sans-serif;
            font-size: 1rem;
        }
    `;
    document.head.appendChild(style);
</script>

</body>
</html>
