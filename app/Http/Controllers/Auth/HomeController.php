<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        
        if(Auth::user()->status==1)
        {
            auth('web')->logout();
            //return redirect()->to('/login');
            return redirect()->to('/login')->with('block_error','Your account has been blocked! please contact with site admin, Thank You.');
        }
        else{
            //customer
                if(Auth::user()->usertype==0)
                {       
                    return redirect()->to('/user/dashboard');
                }
                //admin
                else if(Auth::user()->usertype==1)
                {
                //dd('admin');
                return redirect()->to('/admin_dashboard');
                }

        }
        
        
    }
}
