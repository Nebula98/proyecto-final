<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    public function course()
{
    return $this->belongsTo(Course::class);
}
public function users()
{
    return $this->belongsToMany(User::class);
}
}
