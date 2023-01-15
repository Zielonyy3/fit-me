<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WorkoutPlan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function plannedRoutines(): HasMany
    {
        return $this->hasMany(PlannedRoutine::class)->orderBy('start_day');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
