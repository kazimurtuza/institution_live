<?php

namespace App\Livewire\Admin;
use App\Models\KeyFeaturs;
use Livewire\Component;
use Livewire\WithFileUploads;

class KeyFeaturesAdd extends Component
{
    public $title,$icon,$details;

    use WithFileUploads;

    protected $rules = [

        'title' => 'required'

    ];


    public function store()
    {
        //dd('ok');
        $this->validate();

        $addInstructor = new KeyFeaturs();

        $addInstructor->title = $this->title;
        $addInstructor->details = $this->details;

        if($this->icon)
        {
            $file_to_store=$this->icon->store('key_features','public');
            $addInstructor->icon = $file_to_store;
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
        return view('livewire.admin.key-features-add')->layout('layouts.admin_base');
    }
}
