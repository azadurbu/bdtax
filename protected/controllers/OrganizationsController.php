<?php

class OrganizationsController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
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
            	'actions' => array('index', 'admin', 'view', 'create', 'update', 'delete','toggle', 'generatePaymentLink'),
            	'users' => array('@'),
            	'expression' => '(Yii::app()->user->role==="superAdmin")',
            	),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
            	'actions' => array('create', 'update'),
            	'users' => array('@'),
            	'expression' => '(Yii::app()->user->role==="companyAdmin")',
            	),            
            array('deny', // deny all users
            	'users' => array('*'),
            	),
            );
}

    public function actionToggle($id) {
         //$model = User::model()->findByPk($id);
        //$model = $this->loadModel($id);
		
		
		$model2 = User::model()->findAll(array(
			'condition' => 'org_id = :orgId',
			'params' => array(':orgId' => $id),
		));
		//print_r($model2);
		//$model2 = User::model()->findAll('org_id >= '.$id);
		foreach($model2 as $model2)
		{
		    if ($model2->status==1)
		    {
				$model2->status = 0;
				//$model->status_update_at=new CDbExpression('NOW()');
			} 
			else
			{
				$model2->status = 1;
				//$model->status_update_at=new CDbExpression('NOW()');
			}
			$model2->save(true);
		}



        $model = $this->loadModel($id);

        if ($model->status==1) {
            $model->status = 0;
            $model->status_update_at=new CDbExpression('NOW()');
        } else {
            $model->status = 1;
            $model->status_update_at=new CDbExpression('NOW()');
        }		
		
		
		
		
        $model->save(false);

        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        // return $model;

        //   return array(
        //     'toggle' => array(
        //         'class'=>'bootstrap.actions.TbToggleAction',
        //         'modelName' => 'Organizations',
        //     )
        // );

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
	$model=new Organizations;

	$methods = PaymentMethod::model()->findAll(
		array(
			'condition' => " status='Active' ", 
			'order' => 'ordering ASC'
			)
	);
	$paymentMethods = [];
	$paymentMethods[""] = "Please Select";
	if ( $methods != null ) {
		foreach ( $methods as $key => $value ) {
			$paymentMethods[$value->id] = $value->name;
		}
	}
	
	if ( isset(Yii::app()->user->org_id) ) {

		$org_id = Yii::app()->user->org_id;
	}

	if ( !isset($org_id) ) {

		if (isset($_POST['Organizations'])) {
			$_POST['Organizations']['org_plan'] = "Trial";
			$_POST['Organizations']['trial_start_date'] = date("Y-m-d");

			$model->attributes = $_POST['Organizations'];

			if ($model->validate()) {

				if ($model->save(false)) {

					Yii::app()->user->setState('TrialStartDate', $_POST['Organizations']['trial_start_date']);
					Yii::app()->user->setState('org_plan', $_POST['Organizations']['org_plan']);

					$message="A new organizations created with following information:-<br/>
					Organization Name:$model->organization_name<br/>
					Contact Email:$model->contact_email<br/>
					Phone Number:$model->phone_number<br/>
					";

					$subject="New organizations/accounts are created";


	                // UserModule::sendMail(Yii::app()->params['adminEmail'],$subject,$message);
					UserModule::sendMail(Yii::app()->params['adminEmail'],$subject,$message);


					$u_id = Yii::app()->user->id;

					$cmd = Yii::app()->db->createCommand();

					$cmd->update('users', array('org_id' => $model->id), 'id=:id', array(':id' => $u_id));

					Yii::app()->user->setState('org_id', $model->id); 

					Yii::app()->user->setFlash('success', Yii::t("assets","Successfully Stored."));

					$this->redirect($this->createUrl('organizations/update/id/'.$model->id));


				}
			}
		}
	} else {

		$this->redirect($this->createUrl('organizations/update/id/'.$org_id));

	}




	$this->render('create',array(
		'model'=>$model,
		'paymentMethods' => $paymentMethods
		));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
	$model=$this->loadModel($id);
	
	$methods = PaymentMethod::model()->findAll(
		array(
			'condition' => " status='Active' ", 
			'order' => 'ordering ASC'
			)
	);
	$paymentMethods = [];
	$paymentMethods[""] = "Please Select";
	if ( $methods != null ) {
		foreach ( $methods as $key => $value ) {
			$paymentMethods[$value->id] = $value->name;
		}
	}

	if(isset($_POST['Organizations']))
	{

		if (Yii::app()->user->role != 'superAdmin') {
			unset($_POST['Organizations']['org_plan']);
		}
		else {
			$counter = PersonalInformation::model()->count('org_id=:data',array(':data'=>$model->id));

			$maxNumberOfTaxReturns = CompanyPlan::model()->find(array('condition' => "plan='".$_POST['Organizations']['org_plan']."' "))->max_number_of_users;

			if ($counter >= $maxNumberOfTaxReturns ) {
				Yii::app()->user->setFlash('error', "This company has more tax returns than the selected plan allows. Please contact the company and request that they delete the tax returns they no longer need.");
				$this->redirect($this->createAbsoluteUrl('/Organizations/update/id/'.$id));
			}
		}
/*
		if (Yii::app()->user->role == 'companyAdmin') {
			unset($_POST['Organizations']['payment_method_id']);
		}



*/
		$_POST['Organizations']['etin'] = $this->_encode($_POST['Organizations']['etin']);
		$model->attributes=$_POST['Organizations'];
		
		if ($model->validate()) {
			if($model->save(false)) {
			Yii::app()->user->setFlash('success', Yii::t("assets","Successfully Updated"));

			if (Yii::app()->user->role=='superAdmin') {
				$this->redirect($this->createUrl('organizations/admin/'));
			}
			/*else {
				Yii::app()->user->setState('TrialStartDate', $_POST['Organizations']['trial_start_date']);
				Yii::app()->user->setState('org_plan', $_POST['Organizations']['org_plan']);
			}*/
			$this->redirect($this->createUrl('organizations/update/id/'.$model->id));
		}
		}
		
	}

	$trial = CompanyPlan::model()->find(array('condition' => "plan='Trial'"));
    $small = CompanyPlan::model()->find(array('condition' => "plan='Small'"));
    $medium = CompanyPlan::model()->find(array('condition' => "plan='Medium'"));
    $enterprise = CompanyPlan::model()->find(array('condition' => "plan='Enterprise'"));

  
    $voucher = Vouchers::model()->find(
								array(
									'condition' => "org_id='".$model->id."' AND is_used='No' ", 
									'order' => 'created_at DESC'
									)
							);
    $discount_percent = "";
    $discount_flat = "";
	if ( $voucher != null ) {
		if ( $voucher->discount_type == "PERCENT" ) {
			$small->price = $small->price - ($small->price * $voucher->discount_value / 100);
			$medium->price = $medium->price - ($medium->price * $voucher->discount_value / 100);
			$enterprise->price = $enterprise->price - ($enterprise->price * $voucher->discount_value / 100);
			$discount_percent = $voucher->discount_value;
		}
		else {
			$small->price = $small->price - $voucher->discount_value;
			$medium->price = $medium->price - $voucher->discount_value;
			$enterprise->price = $enterprise->price - $voucher->discount_value;
			$discount_flat = $voucher->discount_value;
		}
	}

	//ADD TAX
	$small->price = (Yii::app()->params['tax'] * $small->price / 100) + $small->price;
	$medium->price = (Yii::app()->params['tax'] * $medium->price / 100) + $medium->price;
	$enterprise->price = (Yii::app()->params['tax'] * $enterprise->price / 100) + $enterprise->price;

    $payments = Payments::model()->findAll(array(
            'condition' => 'role_id = 3 AND org_id = :org_id',
            'params' => array(':org_id' => $model->id),
            'order' => 'payment_date DESC'
        ));

	$this->render('update',array(
		'model'=>$model,
		'trial' => $trial,
        'small' => $small,
        'medium' => $medium,
        'enterprise' => $enterprise,
        'paymentMethods' => $paymentMethods,
        'payments' => $payments,
        'voucher' => $voucher,
        'discount_percent' => $discount_percent,
        'discount_flat' => $discount_flat,
        'tax' => Yii::app()->params['tax'],
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
	$dataProvider=new CActiveDataProvider('Organizations');
	$this->render('index',array(
		'dataProvider'=>$dataProvider,
		));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
    $model = new Organizations('search');
    $model->unsetAttributes();  // clear any default values
    if (isset($_GET['Organizations']))
        $model->attributes = $_GET['Organizations'];
        //new added
        if(!empty($_POST))
        {
            $model->from_date = $_POST['from_date'];
            $model->to_date = $_POST['to_date'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
}

public function actionGeneratePaymentLink() {

	if (Yii::app()->user->role=='superAdmin') {

		if ( $_POST['org_plan'] == "" ) {
			die(json_encode(["status" => "failed", "msg" => "Please select a plan"]));
		}
		else if ($_POST['org_plan'] == "Other" && ( $_POST['grand_total'] == "" || $_POST['grand_total'] <= 0) ) {
			die(json_encode(["status" => "failed", "msg" => "Invalid Price"]));
		}



		if ( $_POST['start_date'] == "" || $_POST['end_date'] == "" ) {
			die(json_encode(["status" => "failed", "msg" => "Start date and end date is required"]));
		}

		$start_date = explode("-", $_POST['start_date']);
		$end_date = explode("-", $_POST['end_date']);

		$start = $start_date[2] . "-" . $start_date[1] . "-" . $start_date[0];
		$end = $end_date[2] . "-" . $end_date[1] . "-" . $end_date[0];

		if( strtotime(date("Y-m-d", strtotime($start))) > strtotime(date("Y-m-d", strtotime($end))) ) {
			die(json_encode(["status" => "failed", "msg" => "Wrong date range"]));
		}

		$model = $this->loadModel($_POST['id']);

		$paymentMethod = PaymentMethod::model()->findByPk($model->payment_method_id);

		if ($paymentMethod == null) {
			die(json_encode(["status" => "failed", "msg" => "Payment method does not found"]));
		}
		else {
			
			if ( $_POST['org_plan'] == "Other") {
				$price = $_POST['grand_total'];
			}
			else {
				$companyPlan = CompanyPlan::model()->find(
					array(
							'condition' => " plan = '".$_POST['org_plan']."' "
						)
					);
				//ADD DISCOUNT
				$voucher = Vouchers::model()->find(
									array(
										'condition' => "org_id='".$model->id."' AND is_used='No' ", 
										'order' => 'created_at DESC'
										)
								);
				$price = $companyPlan->price;

				if ( $voucher != null ) {
					if ( $voucher->discount_type == "PERCENT" ) {
						$price = $price - ($price * $voucher->discount_value / 100);
					}
					else {
						$price = $price - $voucher->discount_value;
					}
				}
				//ADD DISCOUNT ENDS 
				$price = (Yii::app()->params['tax'] * $price / 100) + $price;
			}
			
			if ($price <= 0) {
				die(json_encode(["status" => "failed", "msg" => "Zero payment is not valid. Please check company plan and price."]));
			}
			
			

			$post_data = array();

			$post_data['currency'] = Yii::app()->params['currency'];

			$post_data['value_a'] = $model->id;
			$post_data['value_b'] = date("Y-m-d", strtotime($start)) . "," . date("Y-m-d", strtotime($end));

			$post_data['cus_email'] = $_POST['cus_email'];

			//$post_data['tran_id'] = "BDTAX_ORG_".Yii::app()->user->id."_".uniqid();
			$post_data['tran_id'] = "BDTAX_ORG_".Yii::app()->user->id."_".uniqid(rand(0,9999)."-");

			$post_data['total_amount'] = $price;
			$url = "";
			
			$isFirst = true;
			foreach ($post_data as $key => $value) {
				if ($isFirst) {
					$isFirst = false;
					$url .= $key."=".$value;
				}
				else {
					$url .= "&".$key."=".$value;
				}
			}
		
			$paymentLink = Yii::app()->params['orgLinkUrl']."?v=".base64_encode(urlencode($url));

			die(json_encode(["status" => "success", "msg" => $paymentLink]));
		}
		
	}

}
/*
public function actionGeneratePaymentLink2() {

	if (Yii::app()->user->role=='superAdmin') {

		if ( $_POST['org_plan'] == "" ) {
			die(json_encode(["status" => "failed", "msg" => "Please select a plan"]));
		}

		if ( $_POST['start_date'] == "" || $_POST['end_date'] == "" ) {
			die(json_encode(["status" => "failed", "msg" => "Start date and end date is required"]));
		}

		$start_date = explode("-", $_POST['start_date']);
		$end_date = explode("-", $_POST['end_date']);

		$start = $start_date[2] . "-" . $start_date[1] . "-" . $start_date[0];
		$end = $end_date[2] . "-" . $end_date[1] . "-" . $end_date[0];

		if( strtotime(date("Y-m-d", strtotime($start))) > strtotime(date("Y-m-d", strtotime($end))) ) {
			die(json_encode(["status" => "failed", "msg" => "Wrong date range"]));
		}

		$model = $this->loadModel($_POST['id']);

		$paymentMethod = PaymentMethod::model()->findByPk($model->payment_method_id);



		if ($paymentMethod == null) {
			die(json_encode(["status" => "failed", "msg" => "Payment method does not found"]));
		}
		else {
			$companyPlan = CompanyPlan::model()->find(
				array(
						'condition' => " plan = '".$_POST['org_plan']."' "
					)
				);
			//ADD DISCOUNT
			$voucher = Vouchers::model()->find(
								array(
									'condition' => "org_id='".$model->id."' AND is_used='No' ", 
									'order' => 'created_at DESC'
									)
							);
			$price = $companyPlan->price;

			if ( $voucher != null ) {
				if ( $voucher->discount_type == "PERCENT" ) {
					$price = $price - ($price * $voucher->discount_value / 100);
				}
				else {
					$price = $price - $voucher->discount_value;
				}
			}
			//ADD DISCOUNT ENDS 
			
			if ($price == 0) {
				die(json_encode(["status" => "failed", "msg" => "Zero payment is not valid. Please check company plan and price."]));
			}

			Yii::import('application.vendors.*');

			require_once('SSLCommerz/SSLCZConfig.php');
			require_once('SSLCommerz/SSLCommerz.php');

			$post_data = array();

			$post_data['currency'] = Yii::app()->params['currency'];

			$post_data['success_url'] = Yii::app()->params['orgSuccessUrl'];
			$post_data['fail_url'] = Yii::app()->params['orgFailUrl'];
			$post_data['cancel_url'] = Yii::app()->params['orgCancelUrl'];

			$post_data['value_a'] = $model->id;
			$post_data['value_b'] = date("Y-m-d", strtotime($start)) . "," . date("Y-m-d", strtotime($end));

			$post_data['tran_id'] = "BDTAX_ORG_".Yii::app()->user->id."_".uniqid();

			

			$post_data['total_amount'] = $price;

			$sslc = new SSLCommerz();

			$options = $sslc->initiate($post_data, true);

			$paymentLink = "";

			foreach ($options as $keys => $values) {
				foreach ($values as $key => $value) {
					if ( $value['gw'] ==  $paymentMethod->gw ) {
						$paymentLink = $value['raw_link'];
					}
				}
			}
			if ($paymentLink == "") {
				die(json_encode(["status" => "failed", "msg" => $paymentMethod->name . " is not available" ]));
			}
			die(json_encode(["status" => "success", "msg" => $paymentLink]));
		}
		
	}

}
*/


/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
	$model=Organizations::model()->findByPk($id);
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
	if(isset($_POST['ajax']) && $_POST['ajax']==='organizations-form')
	{
		echo CActiveForm::validate($model);
		Yii::app()->end();
	}
}
}
