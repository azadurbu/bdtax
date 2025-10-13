<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserFiles;
use Yajra\Datatables\Datatables;
class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    function loadUserFile(Request $request){
        //$domainurl = 'http://dev.bdtax.com.bd/';
        $domainurl = 'http://dev.bdtax.com.bd/';
        $p_id = $request->payment_id;
        $type = $request->type;
        $uF = UserFiles::where('user_payment_id',$p_id)->where('file_type',$type)->first();
        $filepath = explode('.',$uF->file_path);
        $filetype = $filepath[count($filepath)-1];
        if(strtolower($filetype) == 'pdf'){
            echo '<object width="100%" height="100%" toolbar="0" data="'.$domainurl.$uF->file_path.'#toolbar=0&navpanes=0"></object>';


        }else{
            echo '<img width="100%" src="'.$domainurl.$uF->file_path.'" />';
        }
        //print_r($filepath);
        exit();
    }

    public function getData()

    {
        /*$Posts = User::select(array('post.id','title','users.email','post.created_at'))->leftjoin('users', 'users.id', '=', 'post.user_id');*/
        $Users = User::select(array('id','first_name','last_name','email','create_at','role_id','status'))
                 ->where('role_id','!=',1)
                 ->orderby('create_at','desc');
        return Datatables::of($Users)
       
        ->addColumn('action', function ($Users) {
                return '<a class="btn btn-xs btn-success" href="#">Edit</a>';
            })
        ->addColumn('asignto', function ($Users) {
                //$assigneduser = User::find(1);
                //return $assigneduser->email;
                return '-';
            })
        ->addColumn('role_id', function ($Users) {
                if($Users->role_id==2){
                    return 'customers';
                }else if($Users->role_id==3){
                    return 'companyAdmin';
                }else{
                    return 'companyUser';
                }
            })
        ->addColumn('status', function ($Users) {
                if($Users->status==1){
                    return 'Active';
                }else{
                    return 'Disabled';
                }
            })
        ->make(true);

    }
}
