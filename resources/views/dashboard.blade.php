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
                    <li><a href="dashboard.php">Data Buku</a></li>
                    <li><a href="peminjaman.php">Data Peminjaman</a></li>
                </ul>
            </nav>
        </div>

        <div class="content">
            <header>
                <h2>Data Buku</h2>
            </header>

            <div class="fitur">
                <!-- btn tambah -->
                <a href="tambahbuku.php">
                    <button class="btn-tambah">Tambah</button>
                </a>
                <!-- btn search -->
                <div class="div-search">
                    <form action="" method="GET">
                        <input type="text" name="search" class="search" placeholder="search" value="">
                        <button type="submit">
                            <img src="./search.svg" alt="">
                        </button>
                    </form>
                </div>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Buku</th>
                            <th>Pengarang</th>
                            <th>Jumlah Buku</th>
                            <th>Sisa Buku</th>
                            <th>Tanggal Dibuat</th>
                            <th>Tanggal Diupdate</th>
                            <th>Kelola</th>
                        </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="" class="btn-edit">edit</a>
                                    <a href="" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?');" class="btn-delete">delete</a>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </body>
    </html>
