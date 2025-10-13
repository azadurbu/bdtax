<?php

class UserAckUpController extends Controller
{
	/**
	* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	* using two-column layout. See 'protected/views/layouts/column2.php'.
	*/
	public $layout='//layouts/columnLess';
	
	
	


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
				'actions' => array('index', 'entry', 'Save','showFile'),
				'users' => array('@'),
				'expression' => '(Yii::app()->user->role==="superAdmin")||(Yii::app()->user->role==="customers")||(Yii::app()->user->role==="companyUser")||(Yii::app()->user->role==="companyAdmin")',
			),
		
			array('deny',  // deny all users
				'users'=>array('*'),
				),
			);
	}
	
	
	

	public function actionEntry()
	{  
		if(isset($_POST['userfile'])){
			//echo $this->taxYear();
			$userOrderId = $this->getUserPayId();
			
		    if($userOrderId){
                
                $UserOrderStatusCount = UserFileStatus::model()->countByAttributes(array('user_payment_id'=> $userOrderId));
                	
                $current_status = '';
                if($UserOrderStatusCount){
                	$UserOrderStatus=UserFileStatus::model()->findByAttributes(array('user_payment_id'=>$userOrderId));
                	$current_status = $UserOrderStatus->current_status;
                }

                if($current_status=='' || $current_status==1){
		    		UserFile::model()->deleteAll('user_payment_id = :user_payment_id', array(':user_payment_id' => $userOrderId));
		        }
		    	
                foreach($_POST['userfile'] as $key => $files){
                	$UserFileCount = UserFile::model()->countByAttributes(array('user_payment_id'=> $userOrderId,'file_type'=> $key));
                	if(!$UserFileCount){
				    	$UserFile =new UserFile;
				    	$UserFile->user_payment_id =  $userOrderId;

						$UserFile->file_path =  $files;
						$UserFile->file_type =  $key;
						
						$UserFile->save();
					}
			    }

		    }

						    //print_r($file_types_child);*/
			Yii::app()->user->setFlash('alert_success', Yii::t("assets","Successfully stored"));
				// $this->redirect(array('view','id'=>$model->Income82cId));
			$this->redirect($this->createUrl('/userFile'));


		}else{

			header('Content-type:application/json;charset=utf-8');

			try {
			    if (
			        !isset($_FILES['file']['error']) ||
			        is_array($_FILES['file']['error'])
			    ) {
			        throw new RuntimeException('Invalid parameters.');
			    }

			    switch ($_FILES['file']['error']) {
			        case UPLOAD_ERR_OK:
			            break;
			        case UPLOAD_ERR_NO_FILE:
			            throw new RuntimeException('No file sent.');
			        case UPLOAD_ERR_INI_SIZE:
			        case UPLOAD_ERR_FORM_SIZE:
			            throw new RuntimeException('Exceeded filesize limit.');
			        default:
			            throw new RuntimeException('Unknown errors.');
			    }


                            $times = date('YmdHis');
                            $newfilename = str_replace(' ','_', $_FILES['file']['name']);
			    $filepath = sprintf('uploaded-docs/userfiles/%s_%s', $times.uniqid(), $newfilename);

			    if (!move_uploaded_file(
			        $_FILES['file']['tmp_name'],
			        $filepath
			    )) {
			        throw new RuntimeException('Failed to move uploaded file.');
			    }

			    // All good, send the response
			    echo json_encode([
			        'status' => 'ok',
			        'path' => $filepath
			    ]);

			} catch (RuntimeException $e) {
				// Something went wrong, send the err message as JSON
				http_response_code(400);

				echo json_encode([
					'status' => 'error',
					'message' => $e->getMessage()
				]);
			}
	    }
	}

	

	public function actionSave($id)
	{ 

		die('Hello');
		
	}


	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/


	/**
	* Lists all models.
	*/
	public function actionIndex()
	{
		 $plan = $this->userCurrentPlan();
		 if(!isset($plan)){
		 	//$this->redirect($this->createUrl('/dashboard'));
		 }

		 if(isset($plan) && ($plan->plan_id==1||$plan->plan_id==2||$plan->plan_id==3)){
		 	//$this->redirect($this->createUrl('/dashboard'));
		 }

		 $docs = MyDocuments::model()->findAll(
                                array(
                                    'condition' => "user_id = '".Yii::app()->user->id."' and is_ack=1", 
                                    'order' => 'created_at DESC'
                                    )
                            );
     
         $docModel = new MyDocuments;
		//$UserFiles=UserFile::model()->findByAttributes(array('user_payment_id'=>$userPayid));
		 $this->render('index',array(
			'title'=>"Title",
			'docModel' =>$docModel,
			'docs' =>$docs
		 ));
	}

    function actionshowFile(){
		if(isset($_POST['file_path'])){
			$domainurl = 'https://bdtax.com.bd/';

			//$uF = Yii::app()->db->createCommand("SELECT * FROM user_files Where id = ". $_POST['id'])->queryRow();
			$filepath = explode('.',$_POST['file_path']);
        	$filetype = $filepath[count($filepath)-1];
        	if(strtolower($filetype) == 'pdf'){
            	echo '<object width="100%" height="100%" toolbar="0" data="'.$domainurl.$_POST['file_path'].'#toolbar=0&navpanes=0"></object>';


	        }else{
	            echo '<img width="100%" src="'.$domainurl.$_POST['file_path'].'" />';
	        }
		}
	}



	
}
