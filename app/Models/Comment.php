<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'curriculum_id',
        'curriculum_revision_id'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function curriculum()
    {
        $this->belongsTo(Curriculum::class);
    }

    public function curriculumRevision()
    {
        $this->belongsTo(CurriculumRevision::class);
    }
}
