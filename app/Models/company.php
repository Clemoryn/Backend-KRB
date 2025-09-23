<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // Kalau kamu sudah punya $fillable sendiri, cukup tambahkan field di bawah.
    protected $fillable = [
        'company_name',
        'company_address',
        'company_email',
        'password', // penting: biar tidak diabaikan saat create()
    ];

    // Jika kamu sebelumnya pakai guarded=[], boleh tetap guarded=[]
    // protected $guarded = [];
}
