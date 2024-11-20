<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'gambar',
    ];

    // Optional: Tambahkan mutator jika perlu
    public function getGambarUrlAttribute()
    {
        return asset('images/fasilitas/' . $this->gambar);
    }
}