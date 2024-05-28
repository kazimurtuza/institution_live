<?php

namespace App\Livewire\Admin;
use App\Models\Courses;
use App\Models\Categories;
use App\Models\Subjects;
use App\Models\Instructors;
use App\Models\CourseResources;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

class UpdateCourse extends Component
{
    use WithFileUploads;

    public $category,$subject,$title,$payment_type,$price,$discount_price,$course_duration,$lesson,$course_level,$language,$subtitle_language,$summery,$cover,$overview,$curiculm,$instructor,$course_points;
    public $id;
    public $resourses = [];

    public function mount($course_id)
    {
        $this->$course_id = $course_id;
        $post_details = Courses::where('id', $this->$course_id)->first();
        $this->category = $post_details->category;
        $this->subject = $post_details->subject;
        $this->title = $post_details->title;
        $this->payment_type = $post_details->payment_type;
        $this->price = $post_details->price;
        $this->discount_price = $post_details->discount_price;
        $this->course_duration = $post_details->course_duration;
        $this->lesson = $post_details->lesson;
        $this->course_level = $post_details->course_level;
        $this->language = $post_details->language;
        $this->subtitle_language = $post_details->subtitle_language;
        $this->summery = $post_details->summery;
        $this->overview = $post_details->overview;
        $this->curiculm = $post_details->curiculm;
        $this->instructor = $post_details->instructor;
        $this->course_points = $post_details->course_points;
        $this->id = $post_details->id;
    }

    public function delete_resources($resorce_id)
    {
        $disable_resource = CourseResources::find($resorce_id);

        $disable_resource->is_delete = 1;
        $disable_resource->save();
        session()->flash('delete_message', 'Successfully Deleted');
        return redirect()->to('/admin/course_update/'.$this->id.'/#error');

        


    }

    public function store()
    {
        //dd('ok');
       

        $addPost = Courses::find($this->id);

        $addPost->category = $this->category;
        $addPost->subject = $this->subject;
        $addPost->title = $this->title;
        $addPost->payment_type = $this->payment_type;
        $addPost->price = $this->price;
        $addPost->discount_price = $this->discount_price;
        $addPost->course_duration = $this->course_duration;
        $addPost->lesson = $this->lesson;
        $addPost->course_level = $this->course_level;
        $addPost->language = $this->language;
        $addPost->subtitle_language = $this->subtitle_language;
        $addPost->summery = $this->summery;
        $addPost->overview = $this->overview;
        $addPost->curiculm = $this->curiculm;
        $addPost->instructor = $this->instructor;
        $addPost->course_points = $this->course_points;

       /*multiple video upload */

       if($this->resourses)
       {
           //$get_last_id = DB::table('courses')->max('id');

           $imagesName = '';
           foreach($this->resourses as $key=>$gallery_image)
           {
               $imgPathName = $gallery_image->store('resources','public');

               $course_resources = new CourseResources();

               $course_resources->course_id = $this->id;
               $course_resources->resources = $imgPathName;

               $course_resources->save();

               //dd($imgPathName);
               //$imagesName = $imagesName.','.$imgPathName;
           }
           $addPost->resources = '1';
          // $product_colors->gallery_image = $imagesName;

       }

   /*end */



        if($this->cover)
        {
            $file_to_store=$this->cover->store('courses','public');
            $addPost->cover = $file_to_store;
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

        return redirect()->to('/admin/course_update/'.$this->id);
    }

    public function render()
    {
        $all_categories = Categories::where('is_delete',0)->get();
        $all_subjects = Subjects::where('is_delete',0)->get();
        $all_instructors = Instructors::where('is_delete',0)->get();

        $all_resources = CourseResources::where('course_id', $this->id)->where('is_delete', 0)->get();
        //dd($this->id);

        return view('livewire.admin.update-course',['all_resources' => $all_resources,'all_categories' => $all_categories, 'all_subjects' => $all_subjects, 'all_instructors' => $all_instructors])->layout('layouts.admin_base');
    }
}
