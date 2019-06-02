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
                ->with('message-course-warning',__("You are currently subscribed to another plan"));
                // ->with('message',['Warning',__("You are currently subscribed to another plan")]);
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
            // return \request();
			if ( \request()->has('coupon')) {
				\request()->user()->newSubscription('main', \request('type'))
                    ->withCoupon(\request('coupon'))->create($token);
			} else {
				\request()->user()->newSubscription('main', \request('type'))
				          ->create($token);
			}
		    return redirect(route('subscription_admin'))
            // ->with('message', ['success', __("La suscripción se ha llevado a cabo correctamente")]);
            ->with('message-course-success',__("Successful plan"));
	    } catch (\Exception $exception) {
	    	$error = $exception->getMessage();
	    	// return back()->with('message', ['danger', $error]);
	    	return back()->with('message-course-error',__("the coupon is not valid"));
	    }
    }   

    public function admin()
    {
        $subscriptions = auth()->user()->subscriptions;
        return view('suscriptions.admin',compact('subscriptions'));
    }

    public function resume()
    {
        $subscription = \request()->user()->subscription(\request('plan'));
        if ($subscription->cancelled() && $subscription->onGracePeriod()) {
            \request()->user()->subscription(\request('plan'))->resume();
            
            return back()->with('message-course-success',__("You have successfully resumed your subscription"));
        }

        return back()->with('message-course-error',__("An error has occurred"));
    }

    public function cancel()
    {
        auth()->user()->subscription(\request('plan'))->cancel();
        return back()->with('message-course-success',__("The subscription has been canceled successfully"));

    }
}
