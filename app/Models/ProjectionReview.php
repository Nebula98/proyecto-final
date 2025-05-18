<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectionReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'projection_id',
        'reviewed_by',
        'comments',
        'status'
    ];

    // Relación con Projection
    public function projection()
    {
        return $this->belongsTo(Projection::class);
    }

    // Relación con User (revisor)
    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}