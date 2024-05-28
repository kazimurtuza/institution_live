<?php

namespace App\Livewire\Admin;
use App\Models\Courses;
use App\Models\CourseSubscription;
use App\Models\User;
use App\Models\Categories;
use App\Models\Instructors;
use App\Models\FaqCategory as FaqCategoryDB;
use Livewire\Component;

class AdminDashboard extends Component
{
    public function get_faq_category_name($faq_cat_id)
    {
        $get_name = FaqCategoryDB::select('category_name')->where('id',$faq_cat_id)->first();
        return $get_name->category_name;
    }
    public function get_course_name($course_id)
    {
        $get_name = Courses::select('title')->where('id',$course_id)->first();
        return $get_name->title;
    }
    public function customer_name($customer_id)
    {
        $get_name = User::select('name')->where('id',$customer_id)->first();
        return $get_name->name;
    }
    public function instructor_name($instructor_id)
    {
        $get_name = Instructors::select('name')->where('id',$instructor_id)->first();
        return $get_name->name;
    }
    public function get_category_name($category_id)
    {
        $get_name = Categories::select('name')->where('id',$category_id)->first();
        return $get_name->name;
    }

    public function instructor_pic($instructor_id)
    {
        $get_name = Instructors::select('pic')->where('id',$instructor_id)->first();
        return $get_name->pic;
    }
    public function user_pic($user_id)
    {
        $get_name = User::select('profile_photo_path')->where('id',$user_id)->first();
        return $get_name->profile_photo_path;
    }
    
    public function instructor_about_info($instructor_id)
    {
        $get_name = Instructors::select('details')->where('id',$instructor_id)->first();
        return $get_name->details;
    }
    public function instructor_specialization($instructor_id)
    {
        $get_name = Instructors::select('specialization')->where('id',$instructor_id)->first();
        return $get_name->specialization;
    }
    public function instructor_location($instructor_id)
    {
        $get_name = Instructors::select('location')->where('id',$instructor_id)->first();
        return $get_name->location;
    }
    
    public function render()
    {
        $total_courses = Courses::where('status', 0)->where('is_delete', 0)->count();
        $total_subscribed = CourseSubscription::where('status', 0)->where('is_delete', 0)->count();
        $total_users = User::where('usertype', 0)->where('status', 0)->count();

        $total_amount_received = CourseSubscription::where('payment_type', 'Paid')->where('status', 0)->where('is_delete', 0)->sum('course_price');

        return view('livewire.admin.admin-dashboard',['total_amount_received' => $total_amount_received,'total_courses' => $total_courses, 'total_subscribed' => $total_subscribed, 'total_users' => $total_users])->layout('layouts.admin_base');
    }
}
