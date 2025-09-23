<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BookingRoom extends Model
{
    protected $table = 'booking_rooms';

    protected $fillable = [
        'room_id','company_id','user_id','meeting_title','date',
        'number_of_attendees','start_time','end_time','special_notes'
    ];

    protected $casts = [
        'date' => 'date',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function room(): BelongsTo { return $this->belongsTo(Room::class); }
    public function company(): BelongsTo { return $this->belongsTo(Company::class); }
    public function user(): BelongsTo { return $this->belongsTo(User::class); }

    public function requirements(): BelongsToMany
    {
        return $this->belongsToMany(Requirement::class, 'booking_requirement', 'bookingroom_id', 'requirement_id');
    }
}
