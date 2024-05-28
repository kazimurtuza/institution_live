<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faqpage;
use App\Models\FaqModel;
use Illuminate\Http\Request;

class Faq extends Controller
{
    public static function get_all_faq_questions($cat_id)
    {
        $all_faqs = FaqModel::where('is_delete',0)->where('cat_name',$cat_id)->get(); 
        return $all_faqs;
    }
    public function index()
    {
        $all_faq = FaqModel::select('cat_name')->where('is_delete',0)->groupBy('cat_name')->get();
        $contact_page_content = Faqpage::where('status', 0)->first();
        return view('frontend.faq.index', ['page_content' => $contact_page_content, 'all_faq' => $all_faq]);
    }
}
