<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'email',
        'no_telepon',
        'kamar_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    /**
     * Get the kamar (room) that the resident is associated with.
     */
    // App\Models\Penghuni.php
    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'kamar_id');
    }

}