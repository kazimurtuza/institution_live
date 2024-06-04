<?php

namespace App\Livewire\Admin;
use App\Models\Testimonials;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\Component;

class TestimonialUpdate extends Component
{
    public $name,$designation,$title,$pic,$details,$rating,$id;
    use WithFileUploads;

    public function mount($test_id)
    {
        $this->$test_id = $test_id;
        $post_details = Testimonials::where('id', $this->$test_id)->first();
        $this->name = $post_details->name;
        $this->designation = $post_details->designation;
        $this->title = $post_details->title;
        $this->details = $post_details->details;
        $this->rating = $post_details->rating;
        $this->id = $post_details->id;
    }

    public function store()
    {
        //dd('ok');


        $addPost = Testimonials::find($this->id);

        $addPost->name = $this->name;
        $addPost->designation = $this->designation;
        $addPost->title = $this->title;
        $addPost->rating = $this->rating;
        $addPost->details = $this->details;

        if($this->pic)
        {
//            $file_to_store=$this->pic->store('testmonials','public');

            $path = $this->pic->store('images', 's3');
            $file_to_store =Storage::disk('s3')->url($path);

            $addPost->pic = $file_to_store;
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
        return view('livewire.admin.testimonial-update')->layout('layouts.admin_base');
    }
}
