<?php

class LiabilitiesController extends Controller
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
            	'actions' => array('index', 'create', 'update', 'setNo', 'saveInfo', 'saveFractionInfo', 'getDataForEdit', 'deleteData', 'review', 'startup', 'entry', 'deleteParticularFieldData','copyLastyear'),
            	'users' => array('@'),
            	'expression' => '(Yii::app()->user->role==="superAdmin")||(Yii::app()->user->role==="customers")||(Yii::app()->user->role==="companyUser")||(Yii::app()->user->role==="companyAdmin")',
            	),
            array('deny', // deny all users
            	'users' => array('*'),
            	),
            );
}

public function actionStartup()
{
	$model = $this->loadModelByUserYear(Yii::app()->user->CPIId, $this->taxYear());
	if($model != null)
	{
		$this->redirect(array('entry'));
	}

	$last_tax_year = $this->lastTaxYear();

	$this->render('startup',array(
		'last_tax_year' => $last_tax_year,
		));
}

public function actionEntry()
{
	$model2 = new LiaMortgagesOnProperty;
	$model3 = new LiaUnsecuredLoans;
	$model4 = new LiaBankLoans;
	$model5 = new LiaOthersLoan;


$model = $this->loadModelByUserYear(Yii::app()->user->CPIId, $this->taxYear());
if($model == null)
{
		$model=new Liabilities;
		$_POST['Liabilities']['CPIId'] = Yii::app()->user->CPIId;
		$_POST['Liabilities']['CerateAt'] = date("Y-m-d H:i:s");
		$_POST['Liabilities']['EntryYear'] = $this->taxYear();
		$model->attributes=$_POST['Liabilities'];
		$model->save();
}


	$this->render('entry',array(
		'model'=>$model,
		'model2'=>$model2,
		'model3'=>$model3,
		'model4'=>$model4,
		'model5'=>$model5
	));
}


public function loadModel($id)
{
	$model=Liabilities::model()->findByPk($id);
	if($model===null)
		throw new CHttpException(404,'The requested page does not exist.');
	return $model;
}

public function loadModelByUserYear($CPIId, $year)
{
	$model=Liabilities::model()->findbyattributes(array('CPIId'=>$CPIId, 'EntryYear' => $year));
	return $model;
}

protected function performAjaxValidation($model)
{
	if(isset($_POST['ajax']) && $_POST['ajax']==='liabilities-form')
	{
		echo CActiveForm::validate($model);
		Yii::app()->end();
	}
}


public function ActionSetNo() {
	$model2=new Liabilities;
	$model2->updateByPk($_POST['LiabilityId'], array(
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
			$data['msg'] = Yii::t("liability","Data must be a number");
			die(json_encode($data));
		}

		$get_data=Liabilities::model()->findByPk($_POST['LiabilityId']);
		if($get_data == null)
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("common","No data found");
			die(json_encode($data));
		}
	}

	$model=new Liabilities;
	
####################### UPDATE ##########################
	
		$model->updateByPk($_POST['LiabilityId'], array(
			$_POST['field_name']."Confirm" => "Yes",
		    $_POST['field_name']."FOrT" => "Total",
		    $_POST['field_name']."Total" => $_POST['value'],
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));

	

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
			$data['msg'] = Yii::t("liability","Description and Cost are required. Cost must be a number");
			die(json_encode($data));
		}

		$get_data=Liabilities::model()->findByPk($_POST['LiabilityId']);
		if($get_data == null)
		{
			$data['status'] = "failed";
			$data['msg'] = Yii::t("common","No data found");
			die(json_encode($data));
		}
	}
	if($_POST['id'] == "")
	{
		//NEW ENTRY
		$model=new $_POST['model'];
		$_POST['d']['LiabilityId'] = $_POST['LiabilityId'];
		$_POST['d']['Description'] = $_POST['description'];
		$_POST['d']['Cost'] = $_POST['cost'];
		$_POST['d']['CerateAt'] = date("Y-m-d H:i:s");
		$model->attributes=$_POST['d'];
		$model->save();

		$model2=new Liabilities;
		$model2->updateByPk($_POST['LiabilityId'], array(
		    $_POST['field_name']."Confirm" => "Yes",
		    $_POST['field_name']."FOrT" => "Fraction",
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

	$counter = $_POST['model']::model()->count('LiabilityId=:data',array(':data'=>$get->LiabilityId));

	if($counter == 0) {
		$model2=new Liabilities;
		$model2->updateByPk($get->LiabilityId, array(
		    $_POST['field']."Confirm" => null,
		    $_POST['field']."FOrT" => null,
		    $_POST['field']."Total" => null,
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));
	}

	$data['status'] = "success";
	$data['msg'] = "Successfully Deleted";
	Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Removed"));
	echo json_encode($data);
}

public function ActionDeleteParticularFieldData() {
	
		$model2=new Liabilities;
		$model2->updateByPk($_POST['LiabilityId'], array(
		    $_POST['field']."Confirm" => null,
		    $_POST['field']."FOrT" => null,
		    $_POST['field']."Total" => null,
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));

	$data['status'] = "success";
	$data['msg'] = "Successfully Deleted";
	Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Removed"));
	echo json_encode($data);
}

public function actionReview()
{



	$model = $this->loadModelByUserYear(Yii::app()->user->CPIId, $this->taxYear());
	if($model == null) $this->redirect(array('startup'));
	$this->render('review',array(
		'model'=>$model
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
            $counter = $model2::model()->count('LiabilityId=:data',array(':data'=>$model->LiabilityId));
            if($counter > 0) $isAnswered = 1;
        }
        elseif($model->$FOrT == "Total") {
            if($model->$total != null) $isAnswered = 1;
        } 
    }
    return $isAnswered;
}

function sum_of_particular_field($model, $field, $table) {
	if($model == null) return Yii::t("liability", "Not answered yet");
	if($model->{$field."Confirm"} == "Yes") {
		if($model->{$field."FOrT"} == "Total") {
			return $model->{$field."Total"};
		}
		elseif($model->{$field."FOrT"} == "Fraction") {
			$cost = Yii::app()->db->createCommand()
			->select('SUM(Cost) AS Cost')
			->from($table)
			->where('LiabilityId=:LiabilityId', array(':LiabilityId'=>$model->LiabilityId)) 
			->queryRow();
			return $cost['Cost'];
		}
		else {
			return Yii::t("liability", "Not answered yet");
		}
	}
	elseif($model->{$field."Confirm"} == "No") {
		return Yii::t("liability", "You chose No");
	}
	else {
		return Yii::t("liability", "Not answered yet");
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
			$count_ly_Liabilities = Liabilities::model()->count('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->lastTaxYear() ));
			if(isset($count_ly_Liabilities) && $count_ly_Liabilities>1){
				$ly_Liabilities_ = Liabilities::model()->findAll('CPIId="'.Yii::app()->user->CPIId.'" and EntryYear="'.$this->lastTaxYear().'" order by LiabilityId DESC');
				$LiabilitiesId = $ly_Liabilities_[0]['LiabilityId'];
				$ly_Liabilities = Liabilities::model()->find('LiabilityId="'.$LiabilitiesId.'"');
			}else{
				$ly_Liabilities = Liabilities::model()->find('CPIId="'.Yii::app()->user->CPIId.'" and EntryYear="'.$this->lastTaxYear().'"');
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$old_Liabilities_id = $ly_Liabilities->LiabilityId;
			if( isset($ly_Liabilities) && $ly_Liabilities != null ){
				$clone_Liabilities = new Liabilities();
				$clone_Liabilities->setAttributes($ly_Liabilities->getAttributes(), false);
				$clone_Liabilities->LiabilityId = null;
				$clone_Liabilities->EntryYear = $this->taxYear();
				$clone_Liabilities->save(false);
				$liability_id = $clone_Liabilities->LiabilityId;
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_LiaBankLoans = LiaBankLoans::model()->findAll('LiabilityId=:data',array(':data'=>$old_Liabilities_id));
			if( isset($ly_LiaBankLoans) && $ly_LiaBankLoans != null ){
				foreach($ly_LiaBankLoans as $data){
					$clone_LiaBankLoans = new LiaBankLoans();
					$clone_LiaBankLoans->setAttributes($data->getAttributes(), false);
					$clone_LiaBankLoans->Id = null;
					$clone_LiaBankLoans->LiabilityId = $liability_id;
					$clone_LiaBankLoans->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_LiaMortgagesOnProperty = LiaMortgagesOnProperty::model()->findAll('LiabilityId=:data',array(':data'=>$old_Liabilities_id));
			if( isset($ly_LiaMortgagesOnProperty) && $ly_LiaMortgagesOnProperty != null ){
				foreach($ly_LiaMortgagesOnProperty as $data){
					$clone_LiaMortgagesOnProperty = new LiaMortgagesOnProperty();
					$clone_LiaMortgagesOnProperty->setAttributes($data->getAttributes(), false);
					$clone_LiaMortgagesOnProperty->Id = null;
					$clone_LiaMortgagesOnProperty->LiabilityId = $liability_id;
					$clone_LiaMortgagesOnProperty->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_LiaOthersLoan = LiaOthersLoan::model()->findAll('LiabilityId=:data',array(':data'=>$old_Liabilities_id));
			if( isset($ly_LiaOthersLoan) && $ly_LiaOthersLoan != null ){
				foreach($ly_LiaOthersLoan as $data){
					$clone_LiaOthersLoan = new LiaOthersLoan();
					$clone_LiaOthersLoan->setAttributes($data->getAttributes(), false);
					$clone_LiaOthersLoan->Id = null;
					$clone_LiaOthersLoan->LiabilityId = $liability_id;
					$clone_LiaOthersLoan->save(false);
				}
			}
		}catch(Exception $e){
			// echo $e;
		}	
		try{
			$ly_LiaUnsecuredLoans = LiaUnsecuredLoans::model()->findAll('LiabilityId=:data',array(':data'=>$old_Liabilities_id));
			if( isset($ly_LiaUnsecuredLoans) && $ly_LiaUnsecuredLoans != null ){
				foreach($ly_LiaUnsecuredLoans as $data){
					$clone_LiaUnsecuredLoans = new LiaUnsecuredLoans();
					$clone_LiaUnsecuredLoans->setAttributes($data->getAttributes(), false);
					$clone_LiaUnsecuredLoans->Id = null;
					$clone_LiaUnsecuredLoans->LiabilityId = $liability_id;
					$clone_LiaUnsecuredLoans->save(false);
				}
			} 
		}catch(Exception $e){
			// echo $e;
		}
	}catch(Exception $e){
		$this->redirect(array('entry'));
	}
		$this->render('copy_startup');
}

}
