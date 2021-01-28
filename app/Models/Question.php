<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    use HasFactory;
    protected $fillable = ['question', 'image', 'answer1', 'answer2', 'answer3', 'answer4', 'answer5', 'correct_answer'];
    protected $appends = ['true_percent'];
    public function myAnswer()
    {
        return $this->hasOne('App\Models\Answer')->where('user_id', auth()->user()->id);
    }
    public function getTruePercentAttribute()
    {
        $answer_count = $this->answer()->count();
        $true_answers = $this->answer()->where('answer', $this->correct_answer)->count();
        if ($true_answers != null && $answer_count != 0) {
            return round(($true_answers / $answer_count) * 100);
        } else {
            return 0;
        }
    }
    public function answer()
    {
        return $this->hasMany('App\Models\Answer');
    }
}
