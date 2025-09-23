<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    protected $fillable = [
        'company_id','department_id','requester_id','subject','description','priority','status'
    ];

    public const PRIORITY = ['LOW','MEDIUM','HIGH','CRITICAL'];
    public const STATUS   = ['OPEN','IN_PROGRESS','RESOLVED','CLOSED'];

    public function company(): BelongsTo { return $this->belongsTo(Company::class); }
    public function department(): BelongsTo { return $this->belongsTo(Department::class); }
    public function requester(): BelongsTo { return $this->belongsTo(User::class, 'requester_id'); }

    public function histories(): HasMany { return $this->hasMany(TicketHistory::class); }
    public function comments(): HasMany { return $this->hasMany(TicketComment::class); }
    public function attachments(): HasMany { return $this->hasMany(TicketAttachment::class); }
    public function assignments(): HasMany { return $this->hasMany(TicketAssignment::class); }
}
