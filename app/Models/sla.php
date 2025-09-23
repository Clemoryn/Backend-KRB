<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sla extends Model
{
    protected $table = 'slas';
    protected $fillable = ['company_id','department_id','active'];

    protected $casts = ['active' => 'boolean'];

    public function company(): BelongsTo { return $this->belongsTo(Company::class); }
    public function department(): BelongsTo { return $this->belongsTo(Department::class); }
}
