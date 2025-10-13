<?php

class ActivationController extends Controller
{
	public $defaultAction = 'activation';
    public $layout = '//layouts/main-userModule';
	
	/**
	 * Activation user account
	 */
	public function actionActivation () {

		$email = $_GET['email'];
		$activkey = $_GET['activkey'];
		if ( $email != "" && $activkey != "") {
			$find = User::model()->notsafe()->findByAttributes(array('email'=>$email));
			if ( isset($find->status) && $find->status == 1) {
			    $this->render('/user/activation_message',array('title'=>Yii::t('user',"User activation"),'content'=>Yii::t('user',"<div style='padding: 20px; text-align: center; font-size: 15px; margin: 50px; line-height:30px;  display:block;' class='label label-success '>Your Account Is Active.</div>")));
			} elseif ( isset($find->activkey) && $find->activkey == $activkey ) {
				$find->activkey = UserModule::encrypting(microtime());
				$find->status = 1;
				$find->save(false);
			    $this->render('/user/activation_message',array('title'=>Yii::t('user',"User activation"),'content'=>Yii::t('user',"<div style='padding: 20px; text-align: center; font-size: 15px; margin: 50px; line-height:30px;  display:block;' class='label label-success '>Your account is activated.<br />You can sign in with your email address and password.<br />Please {{signin}}</div> ", array('{{signin}}' => CHtml::link(Yii::t('user','SignIn'), Yii::app()->controller->module->loginUrl)))));
			} else {
			    $this->render('/user/activation_message',array('title'=>Yii::t('user',"User activation"),'content'=>Yii::t('user',"<div style='padding: 20px; text-align: center; font-size: 15px; margin: 50px; line-height:30px; display:block;' class='label label-success '>Incorrect activation URL.</div>")));
			}
		} else {
			$this->render('/user/activation_message',array('title'=>Yii::t('user',"User activation"),'content'=>Yii::t('user',"<div style='padding: 20px; text-align: center; font-size: 15px; margin: 50px; line-height:30px; display:block;' class='label label-success '>Incorrect activation URL.</div>")));
		}
	}

}