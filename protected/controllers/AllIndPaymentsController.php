<?php

class AllIndPaymentsController extends Controller
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
            'condition' => 'role_id = 2 AND CPIId = :CPIId',
            'params' => array(':CPIId' => $id),
            'order' => 'payment_date DESC'
        ));

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'payments' => $payments
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new AllIndPayments;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AllIndPayments']))
		{
			$model->attributes=$_POST['AllIndPayments'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->CPIId));
		}

		$this->render('create',array(
			'model'=>$model,
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
            ->from('all_ind_payments')
			->where('payment_date >= "'.$from_date.'"')
	        ->andwhere('payment_date <= "'.$to_date.'"')
            ->queryRow();
		}else{
	        $var_sum = Yii::app()->db->createCommand()
	            ->select('sum(amount) as amount, sum(store_amount) stored_amount')
	            ->from('all_ind_payments')
	            ->queryRow();
	    }

	    if($year!=''){
	    	$from_date = $year.'-01-01 00:00:01';
			$to_date = $year.'-12-31 23:59:59';
			$actualPaidUser = Yii::app()->db->createCommand()
		    ->select('distinct(payments.user_id), orders.user_id, orders.tax_year,payments.payment_year')
		    ->from('payments')
		    ->leftjoin('orders', 'orders.id=payments.user_id')

		    //->join('orders', 'payments.user_id=orders.user_id')                    ')
		    ->where('payments.status = "VALID"')
		    ->andwhere('payments.payment_date >= "'.$from_date.'"')
	        ->andwhere('payments.payment_date <= "'.$to_date.'"')
		    
		    ->queryAll();
			
	    }else{
	    	$actualPaidUser = Yii::app()->db->createCommand()
	            ->select('Distinct(UserId)')
	            ->from('all_ind_payments')
	            ->queryAll();
	    }

        $PlanCal = array();

        $from_date = $year.'-01-01 00:00:01';
		$to_date = $year.'-12-31 23:59:59';
		

        

    	$PlanCal[] = $this->getPlanSummary(1,$year,$from_date,$to_date);
    	$PlanCal[] = $this->getPlanSummary(4,$year,$from_date,$to_date);
    	$PlanCal[] = $this->getPlanSummary(5,$year,$from_date,$to_date);
    	$PlanCal[] = $this->getPlanSummary(3,$year,$from_date,$to_date);
    	$PlanCal[] = $this->getPlanSummary(6,$year,$from_date,$to_date);
    	$PlanCal[] = $this->getPlanSummary(7,$year,$from_date,$to_date);
    	$PlanCal[] = $this->getPlanSummary(2,$year,$from_date,$to_date);
    	$PlanCal[] = $this->getPlanSummary(8,$year,$from_date,$to_date);
    	$PlanCal[] = $this->getPlanSummary(9,$year,$from_date,$to_date);

		   

	    
	    

	    $actualPaidUserCount = count($actualPaidUser);




		$model=new AllIndPayments('search');
		$model->unsetAttributes();  // clear any default values
		if($year!=''){
			$model->from_date = $from_date;
		    $model->to_date = $to_date;
		}
		if(isset($_GET['AllIndPayments']))
			$model->attributes=$_GET['AllIndPayments'];

		$this->render('admin',array(
			'model'=>$model,
			'actualPaidUser'=>$actualPaidUserCount,
            'amount'=>$var_sum['amount'],
            'stored_amount'=>$var_sum['stored_amount'],
            'plan_summary' =>$PlanCal


		));

	}

	


	function getPlanSummary($planid,$year,$from_date,$to_date){

        if($year!=''){
		return Yii::app()->db->createCommand()
		    ->select('count(up.id) as total')
		    ->from('orders or')
		    ->join('user_plan up', 'or.id=up.user_payment_id')
		    ->where('up.plan_id=:plan_id', array(':plan_id'=>$planid))
		    ->andwhere('or.created_at >= "'.$from_date.'"')
	        ->andwhere('or.created_at <= "'.$to_date.'"')
		    ->queryRow();
		}else{

		return Yii::app()->db->createCommand()
		    ->select('count(up.id) as total')
		    ->from('orders or')
		    ->join('user_plan up', 'or.id=up.user_payment_id                     ')
		    ->where('up.plan_id=:plan_id', array(':plan_id'=>$planid))
		    ->queryRow();
		}    

	}

	public function loadModel($id)
	{
		$model=AllIndPayments::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='all-ind-payments-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
