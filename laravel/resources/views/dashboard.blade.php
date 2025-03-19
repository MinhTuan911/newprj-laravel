{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1>Welcome, {{ Auth::user()->name }}</h1>
    <a href="{{ route('logout') }}">Logout</a>
    @yield('content')
</body>

</html> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    .logo {
        height: 72px;
        margin-right: 10px;
    }

    .navbar {
        padding: 0px !important;
        background: #000;
        position: fixed !important;
        /* Đảm bảo navbar cố định */
        top: 0;
        left: 0;
        width: 100%;
        z-index: 9;
        /* Đảm bảo navbar nằm trên cùng */
        background: #000;
        /* Giữ màu nền khi cuộn */
    }

    .logo3d {
        width: 100px;
        height: 50px;
        position: relative;
        perspective: 500px;
    }

    .logo3d a {
        display: block;
        width: 100%;
        height: 100%;
        position: relative;
        transition: 0.3s;
        transform-style: preserve-3d;
    }

    .logo3d a,
    .logo3d .bot,
    .logo3d .front {
        position: absolute;
        inset: 0;
    }

    .logo3d .bot {
        transform: rotateX(-90deg) translateZ(25px);
    }

    .logo3d .front {
        transform: translateZ(25px);
    }

    .logo3d:hover a {
        transform: rotateX(90deg);
    }

    .logo3d img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    a:hover i.fas {
        color: rgb(255, 215, 0);
    }

    /* Sidebar Styling */
    .sidebar {
        width: 292px;
        height: 100vh;
        position: fixed;
        left: -292px;
        top: 0;
        background: #000;
        padding-top: 20px;
        transition: all 0.4s ease-in-out;
        z-index: 1000;
    }

    .sidebar a {
        color: white;
        padding: 10px;
        text-decoration: none;
        display: block;
        margin: 10px 0 0 10px;
    }

    .sidebar a:hover {
        background: #495057;
        /* Xám đậm */
        color: rgb(255, 215, 0);
    }

    .sidebar .nav-link {
        font-size: 16px;
    }

    /* Toggle Button */
    .toggle-btn {
        position: fixed;
        left: 10px;
        top: 0px;
        font-size: 24px;
        cursor: pointer;
        color: white;
        background: rgba(0, 0, 0, 0.2);
        border: none;
        padding: 10px;
        border-radius: 5px;
        z-index: 1100;
    }

    /* Khi sidebar mở */
    .sidebar.active {
        left: 0;
    }

    /* Nội dung chính */
    .content {
        margin-left: 0;
        padding: 20px;
        transition: all 0.3s ease-in-out;
    }

    .content.shifted {
        margin-left: 292px;
    }

    a:hover p.welcome {
        color: #fff;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid d-flex justify-content-between align-items-center mx-5">
            <div class="d-flex align-items-center">
                <a href="dashboard">
                    <img src="{{ asset('images/logo_1.svg') }}" alt="TSM Model" class="logo bg-white">
                </a>
                <div class="logo3d">
                    <a href="#">
                        <div class="bot">
                            <img src="{{ asset('images/logo_3-w.svg') }}" alt="MINI GT" style="background: #000">
                        </div>
                        <div class="front">
                            <img src="{{ asset('images/logo_3-w.svg') }}" alt="MINI GT" style="background: #000">
                        </div>
                    </a>
                </div>
            </div>
            <a href="#" style="color: rgb(137, 137, 137);
            list-style: none;
            text-decoration: none; margin-top: 10px">
                <p class="welcome">Welcome to the new website of TSM-Model brand, please feel free to look around!</p>
            </a>
            <div class="d-flex align-items-center">
                <a href="#" class="text-light"><i class="fas fa-user" style='font-size:20px'></i></a>
                <a href="#" class="text-secondary mx-3">|</a>
                <a href="{{ route('viewcart') }}" class="text-light position-relative">
                    <i class="fas fa-shopping-cart" style='font-size:20px'></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ session('cart') ? count(session('cart')) : 0 }}
                    </span>
                </a>
            </div>
        </div>
    </nav>
    <!-- Toggle Button -->
    <button class="toggle-btn" id="toggle-btn"><i class="fas fa-bars bg-dark "></i></button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <a href="#" class="navbar-brand text-white text-center mb-3" style="pointer-events: none;
    cursor: default;"></a>
        <a href="dashboard" class="nav-link"><i class="fas fa-home"></i> Home</a>

        <!-- Dropdown for User -->
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#userMenu">
                <i class="fas fa-user"></i> User
            </a>
            <ul class="collapse list-unstyled" id="userMenu">
                <li><a class="dropdown-item" href="{{ route('register') }}">Add User</a></li>
                <li><a class="dropdown-item" href="{{ route('listuser') }}">List User</a></li>
            </ul>
        </div>

        <!-- Dropdown for Manufacture -->
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#manufactureMenu">
                <i class="fas fa-industry"></i> Manufacture
            </a>
            <ul class="collapse list-unstyled" id="manufactureMenu">
                <li><a class="dropdown-item" href="{{ route('createmanufacture') }}">Add Manufacture</a></li>
                <li><a class="dropdown-item" href="{{ route('listmanufacture') }}">List Manufacture</a></li>
            </ul>
        </div>

        <!-- Dropdown for Brand -->
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#brandMenu">
                <i class="fas fa-tags"></i> Brand
            </a>
            <ul class="collapse list-unstyled" id="brandMenu">
                <li><a class="dropdown-item" href="{{ route('addbrand') }}">Add Brand</a></li>
                <li><a class="dropdown-item" href="{{ route('listbrand') }}">List Brand</a></li>
            </ul>
        </div>

        <!-- Dropdown for Car -->
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#carMenu">
                <i class="fas fa-car"></i> Car
            </a>
            <ul class="collapse list-unstyled" id="carMenu">
                <li><a class="dropdown-item" href="{{ route('addcar') }}">Add Car</a></li>
                <li><a class="dropdown-item" href="{{ route('listcar') }}">List Car</a></li>
            </ul>
        </div>

        <a href="#" class="nav-link"><i class="fas fa-cog"></i> Settings</a>
        <a href="{{ route('logout') }}" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
        <a href="{{ route('viewcart') }}" class="nav-link">
            <i class="fas fa-shopping-cart"></i> Giỏ hàng ({{ session('cart') ? count(session('cart')) : 0 }})
        </a>
    </div>
    <script>
        // Toggle sidebar
        document.getElementById("toggle-btn").addEventListener("click", function () {
            document.getElementById("sidebar").classList.toggle("active");
            document.getElementById("content").classList.toggle("shifted");
        });
    </script>

    <div class="container">
        @yield('content') <!-- Phần này sẽ hiển thị nội dung của từng file Blade -->
    </div>
</body>

</html>