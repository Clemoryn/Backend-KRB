<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // penting buat login
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Nama tabel custom
    protected $table = 'user';

    // Primary key custom
    protected $primaryKey = 'user_id';

    // Auto increment PK int
    public $incrementing = true;
    protected $keyType = 'int';

    // Timestamps aktif (karena ada created_at & updated_at)
    public $timestamps = true;

    // Kolom yang boleh diisi mass assignment
    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'password',
        'company_id',
        'departement_id',
    ];

    // Sembunyikan kolom sensitif
    protected $hidden = [
        'password',
        'remember_token', // kalau nanti kamu tambahin remember_token
    ];

    // Casting
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // User milik 1 company
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }

    // User milik 1 departement
    public function departement()
    {
        return $this->belongsTo(Departement::class, 'departement_id', 'departement_id');
    }
}
