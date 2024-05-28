<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function categoryInfo(){
        return $this->belongsTo(Categories::class,'category','id');
    }
    public function subjectInfo(){
        return $this->belongsTo(Subjects::class,'subject','id');
    }
    public function questionOptionDetails(){
        return $this->hasMany(QuestionOption::class,'question_id','id');
    }
}