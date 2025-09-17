<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketComment extends Model
{
    use HasFactory;

    // Nama tabel dan PK custom
    protected $table = 'ticket_comment';
    protected $primaryKey = 'comment_id';

    public $incrementing = true;
    protected $keyType = 'int';

    // Karena ada created_at & updated_at
    public $timestamps = true;

    // Kolom yang boleh diisi
    protected $fillable = [
        'comment_text',
        'ticket_id',
        'user_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // Comment milik satu tiket
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id', 'ticket_id');
    }

    // Comment dibuat oleh satu user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
