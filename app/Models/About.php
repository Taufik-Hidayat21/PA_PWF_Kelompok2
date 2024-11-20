<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'tentang',
        'sejarah',
        'visi',
        'misi',
    ];

    // Accessor untuk URL gambar sejarah
    public function getSejarahImageUrlAttribute()
    {
        return $this->sejarah_image
            ? asset('storage/' . $this->sejarah_image)
            : null;
    }

    // Accessor untuk URL gambar struktur organisasi
    public function getStrukturOrganisasiImageUrlAttribute()
    {
        return $this->struktur_organisasi_image
            ? asset('storage/' . $this->struktur_organisasi_image)
            : null;
    }
}