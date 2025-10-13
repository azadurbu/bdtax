<?php

/**
 * This is the model class for table "assets_investment".
 *
 * The followings are the available columns in table 'assets_investment':
 * @property integer $InvestmentId
 * @property integer $AssetsId
 * @property string $SharesOrDebenturesDescription
 * @property double $SharesOrDebenturesValue
 * @property string $SavingOrUnitCertOrBondDescription
 * @property double $SavingOrUnitCertOrBondValue
 * @property string $PrizeBondOrSavingsSchemeDescription
 * @property double $PrizeBondOrSavingsSchemeValue
 * @property string $LoansGivenDescription
 * @property double $LoansGivenValue
 * @property string $OtherInvestmentDescription
 * @property double $OtherInvestmentValue
 * @property double $AssetInvestmentTotal
 * @property string $CerateAt
 * @property string $LastUpdateAt
 * @property integer $CPIId
 * @property string $EntryYear
 * @property integer $trash
 *
 * The followings are the available model relations:
 * @property PersonalInformation $cPI
 * @property Assets $assets
 */
class AssetsInvestment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AssetsInvestment the static model class
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
		return 'assets_investment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('AssetsId, CerateAt, CPIId, EntryYear', 'required'),
			array('AssetsId, CPIId, trash', 'numerical', 'integerOnly'=>true),
			array('SharesOrDebenturesValue, SavingOrUnitCertOrBondValue, PrizeBondOrSavingsSchemeValue, LoansGivenValue, OtherInvestmentValue, AssetInvestmentTotal', 'numerical'),
			array('EntryYear', 'length', 'max'=>9),
			array('LastUpdateAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('InvestmentId, AssetsId, SharesOrDebenturesDescription, SharesOrDebenturesValue, SavingOrUnitCertOrBondDescription, SavingOrUnitCertOrBondValue, PrizeBondOrSavingsSchemeDescription, PrizeBondOrSavingsSchemeValue, LoansGivenDescription, LoansGivenValue, OtherInvestmentDescription, OtherInvestmentValue, AssetInvestmentTotal, CerateAt, LastUpdateAt, CPIId, EntryYear, trash', 'safe', 'on'=>'search'),
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
			'assets' => array(self::BELONGS_TO, 'Assets', 'AssetsId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'InvestmentId' => 'Investment',
			'AssetsId' => 'Assets',
			'SharesOrDebenturesDescription' => 'Shares Or Debentures Description',
			'SharesOrDebenturesValue' => 'Shares Or Debentures Value',
			'SavingOrUnitCertOrBondDescription' => 'Saving Or Unit Cert Or Bond Description',
			'SavingOrUnitCertOrBondValue' => 'Saving Or Unit Cert Or Bond Value',
			'PrizeBondOrSavingsSchemeDescription' => 'Prize Bond Or Savings Scheme Description',
			'PrizeBondOrSavingsSchemeValue' => 'Prize Bond Or Savings Scheme Value',
			'LoansGivenDescription' => 'Loans Given Description',
			'LoansGivenValue' => 'Loans Given Value',
			'OtherInvestmentDescription' => 'Other Investment Description',
			'OtherInvestmentValue' => 'Other Investment Value',
			'AssetInvestmentTotal' => 'Asset Investment Total',
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

		$criteria->compare('InvestmentId',$this->InvestmentId);
		$criteria->compare('AssetsId',$this->AssetsId);
		$criteria->compare('SharesOrDebenturesDescription',$this->SharesOrDebenturesDescription,true);
		$criteria->compare('SharesOrDebenturesValue',$this->SharesOrDebenturesValue);
		$criteria->compare('SavingOrUnitCertOrBondDescription',$this->SavingOrUnitCertOrBondDescription,true);
		$criteria->compare('SavingOrUnitCertOrBondValue',$this->SavingOrUnitCertOrBondValue);
		$criteria->compare('PrizeBondOrSavingsSchemeDescription',$this->PrizeBondOrSavingsSchemeDescription,true);
		$criteria->compare('PrizeBondOrSavingsSchemeValue',$this->PrizeBondOrSavingsSchemeValue);
		$criteria->compare('LoansGivenDescription',$this->LoansGivenDescription,true);
		$criteria->compare('LoansGivenValue',$this->LoansGivenValue);
		$criteria->compare('OtherInvestmentDescription',$this->OtherInvestmentDescription,true);
		$criteria->compare('OtherInvestmentValue',$this->OtherInvestmentValue);
		$criteria->compare('AssetInvestmentTotal',$this->AssetInvestmentTotal);
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