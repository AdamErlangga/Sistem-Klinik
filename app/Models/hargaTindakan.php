<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HargaTindakan extends Model
{
    use HasFactory;

    protected $table = 'harga_tindakans';

    protected $fillable = [
        'name', 
        'price',
    ];

    public function patients()
    {
        return $this->hasMany(Patient::class, 'harga_tindakan_id');
    }
}
