<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'schedule_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'total_price', // Anda perlu menghitung total harga
        'status', // e.g., 'pending', 'paid', 'cancelled'
    ];

    /**
     * Relasi ke Paket
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Relasi ke Jadwal
     */
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    /**
     * Relasi ke Jamaah (Satu Order punya banyak Jamaah)
     */
    public function jamaahs()
    {
        return $this->hasMany(Jamaah::class);
    }
}
