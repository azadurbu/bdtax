<?php
ini_set("memory_limit", "-1");
set_time_limit (7200);
ini_set('max_execution_time', 7200);

class CronjoController extends Controller
{
	
	public function actionX5sSYs3NC2s2wLktA6jWrtDvVHiUSphW1cZWnNxh8EVVpzFBRksGEImnb59Q()
	{
		$this->X5sSYs3NC2s2wLktA6jWrtDvVHiUSphW1cZWnN();
        /*if ( date("l") == "Monday" || date("l") == "Wednesday" ) {

    		$users = Users::model()->findAll(array(
                'condition' => "status = 0 AND lastvisit_at = '0000-00-00 00:00:00' AND trash = 0 AND role_id = 2 AND org_id IS NULL AND (cron_job_execution_date != '".date("Y-m-d")."' OR cron_job_execution_date IS NULL) "
            ));

            foreach ($users as $key => $user) {

            	// $activation_url = $this->createAbsoluteUrl('/user/activation/activation', array("activkey" => $user->activkey, "email" => $user->email));
                $activation_url = 'https://bdtax.com.bd/index.php/user/activation/activation/activkey/'.$user->activkey.'/email/'.$user->email;
                
                if ($user->first_name == "" && $user->last_name == "") {
                    $tmp = explode("@", $user->email);
                    $name = $tmp[0];
                }
                else {
                    $name = $user->first_name.' '.$user->last_name;
                }

            	$mailBody = '<div id=":fz" class="a3s" style="width:100%">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                    <tr>
                        <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#f8f8f8" width="600">
                                <tbody>
                                    <tr>
                                        <td align="center" style="color:#ffffff;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:18px;font-weight:bold;text-transform:uppercase;padding:20px 0;background-color:#FFF" valign="middle"> <img src="https://bdtax.com.bd/img/logo.png" class="CToWUd"></td>
                                    </tr>
                                    <tr>
                                        <td height="20">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 15px; text-align: justify; text-justify: inter-word; color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif; font-size:14px;">
    <p>
    Dear '.$name.',
    </p>

    <p>
    Thank you for signing up with <a href="https://bdtax.com.bd/" style="color:#009307">bdtax.com.bd</a>. We have noticed that you have not fully activated your account. For your convenience we have provided the activation link below. 
    </p>
    <p>
    <a href="'.$activation_url.'" style="color:#009307">'.$activation_url.'</a>
    </p>
    <p>
    If you have any questions, please email us at <a href="mailto:support@bdtax.com.bd" style="color:#009307" >support@bdtax.com.bd</a>.
    </p>
    <br>
    <p>
    Thank you.<br>
    Team BDTax<br>
    <a href="mailto:support@bdtax.com.bd" style="color:#009307" >support@bdtax.com.bd</a><br>
    </p>
    <br>
    <hr>

    <div style="width: 100%; text-align: center;">
    Bangladesh\'s first copyrighted online income tax software - <a href="https://bdtax.com.bd/" style="color:#009307">bdtax.com.bd</a>
    <br>

    <a href="https://www.facebook.com/bdtaxonline/" data-default="Facrbook"  style="text-decoration:none;"><img src="https://bdtax.com.bd/img/facebook.png" data-default="placeholder" data-max-width="30" data-customIcon="true" width="30" height="30" alt="facebook" style="margin-right:40x;""></a>

    <a href="https://twitter.com/bdtaxonline" data-default="Twitter"  style="text-decoration:none;"><img src="https://bdtax.com.bd/img/twitter.png" data-default="placeholder" data-max-width="30" data-customIcon="true" width="30" height="30" alt="twitter" style="margin-right:40x;"></a>
    </div>





    	                                    
                                           
                                        </td>

                                        <tr>
                                            <td style="padding: 15px; text-align: justify; text-justify: inter-word; color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif; font-size:14px;">&nbsp;</td>
                                        </tr>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>';    
                 
             
                $user_update = Users::model()->findByPk($user->id);
                $user_update->cron_job_execution_date = date("Y-m-d");
                $user_update->save(false);

        	   UserModule::sendMail($user->email, "Please activate your bdtax.com.bd account", $mailBody);
               echo "<br>Email sent to " . $user->email;
            } //end foreach

    		
        } //end if
        else {
            echo "<br>Today is " . date("l") . ". Will run on Monday & Wednesday.";
        }*/
        
	} // end function


    public function X5sSYs3NC2s2wLktA6jWrtDvVHiUSphW1cZWnN()
    {
        if ( date("H:i:s") > "23:00:00" && date("H:i:s") < "23:45:00" ) {
            $reportDate = date('Y-m-d');
            $checkDate_query_str = "SELECT DISTINCT(reportForDate) FROM `user_progress_report` WHERE reportForDate = '".$reportDate."'";
            $connection=Yii::app()->db;
            $command=$connection->createCommand($checkDate_query_str);

            $checkDate_status = $command->queryRow();

            if($checkDate_status!=false){
                exit();
            }

            $rows=array();
            $count_query_str = "SELECT Count(users.id) as count
                FROM users
                LEFT JOIN personal_information ON users.id = personal_information.UserId
                LEFT JOIN users_statistic ON personal_information.CPIId = users_statistic.CPIId
                WHERE users.role_id=2 AND users.org_id is NULL AND personal_information.CPIId IS NOT NULL";

            $connection=Yii::app()->db;
            $command=$connection->createCommand($count_query_str);

            $rowCount=(int)$command->queryRow()['count'];

            $limit[0] = 0;
            $limit[1] = floor(($rowCount/2));
            $limit[2] = $rowCount - $limit[1];

            // var_dump($limit);die;




            for ($i=1; $i < sizeOf($limit); $i++) { 

                // var_dump($limit[$i]);

                $sql = "SELECT users.id, personal_information.CPIId, DATE_FORMAT(users.create_at, '%Y-%m-%d') As create_at, users.status, users_statistic.pdf_print_count, users_statistic.progress_percent, 
                (SELECT SUM(aip.amount) FROM all_ind_payments as aip WHERE aip.CPIId = personal_information.CPIId LIMIT 1) AS paymentAmount
                FROM users
                LEFT JOIN personal_information ON users.id = personal_information.UserId
                LEFT JOIN users_statistic ON personal_information.CPIId = users_statistic.CPIId
                WHERE users.role_id=2 AND users.org_id is NULL AND personal_information.CPIId IS NOT NULL
                ORDER BY users.id ASC LIMIT ".$limit[$i]." OFFSET ".$limit[$i-1];

                $connection=Yii::app()->db;
                $command=$connection->createCommand($sql);

                $rows[$i-1]=$command->queryAll();
            }
            // echo sizeOf($rows[1]);die;
            foreach ($rows as $key => $value) {
                // var_dump(sizeOf($value));die; 
                for ($i=0; $i < sizeOf($value) ; $i++) {
                    $modelNew=new UserProgressReport;
                    $modelNew->reportForDate= $reportDate;

                    if((float)$value[$i]['progress_percent']>=0 && (float)$value[$i]['progress_percent']<25){
                        $modelNew->percent_0 = 1;
                    }elseif ((float)$value[$i]['progress_percent']>25 && (float)$value[$i]['progress_percent']<50) {
                        $modelNew->percent_25 = 1;
                    }elseif ((float)$value[$i]['progress_percent']>50 && (float)$value[$i]['progress_percent']<75) {
                        $modelNew->percent_50 = 1;
                    }elseif ((float)$value[$i]['progress_percent']>75 && (float)$value[$i]['progress_percent']<100) {
                        $modelNew->percent_75 = 1;
                    }elseif ((float)$value[$i]['progress_percent']=100) {
                        $modelNew->percent_100 = 1;
                    }

                    $modelNew->pdfDownloadCount = $value[$i]['pdf_print_count'];
                    $modelNew->payment = $value[$i]['paymentAmount'];

                    if ($value[$i]['status']=='1') {
                        $modelNew->userActive=1;
                    }else{
                        $modelNew->userInActive=1;
                    }

                    $modelNew->userCreated = $value[$i]['create_at'];
                    
                    if($value[$i]['create_at'] == $reportDate){
                        $modelNew->newUser=1;
                    }else{
                        $modelNew->newUser=0;
                    }
                    
                    $modelNew->CPIID = $value[$i]['CPIId'];
                    $modelNew->UserId = $value[$i]['id'];
                    $modelNew->save(false);
                }
            }

        }else{
            echo 'It\'s not 11:00PM - 11:30PM still';
        }
    } // end function



    

	
}
