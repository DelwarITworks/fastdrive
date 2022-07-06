<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\About;
use Image;
use Str;

class AboutController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $about = About::first();
        return view('admin.about.about',compact('about'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $about = About::create($this->validateData());
        $this->storeImage($about);
        if ($about) {
            return redirect()->back()->with('success','about Updated Successfully!!');
        }else{
            return redirect()->back()->with('wrong','Something Went Wrong!!');
        }
    }

    public function update()
    {
        
        $about = About::first();
        $about->update($this->validateData());

        if (request()->has('image')) {
            if (request()->oldimage) {
                unlink('storage/app/public/'.request()->oldimage);
            }
            $this->storeImage($about);
        }

        if ($about) {
            return redirect()->back()->with('success','about Updated Successfully!!');
        }else{
            return redirect()->back()->with('wrong','Something went wrong!!');
        }

    }


    private function validateData()
    {
        return request()->validate([
            'title' => 'required|max:191',
            'about' => '',
            'image'=>'',
        ]);
    }

    private function storeImage($about)
    {
        if (request()->has('image')) {
            $about->update([
                'image' => request()->image->store('admin/about','public'),
            ]);
            $resize = Image::make('storage/app/public/'.$about->image)->resize(540,530);
            $resize->save();
        }
    }
}
