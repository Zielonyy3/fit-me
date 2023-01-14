<?php

namespace App\Models;

use App\Enums\TargetType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlannedExercise extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'target_type' => TargetType::class
    ];

    public function routine(): BelongsTo
    {
        return $this->belongsTo(Routine::class);
    }

    public function exercise(): BelongsTo
    {
        return $this->belongsTo(Exercise::class);
    }
}
