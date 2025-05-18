<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projection extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'program_id',
        'user_id',
        'period',
        'year',
        'groups',
        'students_estimated'
    ];

    // Relación con Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Relación con Program
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    // Relación con User (creador de la proyección)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con ProjectionReview
    public function reviews()
    {
        return $this->hasMany(ProjectionReview::class);
    }

    // Relación con Document (opcional)
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}