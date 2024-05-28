<?php

namespace App\Livewire\Admin;
use App\Models\FaqCategory as FaqCategoryDB;
use Livewire\Component;

class FaqCategory extends Component
{
    public function delete_faq_category($cat_id)
    {
        $disable_resource = FaqCategoryDB::find($cat_id);

        $disable_resource->is_delete = 1;
        $disable_resource->save();
        session()->flash('delete_message', 'Successfully Deleted');
        return redirect()->to('/admin/all_faq_categories/');
    }
    public function render()
    {
        $all_categories = FaqCategoryDB::where('status',0)->where('is_delete',0)->get();

        return view('livewire.admin.faq-category', ['all_data' => $all_categories])->layout('layouts.admin_base');
    }
}
