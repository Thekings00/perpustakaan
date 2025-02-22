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
         <form action="{{ route('store-pinjam') }}" class="form" class="form" method="post">
            <div class="teks-login">
            <h1>Tambahkan peminjam</h1>
            <p>isi data dibawah untuk menambahkan data peminjam</p>
            </div>

            @if (session('error'))
                <div class="pesan-error">
                    {{ session('error') }}
                </div>
             @endif

             <div class="form-input">
            @csrf
            <label for="nama_peminjam" class="teks-input">Nama Lengkap</label>
            <br>
            <input type="text" id="nama_peminjam" name="nama_peminjam" class="input" autocomplete="off" required>
            <br>
            <label for="kelas" class="teks-input">Kelas</label>
            <br>
            <input type="text" id="kelas" name="kelas" class="input" autocomplete="off" required>
            <br>
            <label for="nomor_hp" class="teks-input">Nomor Handphone</label>
            <br>
            <input type="numeric" id="nomor_hp" name="nomor_hp" class="input" autocomplete="off" required>
            <br>
            <label for="id_buku" class="teks-input">Nama Buku:</label>
            <br>
            <select class="input" name="id_buku" required>
                <option value="">-- Pilih Buku --</option>
                @foreach ($dataBuku as $buku)
                    <option value="{{ $buku->id }}">{{ $buku->nama_buku }}</option>
                @endforeach
            </select>
            <br>
            <label for="jumlah_buku" class="teks-input">Jumlah Buku</label>
            <br>
            <input type="number" id="jumlah_buku" name="jumlah_buku" class="input" required>
            <br>
            <input class="tambah" type="submit" name="tambah" value="tambah">
             </div>
         </form>
    </div>
</body>
</html>
