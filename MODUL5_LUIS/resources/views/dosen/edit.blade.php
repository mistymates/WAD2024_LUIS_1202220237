@extends('layouts.app')

@section('title', 'Edit Dosen')
@section('header', 'Form Edit Dosen')

@section('content')
<form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="kode_dosen" class="form-label">Kode Dosen</label>
        <input type="text" name="kode_dosen" class="form-control" value="{{ $dosen->kode_dosen }}" required maxlength="3">
    </div>
    <div class="mb-3">
        <label for="nama_dosen" class="form-label">Nama Dosen</label>
        <input type="text" name="nama_dosen" class="form-control" value="{{ $dosen->nama_dosen }}" required>
    </div>
    <div class="mb-3">
        <label for="nip" class="form-label">NIP</label>
        <input type="text" name="nip" class="form-control" value="{{ $dosen->nip }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ $dosen->email }}" required>
    </div>
    <div class="mb-3">
        <label for="no_telepon" class="form-label">Nomor Telepon</label>
        <input type="text" name="no_telepon" class="form-control" value="{{ $dosen->no_telepon }}">
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection
