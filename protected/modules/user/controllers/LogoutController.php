<?php

class LogoutController extends Controller
{
	public $defaultAction = 'logout';
	
	/**
	 * Logout the current user and redirect to returnLogoutUrl.
	 */
	public function actionLogout()
	{
		if(!isset(Yii::app()->user->first_name)){
			Yii::app()->user->logout();
			$this->redirect(Yii::app()->user->returnUrl);
		}
		$userlog=new UserActivityLog;
		$userlog->name= isset(Yii::app()->user->first_name)?Yii::app()->user->first_name:'';
		$userlog->email=Yii::app()->user->email;
		$userlog->ip_address=$this->get_client_ip();
		$userlog->activity_type='Logout';
		$userlog->activity_time=date('Y-m-d H:i:s');
		$userlog->user_id=Yii::app()->user->id;
		$userlog->CPIId=(is_numeric(Yii::app()->user->CPIId))?Yii::app()->user->CPIId:'';
		$userlog->save();

		Yii::app()->user->logout();

/*		echo $lastUrl = 	Yii::app()->request->urlReferrer;
		// echo $lastUrl2 =	Yii::app()->user->returnUrl;

		exit;*/

		//$this->redirect(Yii::app()->controller->module->returnLogoutUrl);
		// $this->redirect(Yii::app()->request->baseUrl);
		$this->redirect(Yii::app()->user->returnUrl);
	}

}