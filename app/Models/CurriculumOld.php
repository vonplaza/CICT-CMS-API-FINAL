<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumOld extends Model
{
    use HasFactory;

    protected $fillable = [
        'version',
        'metadata',
        'curriculum_id'
    ];

    public function curriculum()
    {
        $this->belongsTo(Curriculum::class);
    }
}
