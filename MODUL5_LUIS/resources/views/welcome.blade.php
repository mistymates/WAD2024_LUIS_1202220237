@extends('layouts.app')

@section('title', 'Modul 5')

@section('content')
    <!-- Hero Section -->
    <div class="hero text-center bg-primary text-white py-5 mb-5">
        <h1 class="fw-bold">Telkom Data Management</h1>
    </div>

    <!-- Features Section -->
    <div class="container">
        <div class="row text-center">
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Dosen Management</h5>
                        <a href="{{ route('dosen.index') }}" class="btn btn-primary">Go to Dosen</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Mahasiswa Management</h5>
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Go to Mahasiswa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
