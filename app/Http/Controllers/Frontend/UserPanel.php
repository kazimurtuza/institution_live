<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Courses as CoursesDB;
use App\Models\CourseSubscription;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Wishlists;
use App\Models\User;
use App\Models\StudentTest;
use Illuminate\Support\Facades\Hash;

class UserPanel extends Controller
{
    public static function get_test_check($test_id)
    {
        $subscribed_courses = StudentTest::where('test_id', $test_id)->where('student_id',Auth::user()->id)->first();

        if($subscribed_courses)
        {
            return $subscribed_courses;
        }
        else{
            
            return 0;
        }
    }
    public static function  get_test_result($course_id)
    {
        $subscribed_courses = DB::table('question_papers')
        ->select('*')
        ->join('student_tests', 'student_tests.test_id', '=', 'question_papers.id')
        ->where('question_papers.course', $course_id)
        ->where('student_tests.student_id', Auth::user()->id)
        ->first();

        if($subscribed_courses)
        {
            return $subscribed_courses;
        }
        else{
            
            return 0;
        }
        
        
    }
    public function account_update(Request $request)
    {
        //dd('ff');
        $update_user = User::find(Auth::user()->id);
        $update_user->name = $request->fname.' '.$request->lname;

        if($request->image)
        {
            $imageName= time().'.'.$request->image->getClientOriginalExtension();
            $request->image->storeAs('public/user_images',$imageName);
    
            $update_user->profile_photo_path = 'user_images/'.$imageName;
        }
       

        $update_user->save();

        return redirect()->back()->with('success','Successfully User Information Updated, Thank You');
    }
    public function account_security(Request $request)
    {
        $user_info = User::find(Auth::user()->id);
        $update_user = User::find(Auth::user()->id);
       

        $input_pass = Hash::make($request->current_password);
        //dd($input_pass);

        if(Hash::check($request->current_password,$user_info->password))
        {
            if($request->new_password == $request->confirm_password)
            {
                $update_user->password= Hash::make($request->confirm_password);
                $update_user->save();
                //session()->flash('add_message', 'Password and Account Info has been successfully updated!');
                return redirect()->back()->with('success','Password and Account Info has been successfully updated!');
            }
            else{
                //session()->flash('add_worng_message', 'Confirm Password Does Not Match!');
                return redirect()->back()->with('success','Confirm Password Does Not Match!');
            }
            
        }
        else{
            //session()->flash('add_worng_message', 'old Password Does Not Match!');
            return redirect()->back()->with('success','old Password Does Not Match!');

        }

        
    }
    public function wishlistRemove()
    {
        //dd();

        Wishlists::where('id', request()->segment(3))->delete();
        return redirect()->back()->with('success','Wishlist Successfully Removed!');
    }
    public function user_dashboard()
    {
         $subscribed_courses = DB::table('course_subscriptions')
        ->select('*')
        ->join('courses', 'courses.id', '=', 'course_subscriptions.course_id')
        ->where('course_subscriptions.customer_id', Auth::user()->id)
        ->where('course_subscriptions.status', 0)
        ->where('course_subscriptions.is_delete', 0)
        ->get();

        $wishlists = DB::table('wishlists')
        ->select('*','wishlists.id as wish_id')
        ->join('courses', 'courses.id', '=', 'wishlists.course_id')
        ->where('wishlists.customer_id', Auth::user()->id)
        ->where('wishlists.status', 0)
        ->where('wishlists.is_delete', 0)
        ->get();

        $user_info = User::where('id', Auth::user()->id)->first();

        
       

        $purchase_histories = CourseSubscription::where('customer_id', Auth::user()->id)->where('status',0)->where('is_delete',0)->get();

        //dd($subscribed_courses);

        $total_subcribed = CourseSubscription::where('customer_id', Auth::user()->id)->count();
        $get_result = StudentTest::where('student_id', Auth::user()->id)->sum('total_mark');
        $total_participants = StudentTest::where('student_id', Auth::user()->id)->count();

        

        return view('frontend/user_dashboard/user_dashboard',['total_participants' => $total_participants,'get_result' => $get_result,'total_subcribed' => $total_subcribed,'subscribed_courses' => $subscribed_courses,'wishlists' => $wishlists, 'purchase_histories' => $purchase_histories, 'user_info' => $user_info]);
    }
}
