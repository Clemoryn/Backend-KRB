<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'company_id','department_id','role_id','full_name','email','phone_number','password'
    ];

    protected $hidden = ['password','remember_token'];

    public function company(): BelongsTo { return $this->belongsTo(Company::class); }
    public function department(): BelongsTo { return $this->belongsTo(Department::class); }
    public function role(): BelongsTo { return $this->belongsTo(Role::class); }

    // Tickets yang dibuat user (requester)
    public function requestedTickets(): HasMany { return $this->hasMany(Ticket::class, 'requester_id'); }

    // Komentar/attachment/riwayat yang dibuat user
    public function ticketComments(): HasMany { return $this->hasMany(TicketComment::class); }
    public function ticketAttachments(): HasMany { return $this->hasMany(TicketAttachment::class, 'uploaded_by'); }
    public function ticketHistoriesChanged(): HasMany { return $this->hasMany(TicketHistory::class, 'changed_by'); }

    // Penugasan sebagai agent
    public function ticketAssignments(): HasMany { return $this->hasMany(TicketAssignment::class, 'agent_id'); }
}
