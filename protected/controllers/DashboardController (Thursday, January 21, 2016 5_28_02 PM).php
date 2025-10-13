<?php

class DashboardController extends Controller {

	public $layout = '//layouts/columnLess';

	public function filters() {
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules() {
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('index', 'taxGrid'),
				'users' => array('@'),
				'expression' => '(Yii::app()->user->role==="superAdmin")||(Yii::app()->user->role==="customers")||(Yii::app()->user->role==="companyAdmin")||(Yii::app()->user->role==="companyUser")',
			),
			array('deny', // deny all users
				'users' => array('*'),
			),
		);
	}

	public function actionIndex() {

		if ($this->personalInformationStatusBar() == 100) {

			$role = Yii::app()->user->role;

			$CPIId = Yii::app()->user->CPIId;

			if ($CPIId == 'companyAdmin') {
				$this->redirect(array('customers/admin'));

			} else if ($CPIId == 'superAdmin') {
				$this->redirect(array('user/admin'));

			} else {

				$LinkHistory = LinkHistory::model()->find('user_id=:data', array(':data' => Yii::app()->user->id));

				if (Yii::app()->user->need_redirect == 1 && $LinkHistory != null && $role != 'companyAdmin' && $role != 'companyUser') {
					Yii::app()->user->setState('need_redirect', 0);
					$this->render('continue', array('role' => $role, 'present_link' => $LinkHistory->present_link));
				} else {
					$this->render('index', array('role' => $role));
				}

			}
		} else {
			$this->redirect(array('../index.php/personalInformation'));
		}
	}

	public function actionTaxGrid() {
		$role = Yii::app()->user->role;

		$this->render('taxGrid', array('role' => $role));

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