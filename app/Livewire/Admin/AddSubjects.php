<?php

namespace App\Livewire\Admin;
use App\Models\Subjects;
use App\Models\Categories;
use Livewire\Component;

class AddSubjects extends Component
{
    public $name,$cat_id,$details;

    protected $rules = [

        'name' => 'required',
        'cat_id' => 'required'

    ];


    public function store()
    {
        //dd('ok');
        $this->validate();

        $addSubject = new Subjects();

        $addSubject->name = $this->name;
        $addSubject->cat_id = $this->cat_id;
        $addSubject->details = $this->details;


        $added = $addSubject->save();

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
        $all_categories = Categories::where('is_delete', 0)->get();
        return view('livewire.admin.add-subjects',['categories' => $all_categories])->layout('layouts.admin_base');
    }
}
