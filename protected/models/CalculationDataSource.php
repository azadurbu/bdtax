<?php

/**
 * This is the model class for table "calculation_data_source".
 *
 * The followings are the available columns in table 'calculation_data_source':
 * @property integer $CalculationId
 * @property integer $ConveynceWaiverLevel
 * @property integer $HouseRentWaiverPercent
 * @property integer $HouseRentCompareValue
 * @property integer $MedicalWaiverPercent
 * @property integer $MedicalCompareValue
 * @property integer $ProvidentFoundInterest
 * @property integer $ProvidentFoundportion
 * @property integer $ResidentialRentPercent
 * @property integer $CommercialRentPercent
 * @property integer $NormalTaxWaiverAmount
 * @property integer $FemaleTaxWaiverAmount
 * @property integer $DisableTaxWaiverAmount
 * @property integer $FreedomFighterTaxWaiverAmount
 * @property integer $AgricultureTaxWaiverAmount
 * @property integer $NRBStatusPercent
 * @property integer $MaxInvestPercent
 * @property integer $MaxDepositeValue
 * @property integer $TaxRebatePercent
 * @property string $CreateAt
 * @property string $LastvisitAt
 * @property string $EntryYear
 * @property integer $trash
 */
class CalculationDataSource extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CalculationDataSource the static model class
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
		return 'calculation_data_source';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ConveynceWaiverLevel, HouseRentWaiverPercent, HouseRentCompareValue, MedicalWaiverPercent, MedicalCompareValue, ProvidentFoundInterest, ProvidentFoundportion, ResidentialRentPercent, CommercialRentPercent, NormalTaxWaiverAmount, FemaleTaxWaiverAmount, DisableTaxWaiverAmount, ChildDisableTaxWaiverAmount, AgedTaxWaiverAmount, FreedomFighterTaxWaiverAmount, AgricultureTaxWaiverAmount, NRBStatusPercent, MaxInvestPercent, MaxDepositeValue, TaxRebatePercent, MedicalAllowanceExamtedForDisability, ReceivedTransportValue, ReceivedTransportPercentOfBasic, DeemedFreeAccPercentOfBasic, GratuityExemptedAmount, WPPFExemptedAmount, EntryYear', 'required'),
			array('ConveynceWaiverLevel, HouseRentWaiverPercent, HouseRentCompareValue, MedicalWaiverPercent, MedicalCompareValue, ProvidentFoundInterest, ProvidentFoundportion, ResidentialRentPercent, CommercialRentPercent, NormalTaxWaiverAmount, FemaleTaxWaiverAmount, DisableTaxWaiverAmount, ChildDisableTaxWaiverAmount, AgedTaxWaiverAmount, FreedomFighterTaxWaiverAmount, AgricultureTaxWaiverAmount, NRBStatusPercent, MaxInvestPercent, MaxDepositeValue, TaxRebatePercent, MedicalAllowanceExamtedForDisability, ReceivedTransportValue, ReceivedTransportPercentOfBasic, DeemedFreeAccPercentOfBasic, GratuityExemptedAmount, WPPFExemptedAmount, trash', 'numerical', 'integerOnly'=>true),
			array('EntryYear', 'length', 'max'=>9),
			array('LastvisitAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CalculationId, ConveynceWaiverLevel, HouseRentWaiverPercent, HouseRentCompareValue, MedicalWaiverPercent, MedicalCompareValue, ProvidentFoundInterest, ProvidentFoundportion, ResidentialRentPercent, CommercialRentPercent, NormalTaxWaiverAmount, FemaleTaxWaiverAmount, DisableTaxWaiverAmount, ChildDisableTaxWaiverAmount, AgedTaxWaiverAmount, FreedomFighterTaxWaiverAmount, AgricultureTaxWaiverAmount, NRBStatusPercent, MaxInvestPercent, MaxDepositeValue, TaxRebatePercent, MedicalAllowanceExamtedForDisability, ReceivedTransportValue, ReceivedTransportPercentOfBasic, DeemedFreeAccPercentOfBasic, GratuityExemptedAmount, WPPFExemptedAmount, CreateAt, LastvisitAt, EntryYear, trash', 'safe', 'on'=>'search'),
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
			'CalculationId' => 'Calculation',
			'ConveynceWaiverLevel' => 'Conveyance Waiver Level',
			'HouseRentWaiverPercent' => 'House Rent Waiver Percent',
			'HouseRentCompareValue' => 'House Rent Compare Value',
			'MedicalWaiverPercent' => 'Medical Waiver Percent',
			'MedicalCompareValue' => 'Medical Compare Value',
			'ProvidentFoundInterest' => 'Provident Fund Interest',
			'ProvidentFoundportion' => 'Provident Fund portion',
			'ResidentialRentPercent' => 'Residential Rent Percent',
			'CommercialRentPercent' => 'Commercial Rent Percent',
			'NormalTaxWaiverAmount' => 'Normal Tax Waiver Amount',
			'FemaleTaxWaiverAmount' => 'Female Tax Waiver Amount',
			'DisableTaxWaiverAmount' => 'Disable Tax Waiver Amount',
			'ChildDisableTaxWaiverAmount' => 'Disable Tax Waiver Amount for Child',
			'AgedTaxWaiverAmount' => 'Tax Waiver Amount for Old Person (65+ years)',
			'FreedomFighterTaxWaiverAmount' => 'Freedom Fighter Tax Waiver Amount',
			'AgricultureTaxWaiverAmount' => 'Agriculture Tax Waiver Amount',
			'NRBStatusPercent' => 'Nrbstatus Percent',
			'MaxInvestPercent' => 'Max Invest Percent',
			'MaxDepositeValue' => 'Max Deposite Value',
			'TaxRebatePercent' => 'Tax Rebate Percent',
			'MedicalAllowanceExamtedForDisability' => 'Examted Medical Allowance For Disability',
			'ReceivedTransportValue' => 'Value of Received Transport', 
			'ReceivedTransportPercentOfBasic' => 'Percentage of Received Transport Basic', 
			'DeemedFreeAccPercentOfBasic' => 'Percentage of Basic Will be Applied for Deemed Free Accomodation', 
			"GratuityExemptedAmount" => "Gratuity Exempted Amount", 
			"WPPFExemptedAmount" => "Workers Profit Participation Fund Exempted Amount",
			'CreateAt' => 'Create At',
			'LastvisitAt' => 'Lastvisit At',
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

		$criteria->compare('CalculationId',$this->CalculationId);
		$criteria->compare('ConveynceWaiverLevel',$this->ConveynceWaiverLevel);
		$criteria->compare('HouseRentWaiverPercent',$this->HouseRentWaiverPercent);
		$criteria->compare('HouseRentCompareValue',$this->HouseRentCompareValue);
		$criteria->compare('MedicalWaiverPercent',$this->MedicalWaiverPercent);
		$criteria->compare('MedicalCompareValue',$this->MedicalCompareValue);
		$criteria->compare('ProvidentFoundInterest',$this->ProvidentFoundInterest);
		$criteria->compare('ProvidentFoundportion',$this->ProvidentFoundportion);
		$criteria->compare('ResidentialRentPercent',$this->ResidentialRentPercent);
		$criteria->compare('CommercialRentPercent',$this->CommercialRentPercent);
		$criteria->compare('NormalTaxWaiverAmount',$this->NormalTaxWaiverAmount);
		$criteria->compare('FemaleTaxWaiverAmount',$this->FemaleTaxWaiverAmount);
		$criteria->compare('DisableTaxWaiverAmount',$this->DisableTaxWaiverAmount);
		$criteria->compare('FreedomFighterTaxWaiverAmount',$this->FreedomFighterTaxWaiverAmount);
		$criteria->compare('AgricultureTaxWaiverAmount',$this->AgricultureTaxWaiverAmount);
		$criteria->compare('NRBStatusPercent',$this->NRBStatusPercent);
		$criteria->compare('MaxInvestPercent',$this->MaxInvestPercent);
		$criteria->compare('MaxDepositeValue',$this->MaxDepositeValue);
		$criteria->compare('TaxRebatePercent',$this->TaxRebatePercent);
		$criteria->compare('MedicalAllowanceExamtedForDisability',$this->MedicalAllowanceExamtedForDisability);
		$criteria->compare('CreateAt',$this->CreateAt,true);
		$criteria->compare('LastvisitAt',$this->LastvisitAt,true);
		$criteria->compare('EntryYear',$this->EntryYear,true);
		$criteria->compare('trash',$this->trash);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}