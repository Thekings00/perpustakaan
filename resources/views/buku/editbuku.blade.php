<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit Buku</title>
    <!-- link untuk css -->
    <link rel="stylesheet" href="{{ asset('css/forminput.css') }}">
</head>
<body>
    <!-- bungkus semua isi form edit buku -->
    <div class="container">

        <!-- buat tampilan edit buku -->
         <form action="{{ route('update-buku',$buku->id) }}" class="form" class="form" method="post">
            <div class="teks-login">
            <h1>Edit Buku</h1>
            <p>isi data dibawah untuk mengedit buku</p>
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
            <input type="text" id="nama_buku" name="nama_buku" class="input" value="{{ old('nama_buku',$buku->nama_buku) }}" autocomplete="off" required>
            <br>
            <label for="pengarang" class="teks-input">Pengarang Buku</label>
            <br>
            <input type="text" id="pengarang" name="pengarang" class="input" value="{{ old('nama_buku',$buku->pengarang) }}" autocomplete="off" required>
            <br>
            <label for="jumlah_buku" class="teks-input">Jumlah Buku</label>
            <br>
            <input type="number" id="jumlah_buku" name="jumlah_buku" value="{{ old('nama_buku',$buku->jumlah_buku) }}" class="input" required>
            <br>
            <br>
            <input class="tambah" type="submit" name="edit" value="edit">
             </div>
         </form>
    </div>
</body>
</html>
