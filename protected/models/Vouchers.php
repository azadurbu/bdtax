<?php

/**
 * This is the model class for table "vouchers".
 *
 * The followings are the available columns in table 'vouchers':
 * @property string $id
 * @property integer $user_id
 * @property integer $org_id
 * @property string $voucher_code
 * @property string $discount_type
 * @property double $discount_value
 * @property string $response_data
 * @property string $is_used
 * @property string $created_at
 * @property string $updated_at
 */
class Vouchers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Vouchers the static model class
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
		return 'vouchers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, org_id', 'numerical', 'integerOnly'=>true),
			array('discount_value', 'numerical'),
			array('voucher_code', 'length', 'max'=>150),
			array('discount_type', 'length', 'max'=>7),
			array('is_used', 'length', 'max'=>3),
			array('response_data, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, org_id, voucher_code, discount_type, discount_value, response_data, is_used, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'org_id' => 'Org',
			'voucher_code' => 'Voucher Code',
			'discount_type' => 'Discount Type',
			'discount_value' => 'Discount Value',
			'response_data' => 'Response Data',
			'is_used' => 'Is Used',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('org_id',$this->org_id);
		$criteria->compare('voucher_code',$this->voucher_code,true);
		$criteria->compare('discount_type',$this->discount_type,true);
		$criteria->compare('discount_value',$this->discount_value);
		$criteria->compare('response_data',$this->response_data,true);
		$criteria->compare('is_used',$this->is_used,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}