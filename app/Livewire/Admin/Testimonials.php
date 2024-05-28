<?php

namespace App\Livewire\Admin;
use App\Models\Testimonials as TestimonialsDB;
use Livewire\Component;

class Testimonials extends Component
{
    public function render()
    {
        $all_testimonials = TestimonialsDB::where('status',0)->where('is_delete',0)->get();
        return view('livewire.admin.testimonials', ['all_data' => $all_testimonials])->layout('layouts.admin_base');
    }
}
