<?php

class DownloadPdfController extends Controller {

	public $layout = '//layouts/columnLess';

	public function filters() {
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules() {
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('index'),
				'users' => array('@'),
				'expression' => '(Yii::app()->user->role==="superAdmin")||(Yii::app()->user->role==="customers")||(Yii::app()->user->role==="companyAdmin")||(Yii::app()->user->role==="companyUser")',
			),
			array('deny', // deny all users
				'users' => array('*'),
			),
		);
	}

	public function actionIndex() {
		if(Yii::app()->user->CPIId !== 'companyAdmin'){
			$_SESSION['cpid'] = Yii::app()->user->CPIId;
			$this->render('index');
		}else{
			$this->redirect(array('customers/admin'));
		}
	}


	
}