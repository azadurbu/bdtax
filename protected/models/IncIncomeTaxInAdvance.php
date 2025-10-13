<?php

/**
 * This is the model class for table "inc_income_tax_in_advance".
 *
 * The followings are the available columns in table 'inc_income_tax_in_advance':
 * @property integer $TaxAdvanceId
 * @property integer $IncomeId
 * @property string $Description
 * @property double $Cost
 * @property string $LastUpdateAt
 * @property string $CerateAt
 */
class IncIncomeTaxInAdvance extends CActiveRecord
{
	public $SumOfIncomeTaxInAdvance;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return IncIncomeTaxInAdvance the static model class
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
		return 'inc_income_tax_in_advance';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CerateAt', 'required'),
			array('IncomeId', 'numerical', 'integerOnly'=>true),
			array('Cost', 'numerical'),
			array('Description, LastUpdateAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('TaxAdvanceId, IncomeId, Description, Cost, LastUpdateAt, CerateAt', 'safe', 'on'=>'search'),
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
			'TaxAdvanceId' => 'Tax Advance',
			'IncomeId' => 'Income',
			'Description' => 'Description',
			'Cost' => 'Cost',
			'LastUpdateAt' => 'Last Update At',
			'CerateAt' => 'Cerate At',
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

		$criteria->compare('TaxAdvanceId',$this->TaxAdvanceId);
		$criteria->compare('IncomeId',$this->IncomeId);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('Cost',$this->Cost);
		$criteria->compare('LastUpdateAt',$this->LastUpdateAt,true);
		$criteria->compare('CerateAt',$this->CerateAt,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}