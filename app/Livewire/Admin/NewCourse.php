<?php

namespace App\Livewire\Admin;
use App\Models\Courses;
use App\Models\Categories;
use App\Models\Subjects;
use App\Models\Instructors;
use App\Models\CourseResources;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class NewCourse extends Component
{
    
    use WithFileUploads;

    public $category,$subject,$title,$payment_type,$price,$discount_price,$discount_duration,$course_duration,$lesson,$course_level,$language,$subtitle_language,$summery,$cover,$overview,$curiculm,$instructor,$course_points;
    public $i = 1;
    public $resourses = [];

    protected $rules = [

        'title' => 'required|unique:courses ,title',
        'payment_type' => 'required',
        'category' => 'required',
        'subject' => 'required',
        'course_duration' => 'required',
        'lesson' => 'required',
        'course_level' => 'required',
        'cover' => 'required',
        'instructor' => 'required'

    ];


    public function store()
    {
        //dd('ok');
        //$this->validate();

        if($this->payment_type == 'Paid' and $this->price == '')
        {
            session()->flash('error_message', 'Please Set The Price First!');
            return redirect()->to('/admin/add-courses');
        }
        else{

            $addCourse = new Courses();

        $addCourse->title = $this->title;
        $addCourse->category = $this->category;
        $addCourse->subject = $this->subject;
        $addCourse->payment_type = $this->payment_type;
        $addCourse->price = $this->price;
        $addCourse->discount_price = $this->discount_price;
        $addCourse->discount_duration = $this->discount_duration;
        $addCourse->course_duration = $this->course_duration;
        $addCourse->lesson = $this->lesson;
        $addCourse->course_level = $this->course_level;
        $addCourse->language = $this->language;
        $addCourse->subtitle_language = $this->subtitle_language;
        $addCourse->summery = $this->summery;
        $addCourse->overview = $this->overview;
        $addCourse->curiculm = $this->curiculm;
        $addCourse->instructor = $this->instructor;
        $addCourse->course_points = $this->course_points;

        /*multiple video upload */

        if($this->resourses)
            {
                $get_last_id = DB::table('courses')->max('id');

                $imagesName = '';
                foreach($this->resourses as $key=>$gallery_image)
                {
                    $imgPathName = $gallery_image->store('resources','public');

                    $course_resources = new CourseResources();

                    $course_resources->course_id = $get_last_id+1;
                    $course_resources->resources = $imgPathName;

                    $course_resources->save();

                    //dd($imgPathName);
                    //$imagesName = $imagesName.','.$imgPathName;
                }
                $addCourse->resources = '1';
               // $product_colors->gallery_image = $imagesName;

            }

        /*end */



        if($this->cover)
        {
            $file_to_store=$this->cover->store('courses','public');
            $addCourse->cover = $file_to_store;
        }
        else{}

        $added = $addCourse->save();

        if($added)
        {
            session()->flash('add_message', 'Successfully Added');
        }
        else{
            session()->flash('add_message', 'Sorry !');
        }

        }

        
    }

 
    public function render()
    {
        $all_categories = Categories::where('is_delete',0)->get();
        $all_subjects = Subjects::where('is_delete',0)->get();
        $all_instructors = Instructors::where('is_delete',0)->get();
        return view('livewire.admin.new-course',['all_categories' => $all_categories, 'all_subjects' => $all_subjects, 'all_instructors' => $all_instructors])->layout('layouts.admin_base');
    }
}
