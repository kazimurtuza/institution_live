<?php

namespace App\Livewire\Admin;
use App\Models\FaqCategory as FaqCategoryDB;
use Livewire\Component;

class FaqCategoryUpdate extends Component
{
    public $category_name,$id;

    public function mount($faq_cat_id)
    {
        $this->cat_id = $faq_cat_id;
        $post_details = FaqCategoryDB::where('id', $this->cat_id)->first();
        $this->category_name = $post_details->category_name;
        $this->id = $post_details->id;
    }
    public function store()
    {
        //dd('ok');
       
        //$this->validate();

        $addPost = FaqCategoryDB::find($this->id);

        $addPost->category_name = $this->category_name;
        

        $added = $addPost->save();

        if($added)
        {
            session()->flash('add_message', 'Successfully Updated');
        }
        else{
            session()->flash('add_message', 'Sorry !');
        }
    }

    public function render()
    {
        return view('livewire.admin.faq-category-update')->layout('layouts.admin_base');
    }
}
