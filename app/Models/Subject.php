<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'subject_code',
        'description',
        'user_id',
        'status'
    ];

    public function department()
    {
        return $this->BelongsTo(Department::class);
    }
}
