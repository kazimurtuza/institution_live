<?php

namespace App\Http\Controllers\Frontend;
use Stripe;
use App\Http\Controllers\Controller;
use App\Models\Courses as CoursesDB;
use App\Models\CourseSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlists;
use App\Mail\NewCourse;
use Session;
use Illuminate\Support\Facades\Mail;

class StripeController extends Controller
{
    
    public static function wishlist_check($course_id)
    {
        $wishlist = Wishlists::where('course_id', $course_id)->where('customer_id', Auth::user()->id)->where('status',0)->where('is_delete',0)->first();
        if($wishlist)
        {
            return $wishlist->id;
        }
        else{
            return 0;
        }
        
    }
    public static function subcribtion_check($course_id)
    {
        $course_details = CourseSubscription::where('course_id', $course_id)->where('customer_id', Auth::user()->id)->where('status',0)->where('is_delete',0)->first();
        if($course_details)
        {
            return $course_details->id;
        }
        else{
            return 0;
        }
        
    }

    public function wishlistPost($course_id)
    {
        $addWishlist = new Wishlists();
        $addWishlist->course_id = $course_id;
        $addWishlist->customer_id = Auth::user()->id;

        $addWishlist->save();

        return redirect()->back()->with('success','Success fully Added wishlist');
    }

    public function course_subscription()
    {
        $course_id = request()->segment(3);
        $course_details = CoursesDB::where('id', $course_id)->where('status',0)->where('is_delete',0)->first();

        $course_subscription = new CourseSubscription();
        //dd(Auth::user()->email);

        $course_subscription->course_id = $course_details->id;
        $course_subscription->customer_id = Auth::user()->id;
        $course_subscription->payment_type = $course_details->payment_type;

        $subcribed = $course_subscription->save();
        if($subcribed)
        {
            
            $mailData = [
                'title' => 'Course Subscribed'
    
            ];
    
            try{ 
            Mail::to(Auth::user()->email)->send(new NewCourse($mailData));
    
                    }
                catch(\Exception $e){
                    
                }

            
            return redirect('/customer/thankyou');
        }

    }
    public function stripe()
    {
        $course_id = request()->segment(3);
        $course_details = CoursesDB::where('id', $course_id)->where('status',0)->where('is_delete',0)->first();
        //dd($course_details);
        return view('stripe',['data'=> $course_details]);
    }

    public function stripePost(Request $request)
    {
        $course_details = CoursesDB::where('id', $request->course_id)->where('status',0)->where('is_delete',0)->first();
        try{
           
            
             Stripe\Stripe::setApiKey('sk_test_51JegAwLRDA80gOtfIEEMcWH30khtaHybq7B6ZzHPgZtnQvUPSmqF5naQfQmVX0wrmQVwT3bUtm5D0YjFAQWJ3LSf00agQCVYpV');
    
            $response=Stripe\Charge::create ([
                    "amount" => round($request->total_amount*100),
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Course Payment" 
            ]);

            //dd($response->balance_transaction);

            if($response->balance_transaction)
            {
                $course_subscription = new CourseSubscription();

                $course_subscription->course_id = $request->course_id;
                $course_subscription->course_price = $request->total_amount;
                $course_subscription->customer_id = Auth::user()->id;
                $course_subscription->payment_type = $course_details->payment_type;
                $course_subscription->payment_getway = 'Stripe';
                $course_subscription->transaction_no = $response->balance_transaction;

                $subcribed = $course_subscription->save();
                if($subcribed)
                {
                    return redirect('/customer/thankyou');
                }
            }
            else{
                return redirect('/courses/index');
            }


            //return redirect($store_slug.'/customer/thankyou');
                
        }
        catch (CardException $e) {
                // Handle card declined error
                $error = $e->getError();
                $errorMessage = $error->message;
            
                // You can log the error, return a response, or perform other actions
                Session::flash('wrong',$errorMessage);
                return back();
                //return response()->json(['error' => $errorMessage], 422);
            } catch (\Exception $e) {
                // Handle other exceptions
                $errorMessage = $e->getMessage();
                Session::flash('wrong',$errorMessage);
                return back();
                // You can log the error, return a response, or perform other actions
                return response()->json(['error' => $errorMessage], 500);
        }
        
       
              
        return back();
    }

    public function thankyou()
    {
        return view('thankyou');
    }
}
