<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function routines(): HasMany
    {
        return $this->hasMany(Routine::class, 'owner_id', 'id');
    }

    public function workoutPlans(): BelongsToMany
    {
        return $this->belongsToMany(WorkoutPlan::class);
    }

    public function getNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;

    }

    public function getInitialsAttribute(): string
    {
        return substr($this->first_name, 0, 1) . '' . substr($this->last_name, 0, 1);
    }
}
