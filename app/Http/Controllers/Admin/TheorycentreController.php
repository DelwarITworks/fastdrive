<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Theorycentre;
use Illuminate\Support\Str;
use App\Exports\TheorycentresExport;
use App\Imports\TheorycentresImport;
use Maatwebsite\Excel\Facades\Excel;

class TheorycentreController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $theorycentres = Theorycentre::latest()->get();
        $count = 1;
        return view('admin.theorycentre.theory_centre',compact('theorycentres','count'));
    }
        
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new TheorycentresImport, 'theorycentres.xlsx');
    }
       
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {


        $theorycentre = Excel::import(new TheorycentresImport,request()->file('file'));
        if($theorycentre){
            return redirect()->back()->with('success','Your file imported successfully');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.please ,try again');
        }
    }




    // public function create(Request $request)
    // {
    //     $this->validateRequest();
    //     $theorycentre = theorycentre::create([
    //         'name'=> $request->name,
    //         'city'=> $request->city,
    //         'area'=> $request->area,
    //         'slug'=> Str::slug($request->area).'-'.Str::slug($request->area),
    //     ]);
    //     return redirect()->back()->with('success','theorycentre Stored Successfully.');
    // }

    public function update(theorycentre $theorycentre ,Request $request)
    {
        $this->validateRequest();
        $theorycentre->update([
            'ref_id'     => $request->ref_id,
            'date'       => $request->date, 
            'centre_name'=> $request->centre_name, 
            'buy_cost'   => $request->buy_cost, 
            'sell_cost'  => $request->sell_cost, 
            'account_no' => $request->account_no, 
        ]);
        
        if($theorycentre){
            return redirect()->back()->with('success','theorycentre Updated Successfully');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.please ,try again');
        }

    }

    public function active(theorycentre $theorycentre)
    {
        $theorycentre->update(['status' => 1]);
        if($theorycentre){
            return redirect()->back()->with('success','This theory centre activate successfully.');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.');
        }
    }

    
    public function deactive(theorycentre $theorycentre)
    {
        $theorycentre->update(['status' => 0]);
        if($theorycentre){
            return redirect()->back()->with('success','This theory centre deactive successfully.');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.');
        }
    }

    public function delete(theorycentre $theorycentre)
    {
        $theorycentre->delete();
        return redirect()->back()->with('wrong','Deleted Successful');
    }



    //private methods
    private function validateRequest()
    {
        // return request()->validate([
        //     'ref_id'=>'min:8',
        //     'date'=>'required|max:191',
        //     'theorycentre_name'=>'required|max:191',
        //     'buy_cost'=>'required|max:191',
        //     'sell_cost'=>'required|max:191',
        // ]);
    }

}
