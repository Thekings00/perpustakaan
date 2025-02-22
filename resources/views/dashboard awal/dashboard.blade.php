<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Library</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

    <div class="sidebar">
        <div class="profile">
            <p>Admin</p>
            <span class="role">Administrator</span>
        </div>
        <nav>
            <ul>
                <li><a href="{{ route('dashboardbuku') }}">Data Buku</a></li>
                <li><a href="{{ route('dashboardpeminjam') }}">Data Peminjaman</a></li>
            </ul>
        </nav>
    </div>

    @yield("table")

</body>
</html>
