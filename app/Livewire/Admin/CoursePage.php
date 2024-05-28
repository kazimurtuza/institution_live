<?php

namespace App\Livewire\Admin;
use App\Models\CoursePage as CoursePageDB;
use Livewire\Component;
use Livewire\WithFileUploads;

class CoursePage extends Component
{
    use WithFileUploads;

    public $name,$lifetime,$money_back,$excercise,$shareable_cer,$access_on,$subtitle,$online_course,$details,$meta_title,$meta_details,$page_banner,$id;

    public function mount()
    {
        $post_details = CoursePageDB::where('id', 1)->first();
        $this->name = $post_details->name;
        $this->lifetime = $post_details->lifetime;
        $this->money_back = $post_details->money_back;
        $this->excercise = $post_details->excercise;
        $this->shareable_cer = $post_details->shareable_cer;
        $this->access_on = $post_details->access_on;
        $this->subtitle = $post_details->subtitle;
        $this->online_course = $post_details->online_course;
        $this->details = $post_details->details;
        $this->meta_title = $post_details->meta_title;
        $this->meta_details = $post_details->meta_details;
        $this->id = $post_details->id;
    }

    public function store()
    {
        //dd('ok');
       
        //$this->validate();

        $addPost = CoursePageDB::find($this->id);

        $addPost->name = $this->name;
        $addPost->lifetime = $this->lifetime;
        $addPost->money_back = $this->money_back;
        $addPost->excercise = $this->excercise;
        $addPost->shareable_cer = $this->shareable_cer;
        $addPost->access_on = $this->access_on;
        $addPost->subtitle = $this->subtitle;
        $addPost->online_course = $this->online_course;
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
        return view('livewire.admin.course-page')->layout('layouts.admin_base');
    }
}
