<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionPaperQuestionList extends Model
{
    use HasFactory;

    public function questionInfo(){
        return $this->belongsTo(Question::class,'question_id','id');
    }
}
