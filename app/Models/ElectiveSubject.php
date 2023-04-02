<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectiveSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'track',
        'elective_1',
        'elective_2',
        'elective_3',
        'elective_4',
        'elective_5',
    ];
}
