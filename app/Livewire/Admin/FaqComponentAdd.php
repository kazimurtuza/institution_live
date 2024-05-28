<?php

namespace App\Livewire\Admin;
use App\Models\FaqModel;
use App\Models\FaqCategory as FaqCategoryDB;
use Livewire\Component;

class FaqComponentAdd extends Component
{
    public $cat_name,$question,$answer;

    public function store()
    {
        //dd('ok');
       
        //$this->validate();

        $addPost = new FaqModel();

        $addPost->cat_name = $this->cat_name;
        $addPost->question = $this->question;
        $addPost->answer = $this->answer;

        

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
        $all_categories = FaqCategoryDB::where('status',0)->where('is_delete',0)->get();
        return view('livewire.admin.faq-component-add',['all_categories' => $all_categories])->layout('layouts.admin_base');
    }
}
