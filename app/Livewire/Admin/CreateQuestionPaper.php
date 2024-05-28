<?php

namespace App\Livewire\Admin;

use App\Models\Categories;
use Livewire\Component;

class CreateQuestionPaper extends Component
{
    public function render()
    {
        $all_categories = Categories::where('is_delete', 0)->get();
        return view('livewire.admin.create-question-paper',['categories' => $all_categories])->layout('layouts.admin_base');
    }
}
