<?php

namespace App\Livewire\Admin;
use App\Models\FaqModel;
use App\Models\FaqCategory as FaqCategoryDB;
use Livewire\Component;

class FaqComponents extends Component
{
    public function render()
    {
        $all_faqs = FaqModel::where('status',0)->where('is_delete',0)->get();
        
        return view('livewire.admin.faq-components',['all_data' => $all_faqs])->layout('layouts.admin_base');
    }
}
