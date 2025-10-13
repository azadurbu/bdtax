<?php

/**
 * This is the model class for table "all_ind_payments".
 *
 * The followings are the available columns in table 'all_ind_payments':
 * @property integer $CPIId
 * @property integer $UserId
 * @property string $Name
 * @property string $email
 * @property string $payment_year
 * @property string $payment_date
 * @property string $tran_id
 * @property double $amount
 * @property double $store_amount
 * @property string $discount_type
 * @property double $discount_value
 */
class AllIndPayments extends CActiveRecord
{

	public $from_date;
	public $to_date;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AllIndPayments the static model class
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
		return 'all_ind_payments';
	}

	public function primaryKey()
    {
        return 'CPIId';
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CPIId, UserId', 'numerical', 'integerOnly'=>true),
			array('amount, store_amount, discount_value', 'numerical'),
			array('Name', 'length', 'max'=>80),
			array('email', 'length', 'max'=>128),
			array('payment_year, tran_id', 'length', 'max'=>50),
			array('discount_type', 'length', 'max'=>7),
			array('payment_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CPIId, UserId, Name, email, payment_year, payment_date, tran_id, amount, store_amount, discount_type, discount_value, from_date, to_date', 'safe', 'on'=>'search'),
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
			'CPIId' => 'Cpiid',
			'UserId' => 'User',
			'Name' => 'Name',
			'email' => 'Email',
			'payment_year' => 'Payment Year',
			'payment_date' => 'Payment Date',
			'tran_id' => 'Transaction ID ',
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

		$criteria->compare('CPIId',$this->CPIId);
		$criteria->compare('UserId',$this->UserId);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('payment_year',$this->payment_year,true);
		$criteria->compare('payment_date',$this->payment_date,true);
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