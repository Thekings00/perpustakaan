@extends("dashboard awal.dashboard")

@section("name")
    <p>{{ $user->name }}</p>
@endsection

@section("table")

<div class="content">
    <header>
        <h2>Data Buku</h2>
    </header>

    <div class="fitur">
        <!-- btn tambah -->
        <a href="{{ route('create-buku') }}">
            <button class="btn-tambah">Tambah</button>
        </a>
        <!-- btn search -->
        <div class="div-search">
            <form action="searchb" method="GET">
                <input type="text" name="search" class="search" placeholder="search" value="{{ $search ?? ""}}" autocomplete="off">
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
                    <th>Nama Buku</th>
                    <th>Pengarang</th>
                    <th>Jumlah Buku</th>
                    <th>Tanggal Rilis</th>
                    <th>Terakhir Di update</th>
                    <th>Kelola</th>
                </tr>
                </thead>

                <tbody>
                @forelse ($data as $no => $buku)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $buku->nama_buku }}</td>
                        <td>{{ $buku->pengarang }}</td>
                        <td>{{ $buku->jumlah_buku }}</td>
                        <td>{{ $buku->created_at }}</td>
                        <td>{{ $buku->updated_at }}</td>
                        <td>
                            <button class="btn-edit"><a href="{{ route('edit-buku',$buku->id) }}" class="btn-edit">edit</a></button>
                            <form action="{{ route('delete-buku', $buku->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>

                    @empty
                        <tr>
                            <td colspan="8" style="text-align:center;">Tidak ada data buku.</td>
                        </tr>

                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
