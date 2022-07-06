<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Admin\Schedule;
use App\Models\Admin\Centre;
use App\Models\Admin\Blog;
use App\Models\Admin\Faq;
use App\Models\Admin\About;
use App\Models\Contact;
use App\Models\Testalert;
use App\Models\Admin\Setting;

class PublicController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status',1)->latest()->limit(3)->get();
        $about = About::first();
        return view('home',compact('about','blogs'));
    }

    public function blogs()
    {
        $blogs = Blog::where('status',1)->latest()->get();
        return view('user.blog.blogs',compact('blogs'));
    }

    public function adi()
    {
        return view('user.adi.adi');
    }

    public function faqs()
    {
        $faqs = Faq::where('status',1)->latest()->get();
        return view('user.faqs',compact('faqs'));
    }

    public function terms()
    {
        return view('user.terms');
    }

    public function privacy()
    {
        return view('user.privacy');
    }

    public function about()
    {
        $about = About::first();
        return view('user.about',compact('about'));
    }

  



    public function contact()
    {
        $setting = Setting::first();
        return view('user.contact',compact('setting'));
    }

    public function contactCreate(Request $request)
    {
       // return $request->all();
        $data = $request->validate([

            'name'=>'max:191',
            'phone'=>'max:191',
            'email'=>'max:191',
            'message'=>'',

        ]);

        $contact = Contact::create($data);
        if ($contact) {
            return redirect()->back()->with('success','Your message send successfully');
            // code...
        }else{

            return redirect()->back()->with('wrong','Something is wrong.please fillup form properly.');
        }
    }

    public function testalertCreate(Request $request)
    {
       // return $request->all();
        $data = $request->validate([

            'name'=>'max:191',
            'phone'=>'max:191',
            'email'=>'max:191',

        ]);

        $testalert = Testalert::create($data);


        if ($testalert) {
            $details = [
                'name'=>$testalert->name,
                'email'=>$testalert->email,
                'phone'=>$testalert->phone,
            ];

            \Mail::to($request->email)->send(new \App\Mail\Testalert($details));
            return redirect()->back()->with('success','Your request send successfully');
            // code...
        }else{

            return redirect()->back()->with('wrong','Something is wrong.please fillup form properly.');
        }
    }



    public function test_update()
    {
        return view('user.practical.update');
    }

    public function test_update_theory()
    {
        return view('user.theory.update');
    }

    public function fetchSchedule($id){
        $schedule = Schedule::where('centre_id',$id)->get();
        return json_encode($schedule);
    }
}
