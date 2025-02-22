@extends("dashboard awal.dashboard")

@section("table")

<div class="content">
    <header>
        <h2>Data Peminjaman</h2>
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
                    <th>Nama peminjam</th>
                    <th>Kelas</th>
                    <th>nomor handphone</th>
                    <th>jumlah buku di pinjam</th>
                    <th>Tanggal Di Pinjam</th>
                    <th>Tanggal Di kembalikan</th>
                    <th>Kelola</th>
                </tr>
                </thead>

                <tbody>
                @forelse ($data as $peminjam)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $peminjam->nama_peminjam }}</td>
                        <td>{{ $peminjam->kelas }}</td>
                        <td>{{ $peminjam->nomor_hp }}</td>
                        <td>{{ $peminjam->jumlah_buku }}</td>
                        <td>{{ $peminjam->created_at }}</td>
                        <td>{{ $peminjam->updated_at }}</td>
                        <td>
                            <a href="" class="btn-edit">edit</a>
                            <a href="" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?');" class="btn-delete">delete</a>
                        </td>
                    </tr>

                    @empty
                        <tr>
                            <td colspan="8" style="text-align:center;">Tidak ada data peminjam.</td>
                        </tr>

                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
