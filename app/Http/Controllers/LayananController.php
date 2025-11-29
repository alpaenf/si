<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::orderBy('urutan', 'asc')->paginate(20);
        return view('admin.layanan.index', compact('layanans'));
    }

    public function create()
    {
        return view('admin.layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'deskripsi' => 'required|string',
            'link' => 'nullable|url',
            'urutan' => 'required|integer|min:0',
            'aktif' => 'boolean',
        ]);

        Layanan::create([
            'nama' => $request->nama,
            'icon' => $request->icon,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link,
            'urutan' => $request->urutan,
            'aktif' => $request->has('aktif'),
        ]);

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit(Layanan $layanan)
    {
        return view('admin.layanan.edit', compact('layanan'));
    }

    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'deskripsi' => 'required|string',
            'link' => 'nullable|url',
            'urutan' => 'required|integer|min:0',
            'aktif' => 'boolean',
        ]);

        $layanan->update([
            'nama' => $request->nama,
            'icon' => $request->icon,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link,
            'urutan' => $request->urutan,
            'aktif' => $request->has('aktif'),
        ]);

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil diperbarui');
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil dihapus');
    }
}
