<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'curriculum_id',
        'year_level',
        'status',
        'version'
    ];

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }

    // public function curriculumSubjects()
    // {
    //     return $this->belongsTo(Subject::class, 'metadata->');
    // }

    // public function curriculumSubjects()
    // {
    //     return $this->hasMany(CurriculumSubject::class);
    // }
}
