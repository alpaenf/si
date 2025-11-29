<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $table = 'faq';

    protected $fillable = [
        'nama',
        'email',
        'pertanyaan',
        'jawaban',
        'status',
        'urutan',
        'aktif',
        'dijawab_at',
    ];

    protected $casts = [
        'aktif' => 'boolean',
        'dijawab_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    public function scopeDijawab($query)
    {
        return $query->where('status', 'dijawab');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeUrutan($query)
    {
        return $query->orderBy('urutan', 'asc');
    }
}
