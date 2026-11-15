<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lowongan extends Model
{
    use HasFactory;

    protected $fillable = [
        'perusahaan_id',
        'judul',
        'tipe_kerja',
        'lokasi',
        'jurusan',
        'keahlian',
        'kuota',
        'sisa_kuota',
        'deskripsi',
        'persyaratan',
        'status',
        'deadline',
    ];

    protected function casts(): array
    {
        return [
            'deadline' => 'date',
            'kuota' => 'integer',
            'sisa_kuota' => 'integer',
        ];
    }

    public function perusahaan(): BelongsTo
    {
        return $this->belongsTo(Perusahaan::class);
    }

    public function pengajuans(): HasMany
    {
        return $this->hasMany(Pengajuan::class);
    }
}

