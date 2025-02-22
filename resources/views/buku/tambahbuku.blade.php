<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <!-- link untuk css -->
     <link rel="stylesheet" href="css/forminput.css">
</head>
<body>
    <!-- bungkus semua isi form tambah buku -->
    <div class="container">

        <!-- buat tampilan tambah buku -->
         <form action="{{ route('store-buku') }}" class="form" class="form" method="post">
            <div class="teks-login">
            <h1>Tambahkan Buku</h1>
            <p>isi data dibawah untuk menambahkan buku</p>
            </div>

            @if (session('error'))
                <div class="pesan-error">
                    {{ session('error') }}
                </div>
             @endif

             <div class="form-input">
            @csrf
            <label for="nama_buku" class="teks-input">Judul Buku</label>
            <br>
            <input type="text" id="nama_buku" name="nama_buku" class="input" autocomplete="off" required>
            <br>
            <label for="pengarang" class="teks-input">Pengarang Buku</label>
            <br>
            <input type="text" id="pengarang" name="pengarang" class="input" autocomplete="off" required>
            <br>
            <label for="jumlah_buku" class="teks-input">Jumlah Buku</label>
            <br>
            <input type="number" id="jumlah_buku" name="jumlah_buku" class="input" required>
            <br>
            <br>
            <input class="tambah" type="submit" name="tambah" value="tambah">
             </div>
         </form>
    </div>
</body>
</html>
