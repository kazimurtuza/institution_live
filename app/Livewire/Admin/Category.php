<?php

namespace App\Livewire\Admin;
use App\Models\Categories;
use Livewire\Component;

class Category extends Component
{
    public function render()
    {
        $all_categories = Categories::where('status',0)->where('is_delete',0)->get();
        return view('livewire.admin.category', ['all_data' => $all_categories])->layout('layouts.admin_base');
    }
}
