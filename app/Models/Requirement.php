<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Requirement extends Model
{
    protected $fillable = ['name'];

    public function bookings(): BelongsToMany
    {
        return $this->belongsToMany(BookingRoom::class, 'booking_requirement', 'requirement_id', 'bookingroom_id');
    }
}
