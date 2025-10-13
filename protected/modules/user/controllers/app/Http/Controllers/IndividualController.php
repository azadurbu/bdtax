<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Payment;
use App\Plan;
use App\UserFileStatus;
use App\UserPlan;
use App\UserFiles;
use App\Filetype;
use App\Order;
use App\UserFilesStatusHistory;
use Mail;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;
use Illuminate\Support\Facades\Auth;
use App\EmailLog;
use App\uploadAcknowledge;
use Carbon\Carbon;

use Yajra\Datatables\Datatables;
class IndividualController extends Controller
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


      return view('individual/plan');
    }

    public function order(Request $request){
         
        /*
        
        $search =  $request->input('q'); 
        if($search){

                 $Users = Order::select(array('users.id','users.first_name','users.last_name','users.email','orders.tax_year','orders.amount','orders.assign_to','users.status','individual_plan.plan','individual_plan.description','orders.order_status','user_plan.plan_id','orders.id as orderid'))
                 ->leftjoin('users', 'users.id', '=', 'orders.user_id')
                 ->leftjoin('user_plan', 'user_plan.user_payment_id', '=', 'orders.id')
                 ->leftjoin('individual_plan', 'individual_plan.id', '=', 'user_plan.plan_id')

                 ->where('users.role_id','!=',1)
                 ->where(function($query){
                    $query->where('user_plan.plan_id',4)
                    ->orwhere('user_plan.plan_id',5)
                    ->orwhere('user_plan.plan_id',6)
                    ->orwhere('user_plan.plan_id',7);
                    }
                  )
                  ->where(function ($query) use ($search){
                        $query->where('users.first_name', 'like', '%'.$search.'%')
                           ->orwhere('users.last_name', 'like', '%'.$search.'%')
                           ->orwhere('users.email', 'like', '%'.$search.'%');
                      }
                  )
                 
                 ->orderby('orderid','desc')->paginate(10);
                 $Users->appends(['q' => $search]);
                   
        }else{    
                $Users = Order::select(array('users.id','users.first_name','users.last_name','users.email','orders.tax_year','orders.amount','orders.assign_to','users.status','individual_plan.plan','individual_plan.description','orders.order_status','user_plan.plan_id','orders.id as orderid'))
                 ->leftjoin('users', 'users.id', '=', 'orders.user_id')
                 ->leftjoin('user_plan', 'user_plan.user_payment_id', '=', 'orders.id')
                 ->leftjoin('individual_plan', 'individual_plan.id', '=', 'user_plan.plan_id')
                 ->where('users.role_id','!=',1)
                 ->where('user_plan.plan_id',4)
                 ->orwhere('user_plan.plan_id',5)
                 ->orwhere('user_plan.plan_id',6)
                 ->orwhere('user_plan.plan_id',7)
                 ->orderby('orderid','desc')->paginate(10);
        }
                 
                 //->where('payments.status','VALID')
                 //$Users->orderby('orderid','desc')->paginate(10);

        
        $data['orderlist']= $Users;*/
        Carbon::setWeekStartsAt(Carbon::SATURDAY);
        Carbon::setWeekEndsAt(Carbon::FRIDAY);
        $dt = Carbon::now();
        $data['pending_total']= Order::where('orders.order_status', 1)->orwhere('orders.order_status', '')->where('user_plan.plan_id','!=',1)->where('user_plan.plan_id','!=',3)
        ->leftJoin('user_plan', 'orders.id', '=', 'user_plan.user_payment_id')->count();

        $data['processing_total']= Order::where('orders.order_status','!=', 1)
         ->where('orders.order_status', '!=',8)->where('user_plan.plan_id','!=',1)->where('user_plan.plan_id','!=',3)
        ->leftJoin('user_plan', 'orders.id', '=', 'user_plan.user_payment_id')->count();

        $data['completed_total']= Order::where('orders.order_status', 8)->where('user_plan.plan_id','!=',1)->where('user_plan.plan_id','!=',3)
        ->leftJoin('user_plan', 'orders.id', '=', 'user_plan.user_payment_id')->count();

        $data['pending_thisweak']= Order::where(\DB::raw("WEEKOFYEAR(orders.updated_at)"), $dt->weekOfYear)->where('orders.order_status', 1)->orwhere('orders.order_status', '')->where('user_plan.plan_id','!=',1)->where('user_plan.plan_id','!=',3)
        ->leftJoin('user_plan', 'orders.id', '=', 'user_plan.user_payment_id')->count();

        $data['processing_thisweak']= Order::where(\DB::raw("WEEKOFYEAR(orders.updated_at)"), $dt->weekOfYear)->where('orders.order_status','!=', 1)
         ->where('orders.order_status', '!=',8)->where('user_plan.plan_id','!=',1)->where('user_plan.plan_id','!=',3)
        ->leftJoin('user_plan', 'orders.id', '=', 'user_plan.user_payment_id')->count();


        $data['completed_thisweak']= Order::where(\DB::raw("WEEKOFYEAR(orders.updated_at)"), $dt->weekOfYear)->where('orders.order_status', 8)->where('user_plan.plan_id','!=',1)->where('user_plan.plan_id','!=',3)
        ->leftJoin('user_plan', 'orders.id', '=', 'user_plan.user_payment_id')->count();
        

       

        return view('individual/order',$data);
    }

    public function printPdfOnly($cpiid,$userid,$taxyear,$orderId){
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://bdtax.com.bd/index.php/getPdfContent/ViewPdfasdertuyjnmgndfmgbnkkjitjertierbkjbgdogbdtertnekl?cpiid='.$cpiid.'&userId='.$userid.'&taxYear='.$taxyear,
        CURLOPT_USERAGENT => 'Codular Sample cURL Request'
        ]);
        // Send the request & save response to $resp
        $response = curl_exec($curl);
        //die();
        $result = json_decode($response);

        // Close request to clear up some resources
        curl_close($curl);
 
        
        $content = $this->getPdfContent();
        $mpdf = new \Mpdf\Mpdf(['tempDir' =>'images','mode' => 'utf-8','format' =>'A4']);
        $mpdf->SetDefaultFont('Times New Roman'); 
        $mpdf->SetDefaultFontSize('3');
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($response);
        $mpdf->Output();

    }

    public function printPdf($cpiid,$userid,$taxyear,$orderId){
        
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://bdtax.com.bd/index.php/getPdfContent/ViewPdfasdertuyjnmgndfmgbnkkjitjertierbkjbgdogbdtertnekl?cpiid='.$cpiid.'&userId='.$userid.'&taxYear='.$taxyear,
        CURLOPT_USERAGENT => 'Codular Sample cURL Request'
        ]);
        // Send the request & save response to $resp
        $response = curl_exec($curl);
        //die();
        $result = json_decode($response);

        // Close request to clear up some resources
        curl_close($curl);
 
        
        $content = $this->getPdfContent();
        $mpdf = new \Mpdf\Mpdf(['tempDir' =>'images','mode' => 'utf-8','format' =>'A4']);
        $mpdf->SetDefaultFont('Times New Roman'); 
        $mpdf->SetDefaultFontSize('3');
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML($response);
        $domainurl = 'https://bdtax.com.bd/';
        //$domainurl = 'https://bdtax-doc.s3.ap-south-1.amazonaws.com/';
        $UserFiles =UserFiles::where('user_payment_id',$orderId)->where('file_type','>',8)->get();

        foreach ($UserFiles as $files) {
          $uF = explode('.', $files->file_path);
          if(strtolower($uF[count($uF)-1])!='pdf'){
                //$files->file_path;
                $mpdf->WriteHTML('<pagebreak />');
                $mpdf->Image('/var/www/bdtax2/'.$files->file_path, 15, 15, 210, 297, 'jpg', '', true);
                //$mpdf->WriteHTML('<img style="width:100%" src="https://bdtax.com.bd/'.$files->file_path.'" />');
                //$mpdf->WriteHTML('<pagebreak />');
                //$mpdf->WriteHTML($files->file_path);

          }
        }

        //$t = date('YmdHis');
        //$mpdf->Output();
        $t = date('YmdHis');
        $filePath = '/var/www/bdtax2/uploaded-doc/userfiles/file_'.$cpiid.'_'.$userid.'.pdf';

        $mpdf->Output($filePath, \Mpdf\Output\Destination::FILE);

        //$mpdf->Output();
        
       
        // initiate FPDI
        $pdf = new Fpdi();
 
        
        // set the source file
        $pageCount = $pdf->setSourceFile($filePath);
        for($i=1;$i<=$pageCount;$i++){
          $pdf->AddPage();
          // import page 1
          $tplIdx = $pdf->importPage($i);
          // use the imported page and place it at position 10,10 with a width of 100 mm
          $pdf->useTemplate($tplIdx);
        }
         
        
        foreach ($UserFiles as $files) {
          $uF = explode('.', $files->file_path);
          if(strtolower($uF[count($uF)-1])=='pdf'){
              // set the source file
              $filepdf = fopen('/var/www/bdtax2/'.$files->file_path,"r");
   	      if($filepdf) {
     	      	   $line_first = fgets($filepdf);
                   fclose($filepdf);
                   // extract number such as 1.4,1.5 from first read line of pdf file
                   preg_match_all('!\d+!', $line_first, $matches);
					 
                   // save that number in a variable
                   $pdfversion = implode('.', $matches[0]);
              }

              if($pdfversion > "1.4"){
               $random = rand(1,10000);
               $srcfile = '/var/www/bdtax2/'.$files->file_path;
	       $filenamearray = explode('.',$files->file_path);
               $newPath = $filenamearray[count($filenamearray)-2].$random.'convert.pdf';
               $srcfile_new= '/var/www/bdtax2/'.$newPath;
               //echo 'gs -dBATCH -dNOPAUSE -q -sDEVICE=pdfwrite -sOutputFile="'.$srcfile_new.'" "'.$srcfile.'"';
               exec('gs -dBATCH -dNOPAUSE -q -sDEVICE=pdfwrite -sOutputFile="'.$srcfile_new.'" "'.$srcfile.'"'); 
	       $pageCount = $pdf->setSourceFile($srcfile_new);
              }else{
              $pageCount = $pdf->setSourceFile('/var/www/bdtax2/'.$files->file_path);
              }

              //$domainurl.$files->file_path
              //$pageCount = $pdf->setSourceFile('/var/www/bdtax2/'.$files->file_path);
              // import page 1
              for($i=1;$i<=$pageCount;$i++){
                  $pdf->AddPage();
                  $tplIdx = $pdf->importPage($i);
                  // use the imported page and place it at position 10,10 with a width of 100 mm
                  //$pdf->useTemplate($tplIdx);
                  $pdf->useTemplate($tplIdx, 10, 10, 200);
              }
          }
        }
          
        
        

        



        $pdf->Output();
        die();
    
    }

    public function submitCustomer(Request $request){

        //dd($request->all());
        $UP = Order::find($request->id);
        if($request->assign_to){
            $UP->assign_to = $request->assign_to;
            $UP->save();
        }else{
            $UP->tax_year = $request->tax_year;
            $UP->amount =  $request->amount;
            //$UP->payment_date = $request->payment_date;
            $UP->order_note = $request->order_note;
            $UP->save();
            $Count = UserPlan::where('user_payment_id',$request->id)->count();
                if($Count){
                    $UPlan = UserPlan::where('user_payment_id',$request->id)->first();
                }else{
                    $UPlan = new UserPlan;
                    $UPlan->user_payment_id = $request->id;
                }
            $UPlan->plan_id = $request->user_plan;
            $UPlan->save();
        }
        return redirect()->back()->withSucess('sucess',1);

    }

    public function sendNotification($status,$user_id,$orderId){

        $message = '';
        if($status){

          $fileStatus = array('1'=>'Pending','2'=>'In Process','3'=>'Printing','4'=>'Ready for Delivery','5'=>'Delivery Receipt','7'=>'Refunded','8'=>'Completed');
          $statusTitle = '';
          if(isset($fileStatus[$status])){
            $statusTitle = $fileStatus[$status];
          }
          
          $message = '';
          if($status==8){
            $message .= '<h4>Congratulations</h4>';
            $message .= '<p>Your  order  has been <strong>'.$statusTitle.'</strong> </p>';
          }else{
            $message .= '<p>Your order status has been updated.</p>';
            $message .= '<p>Your current order status is:<strong>'.$statusTitle.'</strong> </p>';
          }
          


        }

        $emailLog = new EmailLog();
        $emailLog->user_id = $user_id;
        $emailLog->order_id = $orderId;
        $emailLog->email_type= 'Order Status Notification';
        $emailLog->email_content = $message;
        $emailLog->email_sender = Auth::user()->email;
        $emailLog->save();
        //echo $user_id;
        $data['user'] = $user = User::find($user_id);
        $data['email_content'] = $message;
       // print_r($data);
        //die();
        Mail::send('email.send_email', $data, function ($m) use ($user) {
            $m->from('info@bdtax.com.bd', 'Bdtax.com.bd');
            
            $m->to($user->email)->cc(Auth::user()->email)->subject('Order Status Update');
        });
    }

    public function submitFilesStatus(Request $request){
        //dd($request->all());
        $UFSH = new UserFilesStatusHistory();
        $UFSH->activity = $request->activity;
        $UFSH->comment =  $request->comment;
        $UFSH->file_status = $request->file_status;
        $UFSH->updated_time = $request->datetime;
        $UFSH->updated_by = $request->updated_by;
        $UFSH->refer_to = $request->refer_to;
        $UFSH->user_payment_id  = $request->id;
        $UFSH->save();
        $fileCount = UserFileStatus::where('user_payment_id',$request->id)->count();
        if($fileCount){
            $UFS = UserFileStatus::where('user_payment_id',$request->id)->first();
        }else{
            $UFS = new UserFileStatus;
            $UFS->user_payment_id = $request->id;
        }
        $UFS->current_status = $request->file_status;
        $UFS->save();

        $UP = Order::find($request->id);
        $UP->assign_to = $request->refer_to;
        $UP->order_status = $request->file_status;

        $UP->save();

        if($request->sendemail){

        $this->sendNotification($request->file_status, $UP->user_id,$request->id);
        }

        return redirect()->back()->withSucess('sucess',1);
    }

    public function orderDetails($id=0){
        $data['allplan'] = Plan::all();
        $Order = Order::find($id);
        $data['filetype'] = Filetype::where('parent_id',0)->get();
        $data['payment_history'] =Payment::where('user_id',$Order->user_id)->where('CPIID',$Order->CPIID)->where('payment_year',$Order->tax_year)->get();
        $data['order'] = $Order;

        $data['ackstatus'] = uploadAcknowledge::where('user_id',$Order->user_id)->where('tax_year',$Order->tax_year)->count();

        $data['UseFileStatus'] =UserFileStatus::where('user_payment_id',$id)->first();
        $data['nbrstatus'] = UserFiles::where('user_payment_id',$id)->where('file_type',101)->count();
        $data['UserPlan'] =UserPlan::where('user_payment_id',$id)->first();
        $data['UserFiles'] =UserFiles::where('user_payment_id',$id)->get();
        $data['User_ref'] =User::where('role_id',5)->get();
        $data['files_hostory'] =UserFilesStatusHistory::where('user_payment_id',$id)->orderby('id','desc')->get();
        return view('individual/order_details',$data);
    }

    public function getData()

    {
        /*$Posts = User::select(array('post.id','title','users.email','post.created_at'))->leftjoin('users', 'users.id', '=', 'post.user_id');*/
        $Users = Order::select(array('users.id','users.first_name','users.last_name','users.email','orders.tax_year','orders.amount','orders.assign_to','users.status','user_files_status.current_status','user_files_status.nbrRecieptStatus','user_plan.plan_id','orders.id as orderid','orders.updated_at as updatedtime','order_status.name'))
                 ->leftjoin('users', 'users.id', '=', 'orders.user_id')
                 ->leftJoin('user_files_status', function($join)
                         {
                             $join->on('user_files_status.user_payment_id', '=', 'orders.id');
                         })
                 ->leftJoin('user_plan', function($join)
                         {
                             $join->on('user_plan.user_payment_id', '=', 'orders.id');
                         })
                 ->leftjoin('order_status', 'order_status.id', '=', 'orders.order_status')
                 ->where('users.role_id','!=',1)
                 ->where(function($query){
                    $query->where('user_plan.plan_id',4)
                    ->orwhere('user_plan.plan_id',5)
                    ->orwhere('user_plan.plan_id',6)
                    ->orwhere('user_plan.plan_id',7);
                    }
                  )
                  
                 
                 //->where('payments.status','VALID')
                 ->orderby('orderid','desc');
        return Datatables::of($Users)
       
    
        ->addColumn('current_status', function ($Users) {
                if($Users->current_status){
                    $fileStatus = array('1'=>'Pending','2'=>'In Process','3'=>'Printing','4'=>'Ready for Delivery','5'=>'Delivery Receipt','7'=>'Refunded','8'=>'Completed');
                    return $fileStatus[$Users->current_status];
                }else{
                    return 'Pending';
                }
                //$assigneduser = User::find(1);
                //return $assigneduser->email;
                return '-';
            })

        ->addColumn('plan_id', function ($Users) {
                if($Users->plan_id){

                    $planD = Plan::find($Users->plan_id);
                    return $planD->plan.'('.$planD->description.')';
                }else{
                    
                }
                //$assigneduser = User::find(1);
                //return $assigneduser->email;
                
            })

       ->addColumn('assign_to', function ($Users) {
            if($Users->assign_to){
                    return User::find($Users->assign_to)->email;
            }
        })

        ->addColumn('nbrrec', function ($Users) {
            $count = UserFiles::where('user_payment_id',$Users->orderid)->where('file_type',101)->count();
            if($count){
                    return '<a onmouseover="showmodal('.$Users->orderid.')" href="javascript:void(0)" class="">Yes</a>';
            }else{
                    return 'No';
            }
        })
        
        
        ->addColumn('action', function ($Users) {
                return '<a class="btn btn-xs btn-success" href="/individual/order-details/'.$Users->orderid.'">Edit</a>';
            })
        ->rawColumns(['nbrrec' => 'nbrrec','action' => 'action'])
        ->make(true);

    }

    function uploadAckonwlege(Request $request){
      if ($_FILES["aknowledgementslip"]["size"]) {
        $uploadCount = uploadAcknowledge::where('tax_year',$request->tax_year)->where('user_id',$request->user_id)->count();
        if($uploadCount){
          $uploadAcknowledge = uploadAcknowledge::where('tax_year',$request->tax_year)->where('user_id',$request->user_id)->first();
        }else{
          $uploadAcknowledge = new uploadAcknowledge();
        }

        $target_dir = "/var/www/bdtax2/uploaded-doc/userfiles/";
        $fileName = time().str_replace(' ','',basename($_FILES["aknowledgementslip"]["name"]));
        $target_file = $target_dir . $fileName;
        $target_file_name ='uploaded-doc/userfiles/'.$fileName;
        $uploadAcknowledge->tax_year = $request->tax_year;
        $uploadAcknowledge->user_id = $request->user_id;
        $uploadAcknowledge->file_path =  $target_file_name;
        $uploadAcknowledge->save();

      
        move_uploaded_file($_FILES["aknowledgementslip"]["tmp_name"], $target_file);

        //echo $user_id;
        $data['user'] = $user = User::find($request->user_id);
        $data['email_content'] = "<p>Your Acknowledgement Slip has been uploaded.</p><p>Please login to https://bdtax.com.bd and go to the Submit page . you will get the option to download.</p><p>You can also download using this link https://bdtax.com.bd/".$target_file_name."</p>"

        ;
       // print_r($data);
        //die();
        Mail::send('email.send_email', $data, function ($m) use ($user) {
            $m->from('info@bdtax.com.bd', 'Bdtax.com.bd');
            
            $m->to($user->email)->cc(Auth::user()->email)->subject('Order Status Update');
        });
        return redirect()->back()->withSucess('uploadsuccess',1);

      }
         return redirect()->back();

    }

    public function sendEmailReminder(Request $request)
    {
        $data['user'] = $user = User::findOrFail($request->user_id);
        
        $contentarray = explode('<br />', nl2br($request->email_content));
        $message = '';
        foreach ($contentarray as $c) {
          $message .= '<p>'.$c.'</p>';
        }
        $data['email_content'] = $message;

        $emailLog = new EmailLog();
        $emailLog->user_id = $request->user_id;
        $emailLog->order_id = $request->order_id;
        $emailLog->email_content = $message;
        $emailLog->email_type= 'Custom Notification';
        $emailLog->email_sender = Auth::user()->email;
        $emailLog->save();
        //echo $user_id;
        $data['user'] = $user = User::find($request->user_id);
        $data['email_content'] = $message;
        Mail::send('email.send_email', $data, function ($m) use ($user) {
            $m->from('info@bdtax.com.bd', 'Bdtax.com.bd');
            
            $m->to($user->email)->cc(Auth::user()->email)->subject('Order Status Update');
        });

        return redirect()->back()->withSucess('emailsucess',1);
    }

    public function getPdfContent(){

        return $content = '
  <style type="text/css" media="print">
      * {
        font-family:"Times New Roman";
      }
      body {
        /*font-style:normal;*/
        font-weight:bold;
        font-size:13px!important;
        font-family:"Times New Roman";
      }
      .page2_table1 {
        font-weight:bold;
        font-size:11px;
        font-family:"Times New Roman";
        line-height:5px;
      }

      
   .FOOTER{
    text-align:center;
    font-weight:bold;
    font-size:large;
    color: #61331C;
    position:relative;
     /* bottom: -10 px;
     right: -10 px;*/
 }
  /* #temp_id
  {
     border-collapse:collapse;
  }
  #temp_id td
  {
     border: 1px solid red;
     outline:none;
 }*/
 

 
</style>


<!---------------- START OF PAGE 1 -------------->
<table cellspacing="0" cellpadding="0" width="100%" style="font-size:16px;">
  <tbody>
    <tr>
      <td width="22%" align="center" style="font-size:11px; padding:5px;" valign="top">
        <p style="font-size:12px;">National Board of Revenue</p>
        <p style="font-weight:normal;font-size:12px;">www.nbr.gov.bd</p>
      </td>
            
      <td width="42%" style="padding:5px;" valign="top">&nbsp;</td>
      
            
    <td width="32%" align="right" style="padding:5px;" valign="top">
    <p style="font-weight:bold; font-size:12px;"><strong>IT-11GA2016</strong></p>
      </td>
    </tr>
  </tbody>
</table>

<h6 style="text-align:center;"><strong>RETURN OF INCOME<br />
</strong><span style="font-size:12px; font-weight:normal;">For an Individual Assessee</span></h6>
<table cellspacing="0" cellpadding="0" width="100%" style="font-size:11px;" border="0">
  <tbody>
    <tr>
      <td colspan="2" width="76%" style="padding:5px;" valign="top">
        <p style="font-size:12px;">The following schedules shall be the integral part of this return and must be annexed to return in the following cases:</p>
      </td>
      <td rowspan="5" width="2%" style="padding:5px;" valign="top">&nbsp;</td>
      <td rowspan="5" width="20%" align="center"  valign="top" style="border:1px solid #000;padding:5px;">
        <p>Photo</p>
      </td>
    </tr>
    <tr>
      <td width="16%" style="padding:5px;" valign="top">
        <p style="font-weight:normal; font-size:12px"><em>Schedule 24A</em></p>
      </td>
      <td width="65%" style="padding:5px;" valign="top">
        <p style="font-weight:normal;font-size:12px"><em>if you have income from Salaries</em></p>
      </td>
    </tr>
    <tr>
      <td width="16%" style="padding:5px;" valign="top">
        <p style="font-weight:normal;font-size:12px"><em>Schedule 24B</em></p>
      </td>
      <td width="65%" style="padding:5px;" valign="top">
        <p style="font-weight:normal;font-size:12px"><em>if you have income from house property</em></p>
      </td>
    </tr>
    <tr>
      <td width="16%" style="padding:5px;" valign="top">
        <p style="font-weight:normal;font-size:12px"><em>Schedule 24C</em></p>
      </td>
      <td width="65%" style="padding:5px;" valign="top">
        <p style="font-weight:normal;font-size:12px"><em>if you have income from business or profession</em></p>
      </td>
    </tr>
    <tr>
      <td width="16%" style="padding:5px;" valign="top">
        <p style="font-weight:normal;font-size:12px"><em>Schedule 24D</em></p>
        <img src="http://localhost/bdtaxadmin/public/images/user-docs/1.jpg" />
      </td>
      <td width="65%" style="padding:5px;" valign="top">
        <p style="font-weight:normal;font-size:12px"><em>if you claim tax rebate</em></p>
      </td>
    </tr>
  </tbody>
</table>


<style>

  @media print and (-webkit-min-device-pixel-ratio:0) {
  h1 { font-family: sans-serif; font-style:italic}
  h2 { font-family: sans-serif;font-style:italic }
  h3 { font-family: sans-serif; font-style:italic}
  .blogtitle { font-family: sans-serif; font-style:italic}
  /* Any other classes or tags that use the custom font get the
   * same treatment */
}
</style>
';
    }
}
