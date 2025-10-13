<?php

/**
 * This is the model class for table "company_plan".
 *
 * The followings are the available columns in table 'company_plan':
 * @property integer $id
 * @property string $plan
 * @property integer $trial_period
 * @property double $price
 * @property integer $max_number_of_users
 * @property string $created_at
 * @property string $updated_at
 */
class CompanyPlan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CompanyPlan the static model class
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
		return 'company_plan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('trial_period, max_number_of_users', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('plan', 'length', 'max'=>10),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, plan, trial_period, price, max_number_of_users, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'plan' => 'Plan',
			'trial_period' => 'Trial Period',
			'price' => 'Price',
			'max_number_of_users' => 'Max Number Of Users',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
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
		$criteria->compare('plan',$this->plan,true);
		$criteria->compare('trial_period',$this->trial_period);
		$criteria->compare('price',$this->price);
		$criteria->compare('max_number_of_users',$this->max_number_of_users);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}