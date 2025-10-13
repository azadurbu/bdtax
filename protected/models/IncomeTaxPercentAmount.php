<?php

/**
 * This is the model class for table "income_tax_percent_amount".
 *
 * The followings are the available columns in table 'income_tax_percent_amount':
 * @property integer $IncomeTaxPercentAmountId
 * @property integer $Amount
 * @property integer $Percent
 * @property string $CreateAt
 * @property string $LastUpdateAt
 * @property string $EntryYear
 */
class IncomeTaxPercentAmount extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return IncomeTaxPercentAmount the static model class
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
		return 'income_tax_percent_amount';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Amount, Percent, EntryYear', 'required'),
			array('Amount, Percent', 'numerical', 'integerOnly'=>true),
			array('EntryYear', 'length', 'max'=>9),
			array('LastUpdateAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IncomeTaxPercentAmountId, Amount, Percent, CreateAt, LastUpdateAt, EntryYear', 'safe', 'on'=>'search'),
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
			'IncomeTaxPercentAmountId' => 'Income Tax Percent Amount',
			'Amount' => 'Amount',
			'Percent' => 'Percent',
			'CreateAt' => 'Create At',
			'LastUpdateAt' => 'Last Update At',
			'EntryYear' => 'Entry Year',
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

		$criteria->compare('IncomeTaxPercentAmountId',$this->IncomeTaxPercentAmountId);
		$criteria->compare('Amount',$this->Amount);
		$criteria->compare('Percent',$this->Percent);
		$criteria->compare('CreateAt',$this->CreateAt,true);
		$criteria->compare('LastUpdateAt',$this->LastUpdateAt,true);
		$criteria->compare('EntryYear',$this->EntryYear,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}