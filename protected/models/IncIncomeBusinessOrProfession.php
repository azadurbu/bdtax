<?php

/**
 * This is the model class for table "inc_income_business_or_profession".
 *
 * The followings are the available columns in table 'inc_income_business_or_profession':
 * @property integer $IncomeBusinessOrProfessionId
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
class IncIncomeBusinessOrProfession extends CActiveRecord
{
	public $SumOfIncomeBusinessOrProfession;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return IncIncomeBusinessOrProfession the static model class
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
		return 'inc_income_business_or_profession';
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
			array('Cost, ExportBusiness, ExportBusiness_1, HandCraftedMaterials, HandCraftedMaterials_1, BusinessOfSoftwareDevelopment, BusinessOfSoftwareDevelopment_1, NTTN, NTTN_1, ITES, ITES_1, PoultryFarm, PoultryFarm_1, AnnualTurnover, SmallMediumEnterprise, SmallMediumEnterprise_1, Others, Others_1, incomeFromBusiness1, incomeFromBusiness1_1, incomeFromBusiness2, incomeFromBusiness2_1, incomeFromBusiness3, incomeFromBusiness3_1, TotalAmountIncome', 'numerical'),
			array('Type', 'length', 'max'=>10),
			array('EntryYear', 'length', 'max'=>9),
			array('Description, LastUpdateAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IncomeBusinessOrProfessionId, IncomeId, Type, Description, Cost, CerateAt, LastUpdateAt, CPIId, EntryYear, trash', 'safe', 'on'=>'search'),
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
			'IncomeBusinessOrProfessionId' => Yii::t('income', 'Income Business Or Profession'),
			'IncomeId' => Yii::t('income', 'Income'),
			'Type' => Yii::t('income', 'Type'),
			'Description' => Yii::t('income', 'Description'),
			'ExportBusiness' => Yii::t('income', 'Income from export business'),
			'HandCraftedMaterials' => Yii::t('income', 'Income from export of hand crafted materials'),
			'BusinessOfSoftwareDevelopment' => Yii::t('income', 'Income from business of Software Development'),
			'NTTN' => Yii::t('income', 'NTTN (Nationwide Telecommunication Transmission Network)'),
			'ITES' => Yii::t('income', 'Information Technology Enabled Services (ITES)'),
			'PoultryFarm' => Yii::t('income', 'Income from hen-duck hatchery, prawn & fish hatchery, fish culture'),
			'AnnualTurnover' => Yii::t('income', 'Annual turnover of SME'),
			'SmallMediumEnterprise' => Yii::t('income', 'Income of SME'),
			'Others' => Yii::t('income', 'Others'),
			'IncomeFromBusiness1' => Yii::t('income', 'Income from business 1'),
			'IncomeFromBusiness2' => Yii::t('income', 'Income from business 2'),
			'IncomeFromBusiness3' => Yii::t('income', 'Income from business 3'),
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

		$criteria->compare('IncomeBusinessOrProfessionId',$this->IncomeBusinessOrProfessionId);
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