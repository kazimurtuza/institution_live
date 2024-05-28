<?php

namespace App\Livewire\Admin;
use App\Models\Question;
use App\Models\Categories;
use Livewire\Component;

class QuestionListUpdate extends Component
{
    



    public function render()
    {
        $all_categories = Categories::where('is_delete', 0)->get();
        return view('livewire.admin.question-list-update',['categories' => $all_categories])->layout('layouts.admin_base');
    }
}
