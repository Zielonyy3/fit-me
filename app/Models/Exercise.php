<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exercise extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function plannedExercises(): HasMany
    {
        return $this->hasMany(PlannedExercise::class);
    }
}
