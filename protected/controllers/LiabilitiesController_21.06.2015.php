<?php

class LiabilitiesController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/columnLess';
public $defaultAction = 'create';

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
            	'actions' => array('index', 'create', 'update', 'saveInfo', 'review'),
            	'users' => array('@'),
            	'expression' => '(Yii::app()->user->role==="superAdmin")||(Yii::app()->user->role==="customers")',
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
	$userCurrentLiabilities = $this->loadModelByUserYear(Yii::app()->user->CPIId, $this->taxYear());

	if (empty($userCurrentLiabilities)) {
		$model=new Liabilities;
		$model->CPIId = Yii::app()->user->CPIId;
		$model->CerateAt = date("Y-m-d H:i:s");
		$model->EntryYear = $this->taxYear();
		$model->save(false);

		$this->render('liabilityStart');
	}
	/*if($userCurrentLiabilities->MortgagesOnPropertyOrLand > 0 && $userCurrentLiabilities->UnsecuredLoans > 0 && $userCurrentLiabilities->BankLoans > 0 && $userCurrentLiabilities->OthersLoan > 0)
	{
		$this->redirect(array('review'));
	}*/
	$this->render('create',array('model'=>$userCurrentLiabilities));
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

		$get_data=Liabilities::model()->findByPk($_POST['LiabilityId']);
		if($get_data == null)
		{
			$data['status'] = "failed";
			$data['msg'] = "No data found";
			die(json_encode($data));
		}
	}

	$model=new Liabilities;
	
####################### UPDATE ##########################
	$model->updateByPk($_POST['LiabilityId'], array(
		$_POST['field_name'] => $_POST['value'],
		'LastUpdateAt' => date("Y-m-d H:i:s")
		));
	

	$get_data=Liabilities::model()->findByPk($_POST['LiabilityId']);
	$total = $get_data->MortgagesOnPropertyOrLand + $get_data->UnsecuredLoans + $get_data->BankLoans + $get_data->OthersLoan;

	$get_data->TotalLiabilities = $total;
	$get_data->save();


	$data['status'] = "success";
	$data['value'] = $get_data->{$_POST['field_name']};
	$data['msg'] = "Successfully Stored " . $data['value'] . ". You can change the value bellow and press Store.";
	echo json_encode($data);
	
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

	if(isset($_POST['Liabilities']))
	{
		$model->attributes=$_POST['Liabilities'];
		if($model->save())
			$this->redirect(array('view','id'=>$model->LiabilityId));
	}

	$this->render('update',array(
		'model'=>$model,
		));
}

public function actionReview()
{
	$model = $this->loadModelByUserYear(Yii::app()->user->CPIId, $this->taxYear());
	if($model == null) 
		$this->redirect(array('startup'));

	$this->render('review',array(
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
	$dataProvider=new CActiveDataProvider('Liabilities');
	$this->render('index',array(
		'dataProvider'=>$dataProvider,
		));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
	$model=new Liabilities('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Liabilities']))
	$model->attributes=$_GET['Liabilities'];

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
/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
	if(isset($_POST['ajax']) && $_POST['ajax']==='liabilities-form')
	{
		echo CActiveForm::validate($model);
		Yii::app()->end();
	}
}
}
