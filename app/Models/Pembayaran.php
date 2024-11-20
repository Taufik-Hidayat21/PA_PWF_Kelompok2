<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'penghuni_id',
        'kamar_id',
        'amount',
        'payment_date',
        'bukti_pembayaran',
        'status',
        
    ];

    /**
     * Get the penghuni that owns the pembayaran.
     */
    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class);
    }

    /**
     * Get the kamar associated with the pembayaran.
     */
    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }

    /**
     * Scope a query to only include pending payments.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope a query to only include paid payments.
     */
    public function scopePaid($query)
    {
        return $query->where('status', 'paid');
    }

    /**
     * Scope a query to only include overdue payments.
     */
    public function scopeOverdue($query)
    {
        return $query->where('status', 'overdue');
    }
}