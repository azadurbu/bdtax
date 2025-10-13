<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {
	private $_id;
	const ERROR_PASSWORD_INVALID = 2;
	const ERROR_EMAIL_INVALID = 3;
	const ERROR_STATUS_NOTACTIV = 4;
	const ERROR_STATUS_BAN = 5;
	const ERROR_INFO_LESS = 6;
	const ERROR_FAILED_LOGIN = 7;
	const ERROR_STATUS_NOTFB = 'The email you are trying to login with is registered as an organizational user in bdtax.com.bd. Currently we ONLY allow individual users to login through Facebook.';
	const ERROR_STATUS_TRIAL = 8;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate() {

		$user = User::model()->notsafe()->findByAttributes(array('email' => $this->username));
		$failedData = FailedLogins::model()->find('email=:data1', array(':data1' => $this->username));
/*		if ($user->facebook_account!=1) {

Yii::app()->getModule('user')->encrypting($user->password)
}

echo $this->password.'<br>';
echo $user->password;*/

		if ($user === null) {
			$this->errorCode = self::ERROR_EMAIL_INVALID;
		} else if (($user->status == 0) && (isset($failedData->time)) && ($failedData->time >= 3)) {
			$this->errorCode = self::ERROR_FAILED_LOGIN;
			if ($failedData != null) {
				$failedData->delete();
			}
		} else if (Yii::app()->getModule('user')->encrypting($this->password) !== $user->password) {
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		} else if ($user->status == 0 && Yii::app()->getModule('user')->loginNotActiv == false) {
			$this->errorCode = self::ERROR_STATUS_NOTACTIV;
		} else if ($user->status == -1) {
			$this->errorCode = self::ERROR_STATUS_BAN;
		} else if (Role::model()->findByPk($user->role_id) == null) {
			$this->errorCode = self::ERROR_INFO_LESS;
		} else {
			
			$TrialStartDate = date("Y-m-d");
			$orgPlan = "Trial";
			if ( ($user->role_id == 3 || $user->role_id == 4) && $user->org_id != "" ) {
				$org = Organizations::model()->find(array('condition' => "id=".$user->org_id));
				$TrialStartDate = $org->trial_start_date;
				$orgPlan = $org->org_plan;
			}
			/*
			$orgPlan = "Trial";
			$days = 0;
			$TrialStartDate = date("Y-m-d");

			$trialPeriod = CompanyPlan::model()->find(array('condition' => "plan='Trial'"))->trial_period;
			
			if ( ($user->role_id == 3 || $user->role_id == 4) && $user->org_id != "" ) {

				$org = Organizations::model()->find(array('condition' => "id=".$user->org_id));

				$date1=date_create( $org->trial_start_date );
				$date2=date_create(date("Y-m-d"));
		    	$diff=date_diff($date1, $date2);

    			$days = $diff->format("%R%a");

    			$orgPlan = $org->org_plan;
    			$TrialStartDate = $org->trial_start_date;
			}

    		if ($user->role_id == 3 && $orgPlan == "Trial" && $days > $trialPeriod) {
    			$this->errorCode = self::ERROR_STATUS_TRIAL;
    		}
    		else {
    		*/
    			$this->setState('TAX_YEAR', Yii::app()->controller->calculateTaxYear());
    			
    			$this->_id = $user->id;

    			$this->setState('org_id', $user->org_id);
    			$this->setState('first_name', $user->first_name);
    			$this->setState('last_name', $user->last_name);
    			$this->setState('TrialStartDate', $TrialStartDate);
    			$this->setState('org_plan', $orgPlan);

    			$this->setState('role', Role::model()->findByPk($user->role_id)->role);

    			if ((Role::model()->findByPk($user->role_id)->role == 'customers')) {

    				$this->setState('CPIId', PersonalInformation::model()->find('UserId=:data', array(':data' => $user->id))->CPIId);

    			} else if ((Role::model()->findByPk($user->role_id)->role != 'superAdmin')) {

    				// $this->setState('org_id', $user->org_id);

    				$this->setState('CPIId', 'companyAdmin');

    			} else if ((Role::model()->findByPk($user->role_id)->role == 'superAdmin')) {

    				// $this->setState('org_id', $user->org_id);

    				$this->setState('CPIId', 'superAdmin');
    			}

    			$this->setState('need_redirect', 1);

    			$this->errorCode = self::ERROR_NONE;
    		/*
    		}
			*/
			

		}
		return !$this->errorCode;
	}

	/**
	 * Authenticate user
	 * @return type
	 */
	public function FBAuthenticate() {

		$user = User::model()->notsafe()->findByAttributes(array('email' => $this->username));

		if ($user === null) {
			$this->errorCode = self::ERROR_EMAIL_INVALID;
		} else if ($user->status == -1) {
			$this->errorCode = self::ERROR_STATUS_BAN;
		} else if (Role::model()->findByPk($user->role_id) == null) {
			$this->errorCode = self::ERROR_INFO_LESS;
		} else if ($user->role_id != 2) {
			$this->errorCode = self::ERROR_STATUS_NOTFB;
		} else {
			$this->_id = $user->id;

			$this->setState('TAX_YEAR', Yii::app()->controller->calculateTaxYear());

			$this->setState('org_id', $user->org_id);
            $this->setState('first_name', $user->first_name);
            $this->setState('last_name', $user->last_name);
			$this->setState('facebook_account', 1);

			$this->setState('role', Role::model()->findByPk($user->role_id)->role);

			if (PersonalInformation::model()->find('UserId=:data', array(':data' => $user->id))) {

				$this->setState('CPIId', PersonalInformation::model()->find('UserId=:data', array(':data' => $user->id))->CPIId);

			} else {

				$model_PI = new PersonalInformation;
				$model_PI->UserId = $user->id;
				$model_PI->save(false);

				$this->setState('CPIId', $model_PI->CPIId);
			}

			$this->setState('need_redirect', 1);
			$this->setState('FBId', $user->activkey);

			$this->errorCode = self::ERROR_NONE;

		}
		return !$this->errorCode;

	}

	/**
	 * @return integer the ID of the user record
	 */
	public function getId() {
		return $this->_id;
	}
}