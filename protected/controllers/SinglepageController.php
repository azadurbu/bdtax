<?php

class SinglepageController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/columnLess';
	public $defaultAction = 'profile';

	public function filters()
	{
		return array('accessControl',); // perform access control for CRUD operations

	}

	/**
	* Specifies the access control rules.
	* This method is used by the 'accessControl' filter.
	* @return array access control rules
	*/
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('profile', 'entry', 'Save','showFile'),
				'users' => array('@'),
				'expression' => '(Yii::app()->user->role==="superAdmin")||(Yii::app()->user->role==="customers")||(Yii::app()->user->role==="companyUser")||(Yii::app()->user->role==="companyAdmin")',
			),
		
			array('deny',  // deny all users
				'users'=>array('*'),
				),
			);
	}




	function actionprofile(){

		$role= Yii::app()->user->role;

	if ($role=='companyAdmin') {


		$model = PersonalInformation::model()->find('CPIId=:data AND org_id=:data1', array(':data' =>Yii::app()->user->CPIId,':data1' =>Yii::app()->user->org_id ) );
		if($model===null)
			throw new CHttpException(404,'The customer you are trying to pick is not in your organization or may not exist');
	} else if ($role=='companyUser') {
		$model = PersonalInformation::model()->find('CPIId=:data AND org_user_id=:data1', array(':data' =>Yii::app()->user->CPIId,':data1' =>Yii::app()->user->id ) );
		if($model===null)
			throw new CHttpException(404,'The customer you are trying to pick is not in your List or may not exist');	
	} else {

		$model=$this->loadModelByUserId(Yii::app()->user->id);
	}
	
	$userCount = 1;
	$docs = [];
	$userModel = NULL;
	if ( isset(Yii::app()->user->org_id) ) {
		$userCount = Users::model()->count(
	                        array(
	                            'condition' => " id='".$model->UserId."' "
	                            )
	                    );
		$userModel = Users::model()->findByPk($model->UserId);
		
	}
	$docs = MyDocuments::model()->findAll(
                                array(
                                    'condition' => "user_id = '".$model->UserId."' ", 
                                    'order' => 'created_at DESC'
                                    )
                            );

	$payments = count(Payments::model()->find('CPIId=:data and payment_year=:data1', array(':data' =>Yii::app()->user->CPIId, ':data1'=>$this->taxYear())));
	$model->NationalId = $this->_decode($model->NationalId);
	$model->ETIN = $this->_decode($model->ETIN);
	$model->SpouseETIN = $this->_decode($model->SpouseETIN);


	$this->render('profile',array(
		'model'=>$model,
		'userCount' => $userCount,
		'userModel' => $userModel,
		'payments' => $payments,
		'docs' => $docs
		));
	
		//$this->render('profile');
	}


	public function loadModelByUserId($id)
{
	$model=PersonalInformation::model()->find('UserId=:data',  array('data' => $id) );
	if($model===null)
		throw new CHttpException(404,'The requested page does not exist.');
	return $model;
}



	
}
