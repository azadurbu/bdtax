<?php

/**
 * This is the model class for table "assets_shareholding_company_list".
 *
 * The followings are the available columns in table 'assets_shareholding_company_list':
 * @property integer $ShareholdingCompanyId
 * @property integer $AssetsId
 * @property string $CompanyName
 * @property integer $NumberOfShares
 * @property double $EachShareCost
 * @property double $CompanyAssetValue
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
class AssetsShareholdingCompanyList extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AssetsShareholdingCompanyList the static model class
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
		return 'assets_shareholding_company_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('AssetsId, CompanyName, NumberOfShares, EachShareCost, CompanyAssetValue, CerateAt, CPIId, EntryYear', 'required'),
			array('AssetsId, NumberOfShares, CPIId, trash', 'numerical', 'integerOnly'=>true),
			array('EachShareCost, CompanyAssetValue', 'numerical'),
			array('CompanyName', 'length', 'max'=>100),
			array('EntryYear', 'length', 'max'=>9),
			array('LastUpdateAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ShareholdingCompanyId, AssetsId, CompanyName, NumberOfShares, EachShareCost, CompanyAssetValue, CerateAt, LastUpdateAt, CPIId, EntryYear, trash', 'safe', 'on'=>'search'),
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
			'ShareholdingCompanyId' => 'Shareholding Company',
			'AssetsId' => 'Assets',
			'CompanyName' => 'Company Name',
			'NumberOfShares' => 'Number Of Shares',
			'EachShareCost' => 'Each Share Cost',
			'CompanyAssetValue' => 'Company Asset Value',
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

		$criteria->compare('ShareholdingCompanyId',$this->ShareholdingCompanyId);
		$criteria->compare('AssetsId',$this->AssetsId);
		$criteria->compare('CompanyName',$this->CompanyName,true);
		$criteria->compare('NumberOfShares',$this->NumberOfShares);
		$criteria->compare('EachShareCost',$this->EachShareCost);
		$criteria->compare('CompanyAssetValue',$this->CompanyAssetValue);
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