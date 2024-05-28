<?php

namespace App\Livewire\Admin;
use App\Models\FaqCategory as FaqCategoryDB;
use Livewire\Component;

class FaqCategoryAdd extends Component
{
    public $category_name;

    public function store()
    {
        //dd('ok');
       
        //$this->validate();

        $addPost = new FaqCategoryDB();

        $addPost->category_name = $this->category_name;
        

        $added = $addPost->save();

        if($added)
        {
            session()->flash('add_message', 'Successfully Added');
        }
        else{
            session()->flash('add_message', 'Sorry !');
        }
    }

    public function render()
    {
        return view('livewire.admin.faq-category-add')->layout('layouts.admin_base');
    }
}
