<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // display list mahasiswa mahasiswa
    public function index()
    {
        $mahasiswas = Mahasiswa::with('dosen')->get();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    // display form create 
    public function create()
    {
        $dosens = Dosen::all();
        return view('mahasiswa.create', compact('dosens'));
    }

    // store mahassiwa to database
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

    // display 
    public function show($id)
    {
        $mahasiswa = Mahasiswa::with('dosen')->findOrFail($id);
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    // form editing 
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $dosens = Dosen::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'dosens'));
    }

    // update 
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

    // remove /delete
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus!');
    }
}
