<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectiveOnlySubject extends Model
{
    use HasFactory;
    protected $table = 'elective_only_subjects';
    protected $fillable = [
        'user_id',
        'description',
        'syllabus_path'
    ];
}
