<?php

class IncomeSingleController extends Controller
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
            	'actions' => array('index', 'admin', 'entry', 'startup', 'pIDetails1', 'pIDetails2', 'pIDetails2', 'SaveInfo', 'review', 'setNo', 'saveFrcOfSecurities', 'saveFrcOfAgriculture', 'saveFrcOfBusinessOrProfession', 'saveFrcOfShareProfit', 'saveFrcOfSpouseOrChild', 'saveFrcOfCapitalGains', 'saveFrcOfOtherSource', 'saveFrcOfForeignIncome', 'getDataForEdit', 'deleteData', 'deleteParticularFieldData', 'totalOutput', 'linkTest','saveFrcOfIncomeTaxDeductedSource','saveFrcOfIncomeTaxInAdvance','getBusinessDetails','deleteQuickBusinessData','SaveQuickBusinessData'),
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
		$this->redirect(array('entry#s_7'));
		//$this->render('startup',array(
			//));
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

function saveIncome(){

	$model = new IncomeSalaries;

		$model2 = Income::model()->find('CPIId=:data AND EntryYear=:data2', array(':data' => Yii::app()->user->CPIId, ':data2' => $this->taxYear()));

		$CPIInfo = $this->loadCPIInfo(Yii::app()->user->CPIId);
        
		$CalculationModel = CalculationDataSource::model()->find('EntryYear=:data', array(':data' => $this->taxYear()));

		if (isset($_POST['NetTaxableIncome'])) { //die($_POST['NetTaxableIncome']);
			$model->NetTaxableIncome = $_POST['NetTaxableIncome'];
            $model->BasicPay = $_POST['NetTaxableIncome'];
			$incomeModel = Income::model()->find('CPIId=:data AND EntryYear=:data2', array(':data' => Yii::app()->user->CPIId, ':data2' => $this->taxYear()));

			$model->IncomeId = $incomeModel->IncomeId;
            $model->CPIId = Yii::app()->user->CPIId;
			$model->EntryYear = $this->taxYear();

				if ($model->save(false)) {
					$model2->IncomeSalariesConfirm = "Yes";
					$model2->save(false);

			  		$data['status'] = "success";
					$data['msg'] = Yii::t("assets","Successfully Saved");
					Yii::app()->user->setFlash('alert_success', Yii::t("assets","Successfully stored"));

					$this->redirect($this->createUrl('incomeSingle/entry#s_7'));
				}

			
		}
}

public function actionEntry()
{
    // $modelNew=new Income;
    // $modelNew->CPIId=Yii::app()->user->CPIId;
    // $modelNew->EntryYear=$this->taxYear();
    // $modelNew->save(false);

    
    if (isset($_POST['NetTaxableIncome'])) {
    	$totlaIncome = $this->singleFromTaxableIncome();
    	$totlaIncome = $totlaIncome+$_POST['NetTaxableIncome'];
    	if($totlaIncome>400000){
	    	$data['status'] = "failed";
			$data['msg'] = "Your income crossed 4 lac";
			Yii::app()->user->setFlash('alert_failed', Yii::t("assets","Your income has crossed 4 lac BDT because of that you are not eligible for IT GHA 2020"));

			$this->redirect($this->createUrl('incomeSingle/entry'));
	    }
    }
    
   // die();
    $this->saveIncome();
	$model=$this->loadModelByCPIId(Yii::app()->user->CPIId);
	// $model=$this->Income::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear() ));
   
	$CalculationModel = CalculationDataSource::model()->find('EntryYear=:data', array(':data' => $this->taxYear()));
	$model2 = IncIncomeOtherSource::model()->find('IncomeId=:data', array(':data' => $model->IncomeId));
	$model3 = IncIncomeBusinessOrProfession::model()->find('IncomeId=:data', array(':data' => $model->IncomeId));
	$model4 = IncIncomeBusinessOrProfessionDetails::model()->find('IncomeId=:data', array(':data' => $model->IncomeId));

	$modelPinfo = PersonalInformation::model()->findByPk(Yii::app()->user->CPIId);
	//PersonalInformation::model()->find('UserId=:data',  array('data' => Yii::app()->user->id) );

	
	if (empty($model2)) {
		$model2 = new IncIncomeOtherSource;
	}
	if (empty($model3)) {
		$model3 = new IncIncomeBusinessOrProfession;
	}
	if (empty($model4)) {
		$model4 = new IncIncomeBusinessOrProfessionDetails;
	}



	if ( !isset($model->CPIId) || $model->CPIId==null ) {

		$this->redirect(array('startup'));

	} else {

		// $this->redirect(array('entry#s_7'));

		$this->render('income',array(
			'model'=>$model,
			'CalculationModel'=>$CalculationModel,
			'model2'=>$model2,
			'model3'=>$model3,
			'model4'=>$model4,
			'modelPinfo'=>$modelPinfo
			));

		// $model=$this->loadModelByCPIId(Yii::app()->user->CPIId);
	}


}




public function actionReview()
{


    $CalculationModel = CalculationDataSource::model()->find('EntryYear=:data',array(':data'=>$this->taxYear() ));


	$model=$this->loadModelByCPIId(Yii::app()->user->CPIId);


	if ( !isset($model->CPIId) || $model->CPIId==null ) {

		$this->redirect(array('startup'));

	} else {

		$this->render('review',array(
			'model'=>$model,
			'CalculationModel'=>$CalculationModel

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
	
	
	/*	$data['status'] = "success";
		$data['msg'] = "Successfully Stored " . $data['value'] . ". You can change the value bellow and press Store.";
		echo json_encode($data);*/


 		$data['status'] = "success";
		$data['msg'] = Yii::t("assets","Successfully Set to No");
		Yii::app()->user->setFlash('alert_success', Yii::t("assets","Successfully Stored"));
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
			$data['msg'] = Yii::t("income","Amount must be a number");
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
		if($_POST['BooksOfAccount'] == "notSet" )
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Please select Books Of Account");
			die(json_encode($data));
		}

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
		$model->BooksOfAccount 			= $_POST['BooksOfAccount'];
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
			//$_POST['field_name']."BooksOfAccount" => $_POST['BookOfAccountS'],
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
			'BooksOfAccount' 			=> $_POST['BooksOfAccount'],
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


public function ActionGetBusinessDetails(){
	// $criteria = new CDbCriteria();
	// $criteria->addColumnCondition(array('Type' => $_POST['Type'], 'IncomeId' => $_POST['IncomeId']));

	// $incomeBusinessOrProfessionDetails = IncIncomeBusinessOrProfessionDetails::model()->find('IncomeId=:data AND Type=:data1', array(':data'=>@$_POST['IncomeId'], ':data1'=>@$_POST['Type']));
	$incomeBusinessOrProfessionDetails = Yii::app()->db->createCommand()
											->from('inc_income_business_or_profession_details')
											->where('IncomeId=:data', array(':data'=>$_POST['IncomeId']))
											->andWhere('Type=:data1', array(':data1'=>$_POST['Type']))
											->queryRow();

											// var_dump($incomeBusinessOrProfessionDetails);die;
	// $incomeBusinessOrProfessionDetails = IncIncomeBusinessOrProfessionDetails::model()->find($criteria);
// var_dump($incomeBusinessOrProfessionDetails);die;
	echo json_encode($incomeBusinessOrProfessionDetails);	
}

public function ActiondeleteQuickBusinessData(){
	$data = [];
	if(!Yii::app()->request->isPostRequest)
	{
		$data['status'] = "failed";
		$data['msg'] = "Invalid Request";

		die(json_encode($data));
	}
	else{
		$isNewIncomeBusinessOrProfessionDetails = IncIncomeBusinessOrProfessionDetails::model()->find('IncomeId=:data AND Type=:data1', array(':data'=>@$_POST['IncomeId'], ':data1'=>@$_POST['field_id']));

        if($isNewIncomeBusinessOrProfessionDetails){
			$isNewIncomeBusinessOrProfessionDetails->delete();
	    }

		$isNewIncomeBusinessOrProfession = IncIncomeBusinessOrProfession::model()->find('IncomeId=:data', array(':data'=>@$_POST['IncomeId']));

		$filedIncome = ucfirst($_POST['field_id']);
		$filedNetIncome = ucfirst($_POST['field_id'].'_1');
		$newNetincome = ($isNewIncomeBusinessOrProfession->IncomeFromBusiness1+$isNewIncomeBusinessOrProfession->IncomeFromBusiness2+$isNewIncomeBusinessOrProfession->IncomeFromBusiness3)-$isNewIncomeBusinessOrProfession->$filedIncome;
		$newincome = ($isNewIncomeBusinessOrProfession->IncomeFromBusiness1_1+$isNewIncomeBusinessOrProfession->IncomeFromBusiness2_1+$isNewIncomeBusinessOrProfession->IncomeFromBusiness3_1)-$isNewIncomeBusinessOrProfession->$filedNetIncome;
		//$isNewIncomeBusinessOrProfession
		//$filedIncome = ucfirst($filedIncome);
		$isNewIncomeBusinessOrProfession->$filedIncome = null;
		$isNewIncomeBusinessOrProfession->$filedNetIncome = null;
		$isNewIncomeBusinessOrProfession->TotalAmountIncome = $newincome;
		$isNewIncomeBusinessOrProfession->Cost = $newNetincome;
		$isNewIncomeBusinessOrProfession->save(false);
		$data['status'] = "success";
		$data['msg'] = "Done";

		$count = IncIncomeBusinessOrProfessionDetails::model()->find('IncomeId=:data', array(':data'=>@$_POST['IncomeId']));
		if(!$count){
			$Income = Income::model()->findByPk($_POST['IncomeId']);


			$Income->IncomeBusinessOrProfessionConfirm = null;
			
			
			$Income->LastUpdateAt= date("Y-m-d H:i:s");
			$Income->save(false);

		}

        if($isNewIncomeBusinessOrProfessionDetails){
			$isNewIncomeBusinessOrProfessionDetails->delete();
	    }

		die(json_encode($data));

		
	}
}

public function ActionSaveQuickBusinessData(){
	$data = [];
	if(!Yii::app()->request->isPostRequest)
	{
		$data['status'] = "failed";
		$data['msg'] = "Invalid Request";

		die(json_encode($data));
	}
	else{

		$model = IncIncomeBusinessOrProfession::model()->find('IncomeId=:data', array(':data'=>@$_POST['IncomeId']));

		if(!$model){
			$model = new IncIncomeBusinessOrProfession();
			$model->IncomeId  = $_POST['IncomeId'];
		}

		if($_POST['Type']=='IncomeFromBusiness1'){
			$IncomeFromBusiness1 = isset($model->IncomeFromBusiness1)?$model->IncomeFromBusiness1:0;
			$model->IncomeFromBusiness1_1 =  $this->checkNumeric($_POST['field_value1']);
			$model->IncomeFromBusiness1  = $this->checkNumeric($_POST['field_value1']);
			
			       $totlaIncome = $this->singleFromTaxableIncome();
			       $totlaIncome = ($totlaIncome-$IncomeFromBusiness1)+$model->IncomeFromBusiness1;
			   
			       if($totlaIncome>400000){
			    	$data['status'] = "failed";
					$data['msg'] = Yii::t("assets","Your income crossed 4 lac. Update failed!!");
					Yii::app()->user->setFlash('alert_failed', Yii::t("assets","Your income has crossed 4 lac BDT because of that you are not eligible for IT GHA 2020"));

					die(json_encode($data));
			       }
		}

		if($_POST['Type']=='IncomeFromBusiness2'){
			$IncomeFromBusiness2 = isset($model->IncomeFromBusiness2)?$model->IncomeFromBusiness2:0;
			$model->IncomeFromBusiness2_1 =  $this->checkNumeric($_POST['field_value1']);
			$model->IncomeFromBusiness2  = $this->checkNumeric($_POST['field_value1']);

			$totlaIncome = $this->singleFromTaxableIncome();
			       $totlaIncome = ($totlaIncome-$IncomeFromBusiness2)+$model->IncomeFromBusiness2;
			   
			       if($totlaIncome>400000){
			    	$data['status'] = "failed";
					$data['msg'] = Yii::t("assets","Your income crossed 4 lac. Update failed!!");
					Yii::app()->user->setFlash('alert_failed', Yii::t("assets","Your income has crossed 4 lac BDT because of that you are not eligible for IT GHA 2020"));

					die(json_encode($data));
					//return;
			       }
	
			
		}

		if($_POST['Type']=='IncomeFromBusiness3'){
			$IncomeFromBusiness3 = isset($model->IncomeFromBusiness3)?$model->IncomeFromBusiness3:0;
			$model->IncomeFromBusiness3_1 =  $this->checkNumeric($_POST['field_value1']);
			$model->IncomeFromBusiness3  = $this->checkNumeric($_POST['field_value1']);
			$totlaIncome = $this->singleFromTaxableIncome();
			       $totlaIncome = ($totlaIncome-$IncomeFromBusiness3)+$model->IncomeFromBusiness3;
			   
			       if($totlaIncome>400000){
			    	$data['status'] = "failed";
					$data['msg'] = Yii::t("assets","Your income crossed 4 lac. Update failed!!");
					Yii::app()->user->setFlash('alert_failed', Yii::t("assets","Your income has crossed 4 lac BDT because of that you are not eligible for IT GHA 2020"));

					die(json_encode($data));
			       }

			
		}
        
        $model->save(false);
        $model = IncIncomeBusinessOrProfession::model()->find('IncomeId=:data', array(':data'=>@$_POST['IncomeId']));
        $TotalAmountIncome = floatval($model->IncomeFromBusiness3_1)+floatval($model->IncomeFromBusiness2_1)+floatval($model->IncomeFromBusiness1_1);
        $Cost = floatval($model->IncomeFromBusiness3)+floatval($model->IncomeFromBusiness2)+floatval($model->IncomeFromBusiness1);

		$model->TotalAmountIncome = $TotalAmountIncome;
		//$model->OtherExpense = ($TotalAmountIncome-$Cost);
		$model->Cost = $Cost;

		$model->IncomeId = $_POST['IncomeId'];			
		$model->LastUpdateAt = date("Y-m-d H:i:s");
        $model->save(false);
		$isNewIncomeBusinessOrProfessionDetails = IncIncomeBusinessOrProfessionDetails::model()->find('IncomeId=:data AND Type=:data1', array(':data'=>@$_POST['IncomeId'], ':data1'=>@$_POST['Type']));

        if($isNewIncomeBusinessOrProfessionDetails){
			$isNewIncomeBusinessOrProfessionDetails->delete();

	    }


        $isNewIncomeBusinessOrProfessionDetails = new IncIncomeBusinessOrProfessionDetails();
	    $isNewIncomeBusinessOrProfessionDetails->Type = $_POST['Type'];
	    $isNewIncomeBusinessOrProfessionDetails->IncomeId = $_POST['IncomeId'];
	    $isNewIncomeBusinessOrProfessionDetails->GrossProfit = $_POST['field_value1'];
	    $isNewIncomeBusinessOrProfessionDetails->NetProfit = $_POST['field_value1'];
	    
	    $isNewIncomeBusinessOrProfessionDetails->LastUpdateAt = date("Y-m-d H:i:s");
	    $isNewIncomeBusinessOrProfessionDetails->save(false);

	    $Income = Income::model()->findByPk($_POST['IncomeId']);


		$Income->IncomeBusinessOrProfessionConfirm = 'Yes';
		$Income->IncomeBusinessOrProfessionFOrT = 'Fraction';	
			
		$Income->LastUpdateAt= date("Y-m-d H:i:s");
		$Income->save(false);

		

	    $data['status'] = "success";
		$data['msg'] = "Successfully added";

		die(json_encode($data));


			
		
	}

}


public function ActionSaveFrcOfBusinessOrProfession(){
	// var_dump($_POST);die;
	$data = [];
	if(!Yii::app()->request->isPostRequest)
	{
		$data['status'] = "failed";
		$data['msg'] = "Invalid Request";

		die(json_encode($data));
	}
	else
	{
		// if($_POST['Type']=='ExportBusiness'){
		// 	$_POST['ExportBusiness_1'] = $this->checkNumeric($_POST['temp_Amount']);
		// 	$_POST['ExportBusiness'] = $this->checkNumeric($_POST['temp_NetTaxable']);
		// }
		// elseif($_POST['Type']=='HandCraftedMaterials'){
		// 	$_POST['HandCraftedMaterials_1'] = $this->checkNumeric($_POST['HandCraftedMaterials_1']);
		// 	$_POST['HandCraftedMaterials'] = $this->checkNumeric($_POST['HandCraftedMaterials']);
		// }
		// elseif($_POST['Type']=='BusinessOfSoftwareDevelopment'){
		// 	$_POST['BusinessOfSoftwareDevelopment_1'] = $this->checkNumeric($_POST['BusinessOfSoftwareDevelopment_1']);
		// 	$_POST['BusinessOfSoftwareDevelopment'] = $this->checkNumeric($_POST['BusinessOfSoftwareDevelopment']);
		// }
		// elseif($_POST['Type']=='NTTN'){
		// 	$_POST['NTTN_1'] = $this->checkNumeric($_POST['NTTN_1']);
		// 	$_POST['NTTN'] = $this->checkNumeric($_POST['NTTN']);
		// }
		// elseif($_POST['Type']=='ITES'){
		// 	$_POST['ITES_1'] = $this->checkNumeric($_POST['ITES_1']);
		// 	$_POST['ITES'] = $this->checkNumeric($_POST['ITES']);
		// }
		// elseif($_POST['Type']=='PoultryFarm'){
		// 	$_POST['PoultryFarm_1'] = $this->checkNumeric($_POST['PoultryFarm_1']);
		// 	$_POST['PoultryFarm'] = $this->checkNumeric($_POST['PoultryFarm']);
		// }
		// elseif($_POST['Type']=='SmallMediumEnterprise'){
		// 	$_POST['AnnualTurnover'] = $this->checkNumeric($_POST['AnnualTurnover']); 
			
		// 	$_POST['SmallMediumEnterprise_1'] = $this->checkNumeric($_POST['SmallMediumEnterprise_1']);
		// 	$_POST['SmallMediumEnterprise'] = $this->checkNumeric($_POST['SmallMediumEnterprise']);

		// }
		// elseif($_POST['Type']=='Others'){
		// 	$_POST['Others_1'] = $this->checkNumeric($_POST['Others_1']);
		// 	$_POST['Others'] = $this->checkNumeric($_POST['Others']);
		// }
		if($_POST['Type']=='IncomeFromBusiness1'){
			$_POST['IncomeFromBusiness1_1'] = $this->checkNumeric($_POST['IncomeFromBusiness1_1']);
			$_POST['IncomeFromBusiness1'] = $this->checkNumeric($_POST['IncomeFromBusiness1']);
		}
		elseif($_POST['Type']=='IncomeFromBusiness2'){
			$_POST['IncomeFromBusiness2_1'] = $this->checkNumeric($_POST['IncomeFromBusiness2_1']);
			$_POST['IncomeFromBusiness2'] = $this->checkNumeric($_POST['IncomeFromBusiness2']);
		}
		elseif($_POST['Type']=='IncomeFromBusiness3'){
			$_POST['IncomeFromBusiness3_1'] = $this->checkNumeric($_POST['IncomeFromBusiness3_1']);
			$_POST['IncomeFromBusiness3'] = $this->checkNumeric($_POST['IncomeFromBusiness3']);
		}

		//Sum of total amount income
		// $TotalAmountIncome = $_POST['ExportBusiness_1'] + $_POST['HandCraftedMaterials_1'] + $_POST['BusinessOfSoftwareDevelopment_1'] + $_POST['NTTN_1'] + $_POST['ITES_1'] + $_POST['PoultryFarm_1'] + $_POST['SmallMediumEnterprise_1'] + $_POST['Others_1'] + $_POST['IncomeFromBusiness1_1'] + $_POST['IncomeFromBusiness2_1'] + $_POST['IncomeFromBusiness3_1'];
		$TotalAmountIncome = $_POST['IncomeFromBusiness1_1'] + $_POST['IncomeFromBusiness2_1'] + $_POST['IncomeFromBusiness3_1'] ;
		//Sum of taxable income
		// $Cost = $_POST['ExportBusiness'] + $_POST['HandCraftedMaterials'] + $_POST['BusinessOfSoftwareDevelopment'] + $_POST['NTTN'] + $_POST['ITES'] + $_POST['PoultryFarm'] + $_POST['SmallMediumEnterprise'] + $_POST['Others'] + $_POST['IncomeFromBusiness1'] + $_POST['IncomeFromBusiness2'] + $_POST['IncomeFromBusiness3'];
		$Cost = $_POST['IncomeFromBusiness1'] + $_POST['IncomeFromBusiness2'] + $_POST['IncomeFromBusiness3'];



		// $_POST['Type'] = $this->checkNumeric($_POST['Others']);
		// $_POST['BusinessOrProfessionName'] = $this->checkNumeric($_POST['Others']);
		// $_POST['Address'] = $this->checkNumeric($_POST['Others']);
		$_POST['Sales'] = $this->checkNumeric($_POST['Sales']);
		$_POST['GrossProfit'] = $this->checkNumeric($_POST['GrossProfit']);
		$_POST['OtherExpense'] = $this->checkNumeric($_POST['OtherExpense']);
		$_POST['NetProfit'] = $this->checkNumeric($_POST['NetProfit']);
		$_POST['CashInHandOrBank'] = $this->checkNumeric($_POST['CashInHandOrBank']);
		$_POST['Inventories'] = $this->checkNumeric($_POST['Inventories']);
		$_POST['FixedAssets'] = $this->checkNumeric($_POST['FixedAssets']);
		$_POST['OtherAssets'] = $this->checkNumeric($_POST['OtherAssets']);
		$_POST['TotalAssets'] = $this->checkNumeric($_POST['TotalAssets']);
		$_POST['OpeningCapital'] = $this->checkNumeric($_POST['OpeningCapital']);
		$_POST['WithdrawlsInIncomeYear'] = $this->checkNumeric($_POST['WithdrawlsInIncomeYear']);
		$_POST['ClosingCapital'] = $this->checkNumeric($_POST['ClosingCapital']);
		$_POST['Liabilities'] = $this->checkNumeric($_POST['Liabilities']);
		$_POST['TotalCapitalLiabilities'] = $this->checkNumeric($_POST['TotalCapitalLiabilities']);
		$_POST['BusinessIncomeExempted'] = $_POST['BusinessIncomeExempted'];


		$get_data=Income::model()->findByPk($_POST['IncomeId']);
		if($get_data == null)
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","No data found");
			die(json_encode($data));
		}

		$isNewIncomeBusinessOrProfessionDetails = IncIncomeBusinessOrProfessionDetails::model()->findAll('IncomeId=:data AND Type=:data1', array(':data'=>@$_POST['IncomeId'], ':data1'=>@$_POST['Type']));
		$isNewIncomeBusinessOrProfession = IncIncomeBusinessOrProfession::model()->findAll('IncomeId=:data', array(':data'=>@$_POST['IncomeId']));

		// var_dump($isNewIncomeBusinessOrProfessionDetails);die;
	}

	if(empty($isNewIncomeBusinessOrProfession)){

		//NEW ENTRY
		$model=new $_POST['model'];

		// if($_POST['Type']=='ExportBusiness'){
		// 	$model->ExportBusiness_1 = $_POST['temp_Amount'];
		// 	$model->ExportBusiness = $_POST['temp_NetTaxable'];
		// }
		// if($_POST['Type']=='HandCraftedMaterials'){
		// $model->HandCraftedMaterials_1 = $_POST['temp_Amount'];
		// $model->HandCraftedMaterials = $_POST['temp_NetTaxable'];
		// }
		// if($_POST['Type']=='BusinessOfSoftwareDevelopment'){
		// $model->BusinessOfSoftwareDevelopment_1 = $_POST['temp_Amount'];
		// $model->BusinessOfSoftwareDevelopment = $_POST['temp_NetTaxable'];
		// }
		// if($_POST['Type']=='NTTN'){
		// $model->NTTN_1 = $_POST['temp_Amount'];
		// $model->NTTN = $_POST['temp_NetTaxable'];
		// }
		// if($_POST['Type']=='ITES'){
		// 	$model->ITES_1 = $_POST['temp_Amount'];
		// 	$model->ITES = $_POST['temp_NetTaxable'];
		// }
		// if($_POST['Type']=='PoultryFarm'){
		// 	$model->PoultryFarm_1 = $_POST['temp_Amount'];
		// 	$model->PoultryFarm = $_POST['temp_NetTaxable'];
		// }
		// if($_POST['Type']=='SmallMediumEnterprise'){
		// 	$model->AnnualTurnover = $_POST['AnnualTurnover'];

		// 	$model->SmallMediumEnterprise_1 = $_POST['temp_Amount'];
		// 	$model->SmallMediumEnterprise = $_POST['temp_NetTaxable'];
		// }
		// if($_POST['Type']=='Others'){
		// 	$model->Others_1 = $_POST['temp_Amount'];
		// 	$model->Others = $_POST['temp_NetTaxable'];
		// }
		if($_POST['Type']=='IncomeFromBusiness1'){
			$model->IncomeFromBusiness1_1 = $_POST['temp_Amount'];
			$model->IncomeFromBusiness1 = $_POST['temp_NetTaxable'];
		}
		if($_POST['Type']=='IncomeFromBusiness2'){
			$model->IncomeFromBusiness2_1 = $_POST['temp_Amount'];
			$model->IncomeFromBusiness2 = $_POST['temp_NetTaxable'];
		}
		if($_POST['Type']=='IncomeFromBusiness3'){
			$model->IncomeFromBusiness3_1 = $_POST['temp_Amount'];
			$model->IncomeFromBusiness3 = $_POST['temp_NetTaxable'];
		}
		$model->TotalAmountIncome = $TotalAmountIncome;
		$model->Cost = $Cost;
		$model->IncomeId = $_POST['IncomeId'];
		// var_dump($TotalAmountIncome);
		// var_dump($Cost);
		// die;

		$model->save(false);

		$model2=new Income;
		$model2->updateByPk($_POST['IncomeId'], array(
			$_POST['field_name']."Confirm" => "Yes",
			$_POST['field_name']."FOrT" => "Fraction",
			$_POST['field_name'] => null,
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}else{

		//UPDATE
		$model=new $_POST['model'];
		// if($_POST['Type']=='ExportBusiness'){
		// 	$model->updateByPk($_POST['IncomeOtherSourceId'], array(
			
		// 	"ExportBusiness_1" => $_POST['temp_Amount'],
		// 	"ExportBusiness" => $_POST['temp_NetTaxable'],

		// 	"TotalAmountIncome" => $TotalAmountIncome,
		// 	"Cost" => $Cost,

		// 	'IncomeId' => $_POST['IncomeId'],			
		// 	'LastUpdateAt' => date("Y-m-d H:i:s")
		// 	));
		// }
		// if($_POST['Type']=='HandCraftedMaterials'){
		// 	$model->updateByPk($_POST['IncomeOtherSourceId'], array(
			
		// 	"HandCraftedMaterials_1" => $_POST['temp_Amount'],
		// 	"HandCraftedMaterials" => $_POST['temp_NetTaxable'],

		// 	"TotalAmountIncome" => $TotalAmountIncome,
		// 	"Cost" => $Cost,

		// 	'IncomeId' => $_POST['IncomeId'],			
		// 	'LastUpdateAt' => date("Y-m-d H:i:s")
		// 	));
		// }
		// if($_POST['Type']=='BusinessOfSoftwareDevelopment'){
		// 	$model->updateByPk($_POST['IncomeOtherSourceId'], array(
		// 	"BusinessOfSoftwareDevelopment_1" => $_POST['temp_Amount'],
		// 	"BusinessOfSoftwareDevelopment" => $_POST['temp_NetTaxable'],

		// 	"TotalAmountIncome" => $TotalAmountIncome,
		// 	"Cost" => $Cost,

		// 	'IncomeId' => $_POST['IncomeId'],			
		// 	'LastUpdateAt' => date("Y-m-d H:i:s")
		// 	));
		// }
		// if($_POST['Type']=='NTTN'){
		// 	$model->updateByPk($_POST['IncomeOtherSourceId'], array(
			
		// 	"NTTN_1" => $_POST['temp_Amount'],
		// 	"NTTN" => $_POST['temp_NetTaxable'],

		// 	"TotalAmountIncome" => $TotalAmountIncome,
		// 	"Cost" => $Cost,

		// 	'IncomeId' => $_POST['IncomeId'],			
		// 	'LastUpdateAt' => date("Y-m-d H:i:s")
		// 	));
		// }
		// if($_POST['Type']=='ITES'){
		// 	$model->updateByPk($_POST['IncomeOtherSourceId'], array(
			
		// 	"ITES_1" => $_POST['temp_Amount'],
		// 	"ITES" => $_POST['temp_NetTaxable'],

		// 	"TotalAmountIncome" => $TotalAmountIncome,
		// 	"Cost" => $Cost,

		// 	'IncomeId' => $_POST['IncomeId'],			
		// 	'LastUpdateAt' => date("Y-m-d H:i:s")
		// 	));
		// }
		// if($_POST['Type']=='PoultryFarm'){
		// 	$model->updateByPk($_POST['IncomeOtherSourceId'], array(
			
		// 	"PoultryFarm_1" => $_POST['temp_Amount'],
		// 	"PoultryFarm" => $_POST['temp_NetTaxable'],

		// 	"TotalAmountIncome" => $TotalAmountIncome,
		// 	"Cost" => $Cost,

		// 	'IncomeId' => $_POST['IncomeId'],			
		// 	'LastUpdateAt' => date("Y-m-d H:i:s")
		// 	));
		// }
		// if($_POST['Type']=='SmallMediumEnterprise'){
		// 	$model->updateByPk($_POST['IncomeOtherSourceId'], array(
			
		// 	"AnnualTurnover" => $_POST['Sales'],

		// 	"SmallMediumEnterprise_1" => $_POST['temp_Amount'],
		// 	"SmallMediumEnterprise" => $_POST['temp_NetTaxable'],

		// 	"TotalAmountIncome" => $TotalAmountIncome,
		// 	"Cost" => $Cost,

		// 	'IncomeId' => $_POST['IncomeId'],			
		// 	'LastUpdateAt' => date("Y-m-d H:i:s")
		// 	));
		// }
		// if($_POST['Type']=='Others'){
		// 	$model->updateByPk($_POST['IncomeOtherSourceId'], array(
			
		// 	"Others_1" => $_POST['temp_Amount'],
		// 	"Others" => $_POST['temp_NetTaxable'],

		// 	"TotalAmountIncome" => $TotalAmountIncome,
		// 	"Cost" => $Cost,

		// 	'IncomeId' => $_POST['IncomeId'],			
		// 	'LastUpdateAt' => date("Y-m-d H:i:s")
		// 	));
		// }

		//$incomemodel = $model::model()->findByPk($_POST['IncomeId']);
		$incomeBmodel = IncIncomeBusinessOrProfession::model()->find('IncomeId=:data', array(':data'=>@$_POST['IncomeId']));
		if($_POST['Type']=='IncomeFromBusiness1'){
            

			$totlaIncome = $this->singleFromTaxableIncome();
			
			$totlaIncome = ($totlaIncome-$incomeBmodel->IncomeFromBusiness1)+$_POST['temp_NetTaxable'];

		
			   
	       if($totlaIncome>400000){
	    	$data['status'] = "failed";
			$data['msg'] = Yii::t("assets","Your income crossed 4 lac. Update failed!!");
			Yii::app()->user->setFlash('alert_failed', Yii::t("assets","Your income has crossed 4 lac BDT because of that you are not eligible for IT GHA 2020"));

			die(json_encode($data));
			//return;
	       }
			$model->updateByPk($_POST['IncomeOtherSourceId'], array(
			
			"IncomeFromBusiness1_1" => $_POST['temp_Amount'],
			"IncomeFromBusiness1" => $_POST['temp_NetTaxable'],

			"TotalAmountIncome" => $TotalAmountIncome,
			"Cost" => $Cost,

			'IncomeId' => $_POST['IncomeId'],			
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));

			
		}
		if($_POST['Type']=='IncomeFromBusiness2'){
			$totlaIncome = $this->singleFromTaxableIncome();
			       
			$totlaIncome = ($totlaIncome-$incomeBmodel->IncomeFromBusiness2)+$_POST['temp_NetTaxable'];
			   
	       if($totlaIncome>400000){
	    	$data['status'] = "failed";
			$data['msg'] = Yii::t("assets","Your income crossed 4 lac. Update failed!!");
			Yii::app()->user->setFlash('alert_failed', Yii::t("assets","Your income has crossed 4 lac BDT because of that you are not eligible for IT GHA 2020"));

			die(json_encode($data));
			//return;
	       }

			$model->updateByPk($_POST['IncomeOtherSourceId'], array(
			
			"IncomeFromBusiness2_1" => $_POST['temp_Amount'],
			"IncomeFromBusiness2" => $_POST['temp_NetTaxable'],

			"TotalAmountIncome" => $TotalAmountIncome,
			"Cost" => $Cost,

			'IncomeId' => $_POST['IncomeId'],			
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
		}
		if($_POST['Type']=='IncomeFromBusiness3'){
			$totlaIncome = $this->singleFromTaxableIncome();
			      
			$totlaIncome = ($totlaIncome-$incomeBmodel->IncomeFromBusiness3)+$_POST['temp_NetTaxable'];
			   
		       if($totlaIncome>400000){
		    	$data['status'] = "failed";
				$data['msg'] = Yii::t("assets","Your income crossed 4 lac. Update failed!!");
				Yii::app()->user->setFlash('alert_failed', Yii::t("assets","Your income has crossed 4 lac BDT because of that you are not eligible for IT GHA 2020"));

				die(json_encode($data));
				//return;
		       }
			$model->updateByPk($_POST['IncomeOtherSourceId'], array(
			
			"IncomeFromBusiness3_1" => $_POST['temp_Amount'],
			"IncomeFromBusiness3" => $_POST['temp_NetTaxable'],

			"TotalAmountIncome" => $TotalAmountIncome,
			"Cost" => $Cost,

			'IncomeId' => $_POST['IncomeId'],			
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
		}

		// $model->updateByPk($_POST['IncomeOtherSourceId'], array(
			
		// 	"ExportBusiness_1" => $_POST['ExportBusiness_1'],
		// 	"ExportBusiness" => $_POST['ExportBusiness'],

		// 	"HandCraftedMaterials_1" => $_POST['ExportBusiness_1'],
		// 	"HandCraftedMaterials" => $_POST['ExportBusiness'],

		// 	"BusinessOfSoftwareDevelopment_1" => $_POST['ExportBusiness_1'],
		// 	"BusinessOfSoftwareDevelopment" => $_POST['ExportBusiness'],

		// 	"NTTN_1" => $_POST['ExportBusiness_1'],
		// 	"NTTN" => $_POST['ExportBusiness'],

		// 	"ITES_1" => $_POST['ExportBusiness_1'],
		// 	"ITES" => $_POST['ExportBusiness'],

		// 	"PoultryFarm_1" => $_POST['ExportBusiness_1'],
		// 	"PoultryFarm" => $_POST['ExportBusiness'],

		// 	"AnnualTurnover" => $_POST['AnnualTurnover'],

		// 	"SmallMediumEnterprise_1" => $_POST['ExportBusiness_1'],
		// 	"SmallMediumEnterprise" => $_POST['ExportBusiness'],

		// 	"Others_1" => $_POST['ExportBusiness_1'],
		// 	"Others" => $_POST['ExportBusiness'],

		// 	"TotalAmountIncome" => $TotalAmountIncome,
		// 	"Cost" => $Cost,

		// 	'IncomeId' => $_POST['IncomeId'],			
		// 	'LastUpdateAt' => date("Y-m-d H:i:s")
		// 	));
	}


	if(empty($isNewIncomeBusinessOrProfessionDetails)){
		$model=new IncIncomeBusinessOrProfessionDetails;

		$model->Type = $_POST['Type'];
		$model->BusinessOrProfessionName = $_POST['BusinessOrProfessionName'];
		$model->Address = $_POST['Address'];
		$model->Sales = $_POST['Sales'];
		$model->GrossProfit = $_POST['GrossProfit'];
		$model->OtherExpense = $_POST['OtherExpense'];
		$model->NetProfit = $_POST['NetProfit'];
		$model->CashInHandOrBank = $_POST['CashInHandOrBank'];
		$model->Inventories = $_POST['Inventories'];
		$model->FixedAssets = $_POST['FixedAssets'];
		$model->OtherAssets = $_POST['OtherAssets'];
		$model->TotalAssets = $_POST['TotalAssets'];
		$model->OpeningCapital = $_POST['OpeningCapital'];
		$model->WithdrawlsInIncomeYear = $_POST['WithdrawlsInIncomeYear'];
		$model->ClosingCapital = $_POST['ClosingCapital'];
		$model->Liabilities = $_POST['Liabilities'];
		$model->TotalCapitalLiabilities = $_POST['TotalCapitalLiabilities'];
		$model->BusinessIncomeExempted = $_POST['BusinessIncomeExempted'];

		$model->IncomeId = $_POST['IncomeId'];


		$model->save(false);

		$model2=new Income;
		$model2->updateByPk($_POST['IncomeId'], array(
			$_POST['field_name']."Confirm" => "Yes",
			$_POST['field_name']."FOrT" => "Fraction",
			$_POST['field_name'] => null,
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}else{
		//UPDATE
		$model= new IncIncomeBusinessOrProfessionDetails;
		$model->updateByPk($isNewIncomeBusinessOrProfessionDetails[0]->IncomeBusinessOrProfessionDetailsId, array(
			
			'IncomeId' => $_POST['IncomeId'],			
			"Type" => $_POST['Type'],
			"BusinessOrProfessionName" => $_POST['BusinessOrProfessionName'],
			"Address" => $_POST['Address'],
			"Sales" => $_POST['Sales'],
			"GrossProfit" => $_POST['GrossProfit'],
			"OtherExpense" => $_POST['OtherExpense'],
			"NetProfit" => $_POST['NetProfit'],
			"CashInHandOrBank" => $_POST['CashInHandOrBank'],
			"Inventories" => $_POST['Inventories'],
			"FixedAssets" => $_POST['FixedAssets'],
			"OtherAssets" => $_POST['OtherAssets'],
			"TotalAssets" => $_POST['TotalAssets'],
			"OpeningCapital" => $_POST['OpeningCapital'],
			"WithdrawlsInIncomeYear" => $_POST['WithdrawlsInIncomeYear'],
			"ClosingCapital" => $_POST['ClosingCapital'],
			"Liabilities" => $_POST['Liabilities'],
			"TotalCapitalLiabilities" => $_POST['TotalCapitalLiabilities'],
			"BusinessIncomeExempted" => $_POST['BusinessIncomeExempted'],
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}

	$data['status'] = "success";

	$data['msg'] = Yii::t("income","Successfully Stored");
	Yii::app()->user->setFlash('alert_success', Yii::t("income","Successfully Stored"));
	echo json_encode($data);
}

public function ActionSaveFrcOfBusinessOrProfessio()
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
		$_POST['ExportBusiness_1'] = $this->checkNumeric($_POST['ExportBusiness_1']);
		$_POST['ExportBusiness'] = $this->checkNumeric($_POST['ExportBusiness']);

		$_POST['HandCraftedMaterials_1'] = $this->checkNumeric($_POST['HandCraftedMaterials_1']);
		$_POST['HandCraftedMaterials'] = $this->checkNumeric($_POST['HandCraftedMaterials']);

		$_POST['BusinessOfSoftwareDevelopment_1'] = $this->checkNumeric($_POST['BusinessOfSoftwareDevelopment_1']);
		$_POST['BusinessOfSoftwareDevelopment'] = $this->checkNumeric($_POST['BusinessOfSoftwareDevelopment']);

		$_POST['NTTN_1'] = $this->checkNumeric($_POST['NTTN_1']);
		$_POST['NTTN'] = $this->checkNumeric($_POST['NTTN']);

		$_POST['ITES_1'] = $this->checkNumeric($_POST['ITES_1']);
		$_POST['ITES'] = $this->checkNumeric($_POST['ITES']);

		$_POST['PoultryFarm_1'] = $this->checkNumeric($_POST['PoultryFarm_1']);
		$_POST['PoultryFarm'] = $this->checkNumeric($_POST['PoultryFarm']);

		$_POST['AnnualTurnover'] = $this->checkNumeric($_POST['AnnualTurnover']); 
		
		$_POST['SmallMediumEnterprise_1'] = $this->checkNumeric($_POST['SmallMediumEnterprise_1']);
		$_POST['SmallMediumEnterprise'] = $this->checkNumeric($_POST['SmallMediumEnterprise']);


		$_POST['Others_1'] = $this->checkNumeric($_POST['Others_1']);
		$_POST['Others'] = $this->checkNumeric($_POST['Others']);

		//Sum of total amount income
		$TotalAmountIncome = $_POST['ExportBusiness_1'] + $_POST['HandCraftedMaterials_1'] + $_POST['BusinessOfSoftwareDevelopment_1'] + $_POST['NTTN_1'] + $_POST['ITES_1'] + $_POST['PoultryFarm_1'] + $_POST['SmallMediumEnterprise_1'] + $_POST['Others_1'] ;
		//Sum of taxable income
		$Cost = $_POST['ExportBusiness'] + $_POST['HandCraftedMaterials'] + $_POST['BusinessOfSoftwareDevelopment'] + $_POST['NTTN'] + $_POST['ITES'] + $_POST['PoultryFarm'] + $_POST['SmallMediumEnterprise'] + $_POST['Others'];

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

		$model->ExportBusiness_1 = $_POST['ExportBusiness_1'];
		$model->ExportBusiness = $_POST['ExportBusiness'];

		$model->HandCraftedMaterials_1 = $_POST['HandCraftedMaterials_1'];
		$model->HandCraftedMaterials = $_POST['HandCraftedMaterials'];

		$model->BusinessOfSoftwareDevelopment_1 = $_POST['BusinessOfSoftwareDevelopment_1'];
		$model->BusinessOfSoftwareDevelopment = $_POST['BusinessOfSoftwareDevelopment'];

		$model->NTTN_1 = $_POST['NTTN_1'];
		$model->NTTN = $_POST['NTTN'];

		$model->ITES_1 = $_POST['ITES_1'];
		$model->ITES = $_POST['ITES'];

		$model->PoultryFarm_1 = $_POST['PoultryFarm_1'];
		$model->PoultryFarm = $_POST['PoultryFarm'];

		$model->AnnualTurnover = $_POST['AnnualTurnover'];

		$model->SmallMediumEnterprise_1 = $_POST['SmallMediumEnterprise_1'];
		$model->SmallMediumEnterprise = $_POST['SmallMediumEnterprise'];

		$model->Others_1 = $_POST['Others_1'];
		$model->Others = $_POST['Others'];

		$model->TotalAmountIncome = $TotalAmountIncome;
		$model->Cost = $Cost;
		$model->IncomeId = $_POST['IncomeId'];


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
			
			"ExportBusiness_1" => $_POST['ExportBusiness_1'],
			"ExportBusiness" => $_POST['ExportBusiness'],

			"HandCraftedMaterials_1" => $_POST['HandCraftedMaterials_1'],
			"HandCraftedMaterials" => $_POST['HandCraftedMaterials'],

			"BusinessOfSoftwareDevelopment_1" => $_POST['BusinessOfSoftwareDevelopment_1'],
			"BusinessOfSoftwareDevelopment" => $_POST['BusinessOfSoftwareDevelopment'],

			"NTTN_1" => $_POST['NTTN_1'],
			"NTTN" => $_POST['NTTN'],

			"ITES_1" => $_POST['ITES_1'],
			"ITES" => $_POST['ITES'],

			"PoultryFarm_1" => $_POST['PoultryFarm_1'],
			"PoultryFarm" => $_POST['PoultryFarm'],

			"AnnualTurnover" => $_POST['AnnualTurnover'],

			"SmallMediumEnterprise_1" => $_POST['SmallMediumEnterprise_1'],
			"SmallMediumEnterprise" => $_POST['SmallMediumEnterprise'],

			"Others_1" => $_POST['Others_1'],
			"Others" => $_POST['Others'],

			"TotalAmountIncome" => $TotalAmountIncome,
			"Cost" => $Cost,

			'IncomeId' => $_POST['IncomeId'],			
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
			$data['msg'] = Yii::t("income","Name of firm can not be empty");
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
			$data['msg'] = Yii::t("income","Asset name can not be empty");
			die(json_encode($data));
		}
		
		if($_POST['IncIncomeCapitalGains_Cost'] == "" || !is_numeric($_POST['IncIncomeCapitalGains_Cost']) || $_POST['SaleOfShare'] == "" || !is_numeric($_POST['SaleOfShare']))
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Sale of Share and Net gain must be a number");
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

		$model->Type 						= $_POST['IncIncomeCapitalGains_Type'];
		$model->Description 				= $_POST['IncIncomeCapitalGains_Description'];
		$model->SaleOfShare 				= $_POST['SaleOfShare'];
		$model->MoreThanTenPercentHolder 	= $_POST['MoreThanTenPercentHolder'];
		$model->Cost 						= $_POST['IncIncomeCapitalGains_Cost'];
		$model->IncomeId 					= $_POST['IncomeId'];
		if(isset($_POST['tds_amount']) && $_POST['IncIncomeCapitalGains_Type']=="Signing Money Received"){
			$model->tds_amount 	= $_POST['tds_amount'];
		}

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
			'Type' 						=> $_POST['IncIncomeCapitalGains_Type'],
			'Description' 				=> $_POST['IncIncomeCapitalGains_Description'],
			'SaleOfShare' 				=> $_POST['SaleOfShare'],
			'MoreThanTenPercentHolder' 	=> $_POST['MoreThanTenPercentHolder'],
			'Cost' 						=> $_POST['IncIncomeCapitalGains_Cost'],
			'IncomeId' 					=> $_POST['IncomeId'],	
			'tds_amount'                => $_POST['tds_amount'],		
			'LastUpdateAt' 				=> date("Y-m-d H:i:s")
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
		
		$_POST['SanchaypatraIncome'] = $this->checkNumeric($_POST['SanchaypatraIncome']);
		$_POST['SanchaypatraIncome_1'] = $this->checkNumeric($_POST['SanchaypatraIncome_1']);
		
		$_POST['TDSFromSanchaypatra'] = $this->checkNumeric($_POST['TDSFromSanchaypatra']);

		$_POST['Others_1'] = $this->checkNumeric($_POST['Others_1']);
		$_POST['Others'] = $this->checkNumeric($_POST['Others']);

		$totlaIncome = $this->singleFromTaxableIncome($other=1);
    	$totlaIncome = $totlaIncome+floatval($_POST['Others_1']+$_POST['SanchaypatraIncome_1']);
    	
    	if($totlaIncome>400000){
	    	$data['status'] = "failed";
			$data['msg'] = Yii::t("assets","Your income crossed 4 lac. Update failed!!");
			Yii::app()->user->setFlash('alert_failed', Yii::t("assets","Your income has crossed 4 lac BDT because of that you are not eligible for IT GHA 2020"));
			//Yii::app()->user->setFlash('alert_success', Yii::t("income","Successfully Stored"));
			echo json_encode($data);
			return;
	
	    }

		//Sum of total amount income
		//$TotalAmountIncome = $_POST['InterestFromMutualFund_1'] + $_POST['CashDividend_1'] + $_POST['InterestIncomeFromWEDB_1'] + $_POST['USDollarPremium_1'] + $_POST['PoundSterlingPremium_1'] + $_POST['EuroPremium_1'] + $_POST['InvestmentInInstrument'] + $_POST['InterestFromInstrument_1'] + $_POST['Others_1'];
		$TotalAmountIncome =  $_POST['Others_1'] + $_POST['SanchaypatraIncome'];

		//Sum of taxable income
		$Cost = $_POST['Others'] + $_POST['SanchaypatraIncome_1'];

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

		

		$model->SanchaypatraIncome = $_POST['SanchaypatraIncome'];
		$model->SanchaypatraIncome_1 = $_POST['SanchaypatraIncome_1'];

		$model->TDSFromSanchaypatra = $_POST['TDSFromSanchaypatra'];


		$model->Others_1 = $_POST['Others_1'];
		$model->Others = $_POST['Others'];

		$model->TotalAmountIncome = $TotalAmountIncome;
		$model->Cost = $Cost;
		$model->IncomeId = $_POST['IncomeId'];


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
			
			"SanchaypatraIncome" => $_POST['SanchaypatraIncome'],
			"SanchaypatraIncome_1" => $_POST['SanchaypatraIncome_1'],

			"TDSFromSanchaypatra" => $_POST['TDSFromSanchaypatra'],

			"Others_1" => $_POST['Others_1'],
			"Others" => $_POST['Others'],

			"TotalAmountIncome" => $TotalAmountIncome,
			"Cost" => $Cost,

			'IncomeId' => $_POST['IncomeId'],			
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}

	$data['status'] = "success";

	$data['msg'] = Yii::t("income","Successfully Stored");
	Yii::app()->user->setFlash('alert_success', Yii::t("income","Successfully Stored"));
	echo json_encode($data);
	
}
function checkNumeric ($val) {
	if ( $val == "" || !is_numeric($val) ||  $val<0 ) {
		return 0;
	}
	else {
		return $val;
	}
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




		//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%END%%%%%%%%%|><SaveFrcOfOtherSource><|%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%



//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% START %%%%%%%%%|><Save Income Tax Deducted Source><|%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
public function ActionSaveFrcOfIncomeTaxDeductedSource()
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
		
		if($_POST['IncIncomeTaxDeductedAtSource_Cost'] == "" || !is_numeric($_POST['IncIncomeTaxDeductedAtSource_Cost']))
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

	if($_POST['IncIncomeTaxDeductedAtSourceId'] == "notSet")
	{
		//NEW ENTRY
		$model=new $_POST['model'];

		// $model->Type 					= $_POST['IncForeignIncome_Type'];
		$model->Description 			= $_POST['IncIncomeTaxDeductedAtSource_Description'];
		$model->Cost 					= $_POST['IncIncomeTaxDeductedAtSource_Cost'];
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
		$model->updateByPk($_POST['IncIncomeTaxDeductedAtSourceId'], array(
			// 'Type' 					=> $_POST['IncForeignIncome_Type'],
			'Description' 			=> $_POST['IncIncomeTaxDeductedAtSource_Description'],
			'Cost' 					=> $_POST['IncIncomeTaxDeductedAtSource_Cost'],
			'IncomeId' 				=> $_POST['IncomeId'],			
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}


	$data['status'] = "success";

	$data['msg'] = Yii::t("income","Successfully Stored");
	Yii::app()->user->setFlash('alert_success', Yii::t("income","Successfully Stored"));
	echo json_encode($data);
	
}

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% End %%%%%%%%%|><Save Income Tax Deducted Source><|%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%



//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% START %%%%%%%%%|><Save Income Tax In Advance><|%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
public function ActionSaveFrcOfIncomeTaxInAdvance()
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
		
		if($_POST['IncIncomeTaxInAdvance_Cost'] == "" || !is_numeric($_POST['IncIncomeTaxInAdvance_Cost']))
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("income","Income must be a number");
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

	if($_POST['IncIncomeTaxInAdvanceId'] == "notSet")
	{
		//NEW ENTRY
		$model=new $_POST['model'];

		// $model->Type 					= $_POST['IncForeignIncome_Type'];
		$model->Description 			= $_POST['IncIncomeTaxInAdvance_Description'];
		$model->Cost 					= $_POST['IncIncomeTaxInAdvance_Cost'];
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
		$model->updateByPk($_POST['IncIncomeTaxInAdvanceId'], array(
			// 'Type' 					=> $_POST['IncForeignIncome_Type'],
			'Description' 			=> $_POST['IncIncomeTaxInAdvance_Description'],
			'Cost' 					=> $_POST['IncIncomeTaxInAdvance_Cost'],
			'IncomeId' 				=> $_POST['IncomeId'],			
			'LastUpdateAt' => date("Y-m-d H:i:s")
			));
	}


	$data['status'] = "success";

	$data['msg'] = Yii::t("income","Successfully Stored");
	Yii::app()->user->setFlash('alert_success', Yii::t("income","Successfully Stored"));
	echo json_encode($data);
	
}

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% END %%%%%%%%%|><Save Income Tax In Advance><|%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%




public function ActionGetDataForEdit() {
	$get_data=$_POST['model']::model()->findByPk($_POST['id']);
	echo CJSON::encode($get_data);
}

public function ActionDeleteData() {
	$get = $_POST['model']::model()->findByPk($_POST['id']);

	// var_dump($_POST['field']);die;

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

		if($_POST['field']=='IncomeAgriculture'){
			$model2->updateByPk($get->IncomeId, array(
				$_POST['field']."BooksOfAccount" => null,
			));
		}	
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
			return $val2 = $model->$val.Yii::t("income", $this->currency);
		}

		elseif($model->$FOrT == "Fraction") {
			return $val2 = $Inc::model()->find(array(  'select'=>'SUM(Cost) as '.$sumOf, 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$model->IncomeId) ) )->$sumOf.Yii::t("income", $this->currency);
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

public function actionSaveScheduleDetails(){
	return $_REQUEST['Sales'];
}





}
