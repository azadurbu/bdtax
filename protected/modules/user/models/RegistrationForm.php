<?php
/**
 * RegistrationForm class.
 * RegistrationForm is the data structure for keeping
 * user registration form data. It is used by the 'registration' action of 'UserController'.
 */
class RegistrationForm extends User {
	public $verifyPassword;
	public $verifyEmail;
	public $verifyCode;
	public $accountType;

	public $logo_image;

	public function rules() {
		$rules = array(
			array('first_name, last_name, password, verifyPassword, email, verifyEmail, accountType, verifyCode', 'required'),
			// array( 'first_name','length', 'max'=>20, 'min' => 3,'message' => Yii::t('user',"Incorrect username (length between 3 and 20 characters).")),
			array('password', 'length', 'max' => 128, 'min' => 8, 'message' => Yii::t('user', "Incorrect password (minimal length 8 symbols).")),
			array('email', 'email', 'message'=>'Email Address is not a valid email address.<br/>Please check if there is any blank space or missing "@" or "." in the email address.'),
			// array('user_type', 'safe'),
			//                      array('dob', 'date', 'format'=>'mm-dd-yyyy'),

			array('email', 'unique', 'message' => Yii::t('user', "This user's email address already exists.")),
			//array('verifyPassword', 'compare', 'compareAttribute'=>'password', 'message' => Yii::t('user',"Retype Password is incorrect.")),
			array('first_name, middle_name, last_name', 'match', 'pattern' => '/^[A-Za-z,. ]+$/u', 'message' => Yii::t('user', "Only Alphabet(a-z).")),
		);
		if (!(isset($_POST['ajax']) && $_POST['ajax'] === 'registration-form')) {
			array_push($rules, array('verifyCode', 'captcha', 'allowEmpty' => !UserModule::doCaptcha('registration')));
		}

		array_push($rules, array('verifyPassword', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('user', "Retype Password is incorrect.")));
		array_push($rules, array('verifyEmail', 'compare', 'compareAttribute' => 'email', 'message' => Yii::t('user', "Retype Email is incorrect.")));
		return $rules;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'accountType' => Yii::t('user', "Account type"),
			'verifyCode' => Yii::t('user', "Verification code"),
			'password' => Yii::t('user', 'password'),
			'verifyPassword' => Yii::t('user', 'Verify password'),
			'email' => Yii::t('user', 'Email address'),
			'verifyEmail' => Yii::t('user', 'Verify Email'),
			'accountType' => Yii::t('user', 'Account Type'),
			'first_name' => Yii::t('user', 'First Name'),
			'last_name' => Yii::t('user', 'Last Name'),
			'middle_name' => Yii::t('user', 'Middle Name'),

		);
	}

}