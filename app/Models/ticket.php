<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    // Nama tabel & primary key custom
    protected $table = 'ticket';
    protected $primaryKey = 'ticket_id';

    // PK auto-increment int
    public $incrementing = true;
    protected $keyType = 'int';

    // created_at & updated_at ada di migration
    public $timestamps = true;

    // Kolom yang bisa di-mass-assign
    protected $fillable = [
        'subject',
        'description',
        'status',      // PENDING | PROCESS | COMPLETE
        'priority',    // LOW | MEDIUM | HIGH | CRITICAL
        'company_id',
        'departement_id',
        'user_id',
    ];

    // Casting tipis
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'status'     => 'string',
        'priority'   => 'string',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'departement_id', 'departement_id');
    }

    // requester / pembuat tiket
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes kecil biar enak filter
    |--------------------------------------------------------------------------
    */
    public function scopeStatus($q, string $status)
    {
        return $q->where('status', strtoupper($status));
    }

    public function scopePriority($q, string $priority)
    {
        return $q->where('priority', strtoupper($priority));
    }
}
