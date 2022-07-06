<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Centre;
use Illuminate\Support\Str;
use App\Exports\CentresExport;
use App\Imports\CentresImport;
use Maatwebsite\Excel\Facades\Excel;

class CentreController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $centres = Centre::latest()->get();
        $count = 1;
        return view('admin.centre.centre',compact('centres','count'));
    }
        
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new CentresExport, 'centres.xlsx');
    }
       
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {

        $this->validateRequest();

        $centre = Excel::import(new CentresImport,request()->file('file'));
        if($centre){
            return redirect()->back()->with('success','Your file imported successfully');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.please ,try again');
        }
    }




    // public function create(Request $request)
    // {
    //     $this->validateRequest();
    //     $centre = centre::create([
    //         'name'=> $request->name,
    //         'city'=> $request->city,
    //         'area'=> $request->area,
    //         'slug'=> Str::slug($request->area).'-'.Str::slug($request->area),
    //     ]);
    //     return redirect()->back()->with('success','Centre Stored Successfully.');
    // }

    public function update(Centre $centre ,Request $request)
    {
        $this->validateRequest();
        $centre->update([
            'ref_id'     => $request->ref_id,
            'date'       => $request->date, 
            'centre_name'=> $request->centre_name, 
            'buy_cost'   => $request->buy_cost, 
            'sell_cost'  => $request->sell_cost, 
            'account_no' => $request->account_no, 
        ]);
        
        if($centre){
            return redirect()->back()->with('success','centre Updated Successfully');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.please ,try again');
        }

    }


    public function active(centre $centre)
    {
        $centre->update(['status' => 1]);
        if($centre){
            return redirect()->back()->with('success','This centre activate successfully.');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.');
        }
    }

    
    public function deactive(centre $centre)
    {
        $centre->update(['status' => 0]);
        if($centre){
            return redirect()->back()->with('success','This centre deactive successfully.');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.');
        }
    }

    public function delete(Centre $centre)
    {
        $centre->delete();
        return redirect()->back()->with('wrong','Deleted Successful');
    }



    //private methods
    private function validateRequest()
    {
        // return request()->validate([
        //     'ref_id'=>'min:8',
        //     'date'=>'required|max:191',
        //     'centre_name'=>'required|max:191',
        //     'buy_cost'=>'required|max:191',
        //     'sell_cost'=>'required|max:191',
        // ]);
    }

}
