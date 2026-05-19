<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return view('buku.index', compact('buku'));
    }

    public function create()
    {
        return view('buku.create')
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|max:200',
            'pengarang' => 'required|max:100',
            'penerbit' => 'nullable|max:100',
            'tahun' => 'nullable|integer',
            'stok' => 'required|integer|min:0'
        ]);

        Buku::create($validated);

        return redrect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|max:200',
            'pengarang' => 'required|max:100',
            'penerbit' => 'nullable|max:100',
            'tahun' => 'nullable|integer',
            'stok' => 'required|integer|min:0'
        ])

        $buku = Buku::findOrFail($id);
        $buku->update($validated);

        return redrect()->route('buku.index')->with('success', 'Buku berhasil diupdate');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redrect()->route('buku.index')->with('success', 'Buku berhasil dihapus')
    }
}
