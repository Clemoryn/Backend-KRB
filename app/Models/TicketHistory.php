<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketHistory extends Model
{
    protected $fillable = ['ticket_id','action','status','changed_by','changed_at'];

    protected $casts = ['changed_at' => 'datetime'];

    public function ticket(): BelongsTo { return $this->belongsTo(Ticket::class); }
    public function changer(): BelongsTo { return $this->belongsTo(User::class, 'changed_by'); }
}
