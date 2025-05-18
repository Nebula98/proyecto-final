<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    use HasFactory;
    
    // Campos asignables masivamente
    protected $fillable = [
        'name',
        'program_id',
        'semester',
        'min_capacity',
        'max_capacity',
        'is_active'
    ];

    // Relación con programa: Un curso pertenece a un programa
    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    // Método para grupos del curso (si tienes la tabla groups)
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}


