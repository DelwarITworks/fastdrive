<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Schedule;
use App\Models\Admin\Centre;
use Illuminate\Support\Str;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $centres = Centre::latest()->get();
        $schedules = Schedule::latest()->get();
        $count = 1;
        return view('admin.schedule.schedule',compact('schedules','centres','count'));
    }

    public function create(Request $request)
    {
        $this->validateRequest();
        $schedule = schedule::create([
            'centre_id'=> $request->centre_id,
            'title'=> $request->title,
            'date'=> $request->date,
            'time'=> $request->time,
        ]);
        return redirect()->back()->with('success','schedule Stored Successfully.');
    }

    public function update(schedule $schedule ,Request $request)
    {
        $request->validate([
                'centre_id'=>'required|max:191',
                'title'=>'max:191',
                'time'=>'max:11',
                'date'=>'required|max:191',
        ]);
    
        $schedule->update([
            'centre_id'=> $request->centre_id,
            'title'=> $request->title,
            'date'=> $request->date,
            'time'=> $request->time,
        ]);

        return redirect()->back()->with('success','Schedule Updated Successfully');

    }

    public function delete(schedule $schedule)
    {
        $schedule->delete();
        return redirect()->back()->with('success','Schedule Deleted Successfully');
    }


    public function active(Schedule $schedule)
    {
        $schedule->update(['status' => 1]);
        if($schedule){
            return redirect()->back()->with('success','This schedule activate successfully.');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.');
        }
    }

    
    public function deactive(Schedule $schedule)
    {
        $schedule->update(['status' => 0]);
        if($schedule){
            return redirect()->back()->with('success','This schedule deactive successfully.');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.');
        }
    }



    //private methods
    private function validateRequest()
    {
        return request()->validate([
            'centre_id'=>'required|max:191',
            'title'=>'max:191',
            'time'=>'max:11',
            'date'=>'required|max:191',
        ]);
    }
}
