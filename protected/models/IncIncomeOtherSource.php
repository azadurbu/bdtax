<?php

/**
 * This is the model class for table "inc_income_other_source".
 *
 * The followings are the available columns in table 'inc_income_other_source':
 * @property integer $IncomeOtherSourceId
 * @property integer $IncomeId
 * @property string $Type
 * @property string $Description
 * @property double $Cost
 * @property string $CerateAt
 * @property string $LastUpdateAt
 * @property integer $CPIId
 * @property string $EntryYear
 * @property integer $trash
 *
 * The followings are the available model relations:
 * @property PersonalInformation $cPI
 * @property Income $income
 */
class IncIncomeOtherSource extends CActiveRecord
{
	public $SumOfIncomeOtherSource;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return IncIncomeOtherSource the static model class
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
		return 'inc_income_other_source';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CerateAt, CPIId, EntryYear', 'required'),
			array('IncomeId, CPIId, trash', 'numerical', 'integerOnly'=>true),
			array('Cost, InterestFromMutualFund, InterestFromMutualFund_1, CashDividend, CashDividend_1, InterestIncomeFromWEDB, InterestIncomeFromWEDB_1, USDollarPremium, USDollarPremium_1, PoundSterlingPremium, PoundSterlingPremium_1, EuroPremium, EuroPremium_1, InvestmentInInstrument, InterestFromInstrument, InterestFromInstrument_1, SanchaypatraIncome, SanchaypatraIncome_1, TDSFromSanchaypatra, Others, Others_1, TotalAmountIncome', 'numerical'),
			array('EntryYear', 'length', 'max'=>9),
			array('Type, Description, LastUpdateAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IncomeOtherSourceId, IncomeId, Type, Description, Cost, CerateAt, LastUpdateAt, CPIId, EntryYear, trash', 'safe', 'on'=>'search'),
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
			'income' => array(self::BELONGS_TO, 'Income', 'IncomeId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IncomeOtherSourceId' => Yii::t('income', 'Income Other Source'),
			'IncomeId' => Yii::t('income', 'Income'),
			'Type' => Yii::t('income', 'Type'),
			'Description' => Yii::t('income', 'Description'),
			'InterestFromMutualFund' => Yii::t('income', 'Interest from mutual fund/unit fund'),
			'CashDividend' => Yii::t('income', 'Cash dividend from company listed in stock exchange'),
			'InterestIncomeFromWEDB' => Yii::t('income', 'Interest income from WEDB (wage earners development bond)'),
			'USDollarPremium' => Yii::t('income', 'US dollar premium/investment bond'),
			'PoundSterlingPremium' => Yii::t('income', 'Pound sterling premium/investment bond'),
			'EuroPremium' => Yii::t('income', 'Euro premium/investment bond'),
			'InvestmentInInstrument' => Yii::t('income', "What is the amount of your investment in pensioner's savings instrument?"),
			'InterestFromInstrument' => Yii::t('income', "What is the amount of interest received from pensioner’s savings instrument?"),

			'SanchaypatraIncome' => Yii::t('income', "Sanchaypatra Income"),
			'TDSFromSanchaypatra' => Yii::t('income', "TDS From Sanchaypatra"),
			
			'Others' => Yii::t('income', 'Others'),
			'Cost' => Yii::t('income', 'Cost'),
			'CerateAt' => Yii::t('income', 'Cerate At'),
			'LastUpdateAt' => Yii::t('income', 'Last Update At'),
			'CPIId' => Yii::t('income', 'Cpiid'),
			'EntryYear' => Yii::t('income', 'Entry Year'),
			'trash' => Yii::t('income', 'Trash'),
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

		$criteria->compare('IncomeOtherSourceId',$this->IncomeOtherSourceId);
		$criteria->compare('IncomeId',$this->IncomeId);
		$criteria->compare('Type',$this->Type,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('Cost',$this->Cost);
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