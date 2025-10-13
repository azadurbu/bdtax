<?php

class UserActivityLogController extends Controller
{

	public $layout='//layouts/columnLess';

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
	            	'actions' => array('index'),
	            	'users' => array('@'),
	            	'expression' => '(Yii::app()->user->role==="superAdmin")',
	            	),
	            array('deny', // deny all users
	            	'users' => array('*'),
	            	),
	            );
	}

	public function actionIndex()
	{
		$model = new UserActivityLog('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['UserActivityLog']))
		    $model->attributes = $_GET['UserActivityLog'];
		    //new added
		    if(!empty($_POST))
		    {
		        $model->from_date = $_POST['from_date'].' 00:00:01';
		        $model->to_date = $_POST['to_date'].' 23:59:59';
		    }

		    $this->render('admin', array(
		        'model' => $model,
		    ));
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
}