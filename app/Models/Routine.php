<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * \App\Models\Routine
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $owner_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read string $preview_image
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Models\User $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PlannedExercise[] $plannedExercises
 * @property-read int|null $planned_exercises_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PlannedRoutine[] $plannedRoutines
 * @property-read int|null $planned_routines_count
 * @method static \Database\Factories\RoutineFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Routine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Routine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Routine query()
 * @method static \Illuminate\Database\Eloquent\Builder|Routine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Routine whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Routine whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Routine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Routine whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Routine whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Routine whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Routine extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

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

    public function getPreviewImageAttribute(): string
    {
        return $this->getFirstMediaUrl();
    }
}
