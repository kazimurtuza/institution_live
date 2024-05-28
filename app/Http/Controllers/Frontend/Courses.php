<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CourseRating;
use App\Models\Question;
use App\Models\QuestionPaper;
use Illuminate\Http\Request;
use App\Models\Courses as CoursesDB;
use App\Models\CoursePage;
use App\Models\Subjects;
use App\Models\CourseSubscription;
use App\Models\CourseOffers as CourseOffersDB;
use App\Models\CourseResources;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class Courses extends Controller
{
   
   public function course_offers()
   {
      $contact_page_content = CourseOffersDB::where('status', 0)->first();
        return view('frontend/course_offers', ['page_content' => $contact_page_content]);
      
   }
   public static function rating_check($course_id)
   {
     $rating = CourseRating::where('course_id', $course_id)->where('user_id', Auth::user()->id)->first();
     if($rating)
     {
        return $rating->id;
     }
     else{
        return 0;
     }
   }
   public static function rating_comments($course_id)
   {
    $rating = CourseRating::where('course_id', $course_id)->where('user_id', Auth::user()->id)->first();
     if($rating)
     {
        return $rating->comments;
     }
     else{
        return 0;
     }
   }
    public function courses_subject()
   {
    $segment = request()->segment(3);
    $all_courses = CoursesDB::where('is_delete',0)->where('subject',$segment)->paginate(9);
    //dd($all_courses);
    $contact_page_content = CoursePage::where('status', 0)->first();
    $all_subjects = Subjects::where('is_delete', 0)->get();
    $payment_type = '';
    return view('frontend.courses.index',['all_subjects' => $all_subjects ,'payment_type' => $payment_type,'page_content' => $contact_page_content,'data' => $all_courses]);
   }
    public function course_category_wise()
   {
    $segment = request()->segment(3);
    $all_courses = CoursesDB::where('is_delete',0)->where('category',$segment)->paginate(9);
    //dd($all_courses);
    $contact_page_content = CoursePage::where('status', 0)->first();
    $all_subjects = Subjects::where('is_delete', 0)->get();
    $payment_type = '';
    return view('frontend.courses.index',['all_subjects' => $all_subjects ,'payment_type' => $payment_type,'page_content' => $contact_page_content,'data' => $all_courses]);
   }

 public function filter_courses(Request $request)
 {
    
    $all_courses = CoursesDB::where('is_delete',0)->where('payment_type',$request->payment_type)->paginate(9);
    //dd($all_courses);
    $contact_page_content = CoursePage::where('status', 0)->first();
    $all_subjects = Subjects::where('is_delete', 0)->get();

    return view('frontend.courses.index',['all_subjects' => $all_subjects ,'payment_type' => $request->payment_type,'page_content' => $contact_page_content,'data' => $all_courses]);
 }
    public function index()
    {
        $all_courses = CoursesDB::where('is_delete',0)->paginate(9);
        //dd($all_courses);
        $all_subjects = Subjects::where('is_delete', 0)->get();
        $contact_page_content = CoursePage::where('status', 0)->first();
        $payment_type = '';
        return view('frontend.courses.index',['all_subjects' => $all_subjects ,'payment_type' => $payment_type,'page_content' => $contact_page_content,'data' => $all_courses]);
    }

    public function purchaseCourseList(){
        $all_courses = \App\Models\Courses::where('is_delete',0)->get();
        return view('frontend.courses.purchase_courses',['courses' => $all_courses]);
    }

    public function purchaseCourseTest(Request $request){
       $questionList=QuestionPaper::where('course',$request->course_id)->where('is_delete',0)->get();
       return view('frontend.courses.course_test_list',['testList' => $questionList]);

    }

    public function course_details($id)
    {
        //dd($id);
        $get_course = CoursesDB::where('is_delete',0)->where('id', $id)->first();

        if($get_course)
        {

         $total_enrolled = CourseSubscription::where('is_delete',0)->where('course_id', $id)->count();

         $contact_page_content = CoursePage::where('status', 0)->first();
 
         $course_rating_comments = CourseRating::where('course_id',$id)->get();
         
         $related_courses = CoursesDB::inRandomOrder()->limit(5)->where('id','!=', $id)->where('category', $get_course->category)->where('is_delete',0)->where('id', $id)->get();
 
         $get_course_resources = CourseResources::where('is_delete',0)->where('course_id', $id)->get();
 
         //dd($get_course_resources);
         
 
         return view('frontend.courses.details',['get_course_resources'=>$get_course_resources,'course_rating_comments'=>$course_rating_comments,'page_content' => $contact_page_content,'total_enrolled' => $total_enrolled,'data' => $get_course, 'related_courses'=> $related_courses]);

        }
        else{
         return redirect()->to('/courses');
        }

       
    }

    public function course_rating_add(Request $request){
        //dd('test');
        $user_id=Auth::user()->id;
        $course_id=$request->course_id;
        $rating=$request->rating;
        $comments=$request->comments;
        

        $update=CourseRating::where('user_id',$user_id)->where('course_id',$course_id)->first();
        if($update){
            $create=$update;
        }else{
            $create=new CourseRating();
        }

        //dd($update);

        $create->user_id=$user_id;
        $create->course_id=$course_id;
        $create->rating=$rating;
        $create->comments=$comments;
        $create->save();
        $course_rating= CourseRating::where('course_id',$course_id)->get();
        $total_rating=$course_rating->sum('rating');
        $total_user=$course_rating->count();
        $avgRating = $total_rating / $total_user;
        $course_update= \App\Models\Courses::find($course_id);
        $course_update->avg_rating=$avgRating;
        $course_update->save();

        return redirect()->back()->with('success','Success fully Rating Updated');
    }
}
