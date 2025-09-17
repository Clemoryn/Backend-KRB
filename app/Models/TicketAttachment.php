<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketAttachment extends Model
{
    use HasFactory;

    // Tabel & PK custom
    protected $table = 'ticket_attachment';
    protected $primaryKey = 'attachment_id';

    public $incrementing = true;
    protected $keyType = 'int';

    public $timestamps = true;

    protected $fillable = [
        'file_type',
        'file_url',
        'user_id',
        'ticket_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // attachment milik satu user (uploader)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    // attachment terkait ke satu tiket
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id', 'ticket_id');
    }
}
