<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BeritaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            'excerpt' => \Str::limit(strip_tags($this->deskripsi), 150),
            'gambar' => $this->gambar ? asset('storage/' . $this->gambar) : null,
            'tanggal' => $this->tanggal->format('Y-m-d'),
            'tanggal_formatted' => $this->tanggal->format('d M Y'),
            'tags' => $this->tags ?? [],
            'status' => $this->status,
            'read_time' => ceil(str_word_count(strip_tags($this->deskripsi)) / 200),
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}
