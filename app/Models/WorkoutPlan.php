<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class WorkoutPlan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function routines(): BelongsToMany
    {
        return $this->belongsToMany(Routine::class)
            ->withPivot('name', 'start_day', 'end_day', 'notes')
            ->orderBy('start_day');
    }
}
