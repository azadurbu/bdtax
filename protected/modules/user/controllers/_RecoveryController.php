<?php

class RecoveryController extends Controller
{
	public $defaultAction = 'recovery';
	public $layout = '//layouts/main-userModule';
	
	/**
	 * Recovery password
	 */
	public function actionRecovery () {
		$form = new UserRecoveryForm;

		if (Yii::app()->user->id) {
			$this->redirect(Yii::app()->controller->module->returnUrl);
		} else {
			$email = ((isset($_GET['email']))?$_GET['email']:'');
			$activkey = ((isset($_GET['activkey']))?$_GET['activkey']:'');

			if ($email&&$activkey) {
				$form2 = new UserChangePassword;

				$find = User::model()->notsafe()->findByAttributes(array('email'=>$email));

				if(isset($find)&&$find->activkey==$activkey) {
					if(isset($_POST['UserChangePassword'])) {
						$form2->attributes=$_POST['UserChangePassword'];
						if($form2->validate()) {
							$find->password = Yii::app()->controller->module->encrypting($form2->password);
							$find->activkey=Yii::app()->controller->module->encrypting(microtime().$form2->password);
							if ($find->status==0) {
								$find->status = 1;
							}
							$find->save();
							Yii::app()->user->setFlash('recoveryMessage',Yii::t('user',"New password is saved."));
							$this->redirect(Yii::app()->controller->module->recoveryUrl);
						}
					} 
					$this->render('changepassword',array('form'=>$form2));
				} else {
					Yii::app()->user->setFlash('recoveryMessage',Yii::t('user',"Incorrect recovery link."));
					$this->redirect(Yii::app()->controller->module->recoveryUrl);
				}
			}
			else {
				if(isset($_POST['UserRecoveryForm'])) {
					$form->attributes=$_POST['UserRecoveryForm'];

					if($form->validate()) {
						$user = User::model()->notsafe()->findbyPk($form->user_id);
						$activation_url = 'http://' . $_SERVER['HTTP_HOST'].$this->createUrl(implode(Yii::app()->controller->module->recoveryUrl),array("activkey" => $user->activkey, "email" => $user->email));

						$subject = Yii::t('user',"You have requested your forgotten password from www.{site_name}",
							array(
								'{site_name}'=>Yii::app()->name,
								));
						$message = Yii::t('user','
							<div id=":fz" class="a3s" style="overflow: hidden;">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"> 
                                        <tbody> <tr> <td>
                                           <table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#f8f8f8" width="600"> 
                                            <tbody>
                                               <tr> <td align="center" style="color:#ffffff;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:18px;font-weight:bold;text-transform:uppercase;padding:20px 0;background-color:#FFF" valign="middle"> <img src="http://bdtax.com.bd/img/logo.png" class="CToWUd"></td> </tr> 
                                               <tr> <td height="40">&nbsp;</td> </tr>
                                               <tr> <td align="center" style="color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:13px;line-height:20px;padding:0 20px" valign="middle">
							You have requested your forgotten password from www.{site_name}. To receive a new password, please go to </td> </tr> 
                                               <tr> <td>&nbsp;</td> </tr>
                                               <tr> <td align="center" valign="middle"> 
                                                 <div style="display:table;border-radius:5px;font-family:Open Sans,Arial,sans-serif;font-size:13px;font-weight:bold;padding:7px 12px;text-align:center;text-decoration:none;margin:auto">
                                                 <a href="{activation_url}" style="text-decoration:none" target="_blank">{activation_url}</a>
                                                 </div>
                                             </td> </tr>
                                             <tr> <td height="50">&nbsp;</td> </tr>
                                            </tbody> 
                                        </table> </td> </tr> 
                                    </tbody>
                                </table> <p>&nbsp;</p>
                            </div>
                            ',
							array(
								'{site_name}'=>Yii::app()->name,
								'{activation_url}'=>$activation_url,
								));

						UserModule::sendMail($user->email,$subject,$message);

						Yii::app()->user->setFlash('recoveryMessage',Yii::t('user',"Please check your email. An instructions was sent to your email address."));
						$this->refresh();
					}
				}

				$this->render('recovery',array('form'=>$form));
			}
		}
	}

}