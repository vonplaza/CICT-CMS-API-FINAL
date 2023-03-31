<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'semester',
        'subject_id',
        'corereq_id',
        'prereq_id',
        'units',
        'lecture_units',
        'lab_units',
    ];

    public function curriculumLevels()
    {
        return $this->belongsTo(CurriculumLevel::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function prereq()
    {
        return $this->belongsTo(CurriculumLevel::class, 'prereq_id');
    }

    public function corereq()
    {
        return $this->belongsTo(CurriculumLevel::class, 'corereq_id');
    }
}
