<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return "ok";
    }
}
