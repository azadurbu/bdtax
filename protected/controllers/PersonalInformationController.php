<?php

class PersonalInformationController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/columnLess';
public $defaultAction='entry';
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
            	'actions' => array('index', 'admin', 'entry', 'pIDetails1', 'pIDetails2', 'review', 'etin', 'districtParent', 'test','singleProfile','UpgradePackage'),
            	'users' => array('@'),
            	'expression' => '(Yii::app()->user->role==="superAdmin")||(Yii::app()->user->role==="customers")||(Yii::app()->user->role==="companyUser")||(Yii::app()->user->role==="companyAdmin")',
            	),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
            	'actions' => array( 'companyEntry', 'pIDetails1', 'pIDetails2', 'review', 'etin', 'districtParent'),
            	'users' => array('@'),
            	'expression' => '(Yii::app()->user->role==="superAdmin")||(Yii::app()->user->role==="companyUser")||(Yii::app()->user->role==="companyAdmin")',
            	),
            array('deny', // deny all users
            	'users' => array('*'),
            	),
            );
}

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
	$this->render('view',array(
		'model'=>$this->loadModel($id),
		));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
	$model=new PersonalInformation;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

	if(isset($_POST['PersonalInformation']))
	{
		$model->attributes=$_POST['PersonalInformation'];
		if($model->save())
			$this->redirect(array('view','id'=>$model->CPIId));
	}

	$this->render('create',array(
		'model'=>$model,
		));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionEntry()
{

	$role= Yii::app()->user->role;

	if ($role=='companyAdmin') {


		$model = PersonalInformation::model()->find('CPIId=:data AND org_id=:data1', array(':data' =>Yii::app()->user->CPIId,':data1' =>Yii::app()->user->org_id ) );
		if($model===null)
			throw new CHttpException(404,'The customer you are trying to pick is not in your organization or may not exist');
	} else if ($role=='companyUser') {
		$model = PersonalInformation::model()->find('CPIId=:data AND org_user_id=:data1', array(':data' =>Yii::app()->user->CPIId,':data1' =>Yii::app()->user->id ) );
		if($model===null)
			throw new CHttpException(404,'The customer you are trying to pick is not in your List or may not exist');	
	} else {

		$model=$this->loadModelByUserId(Yii::app()->user->id);
	}
	
	$userCount = 1;
	$docs = [];
	$userModel = NULL;
	if ( isset(Yii::app()->user->org_id) ) {
		$userCount = Users::model()->count(
	                        array(
	                            'condition' => " id='".$model->UserId."' "
	                            )
	                    );
		$userModel = Users::model()->findByPk($model->UserId);
		
	}
	$docs = MyDocuments::model()->findAll(
                                array(
                                    'condition' => "user_id = '".$model->UserId."' ", 
                                    'order' => 'created_at DESC'
                                    )
                            );
	


		//START-----------ETIN----SECTION-----------------------------------------//
	if(isset($_POST['CPIId']) && isset($_POST['fullName']))
	{

		$this->layout='//layouts/empty';
		$modelUpdate=$this->loadModel($_POST['CPIId']);
		$modelUpdate->Name = $_POST['fullName'];


		if($modelUpdate->save(false)) { 
			// echo '<div class="alert alert-success fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Name saved successfully please proceed to next </div>';
		}

	}
	//END-------------------------ETIN----SECTION-------------------------------------------//

	$payments = count(Payments::model()->find('CPIId=:data and payment_year=:data1', array(':data' =>Yii::app()->user->CPIId, ':data1'=>$this->taxYear())));
	$model->NationalId = $this->_decode($model->NationalId);
	$model->ETIN = $this->_decode($model->ETIN);
	$model->SpouseETIN = $this->_decode($model->SpouseETIN);


	$this->render('_etin',array(
		'model'=>$model,
		'userCount' => $userCount,
		'userModel' => $userModel,
		'payments' => $payments,
		'docs' => $docs
		));
}

public function actionCompanyEntry($id=null)
{
	$check = PersonalInformation::model()->find('CPIId=:data AND org_id=:data1', array(':data' =>$id,':data1' =>Yii::app()->user->org_id ) );

	if ($id==='new' && Yii::app()->user->CPIId==='companyAdmin') {

		$counter = PersonalInformation::model()->count('org_id=:data',array(':data'=>Yii::app()->user->org_id));

		$maxNumberOfTaxReturns = CompanyPlan::model()->find(array('condition' => "plan='".Yii::app()->user->org_plan."' "))->max_number_of_users;

		if ($counter >= $maxNumberOfTaxReturns ) {
			Yii::app()->user->setFlash('error', Yii::app()->user->org_plan . " Plan allows maximum ".$maxNumberOfTaxReturns." tax returns.");
			$this->redirect($this->createAbsoluteUrl('/customers/admin'));
		}
		else {
			//create login info 
			$email = trim($_GET['e']);
			if ( ! filter_var($email, FILTER_VALIDATE_EMAIL) ) {
				Yii::app()->user->setFlash('error', "Invalid email address.");
				$this->redirect($this->createAbsoluteUrl('/customers/admin'));
			}
			$userCount = Users::model()->count(
	                        array(
	                            'condition' => "email='".$email."' "
	                            )
	                    );
			if ( $userCount != 0 ) {
				Yii::app()->user->setFlash('error', "Failed to create client account. The email address already exists.");
				$this->redirect($this->createAbsoluteUrl('/customers/admin'));
			}
			else {
				$pass = $this->generateRandomString();
				$user = new Users;
				$user->org_id = Yii::app()->user->org_id;
				$user->role_id = 2;
				$user->create_at = date("Y-m-d H:i:s");
				$user->status = 1;
				$user->superuser = 1;
				$user->email = $email;
				$user->password = UserModule::encrypting($pass);
				$user->activkey = UserModule::encrypting(microtime() . $pass);
				
				if($user->save(false)) {

					$model_PI = new PersonalInformation;

					$model_PI->org_user_id = Yii::app()->user->id;
					$model_PI->org_id = Yii::app()->user->org_id;
					$model_PI->UserId = $user->id;
					$model_PI->Email = $user->email;
					$model_PI->save(false);

					Yii::app()->user->setState('CPIId', $model_PI->CPIId);

					$model=$this->loadModel($model_PI->CPIId);

					$this->_sendUserPassEmail($email, $pass, Yii::app()->user->org_id);

				}
				else {
					Yii::app()->user->setFlash('error', "Failed to create account.");
					$this->redirect($this->createAbsoluteUrl('/customers/admin'));
				}
				
			}		
					
			//create login info - ENDS
			
		}

		
	}
	else {

		if ($id!='new') {

		} else {
			$id=Yii::app()->user->CPIId;
		}

		$role= Yii::app()->user->role;

		if ($role=='companyAdmin') {

			$model = PersonalInformation::model()->find('CPIId=:data AND org_id=:data1', array(':data' =>$id,':data1' =>Yii::app()->user->org_id ) );
			if($model===null)
				throw new CHttpException(404,'The customer you are trying to pick is not in your organization or may not exist');

			Yii::app()->user->setState('CPIId', $id);

		} else if ($role=='companyUser') {
			$model = PersonalInformation::model()->find('CPIId=:data AND org_user_id=:data1', array(':data' =>$id,':data1' =>Yii::app()->user->id ) );
			if($model===null)
				throw new CHttpException(404,'The customer you are trying to pick is not in your List or may not exist');

			Yii::app()->user->setState('CPIId', $id);
		}
	}


	//START-------------------------ETIN----SECTION-----------------------------------------//
	if(isset($_POST['CPIId']) && isset($_POST['fullName']))
	{

		$this->layout='//layouts/empty';
		$modelUpdate=$this->loadModel($_POST['CPIId']);
		$modelUpdate->Name = $_POST['fullName'];


		if($modelUpdate->save(false)) { 
			// echo '<div class="alert alert-success fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Name saved successfully please proceed to next </div>';
		}

	}
	//END-------------------------ETIN----SECTION-------------------------------------------//

	$model->NationalId = $this->_decode($model->NationalId);
	$model->ETIN = $this->_decode($model->ETIN);
	$model->SpouseETIN = $this->_decode($model->SpouseETIN);

	$userCount = 1;
	$userModel = NULL;
	$docs = [];
	if ( isset(Yii::app()->user->org_id) ) {
		$userCount = Users::model()->count(
	                        array(
	                            'condition' => " id='".$model->UserId."' "
	                            )
	                    );
		$userModel = Users::model()->findByPk($model->UserId);
	}
	$docs = MyDocuments::model()->findAll(
                                array(
                                    'condition' => "user_id = '".$model->UserId."' ", 
                                    'order' => 'created_at DESC'
                                    )
                            );

	$this->render('_etin',array(
		'model'=>$model,
		'userCount' => $userCount,
		'docs' => $docs,
		'userModel' => $userModel,
		));
}




/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionEtin()
{

	//START-------------------------ETIN----SECTION-----------------------------------------//
	if(isset($_POST['CPIId']) && isset($_POST['etin']))
	{
		$payments = count(Payments::model()->find('CPIId=:data and payment_year=:data1', array(':data' =>Yii::app()->user->CPIId, ':data1'=>$this->taxYear())));

		$_POST['etin'] = $this->_encode($_POST['etin']);
		$this->layout='//layouts/empty';
		$modelUpdate=$this->loadModel($_POST['CPIId']);
		if($payments == 0){
			$modelUpdate->ETIN = $_POST['etin'];
		}


		if($modelUpdate->save(false)) { 

			$data1['status'] = "success";
			$data1['msg'] = '<div class="alert alert-success fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5> '.Yii::t('assets', "Successfully Saved").' </div>';
			//Yii::app()->user->setFlash('alert_success', Yii::t("assets","Successfully Saved"));
			echo json_encode($data1);

		} else {
			$data1['status'] = "failed";
			$data1['msg'] = '<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Failed to save. Please try again </div>';
			//Yii::app()->user->setFlash('alert_error', Yii::t("assets","Failed to save. Please try again"));
			echo json_encode($data1);
		}
	//END-------------------------ETIN----SECTION-------------------------------------------//
	}
	
}

public function actionPIDetails1()
{

	$data1['status'] = "failed";
	$data1['msg'] = '<div class="flash_alert"><div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Failed to save. Please try again</div></div>';

	$this->layout='//layouts/empty';

	// $model=$this->loadModelByUserId(Yii::app()->user->id);

	// $CPID_POST = $_POST['PersonalInformation'];

	// $model=$this->loadModel(Yii::app()->user->CPIId);




	$modelUpdate=$this->loadModel($_POST['CPIId']);

	$dateOfBirth = '';
	if($_POST['dob'] != ''){ 
		$dateOfBirth = date('Y-m-d',strtotime($_POST['dob']));
	}
	if($_POST['NationalId'] != '' && strlen($_POST['NationalId']) != 10 && strlen($_POST['NationalId']) != 13 && strlen($_POST['NationalId']) != 17) {
		$data1['status'] = "failed";
		$data1['msg'] = '<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>National ID should be 10, 13 or 17 digit.</div>';
		echo json_encode($data1);
		return;
	}

	$_POST['NationalId'] = $this->_encode($_POST['NationalId']);
	$_POST['spouseETIN'] = $this->_encode($_POST['spouseETIN']);

	$modelUpdate->Name = $_POST['fullName'];
	$modelUpdate->DOB = $dateOfBirth;
	$modelUpdate->Status = $_POST['status'];
	$modelUpdate->SpouseName = $_POST['spouseName'];
	$modelUpdate->SpouseETIN = $_POST['spouseETIN'];
	$modelUpdate->AnyDisabledChild = $_POST['AnyDisabledChild'];
	$modelUpdate->AvailChildDisabilityExemp = $_POST['AvailChildDisabilityExemp'];
	$modelUpdate->Gender = $_POST['gender'];
	$modelUpdate->ResidentialStatus = $_POST['residentialStatus'];
	$modelUpdate->NationalId = $_POST['NationalId'];

	
	if($modelUpdate->save(false)) {

		$data1['status'] = "success";
		$data1['msg'] = '<div class="flash_alert"><div class="alert alert-success fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Successfully Saved. </div></div>';


		echo json_encode($data1);
	} else {
		echo json_encode($data1);
	}


}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionPIDetails2()
{


	$data1['status'] = "failed";
	$data1['msg'] = '<div class="flash_alert"><div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Failed to save. Please try again</div></div>';


	$this->layout='//layouts/empty';

	$CPID_POST = $_POST['PersonalInformation'];

	$model=$this->loadModel($CPID_POST['CPIId']);



	//START-------------------------ETIN----SECTION-----------------------------------------//

	$data = $_POST['PersonalInformation'];
	// $data['TaxZoneCircleId'] = $_POST['TaxZoneCircleId'];

	$employeeType = $_POST['employeeType'];

	$GovernmentEmployee = $data['GovernmentEmployee'];

	if ($employeeType!=$GovernmentEmployee) {
		
		IncomeSalaries::model()->deleteAll('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear() ));
	}



	foreach ($data as $key => $value) {    	

		if(isset($value)) {
			$model->$key = $value;
		}

	}
	$msg = "";

	if ( isset (Yii::app()->user->org_id) ) {
		if ( isset($_POST['createAccount']) && $_POST['createAccount'] == 1) {
			
			if ($model->UserId != "") {
				$userExists = Users::model()->count(
	                        array(
	                            'condition' => "id='".$model->UserId."' "
	                            )
	                    );

				if ($userExists != 0) {
					$data1['status'] = "failed";
					$data1['msg'] = '<div class="flash_alert"><div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>This user already has an account.</div></div>';
					die( json_encode($data1) );
				}
			}

			$userCount = Users::model()->count(
	                        array(
	                            'condition' => "email='".$_POST['PersonalInformation']['Email']."' "
	                            )
	                    );
			if ( $userCount != 0 ) {
				$data1['status'] = "failed";
				$data1['msg'] = '<div class="flash_alert"><div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Failed to create account. The email address already exists.</div></div>';
				die( json_encode($data1) );
			}
			else {
				$pass = $this->generateRandomString();

				$user = new Users;
				$user->org_id = Yii::app()->user->org_id;
				$user->role_id = 2;
				$user->create_at = date("Y-m-d H:i:s");
				$user->status = 1;
				$user->superuser = 1;
				$user->first_name = $model ->Name;
				$user->email = $_POST['PersonalInformation']['Email'];
				$user->password = UserModule::encrypting($pass);
				$user->activkey = UserModule::encrypting(microtime() . $pass);
				
				if($user->save(false)) {
					$msg .= " An account has been created for this user.";

					$model->UserId = $user->id;
					
					$this->_sendUserPassEmail($_POST['PersonalInformation']['Email'], $pass, Yii::app()->user->org_id);

				}
				else {
					$data1['status'] = "failed";
					$data1['msg'] = '<div class="flash_alert"><div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Failed to create account.</div></div>';
					die( json_encode($data1) );
				}
				
				
			}
		}
	}
	

	if($model->save(false)) {
		$data1['status'] = "success";
        $data1['msg'] = '';
		//$data1['msg'] = '<div class="flash_alert"><div class="alert alert-success fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Successfully Saved. </div></div>';

		
		Yii::app()->user->setFlash('alert_success', Yii::t("assets","Successfully Saved. " . $msg));
        
		echo json_encode($data1);
	} else {
		echo json_encode($data1);
	}


}



/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionsingleProfile()
{


	$data1['status'] = "failed";
	$data1['msg'] = '<div class="flash_alert"><div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Failed to save. Please try again</div></div>';


	$this->layout='//layouts/empty';

	//print_r($_POST['PersonalInformation']);

	//exit();

	$data = $_POST['PersonalInformation'];

	$modelUpdate=$this->loadModel($data['CPIId']);



	//START-------------------------ETIN----SECTION-----------------------------------------//

	//$data = $_POST['PersonalInformation'];
	

	


	$modelUpdate->Name = $data['Name'];
	$modelUpdate->DOB = date('Y-m-d',strtotime($data['DOB']));
	$modelUpdate->Status = $data['Status'];
	$modelUpdate->SpouseName = $data['SpouseName'];
	$modelUpdate->FathersName = $data['FathersName'];
	$modelUpdate->Gender = $_GET['gen'];
	$modelUpdate->ResidentialStatus = $data['ResidentialStatus'];
	$modelUpdate->NationalId = $this->_encode($data['NationalId']);
	$modelUpdate->ETIN = $this->_encode($data['ETIN']);
	$modelUpdate->TaxesCircle = $data['TaxesCircle'];
	$modelUpdate->TaxesZone = $data['TaxesZone'];
	$modelUpdate->PermanentAddress = $data['PermanentAddress'];
	$modelUpdate->PresentAddress = $data['PresentAddress'];
	$modelUpdate->DivisionId = $data['DivisionId'];
	$modelUpdate->DistrictId = $data['DistrictId'];
	$modelUpdate->AreaOfResidence = $data['AreaOfResidence'];
	if(!$data['GovernmentEmployee']){
		$data['GovernmentEmployee'] = 'N';
	}
	$modelUpdate->GovernmentEmployee = $data['GovernmentEmployee'];
	$modelUpdate->Contact = $data['Contact'];
	$modelUpdate->Area = $data['Area'];
	
	$modelUpdate->AddressSame = $_GET['ads'];


	

	if($modelUpdate->save(false)) {
		$data1['status'] = "success";
        //$data1['msg'] = '';
		$data1['msg'] = '<div class="flash_alert"><div class="alert alert-success fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Successfully Saved. </div></div>';

		
		//Yii::app()->user->setFlash('alert_success', Yii::t("assets","Successfully Saved. " . $msg));
        
		echo json_encode($data1);
	} else {
		//echo json_encode($data1);
	}


}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
	$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

	if(isset($_POST['PersonalInformation']))
	{
		$model->attributes=$_POST['PersonalInformation'];
		if($model->save())
			$this->redirect(array('view','id'=>$model->CPIId));
	}
	$model->NationalId = $this->_decode($model->NationalId);
	$model->ETIN = $this->_decode($model->ETIN);
	$model->SpouseETIN = $this->_decode($model->SpouseETIN);
	$this->render('update',array(
		'model'=>$model,
		));
}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id)
{
	if(Yii::app()->request->isPostRequest)
	{
// we only allow deletion via POST request
		$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	else
		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
	/*$dataProvider=new CActiveDataProvider('PersonalInformation');
	$this->render('index',array(
		'dataProvider'=>$dataProvider,
		));*/
}

/**
* Manages all models.
*/
public function actionAdmin()
{
	$model=new PersonalInformation('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['PersonalInformation']))
	$model->attributes=$_GET['PersonalInformation'];

$this->render('admin',array(
	'model'=>$model,
	));
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
		throw new CHttpException(404,'The requested page does not exist.');
	return $model;
}

public function loadModelByUserId($id)
{
	$model=PersonalInformation::model()->find('UserId=:data',  array('data' => $id) );
	if($model===null)
		throw new CHttpException(404,'The requested page does not exist.');
	return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
	if(isset($_POST['ajax']) && $_POST['ajax']==='personal-information-form')
	{
		echo CActiveForm::validate($model);
		Yii::app()->end();
	}
}

public function actionDistrictParent()
{
	$id=$_POST['id'];

    // $modelDistrict=Districts::model()->findByPk($id); 

	$model=Districts::model()->findAll('division_id=:data',array(':data'=>$id)); 
	?>
	
	<select id="PersonalInformation_DistrictId" class="form-control" name="PersonalInformation[DistrictId]">
		<option value="">Please select district</option>
		<?php foreach ($model as $key => $value) {     
			echo '<option value="'.$value->id.'">'.$value->name.'</option>';
		}?>

	</select>

	<?php
}

public function actionReview()
{
	$model = $this->loadModel(Yii::app()->user->CPIId);
	// $model=$this->loadModelByUserId(Yii::app()->user->id);
	if($model == null)
		$this->redirect(array('startup'));

	$this->render('review',array(
		'model'=>$model,
		));
}


public function _sendUserPassEmail($email, $pass, $org_id) {
		$org = Organizations::model()->findByPk($org_id);
		
		$mailBody = '<div id=":fz" class="a3s">
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"> 
			<tbody> <tr> <td>
				<table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#f8f8f8" width="600"> 
					<tbody>
						<tr> <td align="center" style="color:#ffffff;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:18px;font-weight:bold;text-transform:uppercase;padding:20px 0;background-color:#FFF" valign="middle"> <img src="https://bdtax.com.bd/img/logo.png" class="CToWUd"></td> </tr> 
						<tr> <td height="20">&nbsp;</td> </tr> 
						<tr> 
							<td style="padding: 0 15px 0 15px; text-align: justify; text-justify: inter-word; color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif; font-size:14px;"> 

								
								Dear Concern,
								<br><br><br>
								"'.$org->organization_name.'" created an account for you. You can login to <a href="https://bdtax.com.bd">bdtax.com.bd</a> with the following credential.
								<br><br>
								<b>Username:</b> '.$email.' <br>
								<b>Password:</b> '.$pass.'
								<br><br>
								Please change your password immediately after login.
								<br><br>
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

	   
		$subject = "Welcome to bdtax.com.bd";
	   

	    UserModule::sendMail($email, $subject, $mailBody);
		
	}

function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function  actionUpgradePackage(){

	$identity = Yii::app()->user->id;
	        $type = 2;
	        $taxyear = $this->taxYear();

	        $model=UserFromSelection::model()->find('user_id=:data AND tax_year=:data2',array(':data'=>$identity, ':data2'=>$this->taxYear()) );

	        if($model){

	        	$model->type = $type;
		        $model->save();

	        }
	$this->redirect($this->createUrl('income/entry#s_7'));
}

}