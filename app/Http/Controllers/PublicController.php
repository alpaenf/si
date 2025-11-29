<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\DokumenSakip;
use App\Models\Faq;
use App\Models\Galeri;
use App\Models\Layanan;
use App\Models\Slider;
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
        
        // Ambil sliders aktif
        $sliders = Slider::aktif()->urutan()->get();
        
        // Ambil layanan aktif (optimized with select)
        $layanan = Layanan::aktif()
                        ->urutan()
                        ->take(6)
                        ->select('id', 'nama', 'deskripsi', 'icon', 'urutan')
                        ->get();
        
        return view('pages.home', compact('beritas', 'sliders', 'layanan'));
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

    public function layanan()
    {
        $layanans = Layanan::aktif()->urutan()->get();
        return view('pages.layanan', compact('layanans'));
    }

    public function sakip()
    {
        $dokumenSakip = DokumenSakip::orderBy('tahun', 'desc')
                                    ->orderBy('jenis', 'asc')
                                    ->get();
        return view('pages.sakip', compact('dokumenSakip'));
    }

    public function faq()
    {
        $faqs = Faq::dijawab()->aktif()->urutan()->get();
        return view('pages.faq', compact('faqs'));
    }

    public function submitFaq(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pertanyaan' => 'required|string|max:1000',
        ]);

        Faq::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'pertanyaan' => $request->pertanyaan,
            'status' => 'pending',
            'aktif' => false,
            'urutan' => 999,
        ]);

        return redirect()->route('faq')
            ->with('success', 'Pertanyaan Anda berhasil dikirim. Kami akan segera menjawabnya.');
    }

    public function galeri()
    {
        $galeris = Galeri::latest()->paginate(12);
        return view('pages.galeri', compact('galeris'));
    }
}
