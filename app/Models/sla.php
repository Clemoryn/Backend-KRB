<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sla extends Model
{
    use HasFactory;

    // Nama tabel custom
    protected $table = 'sla';

    // Primary key custom
    protected $primaryKey = 'sla';

    public $incrementing = true;   // auto increment
    protected $keyType = 'int';    // tipe int

    // Timestamps aktif (karena ada created_at & updated_at)
    public $timestamps = true;

    // Kolom yang bisa di-mass assign
    protected $fillable = [
        'response_time',
        'active',
    ];

    // Casting
    protected $casts = [
        'active' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships (opsional, nanti bisa dihubungin)
    |--------------------------------------------------------------------------
    */
    // Misal: SLA dipakai oleh banyak Ticket
    // public function tickets()
    // {
    //     return $this->hasMany(Ticket::class, 'sla', 'sla');
    // }
}
