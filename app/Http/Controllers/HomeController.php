<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Schedule;
use App\Models\Admin\Centre;
use App\Models\Admin\Blog;
use App\Models\Admin\Faq;
use App\Models\Admin\About;
use App\Models\Contact;
use App\Models\Testalert;
use App\Models\Admin\Setting;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth' ,'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $about = About::first();
        return view('home',compact('about'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
