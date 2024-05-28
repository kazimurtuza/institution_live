<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Settings;
use App\Models\AboutPage;
use App\Models\ContactPage;
use App\Models\CoursePage;
use App\Models\Faqpage;
use App\Models\HomePage;
use App\Models\Policy;
use App\Models\TermPage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         /*view */

         view()->composer('*', function ($view) {
            
            $get_segment = request()->segment(1);
            
            if($get_segment == 'about_us')
            {
                $seo_data = AboutPage::where('id',1)->first();
                $metaTitle = $seo_data->meta_title;
                $metaContent = $seo_data->meta_details;
            }
            elseif($get_segment == 'courses')
            {
                $seo_data = CoursePage::where('id',1)->first();
                $metaTitle = $seo_data->meta_title;
                $metaContent = $seo_data->meta_details;
            }
            elseif($get_segment == 'faq')
            {
                $seo_data = Faqpage::where('id',1)->first();
                $metaTitle = $seo_data->meta_title;
                $metaContent = $seo_data->meta_details;
            }
            elseif($get_segment == 'contact')
            {
                $seo_data = ContactPage::where('id',1)->first();
                $metaTitle = $seo_data->meta_title;
                $metaContent = $seo_data->meta_details;
            }
            elseif($get_segment == 'term-condition')
            {
                $seo_data = TermPage::where('id',1)->first();
                $metaTitle = $seo_data->meta_title;
                $metaContent = $seo_data->meta_details;
            }
            elseif($get_segment == 'privecy-policy')
            {
                $seo_data = Policy::where('id',1)->first();
                $metaTitle = $seo_data->meta_title;
                $metaContent = $seo_data->meta_details;
            }
            elseif($get_segment == 'login')
            {
                $metaTitle = 'Sign In | International Islamic Institute';
                $metaContent = 'International Islamic Institute';
            }
            elseif($get_segment == 'register')
            {
                $metaTitle = 'Sign Up | International Islamic Institute';
                $metaContent = 'International Islamic Institute';
            }
            elseif($get_segment == ''){
                $seo_data = HomePage::where('id',1)->first();
                $metaTitle = $seo_data->meta_title;
                $metaContent = $seo_data->meta_details;
            }
            else{
                $metaTitle = 'International Islamic Institute';
                $metaContent = 'International Islamic Institute';
            }
            

            $settings = Settings::where('id', 1)->first();

            if (Auth::check()) 
            {
                $block_checking = User::find(Auth::user()->id);

                if($block_checking->status == 1)
                {
                    //Auth::logout();
                    Session::flush();
                    //return redirect('/');
                }
            }
           
            
            
            $view->with(['metaTitle' => $metaTitle, 'metaContent' => $metaContent, 'settings' => $settings]);
        });
        //end
    }
}
