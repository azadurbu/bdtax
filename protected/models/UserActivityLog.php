<?php

/**
 * This is the model class for table "user_activity_log".
 *
 * The followings are the available columns in table 'user_activity_log':
 * @property string $name
 * @property string $email
 * @property string $ip_address
 * @property string $activity_type
 * @property string $activity_time
 * @property integer $user_id
 * @property integer $CPIId
 * @property integer $pass_change_for_user
 */
class UserActivityLog extends CActiveRecord
{
	public $from_date;
    public $to_date;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_activity_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, ip_address, activity_type, user_id', 'required'),
			array('user_id, CPIId, pass_change_for_user', 'numerical', 'integerOnly'=>true),
			array('name, email, ip_address', 'length', 'max'=>255),
			array('activity_type', 'length', 'max'=>45),
			array('activity_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('name, email, ip_address, activity_type, activity_time, user_id, CPIId, pass_change_for_user', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'name' => 'Name',
			'email' => 'Email',
			'ip_address' => 'Ip Address',
			'activity_type' => 'Activity Type',
			'activity_time' => 'Activity Time',
			'user_id' => 'User',
			'CPIId' => 'Cpiid',
			'pass_change_for_user' => 'Pass Change For User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('ip_address',$this->ip_address,true);
		$criteria->compare('activity_type',$this->activity_type,true);
		$criteria->compare('activity_time',$this->activity_time,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('CPIId',$this->CPIId);
		$criteria->compare('pass_change_for_user',$this->pass_change_for_user);

		if(!empty($this->from_date) && empty($this->to_date))
		{
		    $criteria->condition = "activity_time >= '$this->from_date'";  // date is database date column field
		}elseif(!empty($this->to_date) && empty($this->from_date))
		{
		    $criteria->condition = "activity_time <= '$this->to_date'";
		}elseif(!empty($this->to_date) && !empty($this->from_date))
		{
		    $criteria->condition = "activity_time  >= '$this->from_date' and activity_time <= '$this->to_date'";
		}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array("defaultOrder"=>"activity_time DESC")
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserActivityLog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
