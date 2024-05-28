<?php

namespace App\Livewire\Admin;

use App\Models\Categories;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\QuestionPaper;
use App\Models\QuestionPaperQuestionList;
use Illuminate\Http\Request;
use Livewire\Component;

class EditQuestionPaper extends Component
{
    public function render(Request $request)
    {
        $id = $request->input('paper_id');
        $paperInfo=QuestionPaper::find($id);
        $category=$paperInfo->category;
        $subject=$paperInfo->subject;
        $course=$paperInfo->course;

        $all_categories = Categories::where('is_delete', 0)->get();
        $selectedQuestion=QuestionPaperQuestionList::where('question_paper_id',$id)->pluck('question_id');
        return view('livewire.admin.edit-question-paper',['categories' => $all_categories,'category'=>$category,'subject'=>$subject,'course'=>$course,'paperInfo'=>$paperInfo,'selectedQuestion'=>$selectedQuestion])->layout('layouts.admin_base');
    }
}