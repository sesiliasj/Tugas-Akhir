<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $table = 'answers';

    protected $fillable = [
        'examcontent_id',
        'student_id',
        'answer',
        'score',
        'created_at'
    ];

    public function examcontent()
    {
        return $this->belongsTo(Examcontent::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
