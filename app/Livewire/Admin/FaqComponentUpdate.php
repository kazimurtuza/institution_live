<?php

namespace App\Livewire\Admin;
use App\Models\FaqModel;
use App\Models\FaqCategory as FaqCategoryDB;
use Livewire\Component;

class FaqComponentUpdate extends Component
{
    public $cat_name,$question,$answer,$id;

    public function mount($faq_id)
    {
        $this->faq_id = $faq_id;
        $post_details = FaqModel::where('id', $this->faq_id)->first();
        $this->cat_name = $post_details->cat_name;
        $this->question = $post_details->question;
        $this->answer = $post_details->answer;
        $this->id = $post_details->id;
    }

    public function store()
    {
        //dd('ok');
       
        //$this->validate();

        $addPost = FaqModel::find($this->id);

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
        return view('livewire.admin.faq-component-update',['all_categories' => $all_categories])->layout('layouts.admin_base');
    }
}
