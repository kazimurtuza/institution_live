<?php

namespace App\Livewire\Admin;

use App\Models\Question;
use Livewire\Component;

class QuestionList extends Component
{
    public function render()
    {


        $question=Question::where('is_delete',0)->with('categoryInfo')->with('subjectInfo')->get();
        return view('livewire.admin.question-list',['question' => $question])->layout('layouts.admin_base');
    }
}
