<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'curriculums';

    protected $fillable = [
        'user_id',
        'department_id',
        'version',
        'status',
        'metadata'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
