<?php

namespace App\Livewire\Admin;

use App\Models\Categories;
use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Http\Request;
use Livewire\Component;

class EditQuestions extends Component
{
    public function render(Request $request)
    {
         $id = $request->input('question_id');
         $question_info= Question::find($id);
         $all_categories = Categories::where('is_delete', 0)->get();
         $question_option=QuestionOption::where('question_id',$id)->get();
         $correct_ans=QuestionOption::where('question_id',$id)->where("is_true",1)->first()->id;
         return view('livewire.admin.edit-questions',['categories' => $all_categories,'id'=>$id,'question_info'=>$question_info,'question_option_list'=>$question_option,'correct_ans'=>$correct_ans])->layout('layouts.admin_base');
    }
}
