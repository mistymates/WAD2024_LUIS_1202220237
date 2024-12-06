<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    // list dosen
    public function index()
    {
        $dosens = Dosen::all();
        return view('dosen.index', compact('dosens'));
    }

    // form add new dosen
    public function create()
    {
        return view('dosen.create');
    }

    // store database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_dosen' => 'required|string|size:3|unique:dosens,kode_dosen',
            'nama_dosen' => 'required|string',
            'nip' => 'required|string|unique:dosens,nip',
            'email' => 'required|email|unique:dosens,email',
            'no_telepon' => 'nullable|string',
        ]);

        Dosen::create($validated);
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambahkan!');
    }

    // display dosen
    public function show($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.show', compact('dosen'));
    }

    // edit dosen
    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.edit', compact('dosen'));
    }

    // update dosen
    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);

        $validated = $request->validate([
            'kode_dosen' => 'required|string|size:3|unique:dosens,kode_dosen,' . $id,
            'nama_dosen' => 'required|string',
            'nip' => 'required|string|unique:dosens,nip,' . $id,
            'email' => 'required|email|unique:dosens,email,' . $id,
            'no_telepon' => 'nullable|string',
        ]);

        $dosen->update($validated);
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil diperbarui!');
    }

    //remove delete
    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus!');
    }
}
