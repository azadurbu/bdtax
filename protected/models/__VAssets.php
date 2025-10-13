<?php

/**
 * This is the model class for table "v_assets".
 *
 * The followings are the available columns in table 'v_assets':
 * @property integer $AssetsId
 * @property integer $CPIId
 * @property string $EntryYear
 * @property double $BusinessCapital
 * @property double $total_shareholdings
 * @property double $total_non_agri_prop
 * @property double $total_agri_prop
 * @property double $total_investment
 * @property double $total_motor_vehicle
 * @property double $JewelleryCost
 * @property double $FurnitureCost
 * @property double $ElectronicEquipmentCost
 * @property double $total_cash_outside_business
 * @property double $total_other
 */
class VAssets extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return VAssets the static model class
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
		return 'v_assets';
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
			array('AssetsId, CPIId', 'numerical', 'integerOnly'=>true),
			array('BusinessCapital, total_shareholdings, total_non_agri_prop, total_agri_prop, total_investment, total_motor_vehicle, JewelleryCost, FurnitureCost, ElectronicEquipmentCost, total_cash_outside_business, total_other', 'numerical'),
			array('EntryYear', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('AssetsId, CPIId, EntryYear, BusinessCapital, total_shareholdings, total_non_agri_prop, total_agri_prop, total_investment, total_motor_vehicle, JewelleryCost, FurnitureCost, ElectronicEquipmentCost, total_cash_outside_business, total_other', 'safe', 'on'=>'search'),
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
			'AssetsId' => 'Assets',
			'CPIId' => 'Cpiid',
			'EntryYear' => 'Entry Year',
			'BusinessCapital' => 'Business Capital',
			'total_shareholdings' => 'Total Shareholdings',
			'total_non_agri_prop' => 'Total Non Agri Prop',
			'total_agri_prop' => 'Total Agri Prop',
			'total_investment' => 'Total Investment',
			'total_motor_vehicle' => 'Total Motor Vehicle',
			'JewelleryCost' => 'Jewellery Cost',
			'FurnitureCost' => 'Furniture Cost',
			'ElectronicEquipmentCost' => 'Electronic Equipment Cost',
			'total_cash_outside_business' => 'Total Cash Outside Business',
			'total_other' => 'Total Other',
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
		$criteria->compare('CPIId',$this->CPIId);
		$criteria->compare('EntryYear',$this->EntryYear,true);
		$criteria->compare('BusinessCapital',$this->BusinessCapital);
		$criteria->compare('total_shareholdings',$this->total_shareholdings);
		$criteria->compare('total_non_agri_prop',$this->total_non_agri_prop);
		$criteria->compare('total_agri_prop',$this->total_agri_prop);
		$criteria->compare('total_investment',$this->total_investment);
		$criteria->compare('total_motor_vehicle',$this->total_motor_vehicle);
		$criteria->compare('JewelleryCost',$this->JewelleryCost);
		$criteria->compare('FurnitureCost',$this->FurnitureCost);
		$criteria->compare('ElectronicEquipmentCost',$this->ElectronicEquipmentCost);
		$criteria->compare('total_cash_outside_business',$this->total_cash_outside_business);
		$criteria->compare('total_other',$this->total_other);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}