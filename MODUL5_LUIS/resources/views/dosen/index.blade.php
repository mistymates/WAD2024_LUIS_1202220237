@extends('layouts.app')

@section('title', 'Daftar Dosen')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Daftar Dosen</h2>
    <a href="{{ route('dosen.create') }}" class="btn btn-primary">Tambah Dosen</a>
</div>
<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Kode Dosen</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dosens as $dosen)
        <tr>
            <td>{{ $dosen->kode_dosen }}</td>
            <td>{{ $dosen->nama_dosen }}</td>
            <td>{{ $dosen->nip }}</td>
            <td>{{ $dosen->email }}</td>
            <td>
                <a href="{{ route('dosen.show', $dosen->id) }}" class="btn btn-info btn-sm">Detail</a>
                <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
