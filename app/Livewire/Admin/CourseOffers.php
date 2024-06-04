<?php

namespace App\Livewire\Admin;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use App\Models\CourseOffers as CourseOffersDB;
use Livewire\Component;

class CourseOffers extends Component
{
    use WithFileUploads;

    public $name,$first_section,$type_one,$type_two,$type_three,$level_one,$level_two,$level_three,$sub_one,$sub_two,$sub_three,$fee_one,$fee_two,$fee_three,$last_section,$meta_title,$meta_details,$page_banner,$id;

    public function mount()
    {
        $post_details = CourseOffersDB::where('id', 1)->first();
        $this->name = $post_details->name;
        $this->first_section = $post_details->first_section;
        $this->type_one = $post_details->type_one;
        $this->type_two = $post_details->type_two;
        $this->type_three = $post_details->type_three;
        $this->level_one = $post_details->level_one;
        $this->level_two = $post_details->level_two;
        $this->level_three = $post_details->level_three;
        $this->sub_one = $post_details->sub_one;
        $this->sub_two = $post_details->sub_two;
        $this->sub_three = $post_details->sub_three;
        $this->fee_one = $post_details->fee_one;
        $this->fee_two = $post_details->fee_two;
        $this->fee_three = $post_details->fee_three;
        $this->last_section = $post_details->last_section;
        $this->meta_title = $post_details->meta_title;
        $this->meta_details = $post_details->meta_details;
        $this->id = $post_details->id;
    }

    public function store()
    {
        //dd('ok');

        //$this->validate();

        $addPost = CourseOffersDB::find($this->id);

        $addPost->name = $this->name;
        $addPost->first_section = $this->first_section;
        $addPost->type_one = $this->type_one;
        $addPost->type_two = $this->type_two;
        $addPost->type_three = $this->type_three;
        $addPost->level_one = $this->level_one;
        $addPost->level_two = $this->level_two;
        $addPost->level_three = $this->level_three;
        $addPost->sub_one = $this->sub_one;
        $addPost->sub_two = $this->sub_two;
        $addPost->sub_three = $this->sub_three;
        $addPost->fee_one = $this->fee_one;
        $addPost->fee_two = $this->fee_two;
        $addPost->fee_three = $this->fee_three;
        $addPost->last_section = $this->last_section;
        $addPost->meta_title = $this->meta_title;
        $addPost->meta_details = $this->meta_details;




        if($this->page_banner)
        {
//            $file_to_store=$this->page_banner->store('pages_banner','public');

            $path = $this->page_banner->store('images', 's3');
            $file_to_store = Storage::disk('s3')->url($path);
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
        return view('livewire.admin.course-offers')->layout('layouts.admin_base');
    }
}
