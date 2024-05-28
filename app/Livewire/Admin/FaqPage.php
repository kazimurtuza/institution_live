<?php

namespace App\Livewire\Admin;
use App\Models\Faqpage as FaqpageDB;
use Livewire\Component;
use Livewire\WithFileUploads;

class FaqPage extends Component
{
    use WithFileUploads;

    public $name,$details,$meta_title,$meta_details,$page_banner,$id;

    public function mount()
    {
        $post_details = FaqpageDB::where('id', 1)->first();
        $this->name = $post_details->name;
        $this->details = $post_details->details;
        $this->meta_title = $post_details->meta_title;
        $this->meta_details = $post_details->meta_details;
        $this->id = $post_details->id;
    }

    public function store()
    {
        //dd('ok');
       
        //$this->validate();

        $addPost = FaqpageDB::find($this->id);

        $addPost->name = $this->name;
        $addPost->details = $this->details;
        $addPost->meta_title = $this->meta_title;
        $addPost->meta_details = $this->meta_details;

        


        if($this->page_banner)
        {
            $file_to_store=$this->page_banner->store('pages_banner','public');
            $addPost->page_banner = $file_to_store;
        }
        else{}

        

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
        return view('livewire.admin.faq-page')->layout('layouts.admin_base');
    }
}
