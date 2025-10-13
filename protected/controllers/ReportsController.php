<?php
ini_set("memory_limit", "-1");
set_time_limit (7200);
ini_set('max_execution_time', 7200);

class ReportsController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/columnLess';
    public $defaultAction = 'index';
    
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                    'actions' => array('showUserPercent', 'update','search','userProgressReport','userProgressReportColumnData'),
                    'users' => array('@'),
                    'expression' => '(Yii::app()->user->role == "superAdmin")',
                    ),
                array('deny', // deny all users
                    'users' => array('*'),
                    ),
                );
    }

    public function actionUserProgressReportColumnData(){

        $monthFrom=isset($_POST['monthFrom']) ? $_POST['monthFrom'] :'';
        $yearFrom=isset($_POST['yearFrom']) ? $_POST['yearFrom'] :'';
        $colName = isset($_POST['colName']) ? $_POST['colName'] :'';

        if(isset($_POST['monthFrom']) && isset($_POST['yearFrom'])){
            $start_time = date('Y-m-d H:i:s', strtotime($yearFrom.'-'.$monthFrom.'-1'.' 00:00:01'));
            $end_time = date('Y-m-t H:i:s', strtotime($yearFrom.'-'.$monthFrom.'-27'.' 23:59:59'));
            if($colName == 'newUser'){
                $sql = "SELECT DATE_FORMAT(users.create_at, '%Y-%m-%d') as UserCreated, users.first_name,users.last_name, users.email, users.mobile
                    FROM users
                    LEFT JOIN personal_information ON users.id = personal_information.UserId
                    WHERE personal_information.CPIId IS NOT NULL
                    AND users.create_at BETWEEN '".$start_time."' AND '".$end_time."'  
                    AND users.role_id = 2
                    ORDER BY users.create_at ASC";
            }
            elseif($colName == 'activeUser'){
                $sql = "SELECT DATE_FORMAT(users.create_at, '%Y-%m-%d') as UserCreated, users.first_name,users.last_name, users.email, users.mobile
                    FROM users
                    LEFT JOIN personal_information ON users.id = personal_information.UserId
                    WHERE personal_information.CPIId IS NOT NULL
                    AND users.create_at BETWEEN '".$start_time."' AND '".$end_time."'
                    AND users.status = 1
                    AND users.role_id = 2
                    ORDER BY users.create_at ASC";
            }
            elseif($colName == 'inActiveUser'){
                $sql = "SELECT DATE_FORMAT(users.create_at, '%Y-%m-%d') as UserCreated, users.first_name,users.last_name, users.email, users.mobile
                    FROM users
                    LEFT JOIN personal_information ON users.id = personal_information.UserId
                    WHERE personal_information.CPIId IS NOT NULL
                    AND users.create_at BETWEEN '".$start_time."' AND '".$end_time."'
                    AND users.status = 0
                    AND users.role_id = 2
                    ORDER BY users.create_at ASC";
            }
            elseif($colName == 'percent_0'){
                $sql = "SELECT DATE_FORMAT(users.create_at, '%Y-%m-%d') as UserCreated, users.first_name,users.last_name, users.email, users.mobile
                FROM users
                LEFT JOIN personal_information ON users.id = personal_information.UserId
                LEFT JOIN users_statistic ON personal_information.CPIId = users_statistic.CPIId
                WHERE personal_information.CPIId IS NOT NULL
                AND users.create_at BETWEEN '".$start_time."' AND '".$end_time."' AND  ( 
                (users_statistic.progress_percent >=0
                AND users_statistic.progress_percent <25) OR users_statistic.progress_percent IS NULL
                )
                AND users.role_id = 2
                ORDER BY users.create_at ASC";
            }
            elseif($colName == 'percent_25'){
                $sql = "SELECT DATE_FORMAT(users.create_at, '%Y-%m-%d') as UserCreated, users.first_name,users.last_name, users.email, users.mobile
                FROM users
                LEFT JOIN personal_information ON users.id = personal_information.UserId
                LEFT JOIN users_statistic ON personal_information.CPIId = users_statistic.CPIId
                WHERE personal_information.CPIId IS NOT NULL
                AND users.create_at BETWEEN '".$start_time."' AND '".$end_time."'  
                AND users_statistic.progress_percent >=25
                AND users_statistic.progress_percent <50
                AND users.role_id = 2
                ORDER BY users.create_at ASC";
            }
            elseif($colName == 'percent_50'){
                $sql = "SELECT DATE_FORMAT(users.create_at, '%Y-%m-%d') as UserCreated, users.first_name,users.last_name, users.email, users.mobile
                FROM users
                LEFT JOIN personal_information ON users.id = personal_information.UserId
                LEFT JOIN users_statistic ON personal_information.CPIId = users_statistic.CPIId
                WHERE personal_information.CPIId IS NOT NULL
                AND users.create_at BETWEEN '".$start_time."' AND '".$end_time."'  
                AND users_statistic.progress_percent >=50
                AND users_statistic.progress_percent <75
                AND users.role_id = 2
                ORDER BY users.create_at ASC";
            }
            elseif($colName == 'percent_75'){
                $sql = "SELECT DATE_FORMAT(users.create_at, '%Y-%m-%d') as UserCreated, users.first_name,users.last_name, users.email, users.mobile
                FROM users
                LEFT JOIN personal_information ON users.id = personal_information.UserId
                LEFT JOIN users_statistic ON personal_information.CPIId = users_statistic.CPIId
                WHERE personal_information.CPIId IS NOT NULL
                AND users.create_at BETWEEN '".$start_time."' AND '".$end_time."'  
                AND users_statistic.progress_percent >=75
                AND users_statistic.progress_percent <100
                AND users.role_id = 2
                ORDER BY users.create_at ASC";
            }
            elseif($colName == 'percent_100'){
                $sql = "SELECT DATE_FORMAT(users.create_at, '%Y-%m-%d') as UserCreated, users.first_name,users.last_name, users.email, users.mobile
                FROM users
                LEFT JOIN personal_information ON users.id = personal_information.UserId
                LEFT JOIN users_statistic ON personal_information.CPIId = users_statistic.CPIId
                WHERE personal_information.CPIId IS NOT NULL
                AND users.create_at BETWEEN '".$start_time."' AND '".$end_time."'  
                AND users_statistic.progress_percent =100
                AND users.role_id = 2
                ORDER BY users.create_at ASC";
            }
             elseif($colName == 'pdf_count'){
                $sql = "SELECT DATE_FORMAT(users.create_at, '%Y-%m-%d') as UserCreated, users.first_name,users.last_name, users.email, users.mobile, users_statistic.*
                FROM users
                LEFT JOIN personal_information ON users.id = personal_information.UserId
                LEFT JOIN users_statistic ON personal_information.CPIId = users_statistic.CPIId
                WHERE users_statistic.CPIId IS NOT NULL
                AND users_statistic.pdf_print_count>0
                AND users.create_at BETWEEN '".$start_time."' AND '".$end_time."'  
                AND users.role_id = 2
                ORDER BY users.create_at ASC";

            }
             elseif($colName == 'amount'){
                $sql = "SELECT DATE_FORMAT(users.create_at, '%Y-%m-%d') as UserCreated, users.first_name,users.last_name, users.email, users.mobile, all_ind_payments.*
                FROM users
                LEFT JOIN personal_information ON users.id = personal_information.UserId
                LEFT JOIN users_statistic ON personal_information.CPIId = users_statistic.CPIId
                LEFT JOIN all_ind_payments ON personal_information.CPIId = all_ind_payments.CPIId
                WHERE all_ind_payments.CPIId IS NOT NULL
                AND users.create_at BETWEEN '".$start_time."' AND '".$end_time."'  
                AND users.role_id = 2
                ORDER BY users.create_at ASC";
            }

            else{
                var_dump($colName);die;
            }

            $connection=Yii::app()->db;
            $command=$connection->createCommand($sql);

            $rows=$command->queryAll();

            // var_dump($rows);die;
            echo json_encode($rows);
        }

    }

    public function actionUserProgressReport(){
        $yearList[''] = "Select a year";
        for ($i=2017; $i <= (date('Y')); $i++) { 
            $yearList[$i]=$i;
        }

        $isSubmit=0;
        $yearFrom=isset($_POST['yearFrom']) ? $_POST['yearFrom'] :'';
        $totalData = [];
        $monthData = [];

        if(isset($_POST['yearFrom']))
        {
            $isSubmit=1;
            for ($i=1; $i<=12 ; $i++) { 
                $monthSummaryQuery = "SELECT reportForDate, SUM(percent_0) AS per_0, SUM(percent_25) AS per_25, SUM(percent_50) AS per_50, SUM(percent_75) AS per_75, SUM(percent_100) AS per_100, SUM(pdfDownloadCount) AS pdfCount, SUM(payment) AS payment, SUM(userActive) AS userActive, SUM(userInActive) AS userInActive, SUM(newUser) AS newUser FROM `user_progress_report`  WHERE DATE_FORMAT(reportForDate, '%Y-%m') = '".$yearFrom."-".$i."' GROUP BY DATE_FORMAT(reportForDate, '%Y-%m-%d') ORDER BY `reportForDate` DESC";
                $connection=Yii::app()->db;
                $command=$connection->createCommand($monthSummaryQuery);
                $monthData[$i] = $command->queryRow();
            }
            // echo '<pre>';
            // var_dump($monthData);
            // echo '</pre>';
            // die;
            $sql = "SELECT reportForDate, SUM(percent_0) AS per_0, SUM(percent_25) AS per_25, SUM(percent_50) AS per_50, SUM(percent_75) AS per_75, SUM(percent_100) AS per_100, SUM(pdfDownloadCount) AS pdfCount, SUM(payment) AS payment, SUM(userActive) AS userActive, SUM(userInActive) AS userInActive, SUM(newUser) AS newUser FROM `user_progress_report`  WHERE DATE_FORMAT(reportForDate, '%Y') = '".$yearFrom."' GROUP BY DATE_FORMAT(reportForDate, '%Y-%m-%d') ORDER BY `reportForDate` ASC";

            $connection=Yii::app()->db;
            $command=$connection->createCommand($sql);

            $rows=$command->queryAll();
            $totalData = $rows;
            // echo'<pre>';
            // var_dump($rows);
            // echo'</pre>';

            // die;
        }

        $this->render('userProgressReport',array(
            'yearList' => $yearList,
            'data' => '$data',
            'isSubmit'=>$isSubmit,
            'totalData' => $totalData,
            'monthData' => $monthData,
            'tableFormatData' => '$tableFormatData',
            'yearFrom' => $yearFrom,
        ));
    }


    /*public function actionUserProgressReport(){
        $data=[];
        $totalData=[];
        $tableFormatData=[];
        $isSubmit=0;
        $criteria= new CDbCriteria();
        $monthFrom=isset($_POST['monthFrom']) ? $_POST['monthFrom'] :'';
        $yearFrom=isset($_POST['yearFrom']) ? $_POST['yearFrom'] :'';

        if(isset($_POST['monthFrom']) && isset($_POST['yearFrom']))
        {
            $isSubmit=1;
            $start_time = date('Y-m-d H:i:s', strtotime($yearFrom.'-'.$monthFrom.'-1'.' 00:00:01'));
            $end_time = date('Y-m-t H:i:s', strtotime($yearFrom.'-'.$monthFrom.'-27'.' 23:59:59'));

            $sql = "SELECT DATE_FORMAT(users.create_at, '%Y-%m-%d') as UserCreated, users.status as UserActive, users_statistic.pdf_print_count, users_statistic.progress_percent, all_ind_payments.amount
                FROM users
                LEFT JOIN personal_information ON users.id = personal_information.UserId
                LEFT JOIN users_statistic ON personal_information.CPIId = users_statistic.CPIId
                LEFT JOIN all_ind_payments ON personal_information.CPIId = all_ind_payments.CPIId
                WHERE personal_information.CPIId IS NOT NULL
                AND users.create_at BETWEEN '".$start_time."' AND '".$end_time."'  
                AND users.role_id = 2
                ORDER BY users.create_at ASC";

            $connection=Yii::app()->db;
            $command=$connection->createCommand($sql);

            $rows=$command->queryAll();

            $start_date = (int)date('d', strtotime($start_time));
            $end_date = (int)date('t', strtotime($end_time));

            $monthNum  = $monthFrom;
            $dateObj   = DateTime::createFromFormat('!m', $monthNum);
            $monthName = $dateObj->format('F');

            $totalData['month']=$monthName;
            $totalData['total_new_create']=0;
            $totalData['total_active']=0;
            $totalData['total_in_active']=0;
            $totalData['total_0']=0;
            $totalData['total_25']=0;
            $totalData['total_50']=0;
            $totalData['total_75']=0;
            $totalData['total_100']=0;
            $totalData['pdf_count']=0;
            $totalData['amount']=0;

            for ($i=$start_date; $i<=$end_date; $i++) {
                $counting_date = $yearFrom.'-'.sprintf("%02d",$monthFrom).'-'.sprintf("%02d",$i);
                $tableFormatData[$counting_date]['colDate']=$counting_date;
                $tableFormatData[$counting_date]['new_create']=0;
                $tableFormatData[$counting_date]['active']=0;
                $tableFormatData[$counting_date]['in_active']=0;
                $tableFormatData[$counting_date]['percent_0']=0;
                $tableFormatData[$counting_date]['percent_25']=0;
                $tableFormatData[$counting_date]['percent_50']=0;
                $tableFormatData[$counting_date]['percent_75']=0;
                $tableFormatData[$counting_date]['percent_100']=0;
                $tableFormatData[$counting_date]['pdf_count']=0;
                $tableFormatData[$counting_date]['amount']=0;

                foreach ($rows as $key => $value) {
                    $comp_val =strcmp($counting_date,$value['UserCreated']);
                    if($comp_val==0){

                        $tableFormatData[$counting_date]['new_create'] += 1;

                        if($value['UserActive']==1){
                            $tableFormatData[$counting_date]['active'] += 1;
                        }else{
                            $tableFormatData[$counting_date]['in_active'] += 1;
                        }

                        if($value['progress_percent']>=0 && $value['progress_percent']<25){
                            $tableFormatData[$counting_date]['percent_0'] += 1;
                        }
                        elseif($value['progress_percent']>=25 && $value['progress_percent']<50){
                            $tableFormatData[$counting_date]['percent_25'] += 1;
                        }
                        elseif($value['progress_percent']>=50 && $value['progress_percent']<75){
                            $tableFormatData[$counting_date]['percent_50'] += 1;
                        }
                        elseif($value['progress_percent']>=75 && $value['progress_percent']<100){
                            $tableFormatData[$counting_date]['percent_75'] += 1;
                        }elseif($value['progress_percent']==100){
                            $tableFormatData[$counting_date]['percent_100'] += 1;
                        }
                        
                        $tableFormatData[$counting_date]['pdf_count'] += $value['pdf_print_count'];

                        $tableFormatData[$counting_date]['amount'] += $value['amount'];
                    }
                }
                $totalData['total_new_create'] += $tableFormatData[$counting_date]['new_create'];
                $totalData['total_active'] += $tableFormatData[$counting_date]['active'];
                $totalData['total_in_active'] += $tableFormatData[$counting_date]['in_active'];
                $totalData['total_0'] += $tableFormatData[$counting_date]['percent_0'];
                $totalData['total_25'] += $tableFormatData[$counting_date]['percent_25'];
                $totalData['total_50'] += $tableFormatData[$counting_date]['percent_50'];
                $totalData['total_75'] += $tableFormatData[$counting_date]['percent_75'];
                $totalData['total_100'] += $tableFormatData[$counting_date]['percent_100'];
                $totalData['pdf_count'] += $tableFormatData[$counting_date]['pdf_count'];
                $totalData['amount'] += $tableFormatData[$counting_date]['amount'];
            }

        }


        $this->render('userProgressReport',array(
            'data' => $data,
            'isSubmit'=>$isSubmit,
            'totalData' => $totalData,
            'tableFormatData' => $tableFormatData,
            'monthFrom' => $monthFrom,
            'yearFrom' => $yearFrom,
        ));
    }*/

    public function actionShowUserPercent()
    {
        $data=[];
        $isSubmit=0;
        $criteria= new CDbCriteria();

        $date_range_form = isset($_POST['date_range_form']) ? $_POST['date_range_form'] :'';
        $date_range_to = isset($_POST['date_range_to']) ? $_POST['date_range_to'] :'';
        $percentComplete = isset($_POST['percentComplete']) ? $_POST['percentComplete'] :'';
        $hasPaid = isset($_POST['hasPaid']) ? true : false;
        $showTaxOwed = isset($_POST['showTaxOwed']) ? true : false;

        if(isset($_POST['date_range_form']) && isset($_POST['date_range_to']))
        {
            $isSubmit=1;

            $start_time = date("Y-m-d", strtotime($_POST['date_range_form']));
            $end_time = date("Y-m-d", strtotime($_POST['date_range_to'])) ;
            $criteria->addCondition("create_at >= '".$start_time." 00:00:00' ");
            $criteria->addCondition("create_at <= '".$end_time." 23:59:59' ");
            $criteria->addCondition("role_id = 2 ");
            //$criteria->addCondition("status = 1 ");

            $clients = Users::model()->findAll($criteria);

            $data = [];
            $i = 0;
            foreach ($clients as $key => $client) {

                $personalInfo = PersonalInformation::model()->find(array(
                            'condition' => "UserId='".$client->id."' "
                            ));

                if($personalInfo == NULL) continue;

                $usersStatistic = UsersStatistic::model()->find(array(
                            'condition' => "CPIId='".$personalInfo->CPIId."' "
                            ));

                Yii::app()->user->setState('CPIId', $personalInfo->CPIId);
                //$percent = $this->completedPercent();
                
                if ($usersStatistic != NULL) {
                    $percent = $usersStatistic->progress_percent;
                }
                else {
                    $percent = 0;
                }

                $range = explode("-", $_POST['percentComplete']);
                
                
                if ( $percent >= $range[0] && $percent <= $range[1] ) {
                    
                    if ($showTaxOwed) {
                        $tax = round($this->outsandtingTaxLiability());
                    }
                    else {
                        $tax = "-";
                    }   

                    $payment = AllIndPayments::model()->find(
                        array(
                            'condition' => "CPIId='".$personalInfo->CPIId."' AND payment_year='".$this->calculateTaxYear()."' "
                            )
                    );



                    if ($hasPaid) {
                        //SHOW ONLY PAID USERS
                        if ($payment) {
                            $data[$i]['email'] = $client->email;
                            $data[$i]['mobile'] = $client->mobile;
                            //$data[$i]['completed_percent'] = @$this->completedPercent();
                            $data[$i]['completed_percent'] = $percent;
                            $data[$i]['tax_owed'] = $tax;
                            $data[$i]['payment'] = (($payment) ? $payment->amount : "Not Paid");
                            ++$i;
                        }
                    }
                    else {
                        $data[$i]['email'] = $client->email;
                        $data[$i]['mobile'] = $client->mobile;
                        //$data[$i]['completed_percent'] = @$this->completedPercent();
                        $data[$i]['completed_percent'] = $percent;
                        $data[$i]['tax_owed'] = $tax;
                        $data[$i]['payment'] = (($payment) ? $payment->amount : "Not Paid");
                        ++$i;
                    }

                    
                

                }
            }

            Yii::app()->user->setState('CPIId', "superAdmin");

        }


        $this->render('showUserPercent',array(
            'data' => $data,
            'isSubmit'=>$isSubmit,
            'dataRangeForm' =>$date_range_form,
            'dataRangeTo' =>$date_range_to,
            'percentComplete' =>$percentComplete,
            'hasPaid' =>$hasPaid,
            'showTaxOwed' =>$showTaxOwed,
        ));

    }

    public function actionSearch()
    {

        $criteria= new CDbCriteria();
        if(isset($_POST['date_range']))
        {
            $date_value = explode("-", $_POST['date_range']);

            if(isset($date_value[0]) && isset($date_value[1]))
            {
                $start_time = date("Y-m-d", strtotime($date_value[0]));
                $end_time = date("Y-m-d", strtotime($date_value[1])) ;
                $criteria->addCondition("CreateAt >= '".$start_time."' ");
                $criteria->addCondition("CreateAt <= '".$end_time."' ");
            }

        }

        if(isset($_POST['search_limit']))
        {
            $criteria->limit=$_POST['search_limit'];

        }

        $clients = PersonalInformation::model()->findAll($criteria);


        $data = [];
        $i = 0;
        foreach ($clients as $key => $client) {

           // print_r($client->CPIId);exit();
            //if ( $client->user->role_id != 1 ) {
            Yii::app()->user->setState('CPIId', $client->CPIId);

            if ( $this->completedPercent() > 10 ) {
                $tmp = $this->outsandtingTaxLiability();
                if ( $tmp > 0 ) {
                    if ($client->UserId == "") {
                        //Company
                        $data[$i]['cpid'] = $client->CPIId;
                        $data[$i]['type'] = "Company";
                        $data[$i]['company_name'] = @$client->org->organization_name;
                        $data[$i]['email'] = @$client->org->contact_email;
                        $data[$i]['completed_percent'] = @$this->completedPercent();
                        $data[$i]['tax_owed'] = round($tmp);
                        ++$i;
                    }
                    else if ( isset($client->user->email) ) {
                        //Individual
                        $data[$i]['cpid'] = $client->CPIId;
                        $data[$i]['type'] = "Individual";
                        $data[$i]['company_name'] = "";
                        $data[$i]['email'] = @$client->user->email;
                        $data[$i]['completed_percent'] = @$this->completedPercent();
                        $data[$i]['tax_owed'] = round($tmp);
                        ++$i;
                    }
                }

            }


        }

        //}

       // echo'<pre>';print_r($data);die();
        Yii::app()->user->setState('CPIId', "superAdmin");

        $this->render('showUserPercent',array(
            'data' => $data,
            'dataRange' => $_POST['date_range']
        ));

    }
   
    public function actionShowUserPercentOld()
    {
        
        $clients = PersonalInformation::model()->findAll(
                    array(
                        //'select' => "CPIId",
                        'condition' => "CPIId >= '".$_GET['start']."' AND CPIId <= '".$_GET['end']."' ",
                        //'order' => 'org_id ASC'
                    )
                );

        $data = [];
        $i = 0;
        foreach ($clients as $key => $client) {
            //if ( $client->user->role_id != 1 ) {
                Yii::app()->user->setState('CPIId', $client->CPIId);

                if ( $this->completedPercent() > 10 ) {
                    $tmp = $this->outsandtingTaxLiability();
                    if ( $tmp > 0 ) {
                        if ($client->UserId == "") {
                            //Company
                            $data[$i]['cpid'] = $client->CPIId;
                            $data[$i]['type'] = "Company";
                            $data[$i]['company_name'] = @$client->org->organization_name;
                            $data[$i]['email'] = @$client->org->contact_email;
                            $data[$i]['completed_percent'] = @$this->completedPercent();
                            $data[$i]['tax_owed'] = round($tmp);
                            ++$i;
                        }
                        else if ( isset($client->user->email) ) {
                            //Individual
                            $data[$i]['cpid'] = $client->CPIId;
                            $data[$i]['type'] = "Individual";
                            $data[$i]['company_name'] = "";
                            $data[$i]['email'] = @$client->user->email;
                            $data[$i]['completed_percent'] = @$this->completedPercent();
                            $data[$i]['tax_owed'] = round($tmp);
                            ++$i;
                        }
                    }
                    
                }

                
            }
            
        //}

        Yii::app()->user->setState('CPIId', "superAdmin");

        $this->render('showUserPercent',array(
                    'data' => array()
                    ));

    }
    
    
    
    
}
