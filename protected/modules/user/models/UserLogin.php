<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class UserLogin extends CFormModel {
	public $email;
	public $password;
	public $rememberMe;

	/**
	 * Declares the validation rules.
	 * The rules state that email and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules() {
		return array(
			// email and password are required
			array('email, password', 'required'),
			array('email', 'email','message'=>'Email Address is not a valid email address.<br/>Please check if there is any blank space or missing "@" or "." in the email address.'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels() {
		return array(
			'rememberMe' => Yii::t('user', "Remember me next time"),
			'email' => Yii::t('user', "E-mail"),
			'password' => Yii::t('user', "password"),
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute, $params) {
		if (!$this->hasErrors()) // we only want to authenticate when no input errors
		{
			$identity = new UserIdentity($this->email, $this->password);
			$identity->authenticate();
			switch ($identity->errorCode) {
				case UserIdentity::ERROR_NONE:
					$duration = $this->rememberMe ? Yii::app()->controller->module->rememberMeTime : 20;
					$failedData = FailedLogins::model()->find('email=:data1', array(':data1' => $this->email));
					if ($failedData != null) {
						$failedData->delete();
					}
					Yii::app()->user->login($identity, $duration);
					break;
				case UserIdentity::ERROR_EMAIL_INVALID:
					$this->addError("email", Yii::t('user', "Email is incorrect."));
					break;
				case UserIdentity::ERROR_USERNAME_INVALID:

					$this->addError("email", Yii::t('user', "email is incorrect."));
					break;
				case UserIdentity::ERROR_STATUS_NOTACTIV:
					$this->addError("status", Yii::t('user', "Your account is not activated."));
					break;
				case UserIdentity::ERROR_STATUS_BAN:
					$this->addError("status", Yii::t('user', "Your account is blocked."));
					break;
				case UserIdentity::ERROR_FAILED_LOGIN:
					$this->addError("status", Yii::t('user', "Your account is blocked and an email send to you For Account activation "));
					break;
				case UserIdentity::ERROR_PASSWORD_INVALID:
					//START%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%New addition%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%//
					$timeCheck_data = FailedLogins::model()->find('email=:data1 AND ip=:data2', array(':data1' => $this->email, ':data2' => $this->getUserIP()));
					$usr = User::model()->find('email=:data1', array(':data1' => $this->email));
					if (empty($timeCheck_data)) {

						if ($usr->status == 0) {
							$this->addError("status", Yii::t('user', "Your account is blocked."));
							break;
						}

						// Yii::app()->redirect(Yii::app()->createUrl('../user/login'));

						$command = Yii::app()->db->createCommand();
						$sql = 'INSERT INTO failed_logins (email, ip, time) VALUES (:email,:ip, :time)';
						$params = array(
							"email" => $this->email,
							"ip" => $this->getUserIP(),
							"time" => '1',
						);
						$command->setText($sql)->execute($params);

						$this->addError('AttemptCount =', ' 1 '.Yii::t('user',"Times Attempt Count.<br /> After 3 times your Account will be blocked"));
					} else {
						$tm = $timeCheck_data->time + 1;

						$this->addError('AttemptCount =', $tm .' '.Yii::t('user',"Times Attempt Count.<br /> After 3 times your Account will be blocked"));

						$command1 = Yii::app()->db->createCommand();

						$sql1 = 'DELETE FROM failed_logins WHERE id=:id';
						$params1 = array(
							"id" => $timeCheck_data->id,
						);
						$command1->setText($sql1)->execute($params1);

						$command = Yii::app()->db->createCommand();
						$sql = 'INSERT INTO failed_logins (email, ip, time) VALUES (:email,:ip, :time)';
						$params = array(
							"email" => $this->email,
							"ip" => $this->getUserIP(),
							"time" => $tm,
						);
						$command->setText($sql)->execute($params);

						if ($tm == 3) {

							$failedData = FailedLogins::model()->find('id=:data1', array(':data1' => $timeCheck_data->id));
							if ($failedData != null) {
								$failedData->delete();
							}

							$activeCode = UserModule::encrypting(microtime() . $this->email);
							$cmd = Yii::app()->db->createCommand();

							$cmd->update('users',
								array('status' => 0, 'activkey' => $activeCode),
								'email=:email',
								array(':email' => $this->email));

							if (Yii::app()->controller->module->activationMailOnFailorLogin) {
								$activation_url = Yii::app()->createAbsoluteUrl('/user/activation/activation', array("activkey" => $activeCode, "email" => $this->email));
								$mailBody= Yii::t('user','
	                                <div id=":fz" class="a3s" style="overflow: hidden;">
	                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"> 
	                                        <tbody> <tr> <td>
	                                         <table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#f8f8f8" width="600"> 
	                                            <tbody>
	                                             <tr> <td align="center" style="color:#ffffff;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:18px;font-weight:bold;text-transform:uppercase;padding:20px 0;background-color:#FFF" valign="middle"> <img src="https://bdtax.com.bd/img/logo.png" class="CToWUd"></td> </tr> 
	                                             <tr> <td height="40">&nbsp;</td> </tr> 
	                                             <tr> <td> <h3 style="text-align:center">Activate Your Account </h3> </td> </tr> 
	                                             <tr> <td>&nbsp;</td> </tr>
	                                             <tr> <td align="center" style="color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:13px;line-height:20px;padding:0 20px" valign="middle">Please click on the activation link below to activate your account again.</td> </tr> 
	                                             <tr> <td>&nbsp;</td> </tr>
	                                             <tr> <td align="center" valign="middle"> 
	                                               <div style="background-color:#f3402e;display:table;border-radius:5px;color:#ffffff;font-family:Open Sans,Arial,sans-serif;font-size:13px;text-transform:uppercase;font-weight:bold;padding:7px 12px;text-align:center;text-decoration:none;width:140px;margin:auto">

	                                                   <a href="{activation_url}" style="color:#ffffff;text-decoration:none" target="_blank">Click To Activate</a>
	                                               </div>
	                                           </td> </tr> 
	                                           <tr> <td>&nbsp;</td> </tr>
	                                           <tr> <td align="center" style="color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:13px;text-transform:uppercase" valign="middle">OR Copy - Paste the link</td> </tr> 
	                                           <tr> <td>&nbsp;</td> </tr>
	                                           <tr> <td align="center" style="color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:13px" valign="middle">
	                                            <a href="{activation_url}" style="color:#009307" target="_blank">{activation_url}</a></td> </tr> 
	                                            <tr> <td>&nbsp;</td> </tr>
	                                            <tr> <td align="center" style="color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:13px;padding:0 20px" valign="middle">If you forget your password then press forget password to reset your password.</td> </tr>
	                                            <tr> <td align="center" style="color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:13px;padding:0 20px" valign="middle">If you need any help in login or have any questions, please email us at <a href="mailto:support@bdtax.com.bd" style="color:#009307" target="_blank">support@bdtax.com.bd</a></td> </tr>
	                                            <tr> <td height="50">&nbsp;</td> </tr>
	                                        </tbody> 
	                                    </table> </td> </tr> 
	                                </tbody>
	                            </table> <p>&nbsp;</p>
	                        </div>
	                        ', array('{activation_url}' => $activation_url));
								// UserModule::sendMail($this->email, Yii::t('user', "Welcome to {site_name}", array('{site_name}' => Yii::app()->name)), Yii::t('user', "Welcome to BDTax. Please click on the link below to activate your account again <br/> {activation_url} <br/>if you forget your password then press forget password to reset your password.", array('{activation_url}' => $activation_url)));
								UserModule::sendMail($this->email, Yii::t('user', "Welcome to {site_name} - Please Activate Your Account", array('{site_name}' => Yii::app()->name)), $mailBody);
						}

							Yii::app()->user->setFlash('login', Yii::t('user', "Please check your email for a activation key."));

						}

					} // check attempt time//
					//END%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%New addition%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%//
					$this->addError("password", Yii::t('user', "Password is incorrect."));
					break;
				case UserIdentity::ERROR_INFO_LESS:
					$this->addError("password", Yii::t('user', "Session data missing"));
					break;
				case UserIdentity::ERROR_STATUS_TRIAL:
					$this->addError("status", 'Your trial period has ended. Please contact <a href="mailto:'.Yii::app()->params['billingEmail'].'">' . Yii::app()->params['billingEmail'] . '</a> to upgrade/change your plan.' );
					break;
			}
		}
	}

	//---------------------------------FACEBOOK-----------------------------------//

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login() {

		if ($this->_identity === NULL) {
			$this->_identity = new UserIdentity($this->username, $this->password);
			$this->_identity->authenticate();
		}

		if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
			Yii::app()->user->login($this->_identity, NULL);
			return TRUE;
		} else {
			return FALSE;
		}

	}

	//---------------------------------FACEBOOK-----------------------------------//

	private function getUserIP() {
		if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') > 0) {
				$addr = explode(",", $_SERVER['HTTP_X_FORWARDED_FOR']);
				return trim($addr[0]);
			} else {
				return $_SERVER['HTTP_X_FORWARDED_FOR'];
			}
		} else {
			return $_SERVER['REMOTE_ADDR'];
		}
	}

}
