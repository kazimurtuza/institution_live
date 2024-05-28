<?php

namespace App\Livewire\Admin;
use App\Models\Courses as CoursesDB;
use App\Models\CourseSubscription;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CustomerSubscriptions extends Component
{
    public function render()
    {
        $subscribed_courses = DB::table('course_subscriptions')
        ->select('*')
        ->join('courses', 'courses.id', '=', 'course_subscriptions.course_id')
        ->where('course_subscriptions.status', 0)
        ->where('course_subscriptions.is_delete', 0)
        ->get();

        return view('livewire.admin.customer-subscriptions', ['all_data' => $subscribed_courses])->layout('layouts.admin_base');
    }
}
