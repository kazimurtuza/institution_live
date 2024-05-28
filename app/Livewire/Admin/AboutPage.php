<?php

namespace App\Livewire\Admin;
use App\Models\AboutPage as AboutPageDB;
use Livewire\Component;
use Livewire\WithFileUploads;

class AboutPage extends Component
{
    use WithFileUploads;
    public $name,$chairman_short_message,$chairman_details_message,$chairman_pic,$vission_short_message,$vission_details_message,$vission_pic,$mission_short_message,$mission_one_title,$mission_one_details,
    $mission_two_title,$mission_two_details,$mission_pic,$meta_title,$meta_details,$page_banner,$id;

    public function mount()
    {
        $post_details = AboutPageDB::where('id', 1)->first();
        $this->name = $post_details->name;
        $this->chairman_short_message = $post_details->chairman_short_message;
        $this->chairman_details_message = $post_details->chairman_details_message;
        $this->vission_short_message = $post_details->vission_short_message;
        $this->vission_details_message = $post_details->vission_details_message;
        $this->mission_short_message = $post_details->mission_short_message;
        $this->mission_one_title = $post_details->mission_one_title;
        $this->mission_one_details = $post_details->mission_one_details;
        $this->mission_two_title = $post_details->mission_two_title;
        $this->mission_two_details = $post_details->mission_two_details;
        $this->meta_title = $post_details->meta_title;
        $this->meta_details = $post_details->meta_details;
        $this->id = $post_details->id;
    }

    public function store()
    {
        //dd('ok');
       
        //$this->validate();

        $addPost = AboutPageDB::find($this->id);

        $addPost->name = $this->name;
        $addPost->chairman_short_message = $this->chairman_short_message;
        $addPost->chairman_details_message = $this->chairman_details_message;
        $addPost->vission_short_message = $this->vission_short_message;
        $addPost->vission_details_message = $this->vission_details_message;
        $addPost->mission_short_message = $this->mission_short_message;
        $addPost->mission_one_title = $this->mission_one_title;
        $addPost->mission_one_details = $this->mission_one_details;
        $addPost->mission_two_title = $this->mission_two_title;
        $addPost->mission_two_details = $this->mission_two_details;
        $addPost->meta_title = $this->meta_title;
        $addPost->meta_details = $this->meta_details;

        


        if($this->page_banner)
        {
            $file_to_store=$this->page_banner->store('pages_banner','public');
            $addPost->page_banner = $file_to_store;
        }
        else{}

        if($this->chairman_pic)
        {
            $file_to_store=$this->chairman_pic->store('pages_banner','public');
            $addPost->chairman_pic = $file_to_store;
        }
        else{}

        if($this->vission_pic)
        {
            $file_to_store=$this->vission_pic->store('pages_banner','public');
            $addPost->vission_pic = $file_to_store;
        }
        else{}

        if($this->mission_pic)
        {
            $file_to_store=$this->mission_pic->store('pages_banner','public');
            $addPost->mission_pic = $file_to_store;
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
        return view('livewire.admin.about-page')->layout('layouts.admin_base');
    }
}
