<?php

namespace App\Livewire\Admin;
use App\Models\ContactPage as ContactPageDB;
use Livewire\Component;
use Livewire\WithFileUploads;

class ContactPage extends Component
{
    use WithFileUploads;

    public $name,$thumb_img,$page_summery,$contact_head,$contact_summery,$form_head,$form_summery,$address,$phone,$email,$map_source,$meta_title,$meta_details,$page_banner,$id;
    
    public function mount()
    {
        $post_details = ContactPageDB::where('id', 1)->first();
        $this->name = $post_details->name;
        $this->page_summery = $post_details->page_summery;
        $this->contact_head = $post_details->contact_head;
        $this->contact_summery = $post_details->contact_summery;
        $this->form_head = $post_details->form_head;
        $this->form_summery = $post_details->form_summery;
        $this->address = $post_details->address;
        $this->phone = $post_details->phone;
        $this->email = $post_details->email;
        $this->map_source = $post_details->map_source;
        $this->meta_title = $post_details->meta_title;
        $this->meta_details = $post_details->meta_details;
        $this->id = $post_details->id;
    }

    public function store()
    {
        //dd('ok');
       
        //$this->validate();

        $addPost = ContactPageDB::find($this->id);

        $addPost->name = $this->name;
        $addPost->page_summery = $this->page_summery;
        $addPost->contact_head = $this->contact_head;
        $addPost->contact_summery = $this->contact_summery;
        $addPost->form_head = $this->form_head;
        $addPost->form_summery = $this->form_summery;
        $addPost->address = $this->address;
        $addPost->phone = $this->phone;
        $addPost->email = $this->email;
        $addPost->map_source = $this->map_source;
        $addPost->meta_title = $this->meta_title;
        $addPost->meta_details = $this->meta_details;

        


        if($this->page_banner)
        {
            $file_to_store=$this->page_banner->store('pages_banner','public');
            $addPost->page_banner = $file_to_store;
        }
        else{}

        if($this->thumb_img)
        {
            $file_to_store=$this->thumb_img->store('thumb_img','public');
            $addPost->thumb_img = $file_to_store;
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
        return view('livewire.admin.contact-page')->layout('layouts.admin_base');
    }
}
