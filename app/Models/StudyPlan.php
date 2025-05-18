<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'course_id',
        'semester',
        'course_name',
        'credits'
    ];

    // Relación con Program
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    // Relación con Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}