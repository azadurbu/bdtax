<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	const ERROR_PASSWORD_INVALID=2;
	const ERROR_EMAIL_INVALID=3;
	const ERROR_STATUS_NOTACTIV=4;
	const ERROR_STATUS_BAN=5;
	const ERROR_INFO_LESS=6;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{

		$user=User::model()->notsafe()->findByAttributes(array('email'=>$this->username));


		if($user===null)
//			if (strpos($this->username,"@")) {
			$this->errorCode=self::ERROR_EMAIL_INVALID;
//			} else {
//				$this->errorCode=self::ERROR_USERNAME_INVALID;
//			}
		else if(Yii::app()->getModule('user')->encrypting($this->password)!==$user->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else if($user->status==0&&Yii::app()->getModule('user')->loginNotActiv==false)
			$this->errorCode=self::ERROR_STATUS_NOTACTIV;
		else if($user->status==-1)
			$this->errorCode=self::ERROR_STATUS_BAN;
		else if(Role::model()->findByPk($user->role_id)==null) 
			$this->errorCode=self::ERROR_INFO_LESS;
		else {
			$this->_id=$user->id;

			$this->setState('org_id', $user->org_id);

			$this->setState('role', Role::model()->findByPk($user->role_id)->role );

			if( (Role::model()->findByPk($user->role_id)->role=='customers') ){

				$this->setState('CPIId', PersonalInformation::model()->find('UserId=:data', array(':data'=>$user->id))->CPIId );

			} else if( (Role::model()->findByPk($user->role_id)->role!='superAdmin') ){

            // $this->setState('org_id', $user->org_id);

				$this->setState('CPIId', 'companyAdmin');

			} else if( (Role::model()->findByPk($user->role_id)->role=='superAdmin') ){

            // $this->setState('org_id', $user->org_id);

				$this->setState('CPIId', 'superAdmin');
			}

			$this->setState('need_redirect', 1);

			$this->errorCode=self::ERROR_NONE;

		}
		return !$this->errorCode;
	}


	    /**
     * Authenticate user
     * @return type 
     */
	    public function FBAuthenticate() 
	    {
	    	$user = User::prepareUserForAuthorisation($this->username);

	    	if($user === NULL) 
	    	{
	    		$this->errorCode = self::ERROR_USERNAME_INVALID;
	    	} 
	    	else if( !$user->ValidatePassword($this->password) ) 
	    	{
	    		$this->errorCode = self::ERROR_PASSWORD_INVALID;
	    	} 
	    	else 
	    	{         
	    		$this->_id=$user->id;
	    		$this->username=$user->username;

	    		$this->setState('role', $user->role );
	    		$this->setState('facebook_account', $user->facebook_account );

	    		$this->setState('time_limit', $user->time_limit );
	    		$name= $user->first_name.' '.$user->last_name;
	    		$this->setState('full_name', $name );


	    		$this->setState('org_id', $user->org_id);

	    		$this->setState('role', Role::model()->findByPk($user->role_id)->role );
	    		$this->setState('CPIId', PersonalInformation::model()->find('UserId=:data', array(':data'=>$user->id))->CPIId );

	    		$this->errorCode = self::ERROR_NONE;

	    	}

	    	return $this->errorCode;
	    }

    /**
    * @return integer the ID of the user record
    */
    public function getId()
    {
    	return $this->_id;
    }
}