<?php

/**
 * This is the model class for table "assets".
 *
 * The followings are the available columns in table 'assets':
 * @property integer $AssetsId
 * @property string $BusinessCapitalConfirm
 * @property string $BusinessCapitalFOrT
 * @property double $BusinessCapitalTotal
 * @property string $ShareholdingCompanyConfirm
 * @property string $ShareholdingCompanyFOrT
 * @property double $ShareholdingCompanyTotal
 * @property string $NonAgriculturePropertyConfirm
 * @property string $NonAgriculturePropertyFOrT
 * @property double $NonAgriculturePropertyTotal
 * @property string $AgriculturePropertyConfirm
 * @property string $AgriculturePropertyFOrT
 * @property double $AgriculturePropertyTotal
 * @property string $InvestmentConfirm
 * @property string $InvestmentFOrT
 * @property double $InvestShareDebenturesTotal
 * @property double $InvestSavingUnitCertBondTotal
 * @property double $InvestPrizeBondSavingsSchemeTotal
 * @property double $InvestLoansGivenTotal
 * @property double $InvestOtherTotal
 * @property string $MotorVehicleConfirm
 * @property string $MotorVehicleFOrT
 * @property double $MotorVehicleTotal
 * @property string $JewelryConfirm
 * @property string $JewelryFOrT
 * @property double $JewelryTotal
 * @property string $FurnitureConfirm
 * @property string $FurnitureFOrT
 * @property double $FurnitureTotal
 * @property string $ElectronicEquipmentConfirm
 * @property string $ElectronicEquipmentFOrT
 * @property double $ElectronicEquipmentTotal
 * @property string $OutsideBusinessConfirm
 * @property string $OutsideBusinessFOrT
 * @property double $OutsideBusinessCashInHandTotal
 * @property double $OutsideBusinessCashAtBankTotal
 * @property double $OutsideBusinessOtherdepositsTotal
 * @property string $AnyOtherAssetsConfirm
 * @property string $AnyOtherAssetsFOrT
 * @property double $AnyOtherAssetsTotal
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
 * @property AssetsBusinessCapital[] $assetsBusinessCapitals
 * @property AssetsElectronicEquipment[] $assetsElectronicEquipments
 * @property AssetsFurniture[] $assetsFurnitures
 * @property AssetsInvestment[] $assetsInvestments
 * @property AssetsJewelry[] $assetsJewelries
 * @property AssetsMotorVehicles[] $assetsMotorVehicles
 * @property AssetsNonAgricultureProperty[] $assetsNonAgricultureProperties
 * @property AssetsOutsideBusiness[] $assetsOutsideBusinesses
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
			array('CPIId, trash', 'numerical', 'integerOnly'=>true),
			array('BusinessCapitalTotal, ShareholdingCompanyTotal, NonAgriculturePropertyTotal, AgriculturePropertyTotal, InvestShareDebenturesTotal, InvestSavingUnitCertBondTotal, InvestPrizeBondSavingsSchemeTotal, InvestLoansGivenTotal, InvestOtherTotal, MotorVehicleTotal, JewelryTotal, FurnitureTotal, ElectronicEquipmentTotal, OutsideBusinessCashInHandTotal, OutsideBusinessCashAtBankTotal, OutsideBusinessFundTotal, OutsideBusinessOtherdepositsTotal, AnyOtherAssetsTotal, OtherAssetsReceiptTotal', 'numerical'),
			array('BusinessCapitalConfirm, ShareholdingCompanyConfirm, NonAgriculturePropertyConfirm, AgriculturePropertyConfirm, InvestmentConfirm, MotorVehicleConfirm, JewelryConfirm, FurnitureConfirm, ElectronicEquipmentConfirm, OutsideBusinessConfirm, AnyOtherAssetsConfirm, OtherAssetsReceiptConfirm', 'length', 'max'=>3),
			array('BusinessCapitalFOrT, ShareholdingCompanyFOrT, NonAgriculturePropertyFOrT, AgriculturePropertyFOrT, InvestmentFOrT, MotorVehicleFOrT, JewelryFOrT, FurnitureFOrT, ElectronicEquipmentFOrT, OutsideBusinessFOrT, AnyOtherAssetsFOrT, OtherAssetsReceiptFOrT', 'length', 'max'=>8),
			array('EntryYear', 'length', 'max'=>9),
			array('CerateAt, LastUpdateAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('AssetsId, BusinessCapitalConfirm, BusinessCapitalFOrT, BusinessCapitalTotal, ShareholdingCompanyConfirm, ShareholdingCompanyFOrT, ShareholdingCompanyTotal, NonAgriculturePropertyConfirm, NonAgriculturePropertyFOrT, NonAgriculturePropertyTotal, AgriculturePropertyConfirm, AgriculturePropertyFOrT, AgriculturePropertyTotal, InvestmentConfirm, InvestmentFOrT, InvestShareDebenturesTotal, InvestSavingUnitCertBondTotal, InvestPrizeBondSavingsSchemeTotal, InvestLoansGivenTotal, InvestOtherTotal, MotorVehicleConfirm, MotorVehicleFOrT, MotorVehicleTotal, JewelryConfirm, JewelryFOrT, JewelryTotal, FurnitureConfirm, FurnitureFOrT, FurnitureTotal, ElectronicEquipmentConfirm, ElectronicEquipmentFOrT, ElectronicEquipmentTotal, OutsideBusinessConfirm, OutsideBusinessFOrT, OutsideBusinessCashInHandTotal, OutsideBusinessCashAtBankTotal, OutsideBusinessOtherdepositsTotal, OutsideBusinessFundTotal, AnyOtherAssetsConfirm, AnyOtherAssetsFOrT, AnyOtherAssetsTotal, OtherAssetsReceiptConfirm, OtherAssetsReceiptFOrT, OtherAssetsReceiptTotal, CerateAt, LastUpdateAt, CPIId, EntryYear, trash', 'safe', 'on'=>'search'),
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
			'assetsOtherReceipts' => array(self::HAS_MANY, 'AssetsOtherReceipts', 'AssetsId'),
			'assetsBusinessCapitals' => array(self::HAS_MANY, 'AssetsBusinessCapital', 'AssetsId'),
			'assetsElectronicEquipments' => array(self::HAS_MANY, 'AssetsElectronicEquipment', 'AssetsId'),
			'assetsFurnitures' => array(self::HAS_MANY, 'AssetsFurniture', 'AssetsId'),
			'assetsInvestments' => array(self::HAS_MANY, 'AssetsInvestment', 'AssetsId'),
			'assetsJewelries' => array(self::HAS_MANY, 'AssetsJewelry', 'AssetsId'),
			'assetsMotorVehicles' => array(self::HAS_MANY, 'AssetsMotorVehicles', 'AssetsId'),
			'assetsNonAgricultureProperties' => array(self::HAS_MANY, 'AssetsNonAgricultureProperty', 'AssetsId'),
			'assetsOutsideBusinesses' => array(self::HAS_MANY, 'AssetsOutsideBusiness', 'AssetsId'),
			'assetsShareholdingCompanyLists' => array(self::HAS_MANY, 'AssetsShareholdingCompanyList', 'AssetsId'),
			'assetsNetwealth' => array(self::HAS_MANY, 'AssetsShareholdingCompanyList', 'AssetsId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'AssetsId' => 'Assets',
			'BusinessCapitalConfirm' => 'Business Capital Confirm',
			'BusinessCapitalFOrT' => 'Business Capital For T',
			'BusinessCapitalTotal' => 'Business Capital Total',
			'ShareholdingCompanyConfirm' => 'Shareholding Company Confirm',
			'ShareholdingCompanyFOrT' => 'Shareholding Company For T',
			'ShareholdingCompanyTotal' => 'Shareholding Company Total',
			'NonAgriculturePropertyConfirm' => 'Non Agriculture Property Confirm',
			'NonAgriculturePropertyFOrT' => 'Non Agriculture Property For T',
			'NonAgriculturePropertyTotal' => 'Non Agriculture Property Total',
			'AgriculturePropertyConfirm' => 'Agriculture Property Confirm',
			'AgriculturePropertyFOrT' => 'Agriculture Property For T',
			'AgriculturePropertyTotal' => 'Agriculture Property Total',
			'InvestmentConfirm' => 'Investment Confirm',
			'InvestmentFOrT' => 'Investment For T',
			'InvestShareDebenturesTotal' => 'Invest Share Debentures Total',
			'InvestSavingUnitCertBondTotal' => 'Invest Saving Unit Cert Bond Total',
			'InvestPrizeBondSavingsSchemeTotal' => 'Invest Prize Bond Savings Scheme Total',
			'InvestLoansGivenTotal' => 'Invest Loans Given Total',
			'InvestOtherTotal' => 'Invest Other Total',
			'MotorVehicleConfirm' => 'Motor Vehicle Confirm',
			'MotorVehicleFOrT' => 'Motor Vehicle For T',
			'MotorVehicleTotal' => 'Motor Vehicle Total',
			'JewelryConfirm' => 'Jewelry Confirm',
			'JewelryFOrT' => 'Jewelry For T',
			'JewelryTotal' => 'Jewelry Total',
			'FurnitureConfirm' => 'Furniture Confirm',
			'FurnitureFOrT' => 'Furniture For T',
			'FurnitureTotal' => 'Furniture Total',
			'ElectronicEquipmentConfirm' => 'Electronic Equipment Confirm',
			'ElectronicEquipmentFOrT' => 'Electronic Equipment For T',
			'ElectronicEquipmentTotal' => 'Electronic Equipment Total',
			'OutsideBusinessConfirm' => 'Outside Business Confirm',
			'OutsideBusinessFOrT' => 'Outside Business For T',
			'OutsideBusinessCashInHandTotal' => 'Outside Business Cash In Hand Total',
			'OutsideBusinessCashAtBankTotal' => 'Outside Business Cash At Bank Total',
			'OutsideBusinessOtherdepositsTotal' => 'Outside Business Otherdeposits Total',
			'OutsideBusinessFundTotal' => 'Outside Business Other Fund',
			'AnyOtherAssetsConfirm' => 'Any Other Assets Confirm',
			'AnyOtherAssetsFOrT' => 'Any Other Assets For T',
			'AnyOtherAssetsTotal' => 'Any Other Assets Total',
			'OtherAssetsReceiptConfirm' => 'Any Other Assets Receipt Confirm',
			'OtherAssetsReceiptFOrT' => 'Any Other Assets Receipt For T',
			'OtherAssetsReceiptTotal' => 'Any Other Assets Receipt Total',
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
		$criteria->compare('BusinessCapitalConfirm',$this->BusinessCapitalConfirm,true);
		$criteria->compare('BusinessCapitalFOrT',$this->BusinessCapitalFOrT,true);
		$criteria->compare('BusinessCapitalTotal',$this->BusinessCapitalTotal);
		$criteria->compare('ShareholdingCompanyConfirm',$this->ShareholdingCompanyConfirm,true);
		$criteria->compare('ShareholdingCompanyFOrT',$this->ShareholdingCompanyFOrT,true);
		$criteria->compare('ShareholdingCompanyTotal',$this->ShareholdingCompanyTotal);
		$criteria->compare('NonAgriculturePropertyConfirm',$this->NonAgriculturePropertyConfirm,true);
		$criteria->compare('NonAgriculturePropertyFOrT',$this->NonAgriculturePropertyFOrT,true);
		$criteria->compare('NonAgriculturePropertyTotal',$this->NonAgriculturePropertyTotal);
		$criteria->compare('AgriculturePropertyConfirm',$this->AgriculturePropertyConfirm,true);
		$criteria->compare('AgriculturePropertyFOrT',$this->AgriculturePropertyFOrT,true);
		$criteria->compare('AgriculturePropertyTotal',$this->AgriculturePropertyTotal);
		$criteria->compare('InvestmentConfirm',$this->InvestmentConfirm,true);
		$criteria->compare('InvestmentFOrT',$this->InvestmentFOrT,true);
		$criteria->compare('InvestShareDebenturesTotal',$this->InvestShareDebenturesTotal);
		$criteria->compare('InvestSavingUnitCertBondTotal',$this->InvestSavingUnitCertBondTotal);
		$criteria->compare('InvestPrizeBondSavingsSchemeTotal',$this->InvestPrizeBondSavingsSchemeTotal);
		$criteria->compare('InvestLoansGivenTotal',$this->InvestLoansGivenTotal);
		$criteria->compare('InvestOtherTotal',$this->InvestOtherTotal);
		$criteria->compare('MotorVehicleConfirm',$this->MotorVehicleConfirm,true);
		$criteria->compare('MotorVehicleFOrT',$this->MotorVehicleFOrT,true);
		$criteria->compare('MotorVehicleTotal',$this->MotorVehicleTotal);
		$criteria->compare('JewelryConfirm',$this->JewelryConfirm,true);
		$criteria->compare('JewelryFOrT',$this->JewelryFOrT,true);
		$criteria->compare('JewelryTotal',$this->JewelryTotal);
		$criteria->compare('FurnitureConfirm',$this->FurnitureConfirm,true);
		$criteria->compare('FurnitureFOrT',$this->FurnitureFOrT,true);
		$criteria->compare('FurnitureTotal',$this->FurnitureTotal);
		$criteria->compare('ElectronicEquipmentConfirm',$this->ElectronicEquipmentConfirm,true);
		$criteria->compare('ElectronicEquipmentFOrT',$this->ElectronicEquipmentFOrT,true);
		$criteria->compare('ElectronicEquipmentTotal',$this->ElectronicEquipmentTotal);
		$criteria->compare('OutsideBusinessConfirm',$this->OutsideBusinessConfirm,true);
		$criteria->compare('OutsideBusinessFOrT',$this->OutsideBusinessFOrT,true);
		$criteria->compare('OutsideBusinessCashInHandTotal',$this->OutsideBusinessCashInHandTotal);
		$criteria->compare('OutsideBusinessCashAtBankTotal',$this->OutsideBusinessCashAtBankTotal);
		$criteria->compare('OutsideBusinessOtherdepositsTotal',$this->OutsideBusinessOtherdepositsTotal);
		$criteria->compare('OutsideBusinessFundTotal',$this->OutsideBusinessFundTotal);
		$criteria->compare('AnyOtherAssetsConfirm',$this->AnyOtherAssetsConfirm,true);
		$criteria->compare('AnyOtherAssetsFOrT',$this->AnyOtherAssetsFOrT,true);
		$criteria->compare('AnyOtherAssetsTotal',$this->AnyOtherAssetsTotal);
		$criteria->compare('OtherAssetsReceiptConfirm',$this->OtherAssetsReceiptConfirm,true);
		$criteria->compare('OtherAssetsReceiptFOrT',$this->OtherAssetsReceiptFOrT,true);
		$criteria->compare('OtherAssetsReceiptTotal',$this->OtherAssetsReceiptTotal);
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