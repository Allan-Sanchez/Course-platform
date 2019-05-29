<?php
namespace App\Http\Controllers;

// use session;
use App\Exceptions\Handler;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Session;

class SubscriptionController extends Controller
{
    public function __construct() {
        $this->middleware(function($request, $next){
            if(auth()->user()->subscribed('main')){
                return redirect('/')
                ->with('message',['Warning',__("You are currently subscribed to another plan")]);
            }
            return $next($request);
        })->only(['plans','processSubscription']);
    }

    public function plans()
    {
        return view('suscriptions.plans');
    }


    public function processSubscription()
    {
        $token = request('stripeToken');
	    try {
            return \request();
			if ( \request()->has('coupon')) {
                // return request('coupon');
				\request()->user()->newSubscription('main', \request('type'))
                    ->withCoupon(\request('coupon'))->create($token);
			} else {
				\request()->user()->newSubscription('main', \request('type'))
				          ->create($token);
			}
		    return redirect(route('subscription_admin'))
            // ->with('message', ['success', __("La suscripción se ha llevado a cabo correctamente")]);
            ->with('message-course-success',__("the coupon is  valid"));
	    } catch (\Exception $exception) {
	    	 return $error = $exception->getMessage();
	    	// return back()->with('message', ['danger', $error]);
	    	// return back()->with('message-course-error',__("the coupon is not valid"));
	    }
    }   

    public function admin()
    {
        return view('suscriptions.admin');
    }
}
