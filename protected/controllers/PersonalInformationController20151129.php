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
            	'actions' => array('index', 'admin', 'entry', 'pIDetails1', 'pIDetails2', 'review', 'etin', 'districtParent'),
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
			throw new CHttpException(404,'The customer you are trying to pick is not in your List or may not exist');	} else {

				$model=$this->loadModelByUserId(Yii::app()->user->id);
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



			$this->render('_etin',array(
				'model'=>$model,
				));
		}

		public function actionCompanyEntry($id=null)
		{
			// $check = PersonalInformation::model()->count('org_user_id=:data', array(':data' =>Yii::app()->user->id ) );
			$check = PersonalInformation::model()->find('CPIId=:data AND org_id=:data1', array(':data' =>$id,':data1' =>Yii::app()->user->org_id ) );

	// echo 'id='.$id;

			// echo Yii::app()->user->CPIId;

			// 					echo "<pre>";
			// 			print_r(Yii::app()->user->CPIId);
			// 			echo "</pre>";
			// 			exit;
					

			// $model=$this->loadModel(Yii::app()->user->CPIId);

			if ($id==='new' && Yii::app()->user->CPIId==='companyAdmin') {
			// if (Yii::app()->user->CPIId==='companyAdmin') {

				// echo '$id=null';

				$model_PI = new PersonalInformation;

				$model_PI->org_user_id = Yii::app()->user->id;
				$model_PI->org_id = Yii::app()->user->org_id;
				$model_PI->save(false);

				Yii::app()->user->setState('CPIId', $model_PI->CPIId);

				$model=$this->loadModel($model_PI->CPIId);
			} else {

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



			$this->render('_etin',array(
				'model'=>$model,
				));
		}




/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionEtin()
{
	//$model=$this->loadModelByUserId(Yii::app()->user->id);

	$data1['status'] = "failed";
	$data1['msg'] = '<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Failed to save. Please try again </div>';

	//START-------------------------ETIN----SECTION-----------------------------------------//
	if(isset($_POST['CPIId']) && isset($_POST['etin']))
	{


		$this->layout='//layouts/empty';
		$modelUpdate=$this->loadModel($_POST['CPIId']);
		$modelUpdate->ETIN = $_POST['etin'];

		// $this->layout='//layouts/empty';

		if($modelUpdate->save(false)) { 

			$data1['status'] = "success";
			$data1['msg'] = '<div class="alert alert-success fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5> Successfully Saved </div>';
			
			echo json_encode($data1);

		} else {
			echo json_encode($data1);
		}
	//END-------------------------ETIN----SECTION-------------------------------------------//
	}
	
}

public function actionPIDetails1()
{

	$data1['status'] = "failed";
	$data1['msg'] = '<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Failed to save. Please try again</div>';

	$this->layout='//layouts/empty';

	// $model=$this->loadModelByUserId(Yii::app()->user->id);

	// $CPID_POST = $_POST['PersonalInformation'];

	// $model=$this->loadModel(Yii::app()->user->CPIId);




	$modelUpdate=$this->loadModel($_POST['CPIId']);

	$dateOfBirth = '';
	if($_POST['dob'] != ''){ 
		$dateOfBirth = date('Y-m-d',strtotime($_POST['dob']));
	}

	$modelUpdate->Name = $_POST['fullName'];
	$modelUpdate->DOB = $dateOfBirth;
	$modelUpdate->Status = $_POST['status'];
	$modelUpdate->SpouseName = $_POST['spouseName'];
	$modelUpdate->SpouseETIN = $_POST['spouseETIN'];
	$modelUpdate->Gender = $_POST['gender'];
	$modelUpdate->ResidentialStatus = $_POST['residentialStatus'];
	$modelUpdate->NationalId = $_POST['NationalId'];
	if($modelUpdate->save(false)) {

		$data1['status'] = "success";
		$data1['msg'] = '<div class="alert alert-success fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Successfully Saved </div>';


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
	$data1['msg'] = '<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Failed to save. Please try again</div>';


	$this->layout='//layouts/empty';

	$CPID_POST = $_POST['PersonalInformation'];

	$model=$this->loadModel($CPID_POST['CPIId']);



	//START-------------------------ETIN----SECTION-----------------------------------------//

	$data = $_POST['PersonalInformation'];
	$data['TaxZoneCircleId'] = $_POST['TaxZoneCircleId'];

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

	if($model->save(false)) {
		$data1['status'] = "success";
		$data1['msg'] = '<div class="alert alert-success fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Successfully Saved </div>';


		echo json_encode($data1);
	} else {
		echo json_encode($data1);
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
	$dataProvider=new CActiveDataProvider('PersonalInformation');
	$this->render('index',array(
		'dataProvider'=>$dataProvider,
		));
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
		$this->redirect(array('entry'));

	$this->render('review',array(
		'model'=>$model,
		));
}

}