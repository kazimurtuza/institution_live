<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Courses;
use App\Models\CourseSubscription;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ContactPage;
use App\Models\TermPage;
use App\Models\HomePage as HomePageDB;
use App\Models\Policy;
use App\Models\ContactInfo;
use App\Models\Subjects;
use App\Models\Instructors;
use App\Models\Testimonials;
use App\Models\FaqModel;
use App\Models\Question;
use App\Models\QuestionPaper;
use App\Models\AboutPage;
use App\Models\KeyFeaturs;

class HomePage extends Controller
{
    public function Delete_category()
    {
        $segment = request()->segment(3);
        //dd($segment);
        Categories::where('id',$segment)->update([
            'is_delete'=> 1,
            ]);

            session()->flash('add_message', 'Successfully Deleted');

        return redirect()->to('/admin/all-categories');
    }
    public function Delete_subject()
    {
        $segment = request()->segment(3);
        //dd($segment);
        Subjects::where('id',$segment)->update([
            'is_delete'=> 1,
            ]);

            session()->flash('add_message', 'Successfully Deleted');

        return redirect()->to('/admin/all-subjects');
    }
    public function Delete_instructor()
    {
        $segment = request()->segment(3);
        //dd($segment);
        Instructors::where('id',$segment)->update([
            'is_delete'=> 1,
            ]);

            session()->flash('add_message', 'Successfully Deleted');

        return redirect()->to('/admin/all-instructors');
    }

    public function Delete_course()
    {
        $segment = request()->segment(3);
        //dd($segment);
        Courses::where('id',$segment)->update([
            'is_delete'=> 1,
            ]);

            session()->flash('add_message', 'Successfully Deleted');

        return redirect()->to('/admin/all-courses');
    }

    public function Delete_testimonial()
    {
        $segment = request()->segment(3);
        //dd($segment);
        Testimonials::where('id',$segment)->update([
            'is_delete'=> 1,
            ]);

            session()->flash('add_message', 'Successfully Deleted');

        return redirect()->to('/admin/testimonials');
    }

    public function Delete_faq()
    {
        $segment = request()->segment(3);
        //dd($segment);
        FaqModel::where('id',$segment)->update([
            'is_delete'=> 1,
            ]);

            session()->flash('add_message', 'Successfully Deleted');

        return redirect()->to('/admin/faq_components');
    }
    public function Delete_key_features()
    {
        $segment = request()->segment(3);
        //dd($segment);
        KeyFeaturs::where('id',$segment)->update([
            'is_delete'=> 1,
            ]);

            session()->flash('add_message', 'Successfully Deleted');

        return redirect()->to('/admin/key_features');
    }

    
    public function Delete_question_list()
    {
        $segment = request()->segment(3);
        //dd($segment);
        Question::where('id',$segment)->update([
            'is_delete'=> 1,
            ]);

            session()->flash('add_message', 'Successfully Deleted');

        return redirect()->to('/admin/question/list');
    }

    public function Delete_question_paper_list()
    {
        $segment = request()->segment(3);
        //dd($segment);
        QuestionPaper::where('id',$segment)->update([
            'is_delete'=> 1,
            ]);

            session()->flash('add_message', 'Successfully Deleted');

        return redirect()->to('/admin/question/paper/list');
    }
    
    
    
    
    public function user_block()
    {
        $segment = request()->segment(2);
        //dd($segment);

        $update_user = User::find($segment);
        $update_user->status = 1;

        $update_user->save();

        return redirect()->back()->with('success','User Successfully Blocked, Thank You');
    }
    public function user_unblock()
    {
        $segment = request()->segment(2);

        $update_user = User::find($segment);
        $update_user->status = 0;

        $update_user->save();

        return redirect()->back()->with('success','User Successfully UnBlocked, Thank You');
    }
    public function index()
    {
        $all_categories = Categories::where('status',0)->where('is_delete',0)->get();
        $related_courses = Courses::inRandomOrder()->limit(5)->where('is_delete',0)->get();
        $testimonials = Testimonials::inRandomOrder()->limit(5)->where('is_delete',0)->get();
        $all_features = KeyFeaturs::where('status',0)->where('is_delete',0)->get();
        
        
        $contact_page_content = HomePageDB::where('id', 1)->first();
        return view('frontend/homepage',['all_features' => $all_features,'testimonials' => $testimonials,'page_content' => $contact_page_content, 'all_categories' => $all_categories, 'related_courses' => $related_courses]);
    }
    public function contact_page()
    {
        $contact_page_content = ContactPage::where('status', 0)->first();
        return view('frontend/contact_page', ['page_content' => $contact_page_content]);
    }
    public function about_us()
    {
        $total_courses = Courses::where('status', 0)->where('is_delete', 0)->count();
        $total_subscribed = CourseSubscription::where('status', 0)->where('is_delete', 0)->count();

        $contact_page_content = AboutPage::where('status', 0)->first();
        return view('frontend/about_page', ['page_content' => $contact_page_content, 'total_courses' => $total_courses, 'total_subscribed' => $total_subscribed]);
    }
    public function post_contact(Request $request)
    {
        $contactPost = new ContactInfo();
        $contactPost->fname = $request->fname;
        $contactPost->lname = $request->lname;
        $contactPost->email = $request->email;
        $contactPost->subject = $request->subject;
        $contactPost->message = $request->message;
        //dd($request->fname);

        $contactPost->save();

        

        return redirect()->back()->with('success','Successfully Sent, Thank You');
    }

    public function privecy_policy()
    {
        $contact_page_content = Policy::where('status', 0)->first();

        return view('frontend/privecy_policy',['page_content' => $contact_page_content]);
    }
    public function term_condition()
    {
        $contact_page_content = TermPage::where('status', 0)->first();

        return view('frontend/term_condition',['page_content' => $contact_page_content]);
    }
}
