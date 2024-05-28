<?php

namespace App\Livewire\Admin;
use App\Models\HomePage as HomePageDB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Homepage extends Component
{
    use WithFileUploads;

    public $name,$banner_short_title,$banner_big_title,$summery,$cat_summery,$meta_title,$meta_details,$page_banner,$id,$course_summery,$key_summery,$learn_summery,$learn_one_title,$learn_two_title,$learn_three_title,$learn_one_details,$learn_two_details,$learn_three_details,$learn_review_text,$testi_summery;

    public function mount()
    {
        $post_details = HomePageDB::where('id', 1)->first();
        $this->name = $post_details->name;
        $this->banner_short_title = $post_details->banner_short_title;
        $this->banner_big_title = $post_details->banner_big_title;
        $this->summery = $post_details->summery;
        $this->cat_summery = $post_details->cat_summery;
        $this->course_summery = $post_details->course_summery;
        $this->key_summery = $post_details->key_summery;
        $this->learn_summery = $post_details->learn_summery;
        $this->learn_one_title = $post_details->learn_one_title;
        $this->learn_two_title = $post_details->learn_two_title;
        $this->learn_three_title = $post_details->learn_three_title;
        $this->learn_one_details = $post_details->learn_one_details;
        $this->learn_two_details = $post_details->learn_two_details;
        $this->learn_three_details = $post_details->learn_three_details;
        $this->learn_review_text = $post_details->learn_review_text;
        $this->testi_summery = $post_details->testi_summery;
        $this->meta_title = $post_details->meta_title;
        $this->meta_details = $post_details->meta_details;
        $this->id = $post_details->id;
    }

    public function store()
    {
        //dd('ok');
       
        //$this->validate();

        $addPost = HomePageDB::find($this->id);

        $addPost->name = $this->name;
        $addPost->banner_short_title = $this->banner_short_title;
        $addPost->banner_big_title = $this->banner_big_title;
        $addPost->summery = $this->summery;
        $addPost->cat_summery = $this->cat_summery;
        $addPost->course_summery = $this->course_summery;
        $addPost->key_summery = $this->key_summery;
        $addPost->learn_summery = $this->learn_summery;
        $addPost->learn_one_title = $this->learn_one_title;
        $addPost->learn_two_title = $this->learn_two_title;
        $addPost->learn_three_title = $this->learn_three_title;
        $addPost->learn_one_details = $this->learn_one_details;
        $addPost->learn_two_details = $this->learn_two_details;
        $addPost->learn_three_details = $this->learn_three_details;
        $addPost->learn_review_text = $this->learn_review_text;
        $addPost->testi_summery = $this->testi_summery;
        $addPost->meta_title = $this->meta_title;
        $addPost->meta_details = $this->meta_details;

        


        if($this->page_banner)
        {
            $file_to_store=$this->page_banner->store('pages_banner','public');
            $addPost->page_banner = $file_to_store;
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
        return view('livewire.admin.homepage')->layout('layouts.admin_base');
    }
}
