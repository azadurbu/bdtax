<?php

class AllOrgPaymentsController extends Controller
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

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users' => array('@'),
				'expression' => '(Yii::app()->user->role==="superAdmin")',
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users' => array('@'),
				'expression' => '(Yii::app()->user->role==="superAdmin")',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users' => array('@'),
				'expression' => '(Yii::app()->user->role==="superAdmin")',
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
		$payments = Payments::model()->findAll(array(
            'condition' => 'role_id = 3 AND org_id = :org_id',
            'params' => array(':org_id' => $id),
            'order' => 'payment_date DESC'
        ));

		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'payments' => $payments,
		));
	}

	

	
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('AllOrgPayments');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	
	public function actionAdmin()
	{
		$year=date('Y');
		unset(Yii::app()->request->cookies['ind_pay_filter_year']); 
		if(!empty($_POST))
		{
		    Yii::app()->request->cookies['ind_pay_filter_year'] = new CHttpCookie('ind_pay_filter_year', $_POST['filter_year']);
			$year = Yii::app()->request->cookies['ind_pay_filter_year'];
		}

		if($year!=''){
			$from_date = $year.'-01-01 00:00:01';
			$to_date = $year.'-12-31 23:59:59';
			$var_sum = Yii::app()->db->createCommand()
            ->select('sum(amount) as amount, sum(store_amount) stored_amount')
            ->from('all_org_payments')
			->where('payment_date >= "'.$from_date.'"')
	        ->andwhere('payment_date <= "'.$to_date.'"')
            ->queryRow();
		}else{
	        $var_sum = Yii::app()->db->createCommand()
	            ->select('sum(amount) as amount, sum(store_amount) stored_amount')
	            ->from('all_org_payments')
	            ->queryRow();
	    }


		$model=new AllOrgPayments('search');
		$model->unsetAttributes();  // clear any default values
		if($year!=''){
			$model->from_date = $from_date;
		    $model->to_date = $to_date;
		}
		if(isset($_GET['AllOrgPayments']))
			$model->attributes=$_GET['AllOrgPayments'];

		$this->render('admin',array(
			'model'=>$model,
            'amount'=>$var_sum['amount'],
            'stored_amount'=>$var_sum['stored_amount']
		));
	}

	
	public function loadModel($id)
	{
		$model=AllOrgPayments::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='all-org-payments-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
