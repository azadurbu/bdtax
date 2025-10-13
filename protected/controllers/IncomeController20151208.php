<?php

class IncomeController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/columnLess';
public $defaultAction = 'startup';
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
            	'actions' => array('index', 'admin', 'entry', 'startup', 'pIDetails1', 'pIDetails2', 'pIDetails2', 'SaveInfo', 'review', 'setNo', 'saveFrcOfSecurities', 'saveFrcOfAgriculture', 'saveFrcOfBusinessOrProfession', 'saveFrcOfShareProfit', 'saveFrcOfSpouseOrChild', 'saveFrcOfCapitalGains', 'saveFrcOfOtherSource', 'saveFrcOfForeignIncome', 'getDataForEdit', 'deleteData', 'deleteParticularFieldData', 'totalOutput', 'linkTest'),
            	'users' => array('@'),
            	'expression' => '(Yii::app()->user->role==="superAdmin")||(Yii::app()->user->role==="customers")||(Yii::app()->user->role==="companyUser")||(Yii::app()->user->role==="companyAdmin")',
            	),
            array('deny', // deny all users
            	'users' => array('*'),
            	),
            );
}

/**
* Displays Startup page if no data entered on that year.
*/
public function actionStartup()
{

	$isNew = Income::model()->count('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear() ));

	if ($isNew>=1) {

		$this->redirect(array('entry#s_7'));
	} else {

		$modelNew=new Income;
		$modelNew->CPIId=Yii::app()->user->CPIId;
		$modelNew->EntryYear=$this->taxYear();
		$modelNew->save(false);
		
		$this->render('startup',array(
			));
	}
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
	$model=new Income;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

	if(isset($_POST['Income']))
	{
		$model->attributes=$_POST['Income'];
		if($model->save())
			$this->redirect(array('view','id'=>$model->IncomeId));
	}

	$this->render('create',array(
		'model'=>$model,
		));
}


public function actionEntry()
{

	$model=$this->loadModelByCPIId(Yii::app()->user->CPIId);
	// $model=$this->Income::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear() ));

	if ( !isset($model->CPIId) || $model->CPIId==null ) {

		$this->redirect(array('startup'));

	} else {

		// $this->redirect(array('entry#s_7'));

		$this->render('income',array(
			'model'=>$model,
			));

		// $model=$this->loadModelByCPIId(Yii::app()->user->CPIId);
	}


}




public function actionReview()
{

	$CalculationModel = CalculationDataSource::model()->find('EntryYear=:data',array(':data'=>$this->taxYear() ));


	$model=$this->loadModelByCPIId(Yii::app()->user->CPIId);

	$TaxPercentAmount['10'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>10, ':data1'=>$this->taxYear() ))->Amount;
	$TaxPercentAmount['15'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>15, ':data1'=>$this->taxYear() ))->Amount;
	$TaxPercentAmount['20'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>20, ':data1'=>$this->taxYear() ))->Amount;
	$TaxPercentAmount['25'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>25, ':data1'=>$this->taxYear() ))->Amount;
	$TaxPercentAmount['30'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>30, ':data1'=>$this->taxYear() ))->Amount;

	if ( !isset($model->CPIId) || $model->CPIId==null ) {

		$this->redirect(array('startup'));

	} else {

		$this->render('review',array(
			'model'=>$model,
			'TaxPercentAmount'=>$TaxPercentAmount,
			'CalculationModel'=>$CalculationModel,
			));

		// $model=$this->loadModelByCPIId(Yii::app()->user->CPIId);
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

	if(isset($_POST['Income']))
	{
		$model->attributes=$_POST['Income'];
		$model->LastUpdateAt=date('Y-m-d G:i:s');
		if($model->save())
			$this->redirect(array('view','id'=>$model->IncomeId));
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
* Manages all models.
*/
public function actionAdmin()
{
	$model=new Income('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Income']))
	$model->attributes=$_GET['Income'];

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
	$model=Income::model()->findByPk($id);
	if($model===null)
		throw new CHttpException(404,'There is no list with this id.');
	return $model;
}


public function loadModelByCPIId($id)
{
	$model=Income::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>$id, ':data2'=>$this->taxYear() ) );
	// if($model===null)
	// 	throw new CHttpException(404,'There is no list with this id.');
	return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
	if(isset($_POST['ajax']) && $_POST['ajax']==='income-form')
	{
		echo CActiveForm::validate($model);
		Yii::app()->end();
	}
}

public function actionSaveInfo()
{
	$data = [];
	if(!Yii::app()->request->isPostRequest)
	{
		$data['status'] = "failed";
		$data['msg'] = "Invalid Request";

		die(json_encode($data));
	}
	else
	{
		if($_POST['value'] != "" && !is_numeric($_POST['value']))
		{
			$data['status'] = "failed";
			$data['msg'] = "Data must be a number";
			die(json_encode($data));
		}

		$get_data=Income::model()->findByPk($_POST['IncomeId']);
		if($get_data == null)
		{
			$data['status'] = "failed";
			$data['msg'] = "No data found";
			die(json_encode($data));
		}
	}

	$model=new Income;
	
####################### UPDATE ##########################
	$model->updateByPk($_POST['IncomeId'], array(
		$_POST['field_name']."Confirm" => "Yes",		
		$_POST['field_name']."FOrT" => "Total",
		$_POST['field_name'] => $_POST['value'],
		'LastUpdateAt' => date("Y-m-d H:i:s")
		));


	$model=Income::model()->findByPk($_POST['IncomeId']);
	$data['value'] = $model->{$_POST['field_name']};
	
	
	$data['status'] = "success";
	$data['msg'] = "Successfully Stored " . $data['value'] . ". You can change the value bellow and press Store.";
	echo json_encode($data);

}

function checkActiveInactive($model, $confirm, $FOrT, $model2, $total) { 
//$model, InterestOnSecuritiesConfirm, InterestOnSecuritiesFOrT, IncInterestOnSecurities, InterestOnSecurities//
	$isAnswered = 0;
	if($model->$confirm == null) {
        //blank
	}
	elseif($model->$confirm == "No") {
		$isAnswered = 1;
	}
	elseif($model->$confirm == "Yes") {
		if($model->$FOrT == "Fraction") {
			$counter = $model2::model()->count('IncomeId=:data',array(':data'=>$model->IncomeId));
			if($counter > 0) $isAnswered = 1;
		}
		elseif($model->$FOrT == "Total") {
			if($model->$total != null) $isAnswered = 1;
		} 
	}
	return $isAnswered;
}

function checkActiveInactive2($model, $confirm) { 

	$isAnswered = 0;
	if($model->$confirm == null) {
        //blank
	}
	elseif($model->$confirm == "No") {
		$isAnswered = 1;
	}
	elseif($model->$confirm == "Yes") {
		 $isAnswered = 1;
	}
	return $isAnswered;
}

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%



public function ActionSetNo() {
	$model2=new Income;
	$model2->updateByPk($_POST['IncomeId'], array(
		$_POST['field']."Confirm" => "No",
		$_POST['field']."FOrT" => null,
		$_POST['field'] => null,
		'LastUpdateAt' => date("Y-m-d H:i:s")
		));
	$data['status'] = "success";
	$data['msg'] = Yii::t("income","Successfully Set to No");
	Yii::app()->user->setFlash('alert_success', Yii::t("income","Successfully Set to No"));
	echo json_encode($data);
}



public function ActionSaveFractionInfo()
{
	$data = [];
	if(!Yii::app()->request->isPostRequest)
	{
		$data['status'] = "failed";
		$data['msg'] = "Invalid Request";

		die(json_encode($data));
	}
	else
	{
		if($_POST['cost'] != "" && !is_numeric($_POST['cost']))
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Cost must be a number");
			die(json_encode($data));
		}

		$get_data=Income::model()->findByPk($_POST['IncomeId']);
		if($get_data == null)
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","No data found");
			die(json_encode($data));
		}
	}
	if($_POST['id'] == "")
	{
		//NEW ENTRY
		$model=new $_POST['model'];
		$_POST['d']['IncomeId'] = $_POST['IncomeId'];
		$_POST['d']['Description'] = $_POST['description'];
		$_POST['d']['Cost'] = $_POST['cost'];
		$_POST['d']['CerateAt'] = date("Y-m-d H:i:s");
		$model->attributes=$_POST['d'];
		$model->save();

		$model2=new Income;
		$model2->updateByPk($_POST['IncomeId'], array(
			$_POST['field_name']."Confirm" => "Yes",
			$_POST['field_name']."FOrT" => "Fraction",
			$_POST['field_name'] => null,
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}
	else {
		//UPDATE
		$model=new $_POST['model'];
		$model->updateByPk($_POST['id'], array(
			'Description' => $_POST['description'],
			'Cost' => $_POST['cost'],
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}


	$data['status'] = "success";

	$data['msg'] = Yii::t("income","Successfully Stored");
	Yii::app()->user->setFlash('alert_success', Yii::t("income","Successfully Stored"));
	echo json_encode($data);
	
}


public function ActionSaveFrcOfSecurities()
{
	$data = [];
	if(!Yii::app()->request->isPostRequest)
	{
		$data['status'] = "failed";
		$data['msg'] = "Invalid Request";

		die(json_encode($data));
	}
	else
	{


		
		if($_POST['IncInterestOnSecurities_Type'] == "" )
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Type can not be empty");
			die(json_encode($data));
		}
		
		if($_POST['IncInterestOnSecurities_NetAmount'] == "" || !is_numeric($_POST['IncInterestOnSecurities_NetAmount']))
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Net amount must be a number");
			die(json_encode($data));
		}
		// die("die here");
		
		if($_POST['IncInterestOnSecurities_CommissionOrInterest'] == "" || !is_numeric($_POST['IncInterestOnSecurities_CommissionOrInterest']))
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Commission/Interest must be a number");
			die(json_encode($data));
		}

		if($_POST['IncInterestOnSecurities_Cost'] == "" || !is_numeric($_POST['IncInterestOnSecurities_Cost']))
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Cost must be a number");
			die(json_encode($data));
		}

		$get_data=Income::model()->findByPk($_POST['IncomeId']);
		if($get_data == null)
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","No data found");
			die(json_encode($data));
		}

	}

	if($_POST['InterestOnSecuritiesId'] == "notSet")
	{
		//NEW ENTRY
		$model=new $_POST['model'];

		$model->Type 					= $_POST['IncInterestOnSecurities_Type'];
		$model->Description 			= $_POST['IncInterestOnSecurities_Description'];
		$model->NetAmount 				= $_POST['IncInterestOnSecurities_NetAmount'];
		$model->CommissionOrInterest 	= $_POST['IncInterestOnSecurities_CommissionOrInterest'];
		$model->Cost 					= $_POST['IncInterestOnSecurities_Cost'];
		$model->IncomeId 				= $_POST['IncomeId'];

		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%^^^^^^^^^^^^^^^%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		// $data = $_POST['IncInterestOnSecurities'];

		// foreach ($data as $key => $value) {

		// 	if(isset($value)) { $model->$key = $value; }

		// }

		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%|><><><><><><><|%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		$model->save(false);

		$model2=new Income;
		$model2->updateByPk($_POST['IncomeId'], array(
			$_POST['field_name']."Confirm" => "Yes",
			$_POST['field_name']."FOrT" => "Fraction",
			$_POST['field_name'] => null,
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}
	else {
		//UPDATE
		$model=new $_POST['model'];
		$model->updateByPk($_POST['InterestOnSecuritiesId'], array(
			'Type' 					=> $_POST['IncInterestOnSecurities_Type'],
			'Description' 			=> $_POST['IncInterestOnSecurities_Description'],
			'NetAmount' 			=> $_POST['IncInterestOnSecurities_NetAmount'],
			'CommissionOrInterest' 	=> $_POST['IncInterestOnSecurities_CommissionOrInterest'],
			'Cost' 					=> $_POST['IncInterestOnSecurities_Cost'],
			'IncomeId' 				=> $_POST['IncomeId'],			
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}


	$data['status'] = "success";

	$data['msg'] = Yii::t("income","Successfully Stored");
	Yii::app()->user->setFlash('alert_success', Yii::t("income","Successfully Stored"));
	echo json_encode($data);
	
}


public function ActionSaveFrcOfAgriculture()
{
	$data = [];
	if(!Yii::app()->request->isPostRequest)
	{
		$data['status'] = "failed";
		$data['msg'] = "Invalid Request";

		die(json_encode($data));
	}
	else
	{


		
		if($_POST['IncIncomeAgriculture_LandInBigha'] == "" )
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Land can not be empty");
			die(json_encode($data));
		}
		
		if($_POST['IncIncomeAgriculture_TotalRevenue'] == "" || !is_numeric($_POST['IncIncomeAgriculture_TotalRevenue']))
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Total revenue must be a number");
			die(json_encode($data));
		}
		// die("die here");
		
		if($_POST['IncIncomeAgriculture_ProductionCost'] == "" || !is_numeric($_POST['IncIncomeAgriculture_ProductionCost']))
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Production cost must be a number");
			die(json_encode($data));
		}

		if($_POST['IncIncomeAgriculture_Cost'] == "" || !is_numeric($_POST['IncIncomeAgriculture_Cost']))
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Cost must be a number");
			die(json_encode($data));
		}

		$get_data=Income::model()->findByPk($_POST['IncomeId']);
		if($get_data == null)
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","No data found");
			die(json_encode($data));
		}

	}

	if($_POST['IncomeAgricultureId'] == "notSet")
	{
		//NEW ENTRY
		$model=new $_POST['model'];

		$model->LandInBigha 			= $_POST['IncIncomeAgriculture_LandInBigha'];
		$model->CropsType 				= $_POST['IncIncomeAgriculture_CropsType'];
		$model->TotalRevenue 			= $_POST['IncIncomeAgriculture_TotalRevenue'];
		$model->ProductionCost 			= $_POST['IncIncomeAgriculture_ProductionCost'];
		$model->Cost 					= $_POST['IncIncomeAgriculture_Cost'];
		$model->IncomeId 				= $_POST['IncomeId'];

		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%^^^^^^^^^^^^^^^%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		// $data = $_POST['IncomeAgriculture'];

		// foreach ($data as $key => $value) {

		// 	if(isset($value)) { $model->$key = $value; }

		// }

		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%|><><><><><><><|%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		$model->save(false);

		$model2=new Income;
		$model2->updateByPk($_POST['IncomeId'], array(
			$_POST['field_name']."Confirm" => "Yes",
			$_POST['field_name']."FOrT" => "Fraction",
			$_POST['field_name'] => null,
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}
	else {
		//UPDATE
		$model=new $_POST['model'];
		$model->updateByPk($_POST['IncomeAgricultureId'], array(
			'LandInBigha' 					=> $_POST['IncIncomeAgriculture_LandInBigha'],
			'CropsType' 			=> $_POST['IncIncomeAgriculture_CropsType'],
			'TotalRevenue' 			=> $_POST['IncIncomeAgriculture_TotalRevenue'],
			'ProductionCost' 	=> $_POST['IncIncomeAgriculture_ProductionCost'],
			'Cost' 					=> $_POST['IncIncomeAgriculture_Cost'],
			'IncomeId' 				=> $_POST['IncomeId'],			
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}


	$data['status'] = "success";

	$data['msg'] = Yii::t("income","Successfully Stored");
	Yii::app()->user->setFlash('alert_success', Yii::t("income","Successfully Stored"));
	echo json_encode($data);
	
}



public function ActionSaveFrcOfBusinessOrProfession()
{
	$data = [];
	if(!Yii::app()->request->isPostRequest)
	{
		$data['status'] = "failed";
		$data['msg'] = "Invalid Request";

		die(json_encode($data));
	}
	else
	{


		
		if($_POST['IncIncomeBusinessOrProfession_Type'] == "" )
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Type can not be empty");
			die(json_encode($data));
		}
		
		if($_POST['IncIncomeBusinessOrProfession_Cost'] == "" || !is_numeric($_POST['IncIncomeBusinessOrProfession_Cost']))
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Cost must be a number");
			die(json_encode($data));
		}

		$get_data=Income::model()->findByPk($_POST['IncomeId']);
		if($get_data == null)
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","No data found");
			die(json_encode($data));
		}

	}

	if($_POST['IncomeBusinessOrProfessionId'] == "notSet")
	{
		//NEW ENTRY
		$model=new $_POST['model'];

		$model->Type 					= $_POST['IncIncomeBusinessOrProfession_Type'];
		$model->Description 			= $_POST['IncIncomeBusinessOrProfession_Description'];
		$model->Cost 					= $_POST['IncIncomeBusinessOrProfession_Cost'];
		$model->IncomeId 				= $_POST['IncomeId'];

		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%^^^^^^^^^^^^^^^%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		// $data = $_POST['IncIncomeBusinessOrProfession'];

		// foreach ($data as $key => $value) {

		// 	if(isset($value)) { $model->$key = $value; }

		// }

		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%|><><><><><><><|%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		$model->save(false);

		$model2=new Income;
		$model2->updateByPk($_POST['IncomeId'], array(
			$_POST['field_name']."Confirm" => "Yes",
			$_POST['field_name']."FOrT" => "Fraction",
			$_POST['field_name'] => null,
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}
	else {
		//UPDATE
		$model=new $_POST['model'];
		$model->updateByPk($_POST['IncomeBusinessOrProfessionId'], array(
			'Type' 					=> $_POST['IncIncomeBusinessOrProfession_Type'],
			'Description' 			=> $_POST['IncIncomeBusinessOrProfession_Description'],
			'Cost' 					=> $_POST['IncIncomeBusinessOrProfession_Cost'],
			'IncomeId' 				=> $_POST['IncomeId'],			
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}


	$data['status'] = "success";

	$data['msg'] = Yii::t("income","Successfully Stored");
	Yii::app()->user->setFlash('alert_success', Yii::t("income","Successfully Stored"));
	echo json_encode($data);
	
}


public function ActionSaveFrcOfShareProfit()
{
	$data = [];
	if(!Yii::app()->request->isPostRequest)
	{
		$data['status'] = "failed";
		$data['msg'] = "Invalid Request";

		die(json_encode($data));
	}
	else
	{


		
		if($_POST['IncIncomeShareProfit_NameOfFirm'] == "" )
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Type can not be empty");
			die(json_encode($data));
		}
		
		if($_POST['IncIncomeShareProfit_IncomeOfFirm'] == "" || !is_numeric($_POST['IncIncomeShareProfit_IncomeOfFirm']))
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Firm Income must be a number");
			die(json_encode($data));
		}

		if($_POST['IncIncomeShareProfit_ShareOfFirm'] == "" || !is_numeric($_POST['IncIncomeShareProfit_ShareOfFirm']))
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Share of firm must be a number");
			die(json_encode($data));
		}
		
		if($_POST['IncIncomeShareProfit_Cost'] == "" || !is_numeric($_POST['IncIncomeShareProfit_Cost']))
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Cost must be a number");
			die(json_encode($data));
		}

		$get_data=Income::model()->findByPk($_POST['IncomeId']);
		if($get_data == null)
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","No data found");
			die(json_encode($data));
		}

	}

	if($_POST['IncomeShareProfitId'] == "notSet")
	{
		//NEW ENTRY
		$model=new $_POST['model'];

		$model->NameOfFirm 				= $_POST['IncIncomeShareProfit_NameOfFirm'];
		$model->IncomeOfFirm 			= $_POST['IncIncomeShareProfit_IncomeOfFirm'];
		$model->ShareOfFirm 			= $_POST['IncIncomeShareProfit_ShareOfFirm'];
		$model->Cost 					= $_POST['IncIncomeShareProfit_Cost'];
		$model->IncomeId 				= $_POST['IncomeId'];

		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%^^^^^^^^^^^^^^^%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		// $data = $_POST['IncIncomeShareProfit'];

		// foreach ($data as $key => $value) {

		// 	if(isset($value)) { $model->$key = $value; }

		// }

		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%|><><><><><><><|%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		$model->save(false);

		$model2=new Income;
		$model2->updateByPk($_POST['IncomeId'], array(
			$_POST['field_name']."Confirm" => "Yes",
			$_POST['field_name']."FOrT" => "Fraction",
			$_POST['field_name'] => null,
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}
	else {
		//UPDATE
		$model=new $_POST['model'];
		$model->updateByPk($_POST['IncomeShareProfitId'], array(
			'NameOfFirm' 			=> $_POST['IncIncomeShareProfit_NameOfFirm'],
			'IncomeOfFirm' 			=> $_POST['IncIncomeShareProfit_IncomeOfFirm'],
			'ShareOfFirm' 			=> $_POST['IncIncomeShareProfit_ShareOfFirm'],
			'Cost' 					=> $_POST['IncIncomeShareProfit_Cost'],
			'IncomeId' 				=> $_POST['IncomeId'],			
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}


	$data['status'] = "success";

	$data['msg'] = Yii::t("income","Successfully Stored");
	Yii::app()->user->setFlash('alert_success', Yii::t("income","Successfully Stored"));
	echo json_encode($data);
	
}



public function ActionSaveFrcOfSpouseOrChild()
{
	$data = [];
	if(!Yii::app()->request->isPostRequest)
	{
		$data['status'] = "failed";
		$data['msg'] = "Invalid Request";

		die(json_encode($data));
	}
	else
	{


		
		if($_POST['IncIncomeSpouseOrChild_Type'] == "" )
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Type can not be empty");
			die(json_encode($data));
		}

		if($_POST['IncIncomeSpouseOrChild_Name'] == "" )
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Name can not be empty");
			die(json_encode($data));
		}
		
		if($_POST['IncIncomeSpouseOrChild_Cost'] == "" || !is_numeric($_POST['IncIncomeSpouseOrChild_Cost']))
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Cost must be a number");
			die(json_encode($data));
		}

		$get_data=Income::model()->findByPk($_POST['IncomeId']);
		if($get_data == null)
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","No data found");
			die(json_encode($data));
		}

	}

	if($_POST['IncomeSpouseOrChildId'] == "notSet")
	{
		//NEW ENTRY
		$model=new $_POST['model'];

		$model->Type 					= $_POST['IncIncomeSpouseOrChild_Type'];
		$model->Name 					= $_POST['IncIncomeSpouseOrChild_Name'];
		$model->Cost 					= $_POST['IncIncomeSpouseOrChild_Cost'];
		$model->IncomeId 				= $_POST['IncomeId'];

		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%^^^^^^^^^^^^^^^%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		// $data = $_POST['IncIncomeSpouseOrChild'];

		// foreach ($data as $key => $value) {

		// 	if(isset($value)) { $model->$key = $value; }

		// }

		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%|><><><><><><><|%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		$model->save(false);

		$model2=new Income;
		$model2->updateByPk($_POST['IncomeId'], array(
			$_POST['field_name']."Confirm" => "Yes",
			$_POST['field_name']."FOrT" => "Fraction",
			$_POST['field_name'] => null,
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}
	else {
		//UPDATE
		$model=new $_POST['model'];
		$model->updateByPk($_POST['IncomeSpouseOrChildId'], array(
			'Type' 					=> $_POST['IncIncomeSpouseOrChild_Type'],
			'Name' 			=> $_POST['IncIncomeSpouseOrChild_Name'],
			'Cost' 					=> $_POST['IncIncomeSpouseOrChild_Cost'],
			'IncomeId' 				=> $_POST['IncomeId'],			
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}


	$data['status'] = "success";

	$data['msg'] = Yii::t("income","Successfully Stored");
	Yii::app()->user->setFlash('alert_success', Yii::t("income","Successfully Stored"));
	echo json_encode($data);
	
}



public function ActionSaveFrcOfCapitalGains()
{
	$data = [];
	if(!Yii::app()->request->isPostRequest)
	{
		$data['status'] = "failed";
		$data['msg'] = "Invalid Request";

		die(json_encode($data));
	}
	else
	{


		
		if($_POST['IncIncomeCapitalGains_Type'] == "" )
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Type can not be empty");
			die(json_encode($data));
		}
		
		if($_POST['IncIncomeCapitalGains_Cost'] == "" || !is_numeric($_POST['IncIncomeCapitalGains_Cost']))
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Cost must be a number");
			die(json_encode($data));
		}

		$get_data=Income::model()->findByPk($_POST['IncomeId']);
		if($get_data == null)
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","No data found");
			die(json_encode($data));
		}

	}

	if($_POST['IncomeCapitalGainsId'] == "notSet")
	{
		//NEW ENTRY
		$model=new $_POST['model'];

		$model->Type 					= $_POST['IncIncomeCapitalGains_Type'];
		$model->Description 			= $_POST['IncIncomeCapitalGains_Description'];
		$model->Cost 					= $_POST['IncIncomeCapitalGains_Cost'];
		$model->IncomeId 				= $_POST['IncomeId'];

		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%^^^^^^^^^^^^^^^%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		// $data = $_POST['IncIncIncomeCapitalGains'];

		// foreach ($data as $key => $value) {

		// 	if(isset($value)) { $model->$key = $value; }

		// }

		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%|><><><><><><><|%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		$model->save(false);

		$model2=new Income;
		$model2->updateByPk($_POST['IncomeId'], array(
			$_POST['field_name']."Confirm" => "Yes",
			$_POST['field_name']."FOrT" => "Fraction",
			$_POST['field_name'] => null,
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}
	else {
		//UPDATE
		$model=new $_POST['model'];
		$model->updateByPk($_POST['IncomeCapitalGainsId'], array(
			'Type' 					=> $_POST['IncIncomeCapitalGains_Type'],
			'Description' 			=> $_POST['IncIncomeCapitalGains_Description'],
			'Cost' 					=> $_POST['IncIncomeCapitalGains_Cost'],
			'IncomeId' 				=> $_POST['IncomeId'],			
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}


	$data['status'] = "success";

	$data['msg'] = Yii::t("income","Successfully Stored");
	Yii::app()->user->setFlash('alert_success', Yii::t("income","Successfully Stored"));
	echo json_encode($data);
	
}




		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%START%%%%%%%%%^^SaveFrcOfOtherSource^^%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

public function ActionSaveFrcOfOtherSource()
{
	$data = [];
	if(!Yii::app()->request->isPostRequest)
	{
		$data['status'] = "failed";
		$data['msg'] = "Invalid Request";

		die(json_encode($data));
	}
	else
	{


		
		if($_POST['IncIncomeOtherSource_Type'] == "" )
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Type can not be empty");
			die(json_encode($data));
		}
		
		if($_POST['IncIncomeOtherSource_Cost'] == "" || !is_numeric($_POST['IncIncomeOtherSource_Cost']))
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Cost must be a number");
			die(json_encode($data));
		}

		$get_data=Income::model()->findByPk($_POST['IncomeId']);
		if($get_data == null)
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","No data found");
			die(json_encode($data));
		}

	}

	if($_POST['IncomeOtherSourceId'] == "notSet")
	{
		//NEW ENTRY
		$model=new $_POST['model'];

		$model->Type 					= $_POST['IncIncomeOtherSource_Type'];
		$model->Description 			= $_POST['IncIncomeOtherSource_Description'];
		$model->Cost 					= $_POST['IncIncomeOtherSource_Cost'];
		$model->IncomeId 				= $_POST['IncomeId'];

		// $data = $_POST['IncIncIncomeOtherSource'];

		// foreach ($data as $key => $value) {

		// 	if(isset($value)) { $model->$key = $value; }

		// }

		$model->save(false);

		$model2=new Income;
		$model2->updateByPk($_POST['IncomeId'], array(
			$_POST['field_name']."Confirm" => "Yes",
			$_POST['field_name']."FOrT" => "Fraction",
			$_POST['field_name'] => null,
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}
	else {
		//UPDATE
		$model=new $_POST['model'];
		$model->updateByPk($_POST['IncomeOtherSourceId'], array(
			'Type' 					=> $_POST['IncIncomeOtherSource_Type'],
			'Description' 			=> $_POST['IncIncomeOtherSource_Description'],
			'Cost' 					=> $_POST['IncIncomeOtherSource_Cost'],
			'IncomeId' 				=> $_POST['IncomeId'],			
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}

	$data['status'] = "success";

	$data['msg'] = Yii::t("income","Successfully Stored");
	Yii::app()->user->setFlash('alert_success', Yii::t("income","Successfully Stored"));
	echo json_encode($data);
	
}

		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%END%%%%%%%%%|><SaveFrcOfOtherSource><|%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%


public function ActionSaveFrcOfForeignIncome()
{
	$data = [];
	if(!Yii::app()->request->isPostRequest)
	{
		$data['status'] = "failed";
		$data['msg'] = "Invalid Request";

		die(json_encode($data));
	}
	else
	{
		
		// if($_POST['IncForeignIncome_Type'] == "" )
		// {
		// 	$data['status'] = "failed";
		// 	$data['msg'] = Yii::t("income","Type can not be empty");
		// 	die(json_encode($data));
		// }
		
		if($_POST['IncForeignIncome_Cost'] == "" || !is_numeric($_POST['IncForeignIncome_Cost']))
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Cost must be a number");
			die(json_encode($data));
		}

		$get_data=Income::model()->findByPk($_POST['IncomeId']);
		if($get_data == null)
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","No data found");
			die(json_encode($data));
		}

	}

	if($_POST['ForeignIncomeId'] == "notSet")
	{
		//NEW ENTRY
		$model=new $_POST['model'];

		// $model->Type 					= $_POST['IncForeignIncome_Type'];
		$model->Description 			= $_POST['IncForeignIncome_Description'];
		$model->Cost 					= $_POST['IncForeignIncome_Cost'];
		$model->IncomeId 				= $_POST['IncomeId'];

		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%^^^^^^^^^^^^^^^%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		// $data = $_POST['IncIncForeignIncome'];

		// foreach ($data as $key => $value) {

		// 	if(isset($value)) { $model->$key = $value; }

		// }

		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%|><><><><><><><|%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		$model->save(false);

		$model2=new Income;
		$model2->updateByPk($_POST['IncomeId'], array(
			$_POST['field_name']."Confirm" => "Yes",
			$_POST['field_name']."FOrT" => "Fraction",
			$_POST['field_name'] => null,
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}
	else {
		//UPDATE
		$model=new $_POST['model'];
		$model->updateByPk($_POST['ForeignIncomeId'], array(
			// 'Type' 					=> $_POST['IncForeignIncome_Type'],
			'Description' 			=> $_POST['IncForeignIncome_Description'],
			'Cost' 					=> $_POST['IncForeignIncome_Cost'],
			'IncomeId' 				=> $_POST['IncomeId'],			
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}


	$data['status'] = "success";

	$data['msg'] = Yii::t("income","Successfully Stored");
	Yii::app()->user->setFlash('alert_success', Yii::t("income","Successfully Stored"));
	echo json_encode($data);
	
}





public function ActionGetDataForEdit() {
	$get_data=$_POST['model']::model()->findByPk($_POST['id']);
	echo CJSON::encode($get_data);
}

public function ActionDeleteData() {
	$get = $_POST['model']::model()->findByPk($_POST['id']);

	$_POST['model']::model()->findByPk($_POST['id'])->delete();

	$counter = $_POST['model']::model()->count('IncomeId=:data',array(':data'=>$get->IncomeId));

	if($counter == 0) {
		$model2=new Income;
		$model2->updateByPk($get->IncomeId, array(


			$_POST['field']."Confirm" => null,
			$_POST['field']."FOrT" => null,
			$_POST['field'] => null,
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}

	$data['status'] = "success";
	$data['msg'] = "Successfully Deleted";
	Yii::app()->user->setFlash('alert_success', Yii::t("income","Successfully Removed"));
	echo json_encode($data);
}

public function ActionDeleteParticularFieldData() {
	
	$model2=new Income;
	$model2->updateByPk($_POST['IncomeId'], array(
		$_POST['field']."Confirm" => null,
		$_POST['field']."FOrT" => null,
		$_POST['field'] => null,
		'LastUpdateAt' => date("Y-m-d H:i:s")
		));

	$data['status'] = "success";
	$data['msg'] = "Successfully Deleted";
	Yii::app()->user->setFlash('alert_success', Yii::t("income","Successfully Removed"));
	echo json_encode($data);
}


function totalOutput($model,$val){

	$Confirm 	= $val.'Confirm';
	$FOrT 		= $val.'FOrT';
	$sumOf 		='SumOf'.$val;
	$Inc='Inc'.$val;


		if($model->$Confirm == "Yes") {

		if ($model->$FOrT=="Total") {	
			return $val2 = $model->$val.$this->currency;
		}

		elseif($model->$FOrT == "Fraction") {
			return $val2 = $Inc::model()->find(array(  'select'=>'SUM(Cost) as '.$sumOf, 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$model->IncomeId) ) )->$sumOf.$this->currency;
		}
		else {
			return Yii::t("income", "Not answered yet");
		}
	}
	elseif($model->$Confirm == "No") {
		return Yii::t("income", "You chose No");
	}
	else {
		return Yii::t("income", "Not answered yet");
	}
}

//######################################%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%






}
