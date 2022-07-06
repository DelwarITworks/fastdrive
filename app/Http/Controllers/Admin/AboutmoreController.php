<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Aboutmore;
use App\Models\Admin\About;
use Image;
use Str;

class AboutmoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(About $about)
    {
        $aboutmores = Aboutmore::latest()->get();
        $count = 1;
        return view('admin.about.aboutmore',compact('aboutmores','count','about'));
    }
   public function create(Request $request)
    {
        $this->validateRequest();
        $aboutmore = Aboutmore::create([
            'about_id'=> $request->about_id,
            'name'=> $request->name,
            'detail'=> $request->detail,
        ]);
        return redirect()->back()->with('success','aboutmore Stored Successfully.');
    }


    public function update(Aboutmore $aboutmore ,Request $request)
    {
        $request->validate([
                'name'=>'required',
                'detail'=>'',
        ]);

        $aboutmore->update([
            'about_id'=> $request->about_id,
            'name'=> $request->name,
            'detail'=> $request->detail,
        ]);

        return redirect()->back()->with('success','aboutmore Updated Successfully');

    }

    public function delete(Aboutmore $aboutmore)
    {
        // if($aboutmore->image){
        // unlink('storage/app/public/'.$aboutmore->image);
        // }
        $aboutmore->delete();
          return redirect()->back()->with('deletesuccess','Deleted Successful');
    }


    public function active(Aboutmore $aboutmore)
    {
        $aboutmore->update(['status' => 1]);
        if($aboutmore){
            return redirect()->back()->with('success','This aboutmore activate successfully.');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.');
        }
    }

    
    public function deactive(Aboutmore $aboutmore)
    {
        $aboutmore->update(['status' => 0]);
        if($aboutmore){
            return redirect()->back()->with('success','This aboutmore deactive successfully.');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.');
        }
    }



    //private methods
    private function validateRequest()
    {
        return request()->validate([
            'name'=>'required',
            // 'image'=>'required',
        ]);
    }
}
