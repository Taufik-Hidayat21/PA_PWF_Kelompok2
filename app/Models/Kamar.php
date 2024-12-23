<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'no_kamar',
        'kapasitas',
        'harga',
        'status',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

}