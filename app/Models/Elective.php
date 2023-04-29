<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elective extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'description',
        'syllabus_path'
    ];
}
