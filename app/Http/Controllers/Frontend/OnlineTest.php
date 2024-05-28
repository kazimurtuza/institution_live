<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\QuestionPaper;
use App\Models\QuestionPaperQuestionList;
use App\Models\StudentTest;
use App\Models\StudentTestResult;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlineTest extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.online_test.index');
    }

    public function congratulation(Request $request)
    {

        $test_id=$request->test_id;
        $user_id = Auth::user()->id;

        $total_correct = StudentTestResult::where('test_id', $test_id)->where('student_id', $user_id)->where('is_correct', 1)->count();
        $total_Incorrect = StudentTestResult::where('test_id', $test_id)->where('student_id', $user_id)->where('is_correct', 0)->count();
        $total_skip = StudentTestResult::where('test_id', $test_id)->where('student_id', $user_id)->where('is_skip', 1)->count();
        return view('frontend.online_test.congratulations')->with(compact('total_Incorrect','total_correct','total_skip'));
    }

    public function onlineTest(Request $request)
    {

//      QuestionPaperQuestionList::where('question_paper_id',$request->test_id)->with("questionInfo")->first();

        $questionPaperInfo = QuestionPaper::with('subjectInfo')->find($request->test_id);
        $test_id = $request->test_id;
        $user_id = Auth::user()->id;
        $studentTestInfo = StudentTest::where('student_id', $user_id)->where('test_id', $test_id)->first();
        $total_question = QuestionPaperQuestionList::where('question_paper_id', $test_id)->where('is_delete', 0)->count();
        if ($studentTestInfo) {
            $testInfo = $studentTestInfo;
            $start_time = $studentTestInfo->start_time;
            $total_time = $questionPaperInfo->duration;

            $startTime = Carbon::parse($start_time); // Example start date and time
            $endTime = Carbon::parse(Carbon::now()); // Example end date and time
            $timeDifferenceInMinutes = $endTime->diffInMinutes($startTime);
        } else {
            $testInfo = new StudentTest();
            $testInfo->student_id = $user_id;
            $testInfo->test_id = $test_id;
            $testInfo->total_mark = 0;
            $testInfo->start_date = Carbon::now()->format('Y-m-d');
            $testInfo->start_time = Carbon::now()->format('Y-m-d H:i:s');
            $testInfo->save();
        }
        $start_time = $testInfo->start_time;
        $start_time_second = strtotime($testInfo->start_time);
        $studentTestId = $testInfo->id;
        if ($studentTestInfo) {
            $total_ans_save = StudentTestResult::where('student_id', $user_id)->where('test_id', $test_id)->count();
            if ($timeDifferenceInMinutes >= $total_time || $total_question == $total_ans_save) {
                $total_correct = StudentTestResult::where('test_id', $test_id)->where('student_id', $user_id)->where('is_correct', 1)->count();
                $total_Incorrect = StudentTestResult::where('test_id', $test_id)->where('student_id', $user_id)->where('is_correct', 0)->count();
                $total_skip = StudentTestResult::where('test_id', $test_id)->where('student_id', $user_id)->where('is_skip', 1)->count();
                return view('frontend.online_test.congratulations')->with(compact('total_Incorrect','total_correct','total_skip'));
            }

        }



        return view('frontend.online_test.index')->with(compact('test_id', 'start_time', 'start_time_second', 'studentTestId', 'questionPaperInfo', 'total_question'));
    }

    public function questionShow(Request $request)
    {
        $test_id = $request->data;
        $user_id = Auth::user()->id;
        $completeQuestion = StudentTestResult::where('student_id', $user_id)->where('test_id', $test_id)->pluck('question_id');
        $question = QuestionPaperQuestionList::where('question_paper_id', $test_id)->whereNotIn('question_id', $completeQuestion)->with("questionInfo")->first();
        $total_correct = StudentTestResult::where('test_id', $test_id)->where('student_id', $user_id)->where('is_correct', 1)->count();
        $total_Incorrect = StudentTestResult::where('test_id', $test_id)->where('student_id', $user_id)->where('is_correct', 0)->count();
        $total_skip = StudentTestResult::where('test_id', $test_id)->where('student_id', $user_id)->where('is_skip', 1)->count();
        if ($question) {
            $questionList = QuestionOption::where('question_id', $question->question_id)->get();
            $question_no = StudentTestResult::where('student_test_id', $request->student_test_id)->count() + 1;
            $newQuestion = view('frontend.online_test._question_show')->with(compact('question', 'questionList', 'question_no'))->render();
        } else {
            $newQuestion = "<h1 style='text-align: center'>Thank you, you have completed your test</h1>";
        }

        $date = [
            'new_question' => $newQuestion,
            'total_correct' => $total_correct,
            'total_Incorrect' => $total_Incorrect,
            'total_skip' => $total_skip,
        ];
        return $date;
    }

    public function storeAns(Request $request)
    {
        $user_id = Auth::user()->id;
        $question_id = $request->question_id;
        $is_skip = $request->is_skip;
        $testInfo = StudentTest::where('student_id', $user_id)->first();

        $start_time = strtotime($testInfo->start_time);
        $nowTime = strtotime(Carbon::now());
        $startTime = Carbon::createFromTimestamp($start_time);
        $endTime = Carbon::createFromTimestamp($nowTime);
        //Calculate the difference in minutes
        $totalMinutesExpend = $endTime->diffInMinutes($startTime);

        $student_test_id = $testInfo->id;

        if ($is_skip) {
            $is_correct = 3;
            $selected_option = 0;
        } else {
            $selected_option = $request->selected_option;
            $is_correct = QuestionOption::find($selected_option)->is_true;
        }

        $questionPaperInfo = QuestionPaper::find($request->test_id);
        $is_in_time = $totalMinutesExpend <= $questionPaperInfo->duration;
       // if ($is_in_time) {
            $testResult = new StudentTestResult();
            $testResult->test_id = $request->test_id;
            $testResult->student_id = $user_id;
            $testResult->student_test_id = $request->student_test_id;
            $testResult->question_id = $question_id;
            $testResult->is_skip = $is_skip;
            $testResult->selected_option_id = $selected_option;
            $testResult->is_correct = $is_correct;
            $testResult->ans_time = Carbon::now();
            $testResult->save();
      //  }

        $completeQuestion = StudentTestResult::where('student_id', $user_id)->where('test_id', $request->test_id)->pluck('question_id');
        $test_id = $request->test_id;
        $question = QuestionPaperQuestionList::where('question_paper_id', $test_id)->whereNotIn('question_id', $completeQuestion)->with("questionInfo")->first();

        if ($question) {
            $questionList = QuestionOption::where('question_id', $question->question_id)->get();
            $question_no = StudentTestResult::where('student_test_id', $request->student_test_id)->count() + 1;
            $newQuestion = view('frontend.online_test._question_show')->with(compact('question', 'questionList', 'question_no'))->render();
        } else {
            $newQuestion = 0;
        }

        $total_correct = StudentTestResult::where('test_id', $test_id)->where('student_id', $user_id)->where('is_correct', 1)->count();
        $total_Incorrect = StudentTestResult::where('test_id', $test_id)->where('student_id', $user_id)->where('is_correct', 0)->count();
        $total_skip = StudentTestResult::where('test_id', $test_id)->where('student_id', $user_id)->where('is_skip', 1)->count();

        $test_info=StudentTest::where('test_id', $test_id)->where('student_id', $user_id)->first();
        $test_info->total_mark=$total_correct;
        $test_info->save();

        $date = [
            'new_question' => $newQuestion,
            'total_correct' => $total_correct,
            'total_Incorrect' => $total_Incorrect,
            'questionPaperInfo' => $questionPaperInfo,
            'is_in_time' => $totalMinutesExpend,
            'is_true' => $is_correct,
            'total_skip' => $total_skip,
        ];
        return $date;


    }


}
