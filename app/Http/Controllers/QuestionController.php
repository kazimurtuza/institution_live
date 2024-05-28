<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Courses;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\QuestionPaper;
use App\Models\QuestionPaperQuestionList;
use App\Models\Subjects;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function subjectList(Request $request)
    {
        $categoryId = $request->data;
        $subjectList = Subjects::where('cat_id', $categoryId)->get();
        return view('_subject_list')->with(compact('subjectList'))->render();
    }

    public function updateQuestion(Request $request)
    {

        $question = Question::find($request->question_id);
        $question->question = $request->question;
        if ($request->category) {
            $question->category = $request->category;
        }
        if ($request->subject) {
            $question->subject = $request->subject;
        }
        $question->save();

        foreach ($request->question_ans as $key => $value) {
            $option = QuestionOption::find($key);
            $option->option = $request->question_ans[$key];
            if ($request->correct_ans == $key) {
                $option->is_true = 1;
            } else {
                $option->is_true = 0;
            }
            $option->save();
        }


        return redirect()->back()->with('success', 'Successfully Created Question');
//        return $request;
    }

    public function courseList(Request $request)
    {
        $subjectId = $request->data;
        $courseList = Courses::where('subject', $subjectId)->get();
        return view('_course_list')->with(compact('courseList'))->render();
    }

    public function courseQuestion(Request $request)
    {
        $subjectId = $request->data;
        $questionList = Question::where('subject', $subjectId)->get();
        return view('_question_list')->with(compact('questionList'))->render();
    }

    public function editQuestion(Request $request)
    {
        $all_categories = Categories::where('is_delete', 0)->get();
        return view('livewire.admin.edit-question', ['categories' => $all_categories])->layout('layouts.admin_base');

    }

    public function storeQuestionPaper(Request $request)
    {
        $question = new QuestionPaper();
        $question->category = $request->category;
        $question->subject = $request->subject;
        $question->course = $request->course;
        $question->duration = $request->duration;
        $question->unit_point = $request->point;
        $question->name = $request->question_name;
        $question->save();

        foreach ($request->question_list as $key => $value) {
            $questionSet = new QuestionPaperQuestionList();
            $questionSet->question_paper_id = $question->id;
            $questionSet->question_id = $value;
            $questionSet->save();
        }
        return redirect()->back()->with('success', 'Successfully Created Question');

    }

    public function updateQuestionPaper(Request $request)
    {


        $question = QuestionPaper::find($request->question_paper_id);
        $question->category = $request->category;
        $question->subject = $request->subject;
        $question->course = $request->course;
        $question->duration = $request->duration;
        $question->unit_point = $request->point;
        $question->name = $request->question_name;
        $question->save();

        QuestionPaperQuestionList::where('question_paper_id',$request->question_paper_id)->delete();

        foreach ($request->question_list as $key => $value) {
            $questionSet = new QuestionPaperQuestionList();
            $questionSet->question_paper_id = $question->id;
            $questionSet->question_id = $value;
            $questionSet->save();
        }
        return redirect()->back()->with('success', 'Successfully Created Question');

    }


    public function addQuestion(Request $request)
    {
        $addQuestion = new Question();
        $addQuestion->category = $request->category;
        $addQuestion->subject = $request->subject;
        $addQuestion->course = $request->course;
        $addQuestion->question = $request->question;
        $addQuestion->save();
        $questionId = $addQuestion->id;


        foreach ($request->question_ans_list as $key => $value) {
            if ($value) {
                $option = new QuestionOption();
                $option->question_id = $questionId;
                $option->option = $value;
                $option->is_true = $request->ans[$key] == "on" ? 1 : 0;
                $option->save();
            }
        }

        return true;


    }
}
