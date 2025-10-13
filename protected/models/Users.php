<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $password
 * @property string $email
 * @property string $activkey
 * @property string $create_at
 * @property string $lastvisit_at
 * @property integer $superuser
 * @property integer $status
 * @property integer $role_id
 * @property string $first_name
 * @property string $last_name
 * @property string $subscription
 * @property string $mobile
 * @property integer $trash
 *
 * The followings are the available model relations:
 * @property PersonalInformation[] $personalInformations
 * @property Role $role
 */
class Users extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('password, email, create_at, role_id, first_name, last_name, subscription', 'required'),
			array('superuser, status, role_id, trash', 'numerical', 'integerOnly'=>true),
			array('password, email, activkey', 'length', 'max'=>128),
			array('first_name, last_name, subscription', 'length', 'max'=>255),
			array('mobile', 'length', 'max'=>50),
			array('lastvisit_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, password, email, activkey, create_at, lastvisit_at, superuser, status, role_id, first_name, last_name, subscription, mobile, trash', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'personalInformations' => array(self::HAS_MANY, 'PersonalInformation', 'UserId'),
			'role' => array(self::BELONGS_TO, 'Role', 'role'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'password' => 'Password',
			'email' => 'Email',
			'activkey' => 'Activkey',
			'create_at' => 'Create At',
			'lastvisit_at' => 'Lastvisit At',
			'superuser' => 'Superuser',
			'status' => 'Status',
			'role_id' => 'Assigned Role',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'subscription' => 'Subscription',
			'mobile' => 'Mobile',
			'trash' => 'Trash',
			'Role' => 'Assigned Role',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('activkey',$this->activkey,true);
		$criteria->compare('create_at',$this->create_at,true);
		$criteria->compare('lastvisit_at',$this->lastvisit_at,true);
		$criteria->compare('superuser',$this->superuser);
		$criteria->compare('status',$this->status);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('subscription',$this->subscription,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('trash',$this->trash);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function userFullName() {
		return $this->first_name . " " . $this->last_name;
	}
}