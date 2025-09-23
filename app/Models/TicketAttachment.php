<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketAttachment extends Model
{
    public $timestamps = false; // created_at only (from migration)
    protected $fillable = ['ticket_id','file_url','file_type','uploaded_by','created_at'];

    protected $casts = ['created_at' => 'datetime'];

    public function ticket(): BelongsTo { return $this->belongsTo(Ticket::class); }
    public function uploader(): BelongsTo { return $this->belongsTo(User::class, 'uploaded_by'); }
}
