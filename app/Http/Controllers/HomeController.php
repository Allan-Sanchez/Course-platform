<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses =Course::withCount(['students'])
                    ->with('category','teacher','reviews')
                    ->where('status',Course::PUBLISHED)
                    ->latest()
                    ->paginate(12);
                    

        return view('home',compact('courses'));
    }
}
