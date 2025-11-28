<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublicController extends Controller
{
    public function home()
    {
        // Ambil 2 berita terbaru yang sudah dipublikasikan
        $beritas = Berita::where('status', 'published')
                        ->latest()
                        ->take(2)
                        ->get();
        
        return view('pages.home', compact('beritas'));
    }

    public function berita(Request $request)
    {
        $query = Berita::where('status', 'published');

        // Filter berdasarkan search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('judul', 'like', '%' . $search . '%');
        }

        // Filter berdasarkan tanggal
        if ($request->has('date') && $request->date != '') {
            $query->whereDate('tanggal', $request->date);
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
                        'excerpt' => Str::limit(strip_tags($berita->deskripsi), 120),
                        'gambar' => $berita->gambar,
                        'tanggal' => $berita->tanggal,
                        'tanggal_formatted' => $berita->tanggal->format('d M Y'),
                        'tags' => $berita->tags,
                        'read_time' => ceil(str_word_count(strip_tags($berita->deskripsi)) / 200),
                        'created_at' => $berita->created_at->diffForHumans(),
                    ];
                }),
                'pagination' => [
                    'current_page' => $beritas->currentPage(),
                    'last_page' => $beritas->lastPage(),
                    'per_page' => $beritas->perPage(),
                    'total' => $beritas->total(),
                    'from' => $beritas->firstItem(),
                    'to' => $beritas->lastItem(),
                ]
            ]);
        }
        
        return view('pages.berita', compact('beritas'));
    }

    public function showBerita(Berita $berita)
    {
        // Hanya tampilkan berita yang sudah dipublikasikan
        if ($berita->status !== 'published') {
            abort(404);
        }
        
        return view('pages.berita-detail', compact('berita'));
    }
}
