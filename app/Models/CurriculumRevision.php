<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumRevision extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'version',
        'status',
        'metadata',
        'curriculum_id'
    ];

    protected $guarded = [
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function approveBy()
    {
        return $this->belongsTo(User::class, 'approve_by');
    }

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }

    public function comments()
    {
        return $this->hasMany(Curriculum::class);
    }
}
