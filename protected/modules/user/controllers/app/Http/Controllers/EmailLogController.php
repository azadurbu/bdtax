<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmailLog;
use Yajra\Datatables\Datatables;
class EmailLogController extends Controller
{
    public function index(){
         
       
        return view('emaillog/list');
    }

     public function getData()

    {
        /*$Posts = User::select(array('post.id','title','users.email','post.created_at'))->leftjoin('users', 'users.id', '=', 'post.user_id');*/
        $Users = EmailLog::select(array('email_log.email_sender','email_log.id','email_log.order_id','users.first_name','users.last_name','users.email','orders.tax_year','email_log.created_at','email_log.email_type','email_log.id as emaillogid'))
                 ->leftjoin('users', 'users.id', '=', 'email_log.user_id')
                 ->leftjoin('orders', 'orders.id', '=', 'email_log.order_id')
                  
                 
                 //->where('payments.status','VALID')
                 ->orderby('email_log.created_at','desc');
        return Datatables::of($Users)
       
    
        
        
        
        ->addColumn('action', function ($Users) {
                return '<a class="btn btn-xs btn-success" href="/emaillog/details/'.$Users->emaillogid.'">View Detail</a>';
            })
        
        ->make(true);

    }

    public function details($id){

    	$data['emailLog'] = EmailLog::select(array('email_log.email_sender','email_log.email_content','email_log.id','email_log.order_id','users.first_name','users.last_name','users.email','orders.tax_year','email_log.created_at','email_log.email_type','email_log.id as emaillogid'))
                 ->leftjoin('users', 'users.id', '=', 'email_log.user_id')
                 ->leftjoin('orders', 'orders.id', '=', 'email_log.order_id')
                 ->where('email_log.id',$id)->first();

        //print_r($data);
        return view('emaillog/details',$data);

    }
}
