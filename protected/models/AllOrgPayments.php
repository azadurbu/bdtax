<?php

/**
 * This is the model class for table "all_org_payments".
 *
 * The followings are the available columns in table 'all_org_payments':
 * @property integer $org_id
 * @property string $contact_first_name
 * @property string $contact_last_name
 * @property string $organization_name
 * @property string $contact_email
 * @property string $org_plan
 * @property string $payment_date
 * @property string $payment_from
 * @property string $payment_to
 * @property string $tran_id
 * @property double $amount
 * @property double $store_amount
 * @property string $discount_type
 * @property double $discount_value
 */
class AllOrgPayments extends CActiveRecord
{
	public $from_date;
	public $to_date;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AllOrgPayments the static model class
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
		return 'all_org_payments';
	}

	public function primaryKey()
    {
        return 'org_id';
    }



	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contact_first_name, contact_last_name, organization_name, contact_email', 'required'),
			array('org_id', 'numerical', 'integerOnly'=>true),
			array('amount, store_amount, discount_value', 'numerical'),
			array('contact_first_name, contact_last_name, organization_name, contact_email', 'length', 'max'=>255),
			array('org_plan', 'length', 'max'=>10),
			array('tran_id', 'length', 'max'=>50),
			array('discount_type', 'length', 'max'=>7),
			array('payment_date, payment_from, payment_to', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('org_id, contact_first_name, contact_last_name, organization_name, contact_email, org_plan, payment_date, payment_from, payment_to, tran_id, amount, store_amount, discount_type, discount_value, from_date, to_date', 'safe', 'on'=>'search'),
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
			'org_id' => 'Org',
			'contact_first_name' => 'Contact First Name',
			'contact_last_name' => 'Contact Last Name',
			'organization_name' => 'Organization Name',
			'contact_email' => 'Contact Email',
			'org_plan' => 'Org Plan',
			'payment_date' => 'Payment Date',
			'payment_from' => 'Payment From',
			'payment_to' => 'Payment To',
			'tran_id' => 'Transaction ID',
			'amount' => 'Payment',
			'store_amount' => 'Store Payment',
			'discount_type' => 'Discount Type',
			'discount_value' => 'Discount Value',
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

		$criteria->compare('org_id',$this->org_id);
		$criteria->compare('contact_first_name',$this->contact_first_name,true);
		$criteria->compare('contact_last_name',$this->contact_last_name,true);
		$criteria->compare('organization_name',$this->organization_name,true);
		$criteria->compare('contact_email',$this->contact_email,true);
		$criteria->compare('org_plan',$this->org_plan,true);
		$criteria->compare('payment_date',$this->payment_date,true);
		$criteria->compare('payment_from',$this->payment_from,true);
		$criteria->compare('payment_to',$this->payment_to,true);
		$criteria->compare('tran_id',$this->tran_id,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('store_amount',$this->store_amount);
		$criteria->compare('discount_type',$this->discount_type,true);
		$criteria->compare('discount_value',$this->discount_value);

		if(!empty($this->from_date) && empty($this->to_date))
		{
		    $criteria->addCondition('payment_date >= "'.$this->from_date.'" ');
		   // $criteria->condition = "payment_date >= '$this->from_date'";  // date is database date column field
		}elseif(!empty($this->to_date) && empty($this->from_date))
		{
		    $criteria->addCondition('payment_date <=  "'.$this->to_date.'" ');
		    //$criteria->condition = "payment_date <= '$this->to_date'";
		}elseif(!empty($this->to_date) && !empty($this->from_date))
		{
		    $criteria->addCondition('payment_date >=  "'.$this->from_date.'" ');
		    $criteria->addCondition('payment_date <=  "'.$this->to_date.'" ');

		    //$criteria->condition = "payment_date  >= '$this->from_date' and payment_date <= '$this->to_date'";
		}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}