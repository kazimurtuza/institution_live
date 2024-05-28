<?php

namespace App\Livewire\Admin;
use App\Models\CourseSubscription;
use Livewire\Component;

class FinancialReports extends Component
{
    public $start_range;
    public $end_range;
    public $date_range ='';

    public function date_range_filter()
    {
        //dd('wor');
        $this->date_range = 'true';
    }
    public function render()
    {
        
        if($this->date_range == 'true')
        {
            //dd($this->start_range . '-'. $this->end_range);

            $total_payments = CourseSubscription::whereBetween('created_at', [$this->start_range, $this->end_range])->where('payment_type', 'Paid')->where('status', 0)->where('is_delete', 0)->get();
        }
        else{
          
            $total_payments = CourseSubscription::where('payment_type', 'Paid')->where('status', 0)->where('is_delete', 0)->get();
        }

        //$total_payments = CourseSubscription::where('payment_type', 'Paid')->where('status', 0)->where('is_delete', 0)->get();

        return view('livewire.admin.financial-reports',['all_data' => $total_payments])->layout('layouts.admin_base');
    }
}
