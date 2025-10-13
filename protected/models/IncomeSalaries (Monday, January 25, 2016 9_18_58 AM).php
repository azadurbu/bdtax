<?php

/**
 * This is the model class for table "income_salaries".
 *
 * The followings are the available columns in table 'income_salaries':
 * @property integer $IncomeSalariesId
 * @property double $BasicPay
 * @property double $SpecialPay
 * @property double $DearnessAllowance
 * @property double $ConveyanceAllowance
 * @property double $HouseRentAllowance
 * @property double $MedicalAllowance
 * @property double $ServantAllowance
 * @property double $LeaveAllowance
 * @property double $HonorariumOrReward
 * @property double $OvertimeAllowance
 * @property double $Bonus
 * @property double $OtherAllowances
 * @property double $EmployersContributionProvidentFund
 * @property double $InterestAccruedProvidentFund
 * @property double $DeemedIncomeTransport
 * @property double $DeemedFreeAccommodation
 * @property double $Others
  * @property double $ConveyanceAllowance_1
 * @property double $HouseRentAllowance_1
 * @property double $MedicalAllowance_1
 * @property double $InterestAccruedProvidentFund_1
   * @property double $ConveyanceAllowance_2
 * @property double $HouseRentAllowance_2
 * @property double $MedicalAllowance_2
 * @property double $InterestAccruedProvidentFund_2
 * @property double $NetSalaryIncome
 * @property double $NetTaxWaiver
 * @property double $NetTaxableIncome
 * @property integer $CPIId
 * @property string $CreateAt
 * @property string $LastvisitAt
 * @property string $EntryYear
 * @property integer $trash
 *
 * The followings are the available model relations:
 * @property Income[] $incomes
 * @property PersonalInformation $cPI
 */
class IncomeSalaries extends CActiveRecord
{

	public $SumTaxableIncome;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return IncomeSalaries the static model class
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
		return 'income_salaries';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('BasicPay, ConveyanceAllowance, HouseRentAllowance, MedicalAllowance, NetTaxableIncome, CPIId, EntryYear', 'required'),
			array('BasicPay, NetTaxableIncome, CPIId, EntryYear', 'required'),
			array('CPIId, trash', 'numerical', 'integerOnly'=>true),
			array('BasicPay, SpecialPay, DearnessAllowance, ConveyanceAllowance, HouseRentAllowance, MedicalAllowance, ServantAllowance, LeaveAllowance, HonorariumOrReward, OvertimeAllowance, Bonus, OtherAllowances, EmployersContributionProvidentFund, InterestAccruedProvidentFund, DeemedIncomeTransport, DeemedFreeAccommodation, Others, NetTaxableIncome', 'numerical'),
			array('EntryYear', 'length', 'max'=>9),
			array('DOB, LastvisitAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IncomeSalariesId, BasicPay, SpecialPay, DearnessAllowance, ConveyanceAllowance, HouseRentAllowance, MedicalAllowance, ServantAllowance, LeaveAllowance, HonorariumOrReward, OvertimeAllowance, Bonus, OtherAllowances, EmployersContributionProvidentFund, InterestAccruedProvidentFund, DeemedIncomeTransport, DeemedFreeAccommodation, Others, ConveyanceAllowance_1, HouseRentAllowance_1, MedicalAllowance_1, InterestAccruedProvidentFund_1, ConveyanceAllowance_2, HouseRentAllowance_2, MedicalAllowance_2, InterestAccruedProvidentFund_2, NetSalaryIncome, NetTaxWaiver, NetTaxableIncome, CPIId, CreateAt, LastvisitAt, EntryYear, trash', 'safe'),
			array('IncomeSalariesId, BasicPay, SpecialPay, DearnessAllowance, ConveyanceAllowance, HouseRentAllowance, MedicalAllowance, ServantAllowance, LeaveAllowance, HonorariumOrReward, OvertimeAllowance, Bonus, OtherAllowances, EmployersContributionProvidentFund, InterestAccruedProvidentFund, DeemedIncomeTransport, DeemedFreeAccommodation, Others, NetTaxableIncome, CPIId, CreateAt, LastvisitAt, EntryYear, trash', 'safe', 'on'=>'search'),
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
			'incomes' => array(self::HAS_MANY, 'Income', 'IncomeSalariesId'),
			'cPI' => array(self::BELONGS_TO, 'PersonalInformation', 'CPIId'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IncomeSalariesId' => 'Income Salaries',
			'BasicPay' => Yii::t('income',"Basic Pay"),
			'SpecialPay' => Yii::t('income',"Special Pay"),
			'DearnessAllowance' => Yii::t('income','Dearness Allowance'),
			'ConveyanceAllowance' => Yii::t('income','Conveyance Allowance'),
			'HouseRentAllowance' => Yii::t('income','House Rent Allowance'),
			'MedicalAllowance' => Yii::t('income','Medical Allowance'),
			'ServantAllowance' => Yii::t('income','Servant Allowance'),
			'LeaveAllowance' => Yii::t('income','Leave Allowance'),
			'HonorariumOrReward' => Yii::t('income','Honorarium or Reward'),
			'OvertimeAllowance' => Yii::t('income','Overtime Allowance'),
			'Bonus' => Yii::t('income','Bonus'),
			'OtherAllowances' => Yii::t('income','Other Allowances'),
			'EmployersContributionProvidentFund' => Yii::t('income','Employers Contribution Provident Fund'),
			'InterestAccruedProvidentFund' => Yii::t('income','Interest Accrued Provident Fund'),
			'DeemedIncomeTransport' => Yii::t('income','Deemed Income Transport'),
			'DeemedFreeAccommodation' => Yii::t('income','Deemed Free Accommodation'),
			'Others' => Yii::t('income','Others'),
			'NetTaxableIncome' => Yii::t('income','Net Taxable Income'),
			'CPIId' => 'Cpiid',
			'DOB' => 'Dob',
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

		$criteria->compare('IncomeSalariesId',$this->IncomeSalariesId);
		$criteria->compare('BasicPay',$this->BasicPay);
		$criteria->compare('SpecialPay',$this->SpecialPay);
		$criteria->compare('DearnessAllowance',$this->DearnessAllowance);
		$criteria->compare('ConveyanceAllowance',$this->ConveyanceAllowance);
		$criteria->compare('HouseRentAllowance',$this->HouseRentAllowance);
		$criteria->compare('MedicalAllowance',$this->MedicalAllowance);
		$criteria->compare('ServantAllowance',$this->ServantAllowance);
		$criteria->compare('LeaveAllowance',$this->LeaveAllowance);
		$criteria->compare('HonorariumOrReward',$this->HonorariumOrReward);
		$criteria->compare('OvertimeAllowance',$this->OvertimeAllowance);
		$criteria->compare('Bonus',$this->Bonus);
		$criteria->compare('OtherAllowances',$this->OtherAllowances);
		$criteria->compare('EmployersContributionProvidentFund',$this->EmployersContributionProvidentFund);
		$criteria->compare('InterestAccruedProvidentFund',$this->InterestAccruedProvidentFund);
		$criteria->compare('DeemedIncomeTransport',$this->DeemedIncomeTransport);
		$criteria->compare('DeemedFreeAccommodation',$this->DeemedFreeAccommodation);
		$criteria->compare('Others',$this->Others);
		$criteria->compare('NetTaxableIncome',$this->NetTaxableIncome);
		$criteria->compare('CPIId',$this->CPIId);
		$criteria->compare('DOB',$this->DOB,true);
		$criteria->compare('CreateAt',$this->CreateAt,true);
		$criteria->compare('LastvisitAt',$this->LastvisitAt,true);
		$criteria->compare('EntryYear',$this->EntryYear,true);
		$criteria->compare('trash',$this->trash);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}
}