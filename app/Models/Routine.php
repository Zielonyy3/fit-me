<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Routine extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function plannedExercises(): HasMany
    {
        return $this->hasMany(PlannedExercise::class)->orderBy('order');
    }

    public function plannedRoutines(): HasMany
    {
        return $this->hasMany(PlannedRoutine::class)->orderBy('start_day');
    }
}
