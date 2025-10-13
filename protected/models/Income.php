<?php

/**
 * This is the model class for table "income".
 *
 * The followings are the available columns in table 'income':
 * @property integer $IncomeId
 * @property integer $IncomeSalariesId
 * @property double $InterestOnSecurities
 * @property integer $IncomePropertiesId
 * @property double $IncomeAgriculture
 * @property double $IncomeAgricultureBooksOfAccount
 * @property double $IncomeBusinessOrProfession
 * @property integer $IncomeShareProfitId
 * @property double $IncomeSpouseOrChild
 * @property double $CapitalGains
 * @property integer $IncomeOtherSourceId
 * @property double $TotalOf2TO10
 * @property double $ForeignIncome
 * @property double $TotalIncome
 * @property double $TaxLeviableOnTotalIncome
 * @property integer $IncomeTaxRebateId
 * @property integer $IncomeTaxRebateTotal
 * @property double $TaxPayable
 * @property integer $IncomeTaxPaymentId
 * @property double $DifferenceBetweenPayableNPayment
 * @property double $TaxExempted
 * @property double $LastYearPaidTax
 * @property double $OtherReceipts
 * @property string $CerateAt
 * @property string $LastUpdateAt
 * @property integer $CPIId
 * @property string $EntryYear
 * @property integer $trash
 *
 * The followings are the available model relations:
 * @property PersonalInformation $cPI
 * @property IncomeSalaries $incomeSalaries
 * @property IncomeHouseProperties $incomeProperties
 * @property IncomeShareProfit $incomeShareProfit
 * @property IncomeOtherSource $incomeOtherSource
 * @property IncomeTaxRebate $incomeTaxRebate
 * @property IncomeTaxPayment $incomeTaxPayment
 */
class Income extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Income the static model class
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
		return 'income';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IncomeSalariesId, InterestOnSecurities, IncomePropertiesId, IncomeAgriculture, IncomeBusinessOrProfession, IncomeShareProfitId, IncomeSpouseOrChild, CapitalGains, IncomeOtherSourceId, TotalOf2TO10, ForeignIncome, TotalIncome, TaxLeviableOnTotalIncome, IncomeTaxRebateId,IncomeTaxRebateTotal, TaxPayable, IncomeTaxPaymentId, DifferenceBetweenPayableNPayment, TaxExempted, LastYearPaidTax, OtherReceipts, CerateAt, CPIId, EntryYear, IncomeAgricultureBooksOfAccount, Income82cId, Income82cTotal, Income82cTdsTotal', 'required'),
			array('IncomeSalariesId, IncomePropertiesId, IncomeShareProfitId, IncomeOtherSourceId, IncomeTaxRebateId, IncomeTaxPaymentId, Income82cId, CPIId, trash', 'numerical', 'integerOnly'=>true),
			array('InterestOnSecurities, IncomeAgriculture, IncomeBusinessOrProfession, IncomeSpouseOrChild, CapitalGains, TotalOf2TO10, ForeignIncome, TotalIncome, TaxLeviableOnTotalIncome, TaxPayable, DifferenceBetweenPayableNPayment, TaxExempted, LastYearPaidTax, OtherReceipts', 'numerical'),
			array('EntryYear', 'length', 'max'=>9),
			array('LastUpdateAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IncomeId, IncomeSalariesId, InterestOnSecurities, IncomePropertiesId, IncomeAgriculture, IncomeBusinessOrProfession, IncomeShareProfitId, IncomeSpouseOrChild, CapitalGains, IncomeOtherSourceId, TotalOf2TO10, ForeignIncome, TotalIncome, TaxLeviableOnTotalIncome, IncomeTaxRebateId, IncomeTaxRebateTotal, TaxPayable, IncomeTaxPaymentId, DifferenceBetweenPayableNPayment, TaxExempted, LastYearPaidTax, OtherReceipts,Income82cId,Income82cTotal, Income82cTdsTotal, CerateAt, LastUpdateAt, CPIId, EntryYear, trash', 'safe', 'on'=>'search'),
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
			'cPI' => array(self::BELONGS_TO, 'PersonalInformation', 'CPIId'),
			'incomeSalaries' => array(self::BELONGS_TO, 'IncomeSalaries', 'IncomeSalariesId'),
			'incomeProperties' => array(self::BELONGS_TO, 'IncomeHouseProperties', 'IncomePropertiesId'),
			'incomeShareProfit' => array(self::BELONGS_TO, 'IncomeShareProfit', 'IncomeShareProfitId'),
			'incomeOtherSource' => array(self::BELONGS_TO, 'IncomeOtherSource', 'IncomeOtherSourceId'),
			'incomeTaxRebate' => array(self::BELONGS_TO, 'IncomeTaxRebate', 'IncomeTaxRebateId'),
			'incomeTaxPayment' => array(self::BELONGS_TO, 'IncomeTaxPayment', 'IncomeTaxPaymentId'),
			'income82c' => array(self::BELONGS_TO, 'Income82c', 'Income82cId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IncomeId' => 'Income',
			'IncomeSalariesId' => 'Income Salaries',
			'InterestOnSecurities' => 'Interest On Securities',
			'IncomePropertiesId' => 'Income Properties',
			'IncomeAgriculture' => 'Income Agriculture',
			'IncomeAgricultureBooksOfAccount' => Yii::t('income', "Do you have any Books of Account"),
			'IncomeBusinessOrProfession' => 'Income Business Or Profession',
			'IncomeShareProfitId' => 'Income Share Profit',
			'IncomeSpouseOrChild' => 'Income Spouse Or Child',
			'CapitalGains' => 'Capital Gains',
			'IncomeOtherSourceId' => 'Income Other Source',
			'TotalOf2TO10' => 'Total Of2 To10',
			'ForeignIncome' => 'Foreign Income',
			'TotalIncome' => 'Total Income',
			'TaxLeviableOnTotalIncome' => 'Tax Leviable On Total Income',
			'IncomeTaxRebateId' => 'Income Tax Rebate',
			'IncomeTaxRebateTotal' => 'Total Income Tax Rebate',
			'TaxPayable' => 'Tax Payable',
			'IncomeTaxPaymentId' => 'Income Tax Payment',
			'DifferenceBetweenPayableNPayment' => 'Difference Between Payable Npayment',
			'TaxExempted' => 'Tax Exempted',
			'LastYearPaidTax' => 'Last Year Paid Tax',
			'OtherReceipts' => 'Other Receipts',
			'Income82cId' => 'Income 82C',
			'Income82cTotal' => 'Total Income 82C',
			'Income82cTdsTotal' => 'Total Income Tds 82C',
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

		$criteria->compare('IncomeId',$this->IncomeId);
		$criteria->compare('IncomeSalariesId',$this->IncomeSalariesId);
		$criteria->compare('InterestOnSecurities',$this->InterestOnSecurities);
		$criteria->compare('IncomePropertiesId',$this->IncomePropertiesId);
		$criteria->compare('IncomeAgriculture',$this->IncomeAgriculture);
		$criteria->compare('IncomeBusinessOrProfession',$this->IncomeBusinessOrProfession);
		$criteria->compare('IncomeShareProfitId',$this->IncomeShareProfitId);
		$criteria->compare('IncomeSpouseOrChild',$this->IncomeSpouseOrChild);
		$criteria->compare('CapitalGains',$this->IncomeCapitalGains);
		$criteria->compare('IncomeOtherSourceId',$this->IncomeOtherSource);
		$criteria->compare('TotalOf2TO10',$this->TotalOf2TO10);
		$criteria->compare('ForeignIncome',$this->ForeignIncome);
		$criteria->compare('TotalIncome',$this->TotalIncome);
		$criteria->compare('TaxLeviableOnTotalIncome',$this->TaxLeviableOnTotalIncome);
		$criteria->compare('IncomeTaxRebateId',$this->IncomeTaxRebateId);
		$criteria->compare('IncomeTaxRebateTotal',$this->IncomeTaxRebateTotal);
		$criteria->compare('TaxPayable',$this->TaxPayable);
		$criteria->compare('IncomeTaxPaymentId',$this->IncomeTaxPaymentId);
		$criteria->compare('DifferenceBetweenPayableNPayment',$this->DifferenceBetweenPayableNPayment);
		$criteria->compare('TaxExempted',$this->TaxExempted);
		$criteria->compare('LastYearPaidTax',$this->LastYearPaidTax);
		$criteria->compare('OtherReceipts',$this->OtherReceipts);
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