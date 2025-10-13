<?php

class IncomeHousePropertiesController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/columnLess';
public $defaultAction = 'admin';
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
            	'actions' => array('index', 'entry', 'update', 'view', 'admin', 'delete'),
            	'users' => array('@'),
            	'expression' => '(Yii::app()->user->role==="superAdmin")||(Yii::app()->user->role==="customers")||(Yii::app()->user->role==="companyUser")||(Yii::app()->user->role==="companyAdmin")',
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
public function actionEntry()
{
	$model=new IncomeHouseProperties;

	$CalculationModel = CalculationDataSource::model()->find('EntryYear=:data',array(':data'=>$this->taxYear() ));



// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

	if(isset($_POST['IncomeHouseProperties']))
	{
		$model->attributes=$_POST['IncomeHouseProperties'];

		$incomeModel = Income::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear() ));

		$model->IncomeId = $incomeModel->IncomeId;

		if($model->save()) {
			$model2=new Income;
			$model2->updateByPk($model->IncomeId, array(
				"IncomeHousePropertiesConfirm" => "Yes",
				'LastUpdateAt' => date("Y-m-d H:i:s")
			));
			Yii::app()->user->setFlash('alert_success', Yii::t("assets","Successfully Stored"));
			$this->redirect($this->createUrl('income/entry#s_11'));
		}
	}

	$this->render('create',array(
		'model'=>$model,
		'CalculationModel'=>$CalculationModel,
		));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
	$CalculationModel = CalculationDataSource::model()->find('EntryYear=:data',array(':data'=>$this->taxYear() ));
	$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

	if(isset($_POST['IncomeHouseProperties']))
	{
		$model->attributes=$_POST['IncomeHouseProperties'];
		$model->LastUpdateAt=date('Y-m-d G:i:s');
		if($model->save())
			// $this->redirect(array('view','id'=>$model->IncomePropertiesId));
						Yii::app()->user->setFlash('alert_success', Yii::t("alert_message","Successfully Stored"));
			$this->redirect($this->createUrl('income/entry#s_11'));
	}

	$this->render('update',array(
		'model'=>$model,
		'CalculationModel'=>$CalculationModel,
		));
}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/


public function actionDelete($id)
{

// we only allow deletion via POST request
	$model3=IncomeHouseProperties::model()->findbyattributes(array('IncomePropertiesId'=>$id));
	
	$this->loadModel($id)->delete();


	$model2=new Income;
	$model2->updateByPk($model3->IncomeId, array(
		"IncomeHousePropertiesConfirm" => NULL,
		'LastUpdateAt' => date("Y-m-d H:i:s")
		));
				Yii::app()->user->setFlash('alert_success', Yii::t("alert_message","Successfully Removed"));
	$this->redirect($this->createUrl('income/entry#s_11'));

}

/**
* Lists all models.
*/
public function actionIndex()
{
	$dataProvider=new CActiveDataProvider('IncomeHouseProperties');
	$this->render('index',array(
		'dataProvider'=>$dataProvider,
		));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
	$model=new IncomeHouseProperties('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['IncomeHouseProperties']))
	$model->attributes=$_GET['IncomeHouseProperties'];

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
	$model=IncomeHouseProperties::model()->findByPk($id);
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
	if(isset($_POST['ajax']) && $_POST['ajax']==='income-house-properties-form')
	{
		echo CActiveForm::validate($model);
		Yii::app()->end();
	}
}
}
