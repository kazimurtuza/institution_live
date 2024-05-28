<?php

namespace App\Livewire\Admin;
use App\Models\Instructors as InstructorsDB;
use Livewire\Component;

class Instructors extends Component
{
    public function render()
    {
        $all_instructors = InstructorsDB::where('is_delete', 0)->get();
        return view('livewire.admin.instructors', ['all_data' => $all_instructors])->layout('layouts.admin_base');
    }
}
