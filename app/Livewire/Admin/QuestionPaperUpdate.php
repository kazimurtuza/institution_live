<?php

namespace App\Livewire\Admin;
use App\Models\QuestionPaper;
use Livewire\Component;

class QuestionPaperUpdate extends Component
{
    public $category,$subject,$course,$duration,$unit_point,$name,$id;


    public function mount($paper_list_id)
    {
        $this->paper_list_id = $paper_list_id;
        $post_details = QuestionPaper::where('id', $this->paper_list_id)->first();
        $this->category = $post_details->category;
        $this->subject = $post_details->subject;
        $this->course = $post_details->course;
        $this->duration = $post_details->duration;
        $this->unit_point = $post_details->unit_point;
        $this->name = $post_details->name;
        $this->id = $post_details->id;
    }

    public function store()
    {
        //dd('ok');
       

        $addPost = QuestionPaper::find($this->id);

        $addPost->category = $this->category;
        $addPost->subject = $this->subject;
        $addPost->course = $this->course;
        $addPost->duration = $this->duration;
        $addPost->unit_point = $this->unit_point;
        $addPost->name = $this->name;

       


        $added = $addPost->save();

        if($added)
        {
            session()->flash('add_message', 'Successfully Updated');
        }
        else{
            session()->flash('add_message', 'Sorry !');
        }

        //return redirect()->to('/admin/course_update/'.$this->id);
    }

    public function render()
    {
        return view('livewire.admin.question-paper-update')->layout('layouts.admin_base');
    }
}
