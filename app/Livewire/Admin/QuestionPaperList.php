<?php

namespace App\Livewire\Admin;

use App\Models\Question;
use App\Models\QuestionPaper;
use Livewire\Component;

class QuestionPaperList extends Component
{
    public function render()
    {

        $question = QuestionPaper::where('is_delete',0)->with('categoryInfo')->with('subjectInfo')->with('courseInfo')->get();
        return view('livewire.admin.question-paper-list', ['question' => $question])->layout('layouts.admin_base');
    }
}