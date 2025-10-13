<?php

/**
 * This is the model class for table "income_82c".
 *
 * The followings are the available columns in table 'income_82c':
 * @property integer $Income82cId
 * @property integer $IncomeId
 * @property double $ContractorIncome
 * @property double $ClearingAndForwardingIncome
 * @property double $TravelAgentIncome
 * @property double $ImporterTaxCollection
 * @property double $KnitWovenExportIncome
 * @property double $OtherThanKnitWovenExportIncome
 * @property double $RoyaltyIncome
 * @property double $SavingInstrumentInterestIncome
 * @property double $ExportCashSubsidyIncome
 * @property double $SavingAndFixedDepositInterestIncome
 * @property double $LotteryIncome
 * @property double $PropertySaleIncome
 * @property double $ContractorIncome_1
 * @property double $ClearingAndForwardingIncome_1
 * @property double $TravelAgentIncome_1
 * @property double $ImporterTaxCollection_1
 * @property double $KnitWovenExportIncome_1
 * @property double $OtherThanKnitWovenExportIncome_1
 * @property double $RoyaltyIncome_1
 * @property double $SavingInstrumentInterestIncome_1
 * @property double $ExportCashSubsidyIncome_1
 * @property double $SavingAndFixedDepositInterestIncome_1
 * @property double $LotteryIncome_1
 * @property double $PropertySaleIncome_1
 * @property string $CerateAt
 * @property string $LastUpdateAt
 * @property integer $CPIId
 * @property string $EntryYear
 * @property integer $trash
 */
class Income82c extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'income_82c';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('CerateAt, CPIId, EntryYear', 'required'),
			array('IncomeId, CPIId, trash', 'numerical', 'integerOnly'=>true),
			array('ContractorIncome, ClearingAndForwardingIncome, TravelAgentIncome, ImporterTaxCollection, KnitWovenExportIncome, OtherThanKnitWovenExportIncome, RoyaltyIncome, SavingInstrumentInterestIncome, ExportCashSubsidyIncome, SavingAndFixedDepositInterestIncome, LotteryIncome, PropertySaleIncome, ContractorIncome_1, ClearingAndForwardingIncome_1, TravelAgentIncome_1, ImporterTaxCollection_1, KnitWovenExportIncome_1, OtherThanKnitWovenExportIncome_1, RoyaltyIncome_1, SavingInstrumentInterestIncome_1, ExportCashSubsidyIncome_1, SavingAndFixedDepositInterestIncome_1, LotteryIncome_1, PropertySaleIncome_1', 'numerical'),
			array('EntryYear', 'length', 'max'=>9),
			array('LastUpdateAt', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Income82cId, IncomeId, ContractorIncome, ClearingAndForwardingIncome, TravelAgentIncome, ImporterTaxCollection, KnitWovenExportIncome, OtherThanKnitWovenExportIncome, RoyaltyIncome, SavingInstrumentInterestIncome, ExportCashSubsidyIncome, SavingAndFixedDepositInterestIncome, LotteryIncome, PropertySaleIncome, ContractorIncome_1, ClearingAndForwardingIncome_1, TravelAgentIncome_1, ImporterTaxCollection_1, KnitWovenExportIncome_1, OtherThanKnitWovenExportIncome_1, RoyaltyIncome_1, SavingInstrumentInterestIncome_1, ExportCashSubsidyIncome_1, SavingAndFixedDepositInterestIncome_1, LotteryIncome_1, PropertySaleIncome_1, CerateAt, LastUpdateAt, CPIId, EntryYear, trash', 'safe', 'on'=>'search'),
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
			'Income82cId' => 'Income82c',
			'IncomeId' => 'Income',
			'ContractorIncome' => Yii::t('income', "Contractor Income"),
			'ClearingAndForwardingIncome' => Yii::t('income', "Clearing And Forwarding Income"),
			'TravelAgentIncome' => Yii::t('income', "Travel Agent Income"),
			'ImporterTaxCollection' => Yii::t('income', "Importer Tax Collection"),
			'KnitWovenExportIncome' => Yii::t('income', "Knit Woven Export Income"),
			'OtherThanKnitWovenExportIncome' => Yii::t('income', "Other Than Knit Woven Export Income"),
			'RoyaltyIncome' =>  Yii::t('income', "Royalty Income"),
			'SavingInstrumentInterestIncome' =>  Yii::t('income', "Saving Instrument Interest Income"),
			'ExportCashSubsidyIncome' =>  Yii::t('income', "Export Cash Subsidy Income"),
			'SavingAndFixedDepositInterestIncome' => Yii::t('income', "Saving And Fixed Deposit Interest Income"),
			'LotteryIncome' =>  Yii::t('income', "Lottery Income"),
			'PropertySaleIncome' =>  Yii::t('income', "Property Sale Income"),
			// 'ContractorIncome_1' => 'Contractor Income 1',
			// 'ClearingAndForwardingIncome_1' => 'Clearing And Forwarding Income 1',
			// 'TravelAgentIncome_1' => 'Travel Agent Income 1',
			// 'ImporterTaxCollection_1' => 'Importer Tax Collection 1',
			// 'KnitWovenExportIncome_1' => 'Knit Woven Export Income 1',
			// 'OtherThanKnitWovenExportIncome_1' => 'Other Than Knit Woven Export Income 1',
			// 'RoyaltyIncome_1' => 'Royalty Income 1',
			// 'SavingInstrumentInterestIncome_1' => 'Saving Instrument Interest Income 1',
			// 'ExportCashSubsidyIncome_1' => 'Export Cash Subsidy Income 1',
			// 'SavingAndFixedDepositInterestIncome_1' => 'Saving And Fixed Deposit Interest Income 1',
			// 'LotteryIncome_1' => 'Lottery Income 1',
			// 'PropertySaleIncome_1' => 'Property Sale Income 1',
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

		$criteria->compare('Income82cId',$this->Income82cId);
		$criteria->compare('IncomeId',$this->IncomeId);
		$criteria->compare('ContractorIncome',$this->ContractorIncome);
		$criteria->compare('ClearingAndForwardingIncome',$this->ClearingAndForwardingIncome);
		$criteria->compare('TravelAgentIncome',$this->TravelAgentIncome);
		$criteria->compare('ImporterTaxCollection',$this->ImporterTaxCollection);
		$criteria->compare('KnitWovenExportIncome',$this->KnitWovenExportIncome);
		$criteria->compare('OtherThanKnitWovenExportIncome',$this->OtherThanKnitWovenExportIncome);
		$criteria->compare('RoyaltyIncome',$this->RoyaltyIncome);
		$criteria->compare('SavingInstrumentInterestIncome',$this->SavingInstrumentInterestIncome);
		$criteria->compare('ExportCashSubsidyIncome',$this->ExportCashSubsidyIncome);
		$criteria->compare('SavingAndFixedDepositInterestIncome',$this->SavingAndFixedDepositInterestIncome);
		$criteria->compare('LotteryIncome',$this->LotteryIncome);
		$criteria->compare('PropertySaleIncome',$this->PropertySaleIncome);
		$criteria->compare('ContractorIncome_1',$this->ContractorIncome_1);
		$criteria->compare('ClearingAndForwardingIncome_1',$this->ClearingAndForwardingIncome_1);
		$criteria->compare('TravelAgentIncome_1',$this->TravelAgentIncome_1);
		$criteria->compare('ImporterTaxCollection_1',$this->ImporterTaxCollection_1);
		$criteria->compare('KnitWovenExportIncome_1',$this->KnitWovenExportIncome_1);
		$criteria->compare('OtherThanKnitWovenExportIncome_1',$this->OtherThanKnitWovenExportIncome_1);
		$criteria->compare('RoyaltyIncome_1',$this->RoyaltyIncome_1);
		$criteria->compare('SavingInstrumentInterestIncome_1',$this->SavingInstrumentInterestIncome_1);
		$criteria->compare('ExportCashSubsidyIncome_1',$this->ExportCashSubsidyIncome_1);
		$criteria->compare('SavingAndFixedDepositInterestIncome_1',$this->SavingAndFixedDepositInterestIncome_1);
		$criteria->compare('LotteryIncome_1',$this->LotteryIncome_1);
		$criteria->compare('PropertySaleIncome_1',$this->PropertySaleIncome_1);
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
	 * @return Income82c the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
