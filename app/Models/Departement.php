<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    // Nama tabel custom (bukan "departements")
    protected $table = 'departement';

    // Primary key custom
    protected $primaryKey = 'departement_id';

    // PK auto increment int
    public $incrementing = true;
    protected $keyType = 'int';

    // Aktifkan timestamps (karena migration ada created_at & updated_at)
    public $timestamps = true;

    // Kolom yang bisa mass-assign
    protected $fillable = [
        'departement_name',
        'company_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // Satu departement milik satu company
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }

    // Kalau kamu mau hubungkan dengan user atau ticket:
    // public function users()
    // {
    //     return $this->hasMany(User::class, 'departement_id', 'departement_id');
    // }
}
