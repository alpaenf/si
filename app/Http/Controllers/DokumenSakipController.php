<?php

namespace App\Http\Controllers;

use App\Models\DokumenSakip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenSakipController extends Controller
{
    public function index()
    {
        $dokumen = DokumenSakip::orderBy('tahun', 'desc')
            ->orderBy('jenis', 'asc')
            ->paginate(20);
        
        return view('admin.dokumen-sakip.index', compact('dokumen'));
    }

    public function create()
    {
        return view('admin.dokumen-sakip.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|digits:4',
            'judul' => 'required|string|max:255',
            'jenis' => 'required|in:Renstra,RKT,PK,LKJIP,Lainnya',
            'file' => 'required|file|mimes:pdf|max:10240',
            'keterangan' => 'nullable|string',
        ]);

        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('dokumen-sakip', $filename, 'public');

        DokumenSakip::create([
            'tahun' => $request->tahun,
            'judul' => $request->judul,
            'jenis' => $request->jenis,
            'file_path' => $path,
            'ukuran_file' => $this->formatBytes($file->getSize()),
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('admin.dokumen-sakip.index')
            ->with('success', 'Dokumen SAKIP berhasil ditambahkan');
    }

    public function edit(DokumenSakip $dokumenSakip)
    {
        return view('admin.dokumen-sakip.edit', compact('dokumenSakip'));
    }

    public function update(Request $request, DokumenSakip $dokumenSakip)
    {
        $request->validate([
            'tahun' => 'required|digits:4',
            'judul' => 'required|string|max:255',
            'jenis' => 'required|in:Renstra,RKT,PK,LKJIP,Lainnya',
            'file' => 'nullable|file|mimes:pdf|max:10240',
            'keterangan' => 'nullable|string',
        ]);

        $data = [
            'tahun' => $request->tahun,
            'judul' => $request->judul,
            'jenis' => $request->jenis,
            'keterangan' => $request->keterangan,
        ];

        if ($request->hasFile('file')) {
            // Delete old file
            if ($dokumenSakip->file_path) {
                Storage::disk('public')->delete($dokumenSakip->file_path);
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('dokumen-sakip', $filename, 'public');

            $data['file_path'] = $path;
            $data['ukuran_file'] = $this->formatBytes($file->getSize());
        }

        $dokumenSakip->update($data);

        return redirect()->route('admin.dokumen-sakip.index')
            ->with('success', 'Dokumen SAKIP berhasil diperbarui');
    }

    public function destroy(DokumenSakip $dokumenSakip)
    {
        if ($dokumenSakip->file_path) {
            Storage::disk('public')->delete($dokumenSakip->file_path);
        }

        $dokumenSakip->delete();

        return redirect()->route('admin.dokumen-sakip.index')
            ->with('success', 'Dokumen SAKIP berhasil dihapus');
    }

    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}
