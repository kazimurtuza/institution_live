<?php

namespace App\Livewire\Admin;
use App\Models\Testimonials;
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
            $file_to_store=$this->pic->store('testionials','public');
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
