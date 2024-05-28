<?php

namespace App\Livewire\Admin;

use App\Models\Categories;
use Livewire\Component;

class AddQuestion extends Component
{
    public function render()
    {
        $all_categories = Categories::where('is_delete', 0)->get();
        return view('livewire.admin.add-question',['categories' => $all_categories])->layout('layouts.admin_base');
    }
}
