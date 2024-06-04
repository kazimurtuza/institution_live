<?php

namespace App\Livewire\Admin;
use App\Models\Instructors;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class InstructorUpdate extends Component
{
    public $name,$pic,$details,$location,$specialization,$id;

    use WithFileUploads;

    public function mount($ins_id)
    {
        $this->$ins_id = $ins_id;
        $post_details = Instructors::where('id', $this->$ins_id)->first();
        $this->name = $post_details->name;
        $this->details = $post_details->details;
        $this->specialization = $post_details->specialization;
        $this->location = $post_details->location;
        $this->id = $post_details->id;
    }

    public function store()
    {
        //dd('ok');


        $addPost = Instructors::find($this->id);

        $addPost->name = $this->name;
        $addPost->details = $this->details;
        $addPost->specialization = $this->specialization;
        $addPost->location = $this->location;

        if($this->pic)
        {
//            $file_to_store=$this->pic->store('instructors','public');

            $path = $this->pic->store('images', 's3');
            $file_to_store = Storage::disk('s3')->url($path);

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
        return view('livewire.admin.instructor-update')->layout('layouts.admin_base');
    }
}
