<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'role' // Asegúrate de que este campo exista en la tabla users
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relación con grupos (tabla pivote group_user)
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    // Relación con proyecciones creadas (como creador)
    public function projections()
    {
        return $this->hasMany(Projection::class);
    }

    // Relación con revisiones hechas (como revisor)
    public function reviewedProjections()
    {
        return $this->hasMany(ProjectionReview::class, 'reviewed_by');
    }

    // Relación con documentos subidos
    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    // Relación con logs de actividad
    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }
}