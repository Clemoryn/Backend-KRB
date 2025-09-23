<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    protected $fillable = ['company_id', 'department_name'];

    public function company(): BelongsTo { return $this->belongsTo(Company::class); }
    public function users(): HasMany { return $this->hasMany(User::class); }
    public function slas(): HasMany { return $this->hasMany(Sla::class); }
    public function tickets(): HasMany { return $this->hasMany(Ticket::class); }
}
