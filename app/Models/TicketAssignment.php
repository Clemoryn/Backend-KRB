<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketAssignment extends Model
{
    use HasFactory;

    // Tabel & primary key custom
    protected $table = 'ticket_assignment';
    protected $primaryKey = 'assignment_id';

    public $incrementing = true;
    protected $keyType = 'int';

    // Ada created_at & updated_at
    public $timestamps = true;

    // Kolom yang bisa di-mass-assign
    protected $fillable = [
        'ticket_id',
        'user_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // Assignment punya satu ticket
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id', 'ticket_id');
    }

    // Assignment diberikan ke satu user (agent)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
