<?php

namespace App\Livewire\Admin;
use App\Models\Instructors;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddInstructors extends Component
{
    public $name,$pic,$details,$specialization,$location;

    use WithFileUploads;

    protected $rules = [

        'name' => 'required'

    ];


    public function store()
    {
        //dd('ok');
        $this->validate();

        $addInstructor = new Instructors();

        $addInstructor->name = $this->name;
        $addInstructor->details = $this->details;
        $addInstructor->specialization = $this->specialization;
        $addInstructor->location = $this->location;

        if($this->pic)
        {
            $file_to_store=$this->pic->store('instructors','public');
            $addInstructor->pic = $file_to_store;
        }
        else{}



        $added = $addInstructor->save();

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
        return view('livewire.admin.add-instructors')->layout('layouts.admin_base');
    }
}
