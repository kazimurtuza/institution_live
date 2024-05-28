<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionPaper extends Model
{
    use HasFactory;

    public function categoryInfo(){
        return $this->belongsTo(Categories::class,'category','id');
    }
    public function subjectInfo(){
        return $this->belongsTo(Subjects::class,'subject','id');
    }
    public function courseInfo(){
        return $this->belongsTo(Courses::class,'course','id');
    }

    public function questionList(){
        return $this->hasMany(QuestionPaperQuestionList::class,'question_paper_id','id');
    }
}
