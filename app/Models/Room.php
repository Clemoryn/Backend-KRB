<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    protected $fillable = ['company_id','room_name','room_number'];

    public function company(): BelongsTo { return $this->belongsTo(Company::class); }
    public function bookings(): HasMany { return $this->hasMany(BookingRoom::class); }
}
