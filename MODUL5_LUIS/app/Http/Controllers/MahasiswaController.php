<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Display a list of all mahasiswa
    public function index()
    {
        $mahasiswas = Mahasiswa::with('dosen')->get();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    // Show the form for creating a new mahasiswa
    public function create()
    {
        $dosens = Dosen::all();
        return view('mahasiswa.create', compact('dosens'));
    }

    // Store a newly created mahasiswa in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|string|unique:mahasiswas,nim',
            'nama_mahasiswa' => 'required|string',
            'email' => 'required|email|unique:mahasiswas,email',
            'jurusan' => 'required|string',
            'dosen_id' => 'required|exists:dosens,id',
        ]);

        Mahasiswa::create($validated);
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan!');
    }

    // Display the specified mahasiswa
    public function show($id)
    {
        $mahasiswa = Mahasiswa::with('dosen')->findOrFail($id);
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    // Show the form for editing the specified mahasiswa
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $dosens = Dosen::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'dosens'));
    }

    // Update the specified mahasiswa in the database
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $validated = $request->validate([
            'nim' => 'required|string|unique:mahasiswas,nim,' . $id,
            'nama_mahasiswa' => 'required|string',
            'email' => 'required|email|unique:mahasiswas,email,' . $id,
            'jurusan' => 'required|string',
            'dosen_id' => 'required|exists:dosens,id',
        ]);

        $mahasiswa->update($validated);
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui!');
    }

    // Remove the specified mahasiswa from the database
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus!');
    }
}
