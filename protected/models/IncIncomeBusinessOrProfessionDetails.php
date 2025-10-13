<?php

/**
 * This is the model class for table "inc_income_business_or_profession_details".
 *
 * The followings are the available columns in table 'inc_income_business_or_profession_details':
 * @property integer $IncomeBusinessOrProfessionDetailsId
 * @property integer $IncomeId
 * @property string $Type
 * @property string $BusinessOrProfessionName
 * @property string $Address
 * @property double $Sales
 * @property double $GrossProfit
 * @property double $OtherExpense
 * @property double $NetProfit
 * @property double $CashInHandOrBank
 * @property double $Inventories
 * @property double $FixedAssets
 * @property double $OtherAssets
 * @property double $TotalAssets
 * @property double $OpeningCapital
 * @property double $WithdrawlsInIncomeYear
 * @property double $ClosingCapital
 * @property double $Liabilities
 * @property double $TotalCapitalLiabilities
 * @property double $BusinessIncomeExempted
 * @property string $CerateAt
 * @property string $LastUpdateAt
 * @property integer $CPIId
 * @property string $EntryYear
 * @property integer $trash
 */
class IncIncomeBusinessOrProfessionDetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inc_income_business_or_profession_details';
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
			array('Sales, GrossProfit, OtherExpense, NetProfit, CashInHandOrBank, Inventories, FixedAssets, OtherAssets, TotalAssets, OpeningCapital, WithdrawlsInIncomeYear, ClosingCapital, Liabilities, TotalCapitalLiabilities', 'numerical'),
			array('Type', 'length', 'max'=>29),
			array('EntryYear', 'length', 'max'=>9),
			array('BusinessOrProfessionName, Address, BusinessIncomeExempted, LastUpdateAt', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IncomeBusinessOrProfessionDetailsId, IncomeId, Type, BusinessOrProfessionName, Address, Sales, GrossProfit, OtherExpense, NetProfit, CashInHandOrBank, Inventories, FixedAssets, OtherAssets, TotalAssets, OpeningCapital, WithdrawlsInIncomeYear, ClosingCapital, Liabilities, TotalCapitalLiabilities, BusinessIncomeExempted, CerateAt, LastUpdateAt, CPIId, EntryYear, trash', 'safe', 'on'=>'search'),
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
			'IncomeBusinessOrProfessionDetailsId' => 'Income Business Or Profession Details',
			'IncomeId' => 'Income',
			'Type' => 'Type Of Business',
			'BusinessOrProfessionName' =>Yii::t('income','Business Or Profession Name'),
			'Address' => Yii::t('income','Address'),
			'Sales' => Yii::t('income','Sales'),
			'GrossProfit' => Yii::t('income','Gross Profit'),
			'OtherExpense' => Yii::t('income','Other Expense'),
			'NetProfit' => Yii::t('income','Net Profit'),
			'CashInHandOrBank' => Yii::t('income','Cash In Hand Or Bank'),
			'Inventories' => Yii::t('income','Inventories'),
			'FixedAssets' => Yii::t('income','Fixed Assets'),
			'OtherAssets' => Yii::t('income','Other Assets'),
			'TotalAssets' => Yii::t('income','Total Assets'),
			'OpeningCapital' => Yii::t('income','Opening Capital'),
			'WithdrawlsInIncomeYear' => Yii::t('income','Withdrawals In Income Year'),
			'ClosingCapital' => Yii::t('income','Closing Capital'),
			'Liabilities' => Yii::t('income','Liabilities'),
			'TotalCapitalLiabilities' => Yii::t('income','Total Capital Liabilities'),
			'BusinessIncomeExempted' => Yii::t('income','Business Income Exempted'),
			'CerateAt' => 'Cerate At',
			'LastUpdateAt' => 'Last Update At',
			'CPIId' => 'Cpiid',
			'EntryYear' => 'Entry Year',
			'trash' => 'Trash',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('IncomeBusinessOrProfessionDetailsId',$this->IncomeBusinessOrProfessionDetailsId);
		$criteria->compare('IncomeId',$this->IncomeId);
		$criteria->compare('Type',$this->Type,true);
		$criteria->compare('BusinessOrProfessionName',$this->BusinessOrProfessionName,true);
		$criteria->compare('Address',$this->Address,true);
		$criteria->compare('Sales',$this->Sales);
		$criteria->compare('GrossProfit',$this->GrossProfit);
		$criteria->compare('OtherExpense',$this->OtherExpense);
		$criteria->compare('NetProfit',$this->NetProfit);
		$criteria->compare('CashInHandOrBank',$this->CashInHandOrBank);
		$criteria->compare('Inventories',$this->Inventories);
		$criteria->compare('FixedAssets',$this->FixedAssets);
		$criteria->compare('OtherAssets',$this->OtherAssets);
		$criteria->compare('TotalAssets',$this->TotalAssets);
		$criteria->compare('OpeningCapital',$this->OpeningCapital);
		$criteria->compare('WithdrawlsInIncomeYear',$this->WithdrawlsInIncomeYear);
		$criteria->compare('ClosingCapital',$this->ClosingCapital);
		$criteria->compare('Liabilities',$this->Liabilities);
		$criteria->compare('TotalCapitalLiabilities',$this->TotalCapitalLiabilities);
		$criteria->compare('BusinessIncomeExempted',$this->BusinessIncomeExempted);
		$criteria->compare('CerateAt',$this->CerateAt,true);
		$criteria->compare('LastUpdateAt',$this->LastUpdateAt,true);
		$criteria->compare('CPIId',$this->CPIId);
		$criteria->compare('EntryYear',$this->EntryYear,true);
		$criteria->compare('trash',$this->trash);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return IncIncomeBusinessOrProfessionDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
