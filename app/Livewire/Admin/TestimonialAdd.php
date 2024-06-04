<?php

namespace App\Livewire\Admin;
use App\Models\Testimonials;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class TestimonialAdd extends Component
{
    public $name,$designation,$title,$pic,$details,$rating;

    use WithFileUploads;

    public function store()
    {
        //dd('ok');
       // $this->validate();

        $addTestimonial = new Testimonials();

        $addTestimonial->name = $this->name;
        $addTestimonial->designation = $this->designation;
        $addTestimonial->title = $this->title;
        $addTestimonial->rating = $this->rating;
        $addTestimonial->details = $this->details;

        if($this->pic)
        {
//            $file_to_store=$this->pic->store('testionials','public');
            $path = $this->pic->store('gallery', 's3');
            $file_to_store = Storage::disk('s3')->url($path);
            $addTestimonial->pic = $file_to_store;
        }
        else{}



        $added = $addTestimonial->save();

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
        return view('livewire.admin.testimonial-add')->layout('layouts.admin_base');
    }
}
