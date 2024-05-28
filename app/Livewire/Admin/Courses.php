<?php

namespace App\Livewire\Admin;
use App\Models\Courses as CoursesDB;
use Livewire\Component;

class Courses extends Component
{
    public function render()
    {
        $all_courses = CoursesDB::where('is_delete',0)->get();
        return view('livewire.admin.courses', ['all_data' => $all_courses])->layout('layouts.admin_base');
    }
}
