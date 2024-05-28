<?php

namespace App\Livewire\Admin;
use App\Models\Settings as SettingsDB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Settings extends Component
{
    use WithFileUploads;
    public $address,$new_details,$newimg,$phone,$email,$logo,$favicon,$copyright,$facebook,$twitter,$instagram,$linkdin,$snapchat,$youtube,$fotter_summery,$id;
    public function mount()
    {
        $post_details = SettingsDB::where('id', 1)->first();
        $this->address = $post_details->address;
        $this->phone = $post_details->phone;
        $this->email = $post_details->email;
        $this->copyright = $post_details->copyright;
        $this->facebook = $post_details->facebook;
        $this->twitter = $post_details->twitter;
        $this->instagram = $post_details->instagram;
        $this->linkdin = $post_details->linkdin;
        $this->snapchat = $post_details->snapchat;
        $this->youtube = $post_details->youtube;
        $this->fotter_summery = $post_details->fotter_summery;
        $this->new_details = $post_details->new_details;
        $this->id = $post_details->id;
    }

    public function store()
    {
        //dd('ok');
       
        //$this->validate();

        $addPost = SettingsDB::find($this->id);

        $addPost->address = $this->address;
        $addPost->phone = $this->phone;
        $addPost->email = $this->email;
        $addPost->copyright = $this->copyright;
        $addPost->facebook = $this->facebook;
        $addPost->twitter = $this->twitter;
        $addPost->instagram = $this->instagram;
        $addPost->linkdin = $this->linkdin;
        $addPost->snapchat = $this->snapchat;
        $addPost->youtube = $this->youtube;
        $addPost->fotter_summery = $this->fotter_summery;
        $addPost->new_details = $this->new_details;

        


        if($this->logo)
        {
            $file_to_store=$this->logo->store('logo','public');
            $addPost->logo = $file_to_store;
        }
        else{}

        if($this->favicon)
        {
            $file_to_store1=$this->favicon->store('logo','public');
            $addPost->favicon = $file_to_store1;
        }
        else{}

        if($this->newimg)
        {
            $file_to_store2=$this->newimg->store('newimg','public');
            $addPost->new_img = $file_to_store2;
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
        return view('livewire.admin.settings')->layout('layouts.admin_base');
    }
}
