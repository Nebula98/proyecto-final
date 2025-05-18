<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'projection_id',
        'name',
        'path',
        'version',
        'type'
    ];

    // Relación con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con Projection (opcional)
    public function projection()
    {
        return $this->belongsTo(Projection::class);
    }
}