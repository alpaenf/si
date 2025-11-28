<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::query();

        // Filter berdasarkan search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('judul', 'like', '%' . $search . '%');
        }

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Ambil berita dengan pagination
        $beritas = $query->latest()->paginate(9);

        // Jika request AJAX, return JSON
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'beritas' => $beritas->map(function($berita) {
                    return [
                        'id' => $berita->id,
                        'judul' => $berita->judul,
                        'deskripsi' => $berita->deskripsi,
                        'excerpt' => Str::limit(strip_tags($berita->deskripsi), 100),
                        'gambar' => $berita->gambar,
                        'tanggal' => $berita->tanggal,
                        'tanggal_formatted' => $berita->tanggal->format('d M Y'),
                        'tags' => $berita->tags,
                        'status' => $berita->status,
                        'created_at' => $berita->created_at->format('d M Y'),
                    ];
                }),
                'pagination' => [
                    'current_page' => $beritas->currentPage(),
                    'last_page' => $beritas->lastPage(),
                    'per_page' => $beritas->perPage(),
                    'total' => $beritas->total(),
                    'from' => $beritas->firstItem(),
                    'to' => $beritas->lastItem(),
                ],
                'stats' => [
                    'total' => Berita::count(),
                    'published' => Berita::where('status', 'published')->count(),
                    'draft' => Berita::where('status', 'draft')->count(),
                ]
            ]);
        }

        return view('admin.berita.index', compact('beritas'));
    }

    public function show(Berita $berita)
    {
        return view('admin.berita.show', compact('berita'));
    }

    public function edit(Berita $berita)
    {
        return response()->json($berita);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'tanggal' => 'required|date',
            'tags' => 'required|string',
            'status' => 'required|in:draft,published'
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        // Convert tags from JSON string to array
        $validated['tags'] = json_decode($validated['tags']);

        Berita::create($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'tanggal' => 'required|date',
            'tags' => 'required|string',
            'status' => 'required|in:draft,published'
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        // Convert tags from JSON string to array
        $validated['tags'] = json_decode($validated['tags']);

        $berita->update($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Berita $berita)
    {
        // Delete image if exists
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
