<?php

class CustomersController extends Controller
{

	public $layout='//layouts/columnLess';
// public $defaultAction='entry';
// public $layout='//layouts/column2';

/**
* @return array action filters
*/
public function filters()
{
	return array(
		'accessControl', // perform access control for CRUD operations
		);
}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
public function accessRules() {
	return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
            	'actions' => array('dashboard', 'admin', 'delete', 'districtParent', 'pIDetails1', 'pIDetails2', 'review', 'etin', 'exitSystem', 'alterUser','import','compliancedashboard','sendnotification','employee','editEmployee','downloademployee','sendremainder'),
            	'users' => array('@'),
            	'expression' => '(Yii::app()->user->role==="superAdmin")||(Yii::app()->user->role==="companyAdmin")||(Yii::app()->user->role==="companyUser")',
            	),
            array('deny', // deny all users
            	'users' => array('*'),
            	),
            );
}


/**
* Manages all models.
*/

public function actionDashboard()
{

	if ( Yii::app()->user->role == "companyUser" ) {
		$numberOfClients = PersonalInformation::model()->count('org_id=:data1 AND org_user_id=:data2',array(':data1'=>Yii::app()->user->org_id, ':data2'=>Yii::app()->user->id));

		$clients = PersonalInformation::model()->findAll(
					array(
						'select' => "CPIId",
						'condition' => "org_id='".Yii::app()->user->org_id."' AND org_user_id='".Yii::app()->user->id."' ", 
						//'order' => 'CPIId ASC'
					)
				);
		$users = User::model()->findAll(
					array(
						'condition' => "org_id='".Yii::app()->user->org_id."' AND id='".Yii::app()->user->id."' ", 
						'order' => 'first_name'
					)
				);
	}
	else {
		$numberOfClients = PersonalInformation::model()->count('org_id=:data',array(':data'=>Yii::app()->user->org_id));

		$clients = PersonalInformation::model()->findAll(
					array(
						'select' => "CPIId",
						'condition' => "org_id='".Yii::app()->user->org_id."' ", 
						//'order' => 'CPIId ASC'
					)
				);
		$users = User::model()->findAll(
					array(
						'condition' => "org_id='".Yii::app()->user->org_id."' AND trash != '1' AND role_id != '2' ", 
						'order' => 'first_name'
					)
				);
	}

	if( isset($_POST['s_plan']) && $_POST['s_plan'] != "" ) {
		$plan = explode("p_", $_POST['s_plan']);
		$plan = ucfirst($plan[1]);
		Yii::app()->user->setState('s_plan', $_POST['s_plan']);
		$org = Organizations::model()->findByPk(Yii::app()->user->org_id); 

		$this->_upgradePlanEmail($org, $plan);
	}
	else {
		//Yii::app()->user->setState('s_plan', null);
	}
	
	$_100_percent = 0;
	$_75_to_99 = 0;
	$_50_to_74 = 0;
	$_0_to_49 = 0;
	foreach ($clients as $key => $value) {
		$p = ( 	$this->client_personalInformationStatusBar($value->CPIId) + 
				$this->client_incomeStatusBar($value->CPIId) + 
				$this->client_expenseStatusBar($value->CPIId) + 
				$this->client_assetsStatusBar($value->CPIId) + 
				$this->client_liabilityStatusBar($value->CPIId) 
			) / 5;
		
		if ($p == 100) ++$_100_percent;
		if ($p >= 75 && $p < 100) ++$_75_to_99;
		if ($p >= 50 && $p < 75) ++$_50_to_74;
		if ($p >= 0 && $p < 50) ++$_0_to_49;
	}

	
	$numberOfClientsByUser = [];
	$i = 0;
	foreach ($users as $key => $value) {
		$tmp = PersonalInformation::model()->count('org_id=:data1 AND org_user_id=:data2',array(':data1'=>Yii::app()->user->org_id, ':data2'=>$value->id));
		if ($tmp > 0) {
			$numberOfClientsByUser[$i]['name'] = $value->first_name . " " . $value->middle_name . " " . $value->last_name;
			$numberOfClientsByUser[$i]['numberOfClients'] = $tmp;
			$i++;
		}
	}


	$this->render('dashboard',array(
		'numberOfClients'=>$numberOfClients,
		'_100_percent'=>$_100_percent,
		'_75_to_99'=>$_75_to_99,
		'_50_to_74'=>$_50_to_74,
		'_0_to_49'=>$_0_to_49,
		'numberOfClientsByUser'=>$numberOfClientsByUser,
		));
}

public function actionAdmin()
{
	 unset(Yii::app()->request->cookies['from_date']);  // first unset cookie for dates
     unset(Yii::app()->request->cookies['to_date']);

	$model=new PersonalInformation('search');
	$model->unsetAttributes();  // clear any default values

	if(!empty($_POST))
	{
	    Yii::app()->request->cookies['from_date'] = new CHttpCookie('from_date', $_POST['from_date']);  // define cookie for from_date
	    Yii::app()->request->cookies['to_date'] = new CHttpCookie('to_date', $_POST['to_date']);
	    $model->from_date = $_POST['from_date'];
	    $model->to_date = $_POST['to_date'];
	}

	if(isset($_GET['PersonalInformation']))
		$model->attributes=$_GET['PersonalInformation'];

	$dataUser = User::model()->findAll('org_id=:data AND trash != 1 AND role_id IN (3,4)', array(':data'=>Yii::app()->user->org_id));

	foreach ($dataUser as $key => $value) {
		$assignedUser[$value->id] = $value->first_name.' '.$value->last_name;
	}

	$dataPI = PersonalInformation::model()->findAll('org_id=:data', array(':data'=>Yii::app()->user->org_id));

	if ($dataPI!=null) {
		

		foreach ($dataPI as $key => $value) {
			$assignedCustomer[$value->CPIId] = $value->Name.'-'.$this->_decode($value->ETIN);
		}
	}



	$this->render('admin',array(
		'model'=>$model,
		'assignedUser'=>$assignedUser,
		'assignedCustomer'=>@$assignedCustomer,
		));
}


public function actionExitSystem()
{

	Yii::app()->user->setState('CPIId', 'companyAdmin');
	$this->redirect(array('admin'));

	
}



public function actionAlterUser()
{
	$cpiID = $_POST['customer'];
	$model = PersonalInformation::model()->findByPk($cpiID);

	$model->org_user_id = $_POST['assignedUser'];
	$model->save(false);

	$this->redirect(array('admin'));
}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/

	/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id)
{
/*	if(Yii::app()->request->isPostRequest)
{*/
// we only allow deletion via POST request
	$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
	// if(!isset($_GET['ajax']))
	// 	$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	/*}
	else
	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');*/
}


/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
	$model=PersonalInformation::model()->findByPk($id);
	if($model===null)
		throw new CHttpException(404,'The requested page does not exist with .'.$id);
	return $model;
}

	public function _upgradePlanEmail($org, $requestedPlan) {
		
		$mailBody = '<div id=":fz" class="a3s" style="overflow: hidden;">
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"> 
			<tbody> <tr> <td>
				<table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#f8f8f8" width="600"> 
					<tbody>
						<tr> <td align="center" style="color:#ffffff;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:18px;font-weight:bold;text-transform:uppercase;padding:20px 0;background-color:#FFF" valign="middle"> <img src="http://bdtax.com.bd/img/logo.png" class="CToWUd"></td> </tr> 
						<tr> <td height="20">&nbsp;</td> </tr> 
						<tr> 
							<td style="padding: 15px; text-align: justify; text-justify: inter-word; color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif; font-size:14px;"> 

								<p>
									The following organization requested for upgrading their plan.
									<br>
								
									<table>
										<tr>
											<th>Requested From</th>
											<th>:</th>
											<td>'.Yii::app()->user->email.'</td>
										</tr>

										<tr>
											<th>Organization Name</th>
											<th>:</th>
											<td>'.$org->organization_name.'</td>
										</tr>
										<tr>
											<th>Upgrade Plan To</th>
											<th>:</th>
											<td>'.$requestedPlan.'</td>
										</tr>
										
										<tr>
											<th>Contact Name</th>
											<th>:</th>
											<td>'.$org->contact_first_name. ' ' .$org->contact_last_name. '</td>
										</tr>
										<tr>
											<th>Contact Email</th>
											<th>:</th>
											<td>'.$org->contact_email.'</td>
										</tr>
										<tr>
											<th>Contact Phone</th>
											<th>:</th>
											<td>'.$org->phone_number.'</td>
										</tr>
										
										<tr>
											<th>Contact Address</th>
											<th>:</th>
											<td>'.$org->address_line1.'</td>
										</tr>
										
									</table>
									
									
									

								</td> 
								<tr> 
									<td align="center" style="color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:13px;padding:0 20px" valign="middle">If you need any help in login or have any questions, please email us at <a href="mailto:support@bdtax.com.bd" style="color:#009307" target="_blank">support@bdtax.com.bd</a>
									</td> 
								</tr>





							</tbody> 
						</table> </td> </tr> 
					</tbody>
				</table> 
			</div>';

	   
	    $subject = "Plan upgrade Request From: " . $org->organization_name;
	    
	    UserModule::sendBillingMail(Yii::app()->params['billingEmail'], $subject, $mailBody);
		
	}


	public function actionImport()
	{

	  if(isset($_POST["Import"])){
		
			$filename=$_FILES["file"]["tmp_name"];		
            //$extension = pathinfo($filename, PATHINFO_EXTENSION);
            

			 if($_FILES["file"]["size"] > 0)
			 {  
			 	$file = fopen($filename, "r");
			 	$data = fgetcsv($file, 10000, ",");
			 	
			 	if(isset($data[0]) && isset($data[1]) && $data[1]!='' && isset($data[2]) && isset($data[3]) && $data[3]!='' ){
				

				  	$cutom_message = '';
				  	$count = 0;



			        while (($getData = fgetcsv($file)))
			         {

			         	try {
				         	if(strtolower($getData[0])=='name'){
				         		continue;
				         	}

				         	$Etin = $this->_encode($getData[3]);

 
				         	$pUsers = PersonalInformation::model()->find('ETIN=:data', array(':data'=>$Etin));

				         	$nameArray = explode(' ', $getData[0]);
				         	$fname = $nameArray[0];
		                    $lastname = '';
				            foreach ($nameArray as $key => $value) {
				            	if($key){
				            		$lastname .=$value.' ';
				            	}
				            }
				         	/*If Etin match with a existing user */

                            if($pUsers){
                            	$Users = User::model()->find('id=:data', array(':data'=>$pUsers->UserId));
                            	if($count==0){
                            		$cutom_message .= $this->_decode($Etin);
                            	}else{
                            		$cutom_message .= ', '.$this->_decode($Etin);
                            	}

                            	$count++;

                            }else{
                            	/*If Etin does not match with a existing user */
					         	$dataCount = User::model()->count('email=:data1',array(':data1'=>$getData[1]));

					         	if($dataCount){
					         		$Users = User::model()->find('email=:data', array(':data'=>@$getData[1]));
					         		
					         	}else{
					         		$Users = new User;
					         		$Users->email = $getData[1];
					         		$Users->first_name = $fname;
					         		$Users->last_name = $lastname;
					         		$Users->status = 0;
					            }
					        }

				            
		                    $Users->org_id = Yii::app()->user->org_id;
				         	$Users->uploaded_bycompany = 1;
				         	$Users->role_id = 2;
				         	
				         	$Users->superuser = 1;
				         	
				         	$Users->save(false);

				         	//$userId = Yii::app()->db->getLastInsertId();
				         	$userId = $Users->id;

				         	$pUsers = PersonalInformation::model()->find('UserId=:data', array(':data'=>$userId));
				         	if($pUsers){
				         		$model_PI = $pUsers;
				         	}else{
				         		$model_PI = new PersonalInformation;
				         	}

				         	
				         	$model_PI->Name = $getData[0];
				         	$model_PI->Email = $getData[1];
				         	$model_PI->designation =  $getData[2];
				         	$model_PI->UserId = $userId;
				         	$model_PI->org_id = Yii::app()->user->org_id;
				         	$model_PI->ETIN = $Etin;
				         	$model_PI->save(false);
			         	}

						//catch exception
						catch(Exception $e) {
						  echo 'Message: ' .$e->getMessage();
						}
			         
			           //$sql = "INSERT into employeeinfo (emp_id,firstname,lastname,email,reg_date) 
		                   //values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."')";
		                  // $result = mysqli_query($con, $sql);
						
			         }

			         fclose($file);	
			         if($cutom_message){
			         	$cutom_message = ". Etin ".$cutom_message." already exists ";
			         }
		             Yii::app()->user->setFlash('success', Yii::t("assets","Successfully Imported".$cutom_message));

		         }else{ 
                	Yii::app()->user->setFlash('success', Yii::t("assets","Invalid File"));
                 }
				
		         
			 }else{ 
                	Yii::app()->user->setFlash('success', Yii::t("assets","Invalid File"));
             }
	    }	

	    $this->render('import',array(
		'model'=>''
		));
	}

	public function actionEmployee(){
		if(isset($_POST["btnSubmit"])){
			try{
				$Etin = $this->_encode($_POST['email']);
				$pUsers = PersonalInformation::model()->find('ETIN=:data', array(':data'=>$Etin));
				/*If Etin match with a existing user */
				if($pUsers){
					$Users = User::model()->find('id=:data', array(':data'=>$pUsers->UserId));
				}else{
					/*If Etin does not match with a existing user */
					$dataCount = User::model()->count('email=:data',array(':data'=>$_POST['email']));
					if($dataCount){
						$Users = User::model()->find('email=:data', array(':data'=>$_POST['email']));
					}else{
						$Users = new User;
						$Users->email = $_POST['email'];
						$Users->first_name = $_POST['name'];
						$Users->status = 0;
					}
					$Users->uploaded_bycompany = 1;
					$Users->role_id = 2;
					$Users->superuser = 1;
					$Users->org_id = Yii::app()->user->org_id;
					$Users->save(false);
				}
				$userId = $Users->id;

				$pUsers = PersonalInformation::model()->find('UserId=:data', array(':data'=>$userId));
				if($pUsers){
					$model_PI = $pUsers;
				}else{
					$model_PI = new PersonalInformation;
				}
				$model_PI->Name = $_POST['name'];
				$model_PI->Email = $_POST['email'];
				$model_PI->designation = $_POST['designation'];
				$model_PI->ETIN = $this->_encode($_POST['tin']);
				$model_PI->UserId = $userId;
				$model_PI->org_id = Yii::app()->user->org_id;
				$model_PI->save(false);
			}catch(Exception $e) {
			echo 'Message: ' .$e->getMessage();
			}
			Yii::app()->user->setFlash('success', Yii::t("assets","Successfully Saved"));
			$this->redirect(array('compliancedashboard'));

		}
	    $this->render('employee',array(
		'model'=>''
		));
	}

	public function actionEditEmployee($id=0){
		if(isset($id)){
			$userInfo = PersonalInformation::model()->find('UserId=:data', array(':data'=>$id));
			$Name = $userInfo->Name;
			$Email = $userInfo->Email;
			$designation = $userInfo->designation;
			$ETIN = $this->_decode($userInfo->ETIN);

			$this->render('employee',array(
				'empId'=>$id,
				'name'=>$Name,
				'email'=>$Email,
				'desig'=>$designation,
				'etin'=>$ETIN
			));
		}
		$this->render('employee');
	}
	public function actionsendnotification($id=0){
		$this->emailNotifications($id);
		Yii::app()->user->setFlash('success', Yii::t("assets","Notification sent successfully"));
		$this->redirect(array('compliancedashboard'));
	}

	public function actionComplianceDashBoard()
	{
	    if(Yii::app()->user->role=='companyAdmin'){

	    	 unset(Yii::app()->request->cookies['from_date']);  // first unset cookie for dates
		     unset(Yii::app()->request->cookies['to_date']);

			$model=new PersonalInformation('search');
			$model->unsetAttributes();  // clear any default values

			if(!empty($_POST))
			{
			    Yii::app()->request->cookies['from_date'] = new CHttpCookie('from_date', $_POST['from_date']);  // define cookie for from_date
			    Yii::app()->request->cookies['to_date'] = new CHttpCookie('to_date', $_POST['to_date']);
			    $model->from_date = $_POST['from_date'];
			    $model->to_date = $_POST['to_date'];
			}

			if(isset($_GET['PersonalInformation']))
				$model->attributes=$_GET['PersonalInformation'];

			$tax_year = $this->taxYear();
			if(isset($_GET['tax_year']) && $_GET['tax_year']!=''){
				$tax_year =$_GET['tax_year'];
			}

			$numberOfClients = PersonalInformation::model()->count('org_id=:data',array(':data'=>Yii::app()->user->org_id));
            
			$data = Yii::app()->db->createCommand("SELECT count(distinct(md.user_id)) as filed FROM my_documents as md INNER JOIN personal_information as pi ON md.user_id = pi.UserId 
			    Where md.is_ack=1 and pi.org_id = ". Yii::app()->user->org_id." and md.tax_year='".$tax_year."'")->queryRow();
			//$null = new \yii\db\Expression('null');
			//$notfiled = PersonalInformation::model()->count('org_id=:data', array(':data' => Yii::app()->user->org_id));


	    	$this->render('compliance_dashboard',array(
			'model'=>$model,
			'numberOfClients'=>$numberOfClients,
			'filed'=>$data['filed'],
			'tax_year'=>$tax_year
			));

	    }

	    
	}


	function actiondownloademployee(){

		$tax_year = $this->taxYear();
		$type = 1;
		if(isset($_GET['type'])){
			$type = $_GET['type'];
		}
		if(isset($_GET['taxyear'])){
			$tax_year = $_GET['taxyear'];
		}

        if($type==1){
		    $listuser =Yii::app()->db->createCommand("SELECT u.id,pi.Name,u.last_name, u.email,pi.designation,pi.ETIN FROM users as u inner join personal_information as pi on pi.UserId=u.id Where pi.org_id = ". Yii::app()->user->org_id)->queryAll();
		    $filename='All_Employee';
	   }

        if($type==2||$type==4){

		    $listuser =Yii::app()->db->createCommand("SELECT distinct(md.user_id) as uid,pi.Name,u.last_name, u.email,pi.designation,pi.ETIN,pi.TaxesCircle,pi.TaxesZone,md.serial_number,md.date_uploaded FROM users as u inner join personal_information as pi on pi.UserId=u.id inner join my_documents as md ON md.user_id = pi.UserId Where pi.org_id = ". Yii::app()->user->org_id." and md.tax_year='".$tax_year."'" )->queryAll();
		    $filename='All_Employee_Filed';

        }

        if($type==3){
            //$userlist = array();
            $ulist = "SELECT distinct(u.id) as uid FROM users as u inner join personal_information as pi on pi.UserId=u.id inner join my_documents as md ON md.user_id = pi.UserId Where pi.org_id = ". Yii::app()->user->org_id." md.is_ack=1 and md.tax_year='".$tax_year."'";

		    $listuser =Yii::app()->db->createCommand("SELECT u.id,pi.Name,u.last_name, u.email,pi.designation,pi.ETIN FROM users as u inner join personal_information as pi on pi.UserId=u.id Where pi.org_id = ". Yii::app()->user->org_id." and u.id Not in (".$ulist.")")->queryAll();

		    $filename='All_Employee_Non_Filed';
	    }

		$data = "Name,Email,Designation,ETIN\n";
			foreach($listuser as $user) {
				
			  $data .= $user['Name'].",".$user['email'].",".$user['designation'].",".$this->_decode($user['ETIN'])."\n";
			}

		if($type==4){

			/*$listuser =Yii::app()->db->createCommand("SELECT u.id,pi.Name,u.last_name, u.email,pi.designation,pi.ETIN FROM users as u inner join personal_information as pi on pi.UserId=u.id Where pi.org_id = ". Yii::app()->user->org_id)->queryAll();*/
		    
			//$organzation = Organizations::find(Yii::app()->user->org_id);
			$organzation = Organizations::model()->findByPk(Yii::app()->user->org_id); 
	        $this->layout='//layouts/empty';
		    $str = $this->render('pdf_report', array(
				'model'=>$organzation,'tax_year'=>$tax_year,'listuser'=>$listuser), true);
		    //die();
				
            
	        $html2pdf = Yii::app()->ePdf->mpdf('P', 'A4');

			//$html2pdf->showImageErrors = true;
			$html2pdf->SetFont('100');
			$html2pdf->SetDefaultFont('Times New Roman'); 
			$html2pdf->SetDefaultFontSize('12');
			$html2pdf->setFooter('{PAGENO}');
			$html2pdf->WriteHTML($str);

			$ulist = "SELECT distinct(u.id) as uid, md.file_location FROM users as u inner join personal_information as pi on pi.UserId=u.id inner join my_documents as md ON md.user_id = pi.UserId Where pi.org_id = ". Yii::app()->user->org_id." and md.is_ack=1 and md.tax_year='".$tax_year."'";
			$listuser =Yii::app()->db->createCommand($ulist)->queryAll(); 

			
			

			foreach($listuser as $u){
            
				$html2pdf->WriteHTML('<pagebreak />');
            	$html2pdf->Image($u['file_location'], 15, 15,210, 297, 'jpg', '', true);
            }

            	# code...
			

	        $pdfFileName = 'Compnay.pdf';

		        # Outputs ready PDF
			$html2pdf->Output($pdfFileName,"I");


                    //die();
		}

		header('Content-Type: application/csv');
		header('Content-Disposition: attachment; filename="'.$filename.'.csv"');
		echo $data; exit();
	}



	function actionsendremainder($tax_year=''){

		$ulist = "SELECT distinct(u.id) as uid FROM users as u inner join personal_information as pi on pi.UserId=u.id inner join my_documents as md ON md.user_id = pi.UserId Where pi.org_id = ". Yii::app()->user->org_id." and md.tax_year='".$tax_year."'";

		$listuser =Yii::app()->db->createCommand("SELECT u.id,pi.Name, u.email,pi.designation FROM users as u inner join personal_information as pi on pi.UserId=u.id Where pi.org_id = ". Yii::app()->user->org_id." and u.status=1 and u.id Not in (".$ulist.")")->queryAll();
		$org = Organizations::model()->findByPk(Yii::app()->user->org_id);

        $BCC = '';
        $count = 0;
		foreach ($listuser as $u) {
			if($count==0){
				$BCC .= $u['email'];
			}else{

				$BCC .= ';'.$u['email'];
			}

			$count++;
			# code...
		}

		

		$message = '<div id=":fz" class="a3s">
			<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"> 
				<tbody> <tr> <td>
					<table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#f8f8f8" width="600"> 
						<tbody>
							<tr> <td align="center" style="color:#ffffff;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:18px;font-weight:bold;text-transform:uppercase;padding:20px 0;background-color:#FFF" valign="middle"> <img src="https://bdtax.com.bd/img/logo.png" class="CToWUd"></td> </tr> 
							<tr> <td height="20">&nbsp;</td> </tr> 
							<tr> 
								<td style="padding: 0 15px 0 15px; text-align: justify; text-justify: inter-word; color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif; font-size:14px;"> 

									
									Dear Concern,
									<br><br>
									Please upload your acknowledgement slip of your income tax return submission for <strong>"'.$org->organization_name.'"</strong>
									<br><br><br>
									
									If you have any questions, please email us at <a href="mailto:support@bdtax.com.bd">support@bdtax.com.bd</a> and we will get back to you right away.
									<br><br><br>
									Thank you.
									
								</td> 
							</tr>
							
							<tr> <td height="20">&nbsp;</td> </tr> 
						</tbody> 
					</table> </td> </tr> 
				</tbody>
			</table> 
		</div>';

	   
		$subject = "Reminder: Please upload your acknowledgement slip";

        $email = 'support@bdtax.com.bd';
        //$BCC= 'zah_is_link@yahoo.com;zahid@nochallenge.net';
        //$BCC[1]= 'zahid@nochallenge.net';
		UserModule::sendRemainderMail($email,$subject,$message,$BCC);
		Yii::app()->user->setFlash('success', Yii::t("assets","Reminder sent successfully"));
		$this->redirect(array('compliancedashboard'));

	}


}

