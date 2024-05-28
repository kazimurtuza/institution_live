<?php

namespace App\Livewire\Admin;
use App\Models\Categories;
use Livewire\Component;

class AddCategory extends Component
{
    public $name,$details;

    protected $rules = [

        'name' => 'required'

    ];


    public function store()
    {
        //dd('ok');
        $this->validate();

        $addCategory = new Categories();

        $addCategory->name = $this->name;
        $addCategory->details = $this->details;


        $added = $addCategory->save();

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
        return view('livewire.admin.add-category')->layout('layouts.admin_base');
    }
}
