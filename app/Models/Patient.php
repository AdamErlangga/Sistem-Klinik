<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'region',
        'complaint',
        'visit_type',
        'prescription',
        'handled_by_doctor',
        'harga_tindakan_id',
        'is_paid'
    ];


    public function hargaTindakan()
    {
        return $this->belongsTo(HargaTindakan::class, 'harga_tindakan_id');
    }
}
