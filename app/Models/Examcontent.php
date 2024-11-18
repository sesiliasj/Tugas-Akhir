<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examcontent extends Model
{
    use HasFactory;

    protected $table = 'examcontents';

    protected $fillable = [
        'exam_id',
        'content',
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
