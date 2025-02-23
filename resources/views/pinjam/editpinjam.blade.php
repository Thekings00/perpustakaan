<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit peminjam</title>
    <!-- link untuk css -->
    <link rel="stylesheet" href="{{ asset('css/forminput.css') }}">
</head>
<body>
    <!-- bungkus semua isi form edit peminjam -->
    <div class="container">

        <!-- buat tampilan edit buku -->
         <form action="{{ route('update-peminjam',$peminjam->id) }}" class="form" class="form" method="post">
            <div class="teks-login">
            <h1>Edit peminjam</h1>
            <p>isi data dibawah untuk mengedit peminjam</p>
            </div>

            @if (session('error'))
                <div class="pesan-error">
                    {{ session('error') }}
                </div>
             @endif

             <div class="form-input">
            @csrf
            <label for="nama_peminjam" class="teks-input">Judul peminjam</label>
            <br>
            <input type="text" id="nama_peminjam" name="nama_peminjam" class="input" value="{{ old('nama_peminjam',$peminjam->nama_peminjam) }}" autocomplete="off" required>
            <br>
            <label for="kelas" class="teks-input">kelas</label>
            <br>
            <input type="text" id="kelas" name="kelas" class="input" value="{{ old('kelas',$peminjam->kelas) }}" autocomplete="off" required>
            <br>
            <label for="nomor_hp" class="teks-input">Nomor Handphone</label>
            <br>
            <input type="number" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp',$peminjam->nomor_hp) }}" class="input" required>
            <br>
            <label for="id_buku" class="teks-input">Nama Buku</label>
            <br>
            <select class="input" name="id_buku" required>
                <option value="{{ $peminjam->id }}">{{ $peminjam->buku->nama_buku }}</option>
                @foreach ($dataBuku as $buku)
                    <option value="{{ $buku->id }}">{{ $buku->nama_buku }}</option>
                @endforeach
            <br>
            <label for="jumlah_buku" class="teks-input">Jumlah Buku</label>
            <br>
            <input type="number" id="jumlah_buku" name="jumlah_buku" value="{{ old('jumlah_buku',$peminjam->jumlah_buku) }}" class="input" required>
            <br>
            <input class="tambah" type="submit" name="edit" value="edit">
             </div>
         </form>
    </div>
</body>
</html>
