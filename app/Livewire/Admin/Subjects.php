<?php

namespace App\Livewire\Admin;
use App\Models\Subjects as SubjectsDB;
use Livewire\Component;

class Subjects extends Component
{
    public function render()
    {
        $all_subjects = SubjectsDB::where('status',0)->where('is_delete',0)->get();
        return view('livewire.admin.subjects', ['all_data' => $all_subjects])->layout('layouts.admin_base');
    }
}
