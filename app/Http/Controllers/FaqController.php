<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('status', 'asc')
                   ->orderBy('created_at', 'desc')
                   ->paginate(20);
        
        $pending = Faq::pending()->count();
        $dijawab = Faq::dijawab()->count();
        
        return view('admin.faq.index', compact('faqs', 'pending', 'dijawab'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'jawaban' => 'required|string',
            'urutan' => 'required|integer|min:0',
            'aktif' => 'boolean',
        ]);

        Faq::create([
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban,
            'urutan' => $request->urutan,
            'aktif' => $request->has('aktif'),
        ]);

        return redirect()->route('admin.faq.index')
            ->with('success', 'FAQ berhasil ditambahkan');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'jawaban' => 'required|string',
            'urutan' => 'required|integer|min:0',
            'aktif' => 'boolean',
        ]);

        $faq->update([
            'jawaban' => $request->jawaban,
            'urutan' => $request->urutan,
            'aktif' => $request->has('aktif'),
            'status' => 'dijawab',
            'dijawab_at' => now(),
        ]);

        return redirect()->route('admin.faq.index')
            ->with('success', 'Pertanyaan berhasil dijawab');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faq.index')
            ->with('success', 'FAQ berhasil dihapus');
    }
}
