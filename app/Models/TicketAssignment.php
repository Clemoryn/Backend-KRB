<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketAssignment extends Model
{
    protected $fillable = ['ticket_id','agent_id','assigned_at'];

    protected $casts = ['assigned_at' => 'datetime'];

    public function ticket(): BelongsTo { return $this->belongsTo(Ticket::class); }
    public function agent(): BelongsTo { return $this->belongsTo(User::class, 'agent_id'); }
}
