<?php

namespace App\Livewire\Admin;
use App\Models\Subjects;
use Livewire\Component;

class SubjectUpdate extends Component
{
    public $name,$details,$id;
    public function mount($sub_id)
    {
        $this->$sub_id = $sub_id;
        $post_details = Subjects::where('id', $this->$sub_id)->first();
        $this->name = $post_details->name;
        $this->details = $post_details->details;
        $this->id = $post_details->id;
    }

    public function store()
    {
        //dd('ok');
       

        $addPost = Subjects::find($this->id);

        $addPost->name = $this->name;
        $addPost->details = $this->details;


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
        return view('livewire.admin.subject-update')->layout('layouts.admin_base');
    }
}
