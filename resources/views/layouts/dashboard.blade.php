<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #343a40;
            padding-top: 20px;
        }

        .sidebar a {
            color: #fff;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            font-size: 15px;
        }

        .sidebar a:hover,
        .sidebar .active {
            background: #495057;
        }

        .content {
            margin-left: 240px;
            padding: 30px;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-white text-center">Dashboard</h4>
        <hr class="bg-secondary">

        <a href="{{ route('admin.dashboard') }}" class="active">🏠 Home</a>
        <a href="{{ route('admin.users.index') }}">👥 Users</a>
        <a href="{{ route('admin.doctors.index') }}">🩺 Doctors</a>

        <!-- ⭐ Added Doctor Schedules Link -->
        <a href="{{ route('admin.schedules.index') }}">📅 Doctor Schedule</a>

        <a href="#">⚙️ Settings</a>
        <a href="#">🚪 Logout</a>
    </div>

    <!-- Page Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
