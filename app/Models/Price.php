<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'type',
        'price',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
