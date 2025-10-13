<?php

/**
 * This is the model class for table "organizations".
 *
 * The followings are the available columns in table 'organizations':
 * @property integer $id
 * @property string $organization_name
 * @property string $contact_first_name
 * @property string $contact_last_name
 * @property string $contact_email
 * @property string $address_line1
 * @property string $address_line2
 * @property string $city
 * @property string $zip_code
 * @property string $phone_number
 * @property integer $adminUser_id
 * @property string $status
 */
class Organizations extends CActiveRecord
{

    public $from_date;
    public $to_date;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Organizations the static model class
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
		return 'organizations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('org_plan, trial_start_date, organization_name, contact_first_name, contact_last_name, contact_email, city, zip_code, phone_number, payment_method_id,etin', 'required'),
			array('adminUser_id, payment_method_id', 'numerical', 'integerOnly'=>true),
			array('organization_name, contact_first_name, contact_last_name, contact_email, address_line1, address_line2, city, zip_code, phone_number', 'length', 'max'=>255),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, create_at, organization_name, contact_first_name, contact_last_name, contact_email, address_line1, address_line2, city, zip_code, phone_number, adminUser_id, status, org_plan, trial_start_date,from_date, to_date', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'org_plan' => Yii::t("org_profile","Plan"),
			'organization_name' => Yii::t("org_profile","Company Name"),
			'contact_first_name' => Yii::t("org_profile","Contact First Name"),
			'contact_last_name' => Yii::t("org_profile","Contact Last Name"),
			'contact_email' => Yii::t("org_profile","Contact Email"),
			'address_line1' => Yii::t("org_profile","Address Line 1"),
			'address_line2' => Yii::t("org_profile","Address Line 2"),
			'city' => Yii::t("org_profile","City"),
			'zip_code' => Yii::t("org_profile","Zip Code"),
			'phone_number' => Yii::t("org_profile","Phone Number"),
			'payment_method_id' => Yii::t("org_profile","Payment Method"),
			'adminUser_id' => 'Admin User',
			'status' => 'Status',
			'create_at'=>'Created On',
			'etin' => 'ETIN',
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
		$criteria->compare('org_plan',$this->org_plan,true);
		$criteria->compare('organization_name',$this->organization_name,true);
		$criteria->compare('create_at',$this->create_at,true);
		$criteria->compare('contact_first_name',$this->contact_first_name,true);
		$criteria->compare('contact_last_name',$this->contact_last_name,true);
		$criteria->compare('contact_email',$this->contact_email,true);
		$criteria->compare('address_line1',$this->address_line1,true);
		$criteria->compare('address_line2',$this->address_line2,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('zip_code',$this->zip_code,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('adminUser_id',$this->adminUser_id);
		$criteria->compare('status',$this->status,true);
		
		//$criteria->order='create_at DESC';


        if(!empty($this->from_date) && empty($this->to_date))
        {
            $criteria->condition = "create_at >= '".$this->from_date." 00:00:01'";  // date is database date column field
        }elseif(!empty($this->to_date) && empty($this->from_date))
        {
            $criteria->condition = "create_at <= '".$this->to_date." 23:59:59'";
        }elseif(!empty($this->to_date) && !empty($this->from_date))
        {
            $criteria->condition = "create_at  >= '".$this->from_date." 00:00:01' and create_at <= '".$this->to_date." 23:59:59'";
        }



		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array("defaultOrder"=>"create_at DESC")
		));
	}
}