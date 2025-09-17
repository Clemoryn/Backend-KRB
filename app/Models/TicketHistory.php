<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketHistory extends Model
{
    use HasFactory;

    // Nama tabel & PK custom
    protected $table = 'ticket_history';
    protected $primaryKey = 'history_id';

    public $incrementing = true;
    protected $keyType = 'int';

    public $timestamps = true;

    // Kolom yang bisa di-mass assign
    protected $fillable = [
        'status',
        'ticket_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // History terkait dengan 1 ticket
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id', 'ticket_id');
    }
}
