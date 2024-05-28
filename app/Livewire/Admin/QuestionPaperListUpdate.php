<?php

namespace App\Livewire\Admin;
use App\Models\QuestionPaper;
use Livewire\Component;

class QuestionPaperListUpdate extends Component
{
    public function render()
    {
        return view('livewire.admin.question-paper-list-update')->layout('layouts.admin_base');
    }
}
