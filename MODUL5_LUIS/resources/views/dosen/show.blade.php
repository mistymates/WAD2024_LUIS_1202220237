@extends('layouts.app')

@section('title', 'Detail Dosen')
@section('header', 'Detail Dosen')

@section('content')
    <!-- Navbar di sini -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MyApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dosen.index') }}">Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Another Link</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="card">
        <div class="card-header">
            <h3>Detail Dosen</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Kode Dosen</th>
                    <td>{{ $dosen->kode_dosen }}</td>
                </tr>
                <tr>
                    <th>Nama Dosen</th>
                    <td>{{ $dosen->nama_dosen }}</td>
                </tr>
                <tr>
                    <th>NIP</th>
                    <td>{{ $dosen->nip }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $dosen->email }}</td>
                </tr>
                <tr>
                    <th>Nomor Telepon</th>
                    <td>{{ $dosen->no_telepon }}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
            </form>
        </div>
    </div>
@endsection
