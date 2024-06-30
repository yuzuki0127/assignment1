<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'image',
        'text',
        'supplement',
        'quiz_id',
    ];

    public function Quiz() {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
    public function Choice() {
        return $this->hasMany(Choice::class, 'question_id');
    }
}
