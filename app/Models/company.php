<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // Karena tabelnya bukan default plural (companies), kita kasih override
    protected $table = 'company';

    // Primary key juga custom
    protected $primaryKey = 'company_id';

    // Mass assignable fields
    protected $fillable = [
        'company_name',
        'company_address',
        'company_email',
    ];

    // Kalau primary key bukan auto increment INT, atur ini
    public $incrementing = true;
    protected $keyType = 'int';

    // Timestamps (created_at & updated_at) sudah ada di migration
    public $timestamps = true;

    /*
    |--------------------------------------------------------------------------
    | Relationships (opsional, kalau nanti dipakai)
    |--------------------------------------------------------------------------
    */
    // public function departments()
    // {
    //     return $this->hasMany(Department::class, 'company_id');
    // }

    // public function users()
    // {
    //     return $this->hasMany(User::class, 'company_id');
    // }
}
