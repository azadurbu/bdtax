<?php

/**
 * This is the model class for table "income_tax_payment".
 *
 * The followings are the available columns in table 'income_tax_payment':
 * @property integer $IncomeTaxPaymentId
 * @property double $DeductedAtSource
 * @property double $AdvanceTax
 * @property double $TaxPaidOnReturn
 * @property double $AdjustmentTaxRefund
 * @property string $CerateAt
 * @property string $LastUpdateAt
 * @property integer $CPIId
 * @property string $EntryYear
 * @property integer $trash
 *
 * The followings are the available model relations:
 * @property Income[] $incomes
 * @property PersonalInformation $cPI
 */
class IncomeTaxPayment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return IncomeTaxPayment the static model class
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
		return 'income_tax_payment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('DeductedAtSource, AdvanceTax, TaxPaidOnReturn, AdjustmentTaxRefund, CerateAt, CPIId, EntryYear', 'required'),
			array('CPIId, trash', 'numerical', 'integerOnly'=>true),
			array('DeductedAtSource, AdvanceTax, TaxPaidOnReturn, AdjustmentTaxRefund', 'numerical'),
			array('EntryYear', 'length', 'max'=>9),
			array('LastUpdateAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IncomeTaxPaymentId, DeductedAtSource, AdvanceTax, TaxPaidOnReturn, AdjustmentTaxRefund, CerateAt, LastUpdateAt, CPIId, EntryYear, trash', 'safe', 'on'=>'search'),
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
			'incomes' => array(self::HAS_MANY, 'Income', 'IncomeTaxPaymentId'),
			'cPI' => array(self::BELONGS_TO, 'PersonalInformation', 'CPIId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IncomeTaxPaymentId' => 'Income Tax Payment',
			'DeductedAtSource' => 'Deducted At Source',
			'AdvanceTax' => 'Advance Tax',
			'TaxPaidOnReturn' => 'Tax Paid On Return',
			'AdjustmentTaxRefund' => 'Adjustment Tax Refund',
			'CerateAt' => 'Cerate At',
			'LastUpdateAt' => 'Last Update At',
			'CPIId' => 'Cpiid',
			'EntryYear' => 'Entry Year',
			'trash' => 'Trash',
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

		$criteria->compare('IncomeTaxPaymentId',$this->IncomeTaxPaymentId);
		$criteria->compare('DeductedAtSource',$this->DeductedAtSource);
		$criteria->compare('AdvanceTax',$this->AdvanceTax);
		$criteria->compare('TaxPaidOnReturn',$this->TaxPaidOnReturn);
		$criteria->compare('AdjustmentTaxRefund',$this->AdjustmentTaxRefund);
		$criteria->compare('CerateAt',$this->CerateAt,true);
		$criteria->compare('LastUpdateAt',$this->LastUpdateAt,true);
		$criteria->compare('CPIId',$this->CPIId);
		$criteria->compare('EntryYear',$this->EntryYear,true);
		$criteria->compare('trash',$this->trash);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}