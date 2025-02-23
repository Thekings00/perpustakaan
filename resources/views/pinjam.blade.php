@extends("dashboard awal.dashboard")

@section("table")

<div class="content">
    <header>
        <h2>Data Peminjaman</h2>
    </header>

    <div class="fitur">
        <!-- btn tambah -->
        <a href="{{ route('create-peminjam') }}">
            <button class="btn-tambah">Tambah</button>
        </a>
        <!-- btn search -->
        <div class="div-search">
            <form action="" method="GET">
                <input type="text" name="search" class="search" placeholder="search" autocomplete="off">
                <button type="submit">
                    <img src="./search.svg" alt="">
                </button>
            </form>
        </div>
    </div>

    @if (session('succes'))
        <div class="pesan-success">
            {{ session('succes') }}
        </div>
    @endif

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama peminjam</th>
                    <th>Kelas</th>
                    <th>Nomor handphone</th>
                    <th>Nama buku</th>
                    <th>Jumlah buku di pinjam</th>
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
                        <td>{{ $peminjam->buku->nama_buku ?? 'buku tidak ada' }}</td>
                        <td>{{ $peminjam->jumlah_buku }}</td>
                        <td>{{ $peminjam->created_at }}</td>
                        <td>{{ $peminjam->updated_at }}</td>
                        <td>
                            <button class="btn-edit"><a href="{{ route('edit-peminjam',$peminjam->id) }}" class="btn-edit">edit</a></button>
                            <form action="{{ route('delete-peminjam', $peminjam->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>

                    @empty
                        <tr>
                            <td colspan="8" style="text-align:center;">Tidak ada buku yang di pinjam.</td>
                        </tr>

                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
