<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlannedRoutine extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    protected $casts = [
        'created_at' => 'datetime:Ymdhis',
        'updated_at' => 'datetime:Ymdhis',
    ];

    public function workoutPlan(): BelongsTo
    {
        return $this->belongsTo(WorkoutPlan::class);
    }

    public function routine(): BelongsTo
    {
        return $this->belongsTo(Routine::class);
    }

    public function getChangedNameAttribute(): string
    {
        return $this->name ?? $this->routine->name;
    }

    public function getDuration(string $connector = ' - '): string
    {
        return $this->start_day . $connector . $this->end_day;
    }
}
