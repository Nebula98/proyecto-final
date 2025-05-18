<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Program extends Model
{
    use HasFactory;
    // Campos asignables masivamente
    protected $fillable = [
        'name',
        'description',
        'duration',
        'is_active'
    ];

    // Relación con cursos: Un programa tiene muchos cursos
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    // Método para cursos activos (opcional)
    public function activeCourses(): HasMany
    {
        return $this->courses()->where('is_active', true);
    }
}


