<?php

/**
 * This is the model class for table "assets".
 *
 * The followings are the available columns in table 'assets':
 * @property integer $AssetsId
 * @property integer $BusinessCapital
 * @property double $ShareholdingCompanyCost
 * @property double $NonAgriculturePropertyCost
 * @property double $AgriculturePropertyCost
 * @property double $InvestmentCost
 * @property double $MotorVehicleCost
 * @property string $JewelleryDescription
 * @property double $JewelleryCost
 * @property string $FurnitureDescription
 * @property double $FurnitureCost
 * @property string $ElectronicEquipmentDescription
 * @property double $ElectronicEquipmentCost
 * @property double $CashInHand
 * @property double $CashAtBank
 * @property double $Otherdeposits
 * @property double $TotalCashAsset
 * @property double $AnyOtherAssetsCost
 * @property string $CerateAt
 * @property string $LastUpdateAt
 * @property integer $CPIId
 * @property string $EntryYear
 * @property integer $trash
 *
 * The followings are the available model relations:
 * @property PersonalInformation $cPI
 * @property AssetsAgricultureProperty[] $assetsAgricultureProperties
 * @property AssetsAnyOther[] $assetsAnyOthers
 * @property AssetsInvestment[] $assetsInvestments
 * @property AssetsMotorVehicles[] $assetsMotorVehicles
 * @property AssetsNonAgricultureProperty[] $assetsNonAgricultureProperties
 * @property AssetsShareholdingCompanyList[] $assetsShareholdingCompanyLists
 */
class Assets extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Assets the static model class
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
		return 'assets';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CPIId, EntryYear', 'required'),
			array('BusinessCapital, CPIId, trash', 'numerical', 'integerOnly'=>true),
			array('ShareholdingCompanyCost, NonAgriculturePropertyCost, AgriculturePropertyCost, InvestmentCost, MotorVehicleCost, JewelleryCost, FurnitureCost, ElectronicEquipmentCost, CashInHand, CashAtBank, Otherdeposits, TotalCashAsset, AnyOtherAssetsCost', 'numerical'),
			array('EntryYear', 'length', 'max'=>9),
			array('LastUpdateAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('AssetsId, BusinessCapital, ShareholdingCompanyCost, NonAgriculturePropertyCost, AgriculturePropertyCost, InvestmentCost, MotorVehicleCost, JewelleryDescription, JewelleryCost, FurnitureDescription, FurnitureCost, ElectronicEquipmentDescription, ElectronicEquipmentCost, CashInHand, CashAtBank, Otherdeposits, TotalCashAsset, AnyOtherAssetsCost, CerateAt, LastUpdateAt, CPIId, EntryYear, trash', 'safe', 'on'=>'search'),
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
			'assetsAgricultureProperties' => array(self::HAS_MANY, 'AssetsAgricultureProperty', 'AssetsId'),
			'assetsAnyOthers' => array(self::HAS_MANY, 'AssetsAnyOther', 'AssetsId'),
			'assetsInvestments' => array(self::HAS_MANY, 'AssetsInvestment', 'AssetsId'),
			'assetsMotorVehicles' => array(self::HAS_MANY, 'AssetsMotorVehicles', 'AssetsId'),
			'assetsNonAgricultureProperties' => array(self::HAS_MANY, 'AssetsNonAgricultureProperty', 'AssetsId'),
			'assetsShareholdingCompanyLists' => array(self::HAS_MANY, 'AssetsShareholdingCompanyList', 'AssetsId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'AssetsId' => 'Assets',
			'BusinessCapital' => 'Business Capital',
			'ShareholdingCompanyCost' => 'Shareholding Company Cost',
			'NonAgriculturePropertyCost' => 'Non Agriculture Property Cost',
			'AgriculturePropertyCost' => 'Agriculture Property Cost',
			'InvestmentCost' => 'Investment Cost',
			'MotorVehicleCost' => 'Motor Vehicle Cost',
			'JewelleryDescription' => 'Jewellery Description',
			'JewelleryCost' => 'Jewellery Cost',
			'FurnitureDescription' => 'Furniture Description',
			'FurnitureCost' => 'Furniture Cost',
			'ElectronicEquipmentDescription' => 'Electronic Equipment Description',
			'ElectronicEquipmentCost' => 'Electronic Equipment Cost',
			'CashInHand' => 'Cash In Hand',
			'CashAtBank' => 'Cash At Bank',
			'Otherdeposits' => 'Otherdeposits',
			'TotalCashAsset' => 'Total Cash Asset',
			'AnyOtherAssetsCost' => 'Any Other Assets Cost',
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

		$criteria->compare('AssetsId',$this->AssetsId);
		$criteria->compare('BusinessCapital',$this->BusinessCapital);
		$criteria->compare('ShareholdingCompanyCost',$this->ShareholdingCompanyCost);
		$criteria->compare('NonAgriculturePropertyCost',$this->NonAgriculturePropertyCost);
		$criteria->compare('AgriculturePropertyCost',$this->AgriculturePropertyCost);
		$criteria->compare('InvestmentCost',$this->InvestmentCost);
		$criteria->compare('MotorVehicleCost',$this->MotorVehicleCost);
		$criteria->compare('JewelleryDescription',$this->JewelleryDescription,true);
		$criteria->compare('JewelleryCost',$this->JewelleryCost);
		$criteria->compare('FurnitureDescription',$this->FurnitureDescription,true);
		$criteria->compare('FurnitureCost',$this->FurnitureCost);
		$criteria->compare('ElectronicEquipmentDescription',$this->ElectronicEquipmentDescription,true);
		$criteria->compare('ElectronicEquipmentCost',$this->ElectronicEquipmentCost);
		$criteria->compare('CashInHand',$this->CashInHand);
		$criteria->compare('CashAtBank',$this->CashAtBank);
		$criteria->compare('Otherdeposits',$this->Otherdeposits);
		$criteria->compare('TotalCashAsset',$this->TotalCashAsset);
		$criteria->compare('AnyOtherAssetsCost',$this->AnyOtherAssetsCost);
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