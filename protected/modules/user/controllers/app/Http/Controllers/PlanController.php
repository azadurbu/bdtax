<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use Validator;
use Illuminate\Support\Facades\Auth;
class PlanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        if(Auth::user()->role_id==5){
            return redirect()->back();
        }
        $Plan = Plan::where('id','!=',2)->get();
        $data['allplan'] = $Plan;
    	return view('individual/plan',$data);
    }

    public function save(Request $request){
        //lan = New Plan();
        $validator = Validator::make($request->all(), [
  
		    "plan.*"  => "required|numeric",
		]);

		if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }

        $allplan = $request->plan;
        foreach ($allplan as $key => $plan) {
        	
        	$Plan = Plan::find($key);
        	$Plan->price = $plan;
        	$Plan->save();
        }
        return redirect()->back()->withSuccess('IT WORKS!');
        #$data['allplan'] = $Plan->all();
    	#return view('individual/plan',$data);
    }
}
