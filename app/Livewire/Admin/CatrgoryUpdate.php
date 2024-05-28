<?php

namespace App\Livewire\Admin;
use App\Models\Categories;
use Livewire\Component;

class CatrgoryUpdate extends Component
{
    public $name,$details,$id;
    public function mount($cat_id)
    {
        $this->$cat_id = $cat_id;
        $post_details = Categories::where('id', $this->$cat_id)->first();
        $this->name = $post_details->name;
        $this->details = $post_details->details;
        $this->id = $post_details->id;
    }

    public function store()
    {
        //dd('ok');
       

        $addPost = Categories::find($this->id);

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
        return view('livewire.admin.catrgory-update')->layout('layouts.admin_base');
    }
}
