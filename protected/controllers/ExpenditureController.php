<?php

class ExpenditureController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
//public $layout='//layouts/column2';
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
public function accessRules()
{
	return array(
array('allow',  // allow all users to perform 'index' and 'view' actions
	'actions'=>array('index','view'),
	'users'=>array('*'),
	),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
	'actions'=>array('entry','update', 'setNo', 'saveInfo', 'saveFractionInfo', 'getDataForEdit', 'deleteData', 'review', 'startup', 'deleteParticularFieldData','copyLastyear'),
	'users'=>array('@'),
	),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
	'actions'=>array('admin','delete'),
	'users'=>array('admin'),
	),
array('deny',  // deny all users
	'users'=>array('*'),
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
public function actionStartup()
{
	$model = $this->loadModelByCPIIdYear(Yii::app()->user->CPIId, $this->taxYear());
	if($model != null)
	{
		$this->redirect(array('entry'));
	}
	$last_tax_year = $this->lastTaxYear();

	$this->render('startup',array(
		'last_tax_year' => $last_tax_year,
		));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionEntry()
{
	$model2 = new ExpPersonalFooding;
	$model3 = new ExpAccommodation;
	$model4 = new ExpTransport;
	$model5 = new ExpElectricityBill;
	$model6 = new ExpWasaBill;
	$model7 = new ExpGasBill;
	$model8 = new ExpTelephoneBill;
	$model9 = new ExpChildrenEducation;
	$model10 = new ExpPersonalForeignTravel;
	$model11 = new ExpFestivalOtherSpecial;
	//$model=new Expenditure;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);
$model = $this->loadModelByCPIIdYear(Yii::app()->user->CPIId, $this->taxYear());
if($model == null)
{
		$model=new Expenditure;
		$_POST['Expenditure']['CPIId'] = Yii::app()->user->CPIId;
		$_POST['Expenditure']['CerateAt'] = date("Y-m-d H:i:s");
		$_POST['Expenditure']['EntryYear'] = $this->taxYear();
		$model->attributes=$_POST['Expenditure'];
		$model->save();

		//$this->redirect(array('startup'));
}
/*if($model->PersonalFoodingExpenses != "" && $model->TotalTaxPaidLastYear == "" && $model->AccommodationExpenses != "" && $model->TransportExpenses != "" && $model->ResidenceElectricityBill != "" && $model->ResidenceWasaBill != "" && $model->ResidenceGasBill != "" && $model->ResidenceTelephoneBill != "" && $model->ChildrenEducationExpenses != "" && $model->PersonalForeignTravelExpenses != "" && $model->FestivalNOtherSpecialExpenses != "")
{
	$this->redirect(array('review'));
}*/


	$this->render('entry',array(
		'model'=>$model,
		'model2'=>$model2,
		'model3'=>$model3,
		'model4'=>$model4,
		'model5'=>$model5,
		'model6'=>$model6,
		'model7'=>$model7,
		'model8'=>$model8,
		'model9'=>$model9,
		'model10'=>$model10,
		'model11'=>$model11
	));
}


public function loadModel($id)
{
	$model=Expenditure::model()->findByPk($id);
	if($model===null)
		throw new CHttpException(404,'The requested page does not exist.');
	return $model;
}

public function loadModelByCPIIdYear($CPIId, $year)
{
	$model=Expenditure::model()->findbyattributes(array('CPIId'=>$CPIId, 'EntryYear' => $year));
	return $model;
}

public function ActionSetNo() {
	$model2=new Expenditure;
	$model2->updateByPk($_POST['ExpenditureId'], array(
	    $_POST['field']."Confirm" => "No",
	    $_POST['field']."FOrT" => null,
	    $_POST['field']."Total" => null,
	    'LastUpdateAt' => date("Y-m-d H:i:s")
	));
	$data['status'] = "success";
	$data['msg'] = Yii::t("common","Successfully Set to No");
	Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Set to No"));
	echo json_encode($data);
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
		if($_POST['value'] == "" || !is_numeric($_POST['value']))
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("expense","Data must be a number");
			die(json_encode($data));
		}

		$get_data=Expenditure::model()->findByPk($_POST['ExpenditureId']);
		if($get_data == null)
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("common","No data found");
			die(json_encode($data));
		}
		if(strlen($_POST['comment']) >20)
        {
            $data['status'] = "failed";
            $data['msg'] = Yii::t("common","Comment content must be less than 20 characters");
            die(json_encode($data));
        }
	}

	$model=new Expenditure;
	
####################### UPDATE ##########################
	if($_POST['field_name'] == "TotalTaxPaidLastYear") {
		$model->updateByPk($_POST['ExpenditureId'], array(
			$_POST['field_name']."Confirm" => "Yes",
		    $_POST['field_name'] => $_POST['value'],
            $_POST['field_name']."Comment" => $_POST['comment'],
		    'LastUpdateAt' => date("Y-m-d H:i:s"),
            $_POST['field_name'] => $_POST['value'],
		));
	}
	else {
		$model->updateByPk($_POST['ExpenditureId'], array(
			$_POST['field_name']."Confirm" => "Yes",
		    $_POST['field_name']."FOrT" => "Total",
		    $_POST['field_name']."Total" => $_POST['value'],
            $_POST['field_name']."Comment" => $_POST['comment'],
		    'LastUpdateAt' => date("Y-m-d H:i:s"),
            $_POST['field_name'] => $_POST['value'],
		));
	}
	

	$data['status'] = "success";
	$data['msg'] = Yii::t("common","Successfully Stored");
	Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Stored"));
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
		if($_POST['cost'] == "" || !is_numeric($_POST['cost']) || $_POST['description'] == "")
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("expense","Description and Cost are required. Cost must be a number");
			die(json_encode($data));
		}

		$get_data=Expenditure::model()->findByPk($_POST['ExpenditureId']);
		if($get_data == null)
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("common","No data found");
			die(json_encode($data));
		}
        if(strlen($_POST['comment']) >20)
        {
            $data['status'] = "failed";
            $data['msg'] = Yii::t("common","Comment content must be less than 20 characters");
            die(json_encode($data));
        }
	}
	if($_POST['id'] == "")
	{
		//NEW ENTRY
		$model=new $_POST['model'];
		$_POST['d']['ExpenditureId'] = $_POST['ExpenditureId'];
		$_POST['d']['Description'] = $_POST['description'];
		$_POST['d']['Cost'] = $_POST['cost'];
		$_POST['d']['CerateAt'] = date("Y-m-d H:i:s");
		$model->attributes=$_POST['d'];
		$model->save();

		$model2=new Expenditure;
		$model2->updateByPk($_POST['ExpenditureId'], array(
		    $_POST['field_name']."Confirm" => "Yes",
		    $_POST['field_name']."FOrT" => "Fraction",
            $_POST['field_name']."Comment" => $_POST['comment'],
		    $_POST['field_name']."Total" => null,
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

        $model2=new Expenditure;
        $model2->updateByPk($_POST['ExpenditureId'], array(

            $_POST['field_name']."Comment" => $_POST['comment']

        ));
	}


	$data['status'] = "success";

	$data['msg'] = Yii::t("common","Successfully Stored");
	Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Stored"));
	echo json_encode($data);
	
}

public function ActionGetDataForEdit() {
	$get_data=$_POST['model']::model()->findByPk($_POST['id']);
	echo CJSON::encode($get_data);
}

public function ActionDeleteData() {
	$get = $_POST['model']::model()->findByPk($_POST['id']);

	$_POST['model']::model()->findByPk($_POST['id'])->delete();

	$counter = $_POST['model']::model()->count('ExpenditureId=:data',array(':data'=>$get->ExpenditureId));

	if($counter == 0) {
		$model2=new Expenditure;
		$model2->updateByPk($get->ExpenditureId, array(
		    $_POST['field']."Confirm" => null,
		    $_POST['field']."FOrT" => null,
		    $_POST['field']."Total" => null,
            $_POST['field']."Comment" => null,
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));
	}

	$data['status'] = "success";
	$data['msg'] = "Successfully Deleted";
	Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Removed"));
	echo json_encode($data);
}

public function ActionDeleteParticularFieldData() {
	
		$model2=new Expenditure;
		$model2->updateByPk($_POST['ExpenditureId'], array(
		    $_POST['field']."Confirm" => null,
		    $_POST['field']."FOrT" => null,
		    $_POST['field']."Total" => null,
            $_POST['field']."Comment" => null,
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));

	$data['status'] = "success";
	$data['msg'] = "Successfully Deleted";
	Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Removed"));
	echo json_encode($data);
}

public function actionReview()
{
	$model = $this->loadModelByCPIIdYear(Yii::app()->user->CPIId, $this->taxYear());
	if($model == null) $this->redirect(array('startup'));
	$this->render('review',array(
		'model'=>$model,
	));
}
function checkActiveInactive($model, $confirm, $FOrT, $model2, $total) {
    $isAnswered = 0;
    if($model->$confirm == null) {
        //blank
    }
    elseif($model->$confirm == "No") {
        $isAnswered = 1;
    }
    elseif($model->$confirm == "Yes") {
        if($model->$FOrT == "Fraction") {
            $counter = $model2::model()->count('ExpenditureId=:data',array(':data'=>$model->ExpenditureId));
            if($counter > 0) $isAnswered = 1;
        }
        elseif($model->$FOrT == "Total") {
            if($model->$total != null) $isAnswered = 1;
        } 
    }
    return $isAnswered;
}

function sum_of_particular_field($model, $field, $table) {
	if($model == null) return Yii::t("expense", "Not answered yet");
	if($model->{$field."Confirm"} == "Yes") {
		if($model->{$field."FOrT"} == "Total") {
			return $model->{$field."Total"};
		}
		elseif($model->{$field."FOrT"} == "Fraction") {
			$cost = Yii::app()->db->createCommand()
			->select('SUM(Cost) AS Cost')
			->from($table)
			->where('ExpenditureId=:ExpenditureId', array(':ExpenditureId'=>$model->ExpenditureId)) 
			->queryRow();
			return $cost['Cost'];
		}
		else {
			return Yii::t("expense", "Not answered yet");
		}
	}
	elseif($model->{$field."Confirm"} == "No") {
		return Yii::t("expense", "You chose No");
	}
	else {
		return Yii::t("expense", "Not answered yet");
	}
}

protected function lastTaxYear() {

	$currentMonth = date('m');

	$startMonth = 7;
	$taxYear = '';
	$presentYear = date("Y",strtotime('last year'));

	$lastYear = ($presentYear - 1);
	$nextYear = ($presentYear + 1);

	if ($currentMonth < $startMonth) {

		$taxYear = $lastYear . "-" . $presentYear;

	} else {
		$taxYear = $presentYear . "-" . $nextYear;
	}

	return $taxYear;
}
public function actionCopyLastyear(){
	try{
		try{
			$ly_Expenditure = Expenditure::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->lastTaxYear() ));
			$old_Expenditure_id = $ly_Expenditure->ExpenditureId;
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			if( $ly_Expenditure != null ){
				$clone_Expenditure = new Expenditure();
				$clone_Expenditure->setAttributes($ly_Expenditure->getAttributes(), false);
				$clone_Expenditure->ExpenditureId = null;
				$clone_Expenditure->EntryYear = $this->taxYear();
				$clone_Expenditure->save(false);
				$Expenditure_id = $clone_Expenditure->ExpenditureId;
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_ExpAccommodation = ExpAccommodation::model()->findAll('ExpenditureId=:data',array(':data'=>$old_Expenditure_id));
			if( isset($ly_ExpAccommodation) && $ly_ExpAccommodation != null ){
				foreach($ly_ExpAccommodation as $data){
					$clone_ExpAccommodation = new ExpAccommodation();
					$clone_ExpAccommodation->setAttributes($data->getAttributes(), false);
					$clone_ExpAccommodation->Id = null;
					$clone_ExpAccommodation->ExpenditureId = $Expenditure_id;
					$clone_ExpAccommodation->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_ExpChildrenEducation = ExpChildrenEducation::model()->findAll('ExpenditureId=:data',array(':data'=>$old_Expenditure_id));
			if( isset($ly_ExpChildrenEducation) && $ly_ExpChildrenEducation != null ){
				foreach($ly_ExpChildrenEducation as $data){
					$clone_ExpChildrenEducation = new ExpChildrenEducation();
					$clone_ExpChildrenEducation->setAttributes($data->getAttributes(), false);
					$clone_ExpChildrenEducation->Id = null;
					$clone_ExpChildrenEducation->ExpenditureId = $Expenditure_id;
					$clone_ExpChildrenEducation->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_ExpDonation = ExpDonation::model()->findAll('ExpenditureId=:data',array(':data'=>$old_Expenditure_id));
			if( isset($ly_ExpDonation) && $ly_ExpDonation != null ){
				foreach($ly_ExpDonation as $data){
					$clone_ExpDonation = new ExpDonation();
					$clone_ExpDonation->setAttributes($data->getAttributes(), false);
					$clone_ExpDonation->Id = null;
					$clone_ExpDonation->ExpenditureId = $Expenditure_id;
					$clone_ExpDonation->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_ExpElectricityBill = ExpElectricityBill::model()->findAll('ExpenditureId=:data',array(':data'=>$old_Expenditure_id));
			if( isset($ly_ExpElectricityBill) && $ly_ExpElectricityBill != null ){
				foreach($ly_ExpElectricityBill as $data){
					$clone_ExpElectricityBill = new ExpElectricityBill();
					$clone_ExpElectricityBill->setAttributes($data->getAttributes(), false);
					$clone_ExpElectricityBill->Id = null;
					$clone_ExpElectricityBill->ExpenditureId = $Expenditure_id;
					$clone_ExpElectricityBill->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_ExpFestivalOtherSpecial = ExpFestivalOtherSpecial::model()->findAll('ExpenditureId=:data',array(':data'=>$old_Expenditure_id));
			if( isset($ly_ExpFestivalOtherSpecial) && $ly_ExpFestivalOtherSpecial != null ){
				foreach($ly_ExpFestivalOtherSpecial as $data){
					$clone_ExpFestivalOtherSpecial = new ExpFestivalOtherSpecial();
					$clone_ExpFestivalOtherSpecial->setAttributes($data->getAttributes(), false);
					$clone_ExpFestivalOtherSpecial->Id = null;
					$clone_ExpFestivalOtherSpecial->ExpenditureId = $Expenditure_id;
					$clone_ExpFestivalOtherSpecial->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_ExpGasBill = ExpGasBill::model()->findAll('ExpenditureId=:data',array(':data'=>$old_Expenditure_id));
			if( isset($ly_ExpGasBill) && $ly_ExpGasBill != null ){
				foreach($ly_ExpGasBill as $data){
					$clone_ExpGasBill = new ExpGasBill();
					$clone_ExpGasBill->setAttributes($data->getAttributes(), false);
					$clone_ExpGasBill->Id = null;
					$clone_ExpGasBill->ExpenditureId = $Expenditure_id;
					$clone_ExpGasBill->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_ExpGiftDonationContribution = ExpGiftDonationContribution::model()->findAll('ExpenditureId=:data',array(':data'=>$old_Expenditure_id));
			if( isset($ly_ExpGiftDonationContribution) && $ly_ExpGiftDonationContribution != null ){
				foreach($ly_ExpGiftDonationContribution as $data){
					$clone_ExpGiftDonationContribution = new ExpGiftDonationContribution();
					$clone_ExpGiftDonationContribution->setAttributes($data->getAttributes(), false);
					$clone_ExpGiftDonationContribution->Id = null;
					$clone_ExpGiftDonationContribution->ExpenditureId = $Expenditure_id;
					$clone_ExpGiftDonationContribution->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_ExpHoliday = ExpHoliday::model()->findAll('ExpenditureId=:data',array(':data'=>$old_Expenditure_id));
			if( isset($ly_ExpHoliday) && $ly_ExpHoliday != null ){
				foreach($ly_ExpHoliday as $data){
					$clone_ExpHoliday = new ExpHoliday();
					$clone_ExpHoliday->setAttributes($data->getAttributes(), false);
					$clone_ExpHoliday->Id = null;
					$clone_ExpHoliday->ExpenditureId = $Expenditure_id;
					$clone_ExpHoliday->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_ExpLossDeductions = ExpLossDeductions::model()->findAll('ExpenditureId=:data',array(':data'=>$old_Expenditure_id));
			if( isset($ly_ExpLossDeductions) && $ly_ExpLossDeductions != null ){
				foreach($ly_ExpLossDeductions as $data){
					$clone_ExpLossDeductions = new ExpLossDeductions();
					$clone_ExpLossDeductions->setAttributes($data->getAttributes(), false);
					$clone_ExpLossDeductions->Id = null;
					$clone_ExpLossDeductions->ExpenditureId = $Expenditure_id;
					$clone_ExpLossDeductions->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_ExpOther = ExpOther::model()->findAll('ExpenditureId=:data',array(':data'=>$old_Expenditure_id));
			if( isset($ly_ExpOther) && $ly_ExpOther != null ){
				foreach($ly_ExpOther as $data){
					$clone_ExpOther = new ExpOther();
					$clone_ExpOther->setAttributes($data->getAttributes(), false);
					$clone_ExpOther->Id = null;
					$clone_ExpOther->ExpenditureId = $Expenditure_id;
					$clone_ExpOther->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_ExpOtherHousehold = ExpOtherHousehold::model()->findAll('ExpenditureId=:data',array(':data'=>$old_Expenditure_id));
			if( isset($ly_ExpOtherHousehold) && $ly_ExpOtherHousehold != null ){
				foreach($ly_ExpOtherHousehold as $data){
					$clone_ExpOtherHousehold = new ExpOtherHousehold();
					$clone_ExpOtherHousehold->setAttributes($data->getAttributes(), false);
					$clone_ExpOtherHousehold->Id = null;
					$clone_ExpOtherHousehold->ExpenditureId = $Expenditure_id;
					$clone_ExpOtherHousehold->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_ExpOtherSpecial = ExpOtherSpecial::model()->findAll('ExpenditureId=:data',array(':data'=>$old_Expenditure_id));
			if( isset($ly_ExpOtherSpecial) && $ly_ExpOtherSpecial != null ){
				foreach($ly_ExpOtherSpecial as $data){
					$clone_ExpOtherSpecial = new ExpOtherSpecial();
					$clone_ExpOtherSpecial->setAttributes($data->getAttributes(), false);
					$clone_ExpOtherSpecial->Id = null;
					$clone_ExpOtherSpecial->ExpenditureId = $Expenditure_id;
					$clone_ExpOtherSpecial->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_ExpOtherTransport = ExpOtherTransport::model()->findAll('ExpenditureId=:data',array(':data'=>$old_Expenditure_id));
			if( isset($ly_ExpOtherTransport) && $ly_ExpOtherTransport != null ){
				foreach($ly_ExpOtherTransport as $data){
					$clone_ExpOtherTransport = new ExpOtherTransport();
					$clone_ExpOtherTransport->setAttributes($data->getAttributes(), false);
					$clone_ExpOtherTransport->Id = null;
					$clone_ExpOtherTransport->ExpenditureId = $Expenditure_id;
					$clone_ExpOtherTransport->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_ExpPersonalFooding = ExpPersonalFooding::model()->findAll('ExpenditureId=:data',array(':data'=>$old_Expenditure_id));
			if( isset($ly_ExpPersonalFooding) && $ly_ExpPersonalFooding != null ){
				foreach($ly_ExpPersonalFooding as $data){
					$clone_ExpPersonalFooding = new ExpPersonalFooding();
					$clone_ExpPersonalFooding->setAttributes($data->getAttributes(), false);
					$clone_ExpPersonalFooding->Id = null;
					$clone_ExpPersonalFooding->ExpenditureId = $Expenditure_id;
					$clone_ExpPersonalFooding->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_ExpPersonalForeignTravel = ExpPersonalForeignTravel::model()->findAll('ExpenditureId=:data',array(':data'=>$old_Expenditure_id));
			if( isset($ly_ExpPersonalForeignTravel) && $ly_ExpPersonalForeignTravel != null ){
				foreach($ly_ExpPersonalForeignTravel as $data){
					$clone_ExpPersonalForeignTravel = new ExpPersonalForeignTravel();
					$clone_ExpPersonalForeignTravel->setAttributes($data->getAttributes(), false);
					$clone_ExpPersonalForeignTravel->Id = null;
					$clone_ExpPersonalForeignTravel->ExpenditureId = $Expenditure_id;
					$clone_ExpPersonalForeignTravel->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_ExpSurchargeOther = ExpSurchargeOther::model()->findAll('ExpenditureId=:data',array(':data'=>$old_Expenditure_id));
			if( isset($ly_ExpSurchargeOther) && $ly_ExpSurchargeOther != null ){
				foreach($ly_ExpSurchargeOther as $data){
					$clone_ExpSurchargeOther = new ExpSurchargeOther();
					$clone_ExpSurchargeOther->setAttributes($data->getAttributes(), false);
					$clone_ExpSurchargeOther->Id = null;
					$clone_ExpSurchargeOther->ExpenditureId = $Expenditure_id;
					$clone_ExpSurchargeOther->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_ExpTaxAtSource = ExpTaxAtSource::model()->findAll('ExpenditureId=:data',array(':data'=>$old_Expenditure_id));
			if( isset($ly_ExpTaxAtSource) && $ly_ExpTaxAtSource != null ){
				foreach($ly_ExpTaxAtSource as $data){
					$clone_ExpTaxAtSource = new ExpTaxAtSource();
					$clone_ExpTaxAtSource->setAttributes($data->getAttributes(), false);
					$clone_ExpTaxAtSource->Id = null;
					$clone_ExpTaxAtSource->ExpenditureId = $Expenditure_id;
					$clone_ExpTaxAtSource->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_ExpTelephoneBill = ExpTelephoneBill::model()->findAll('ExpenditureId=:data',array(':data'=>$old_Expenditure_id));
			if( isset($ly_ExpTelephoneBill) && $ly_ExpTelephoneBill != null ){
				foreach($ly_ExpTelephoneBill as $data){
					$clone_ExpTelephoneBill = new ExpTelephoneBill();
					$clone_ExpTelephoneBill->setAttributes($data->getAttributes(), false);
					$clone_ExpTelephoneBill->Id = null;
					$clone_ExpTelephoneBill->ExpenditureId = $Expenditure_id;
					$clone_ExpTelephoneBill->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_ExpTransport = ExpTransport::model()->findAll('ExpenditureId=:data',array(':data'=>$old_Expenditure_id));
			if( isset($ly_ExpTransport) && $ly_ExpTransport != null ){
				foreach($ly_ExpTransport as $data){
					$clone_ExpTransport = new ExpTransport();
					$clone_ExpTransport->setAttributes($data->getAttributes(), false);
					$clone_ExpTransport->Id = null;
					$clone_ExpTransport->ExpenditureId = $Expenditure_id;
					$clone_ExpTransport->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_ExpWasaBill = ExpWasaBill::model()->findAll('ExpenditureId=:data',array(':data'=>$old_Expenditure_id));
			if( isset($ly_ExpWasaBill) && $ly_ExpWasaBill != null ){
				foreach($ly_ExpWasaBill as $data){
					$clone_ExpWasaBill = new ExpWasaBill();
					$clone_ExpWasaBill->setAttributes($data->getAttributes(), false);
					$clone_ExpWasaBill->Id = null;
					$clone_ExpWasaBill->ExpenditureId = $Expenditure_id;
					$clone_ExpWasaBill->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
	}catch(Exception $e){
		// echo $e;
		$this->redirect(array('entry'));
	}
	$this->render('copy_startup');
}
}
