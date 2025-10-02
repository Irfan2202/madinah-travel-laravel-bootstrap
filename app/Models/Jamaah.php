<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    use HasFactory;

    // Tambahkan $timestamps = false; jika tabel jamaah tidak perlu kolom created_at/updated_at
    protected $fillable = [
        'order_id',
        'name',
        'identity', // No. Paspor / KTP
        'birthdate',
    ];

    /**
     * Relasi ke Order (Banyak Jamaah dimiliki oleh satu Order)
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
