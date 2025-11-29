<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenSakip extends Model
{
    use HasFactory;

    protected $table = 'dokumen_sakip';

    protected $fillable = [
        'tahun',
        'judul',
        'jenis',
        'file_path',
        'ukuran_file',
        'keterangan',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function formatBytes()
    {
        if (!$this->ukuran_file || !is_numeric($this->ukuran_file)) {
            return '-';
        }

        $bytes = (float) $this->ukuran_file;
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        $i = 0;
        while ($bytes > 1024 && $i < count($units) - 1) {
            $bytes /= 1024;
            $i++;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }
}
