<?php

class ChallanController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/columnLess';
	public $defaultAction = 'entry';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('entry','update', 'saveInfo', 'createShareholder', 'deleteShareholder', 'createNonAgricultureProperty', 'saveInfo', 'saveFractionInfo', 'getDataForEdit', 'deleteData', 'deleteParticularFieldData', 'deleteInvestFieldData', 'saveInvestFractionInfo', 'deleteOutsideBusinessFieldData', 'saveOursideBusinessFractionInfo','saveAll'),
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

	public function actionReview()
	{


		$model=Assets::model()->findbyattributes(array('CPIId'=>Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear(), 'trash' => 0));


		$this->render('review',array(
			'model'=>$model
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionStartup()
	{
		$model = $this->loadModelByCPIIdYear(Yii::app()->user->CPIId, $this->taxYear());
		if($model == null)
		{
			$this->render('startup');
		}
		else
		{
			$this->redirect(array('entry'));
		}

		
	}

	public function actionEntry()
	{
		
		$pensonaInfo = PersonalInformation::model()->findByPk(Yii::app()->user->CPIId);
         //$us = User::model()->findByPk($pensonaInfo->UserId);
		

		$listChallan = UserChallan::model()->findAll('user_id=:data AND tax_year=:data1', array(':data'=>$pensonaInfo->UserId, ':data1'=>$this->taxYear()));
		


		


		$this->render('entry',array(
			
			'listChallan'=>$listChallan,
			
		));
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
            //die("HI");
			if(isset($_POST['Challan_no']) && isset($_POST['Challan_type'])){
				$pensonaInfo = PersonalInformation::model()->findByPk(Yii::app()->user->CPIId);
			    $modelL = new UserChallan;
			    $modelL->user_id = $pensonaInfo->UserId;
			    $modelL->updated_at = date("Y-m-d H:i:s");
				$modelL->created_at = date("Y-m-d H:i:s");
				$modelL->challan_no = $_POST['Challan_no'];
				$modelL->bank_name = $_POST['bank_name'];
				$modelL->challan_date = $_POST['Challan_date'];
				$modelL->challan_type = $_POST['Challan_type'];
				$modelL->tax_year = $this->taxYear();
				//$modelL->attributes=$_POST['Challan'];
				$modelL->save();
				Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Stored"));
		    }
			

		    $this->redirect(Yii::app()->baseUrl.'/index.php/Challan');
		}

		/*$model=new Assets;
		
	####################### UPDATE ##########################
		
		$model->updateByPk($_POST['AssetsId'], array(
			$_POST['field_name']."Confirm" => "Yes",
		    $_POST['field_name']."FOrT" => "Total",
		    $_POST['field_name']."Total" => $_POST['value'],
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));
		
		
		$data['status'] = "success";
		$data['msg'] = Yii::t("common","Successfully Stored");
		Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Stored"));
		echo json_encode($data);*/
		
	}


	function actionDeleteData(){

		if(Yii::app()->request->getParam('id')){
        $id = Yii::app()->request->getParam('id');
        $pensonaInfo = PersonalInformation::model()->findByPk(Yii::app()->user->CPIId);
		UserChallan::model()->deleteAll('user_id=:data AND id=:data1', array(':data'=>$pensonaInfo->UserId, ':data1'=>$id));
		Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Deleted"));

		$this->redirect(Yii::app()->baseUrl.'/index.php/Challan?s=1');
	    }

	}

	
	
}
