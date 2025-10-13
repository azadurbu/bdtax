<?php

/**
 * This is the model class for table "tax_zone_circle".
 *
 * The followings are the available columns in table 'tax_zone_circle':
 * @property integer $TaxZoneCircleId
 * @property integer $SubCatIncomeId
 * @property string $EmployerName
 * @property string $CircleCode
 * @property string $CircleName
 * @property string $ZoneName
 * @property string $CircleAddress
 * @property string $CerateAt
 * @property string $LastUpdateAt
 * @property integer $EntryBy
 *
 * The followings are the available model relations:
 * @property SubCategoryOfIncome $subCatIncome
 * @property Users $entryBy
 */
class TaxZoneCircle extends CActiveRecord
{
	public $SubCatName;
	public $TaxTypeName;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TaxZoneCircle the static model class
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
		return 'tax_zone_circle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TypeOfIncomeId,SubCatIncomeId,EmployerName,CircleCode,CircleName,ZoneName,CircleAddress', 'required'),
			array('TypeOfIncomeId, SubCatIncomeId, EntryBy', 'numerical', 'integerOnly'=>true),
			array('EmployerName, CircleName, ZoneName', 'length', 'max'=>250),
			array('CircleCode', 'length', 'max'=>10),
			array('CircleAddress, CerateAt, LastUpdateAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('TaxZoneCircleId, SubCatIncomeId, EmployerName, CircleCode, CircleName, ZoneName, CircleAddress, CerateAt, LastUpdateAt, EntryBy, SubCatName, TaxTypeName', 'safe', 'on'=>'search'),
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
			'type_of_income' => array(self::BELONGS_TO, 'TypeOfIncome', 'TypeOfIncomeId'),
			'sub_category_of_income' => array(self::BELONGS_TO, 'SubCategoryOfIncome', 'SubCatIncomeId'),
			'users' => array(self::BELONGS_TO, 'Users', 'EntryBy'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'TaxZoneCircleId' => 'Tax Zone Circle',
			'SubCatIncomeId' => 'Sub Cat Income',
			'EmployerName' => 'Employer Name',
			'CircleCode' => 'Circle Code',
			'CircleName' => 'Circle Name',
			'ZoneName' => 'Zone Name',
			'CircleAddress' => 'Circle Address',
			'CerateAt' => 'Cerate At',
			'LastUpdateAt' => 'Last Update At',
			'EntryBy' => 'Entry By',
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

		$criteria->compare('TaxZoneCircleId',$this->TaxZoneCircleId);
		$criteria->compare('SubCatIncomeId',$this->SubCatIncomeId);
		$criteria->compare('EmployerName',$this->EmployerName,true);
		$criteria->compare('CircleCode',$this->CircleCode,true);
		$criteria->compare('CircleName',$this->CircleName,true);
		$criteria->compare('ZoneName',$this->ZoneName,true);
		$criteria->compare('CircleAddress',$this->CircleAddress,true);
		$criteria->compare('CerateAt',$this->CerateAt,true);
		$criteria->compare('LastUpdateAt',$this->LastUpdateAt,true);
		$criteria->compare('EntryBy',$this->EntryBy);
		$criteria->compare('sub_category_of_income.SubCatName', $this->SubCatName, true);
		$criteria->compare('type_of_income.TaxTypeName', $this->TaxTypeName, true);

		$criteria->with = array(
			'type_of_income' => array(
                'select' => false,
                'together' => true,
                'search' => true,
                'joinType' => 'LEFT JOIN',
            ),
            'sub_category_of_income' => array(
                'select' => false,
                'together' => true,
                'search' => true,
                'joinType' => 'JOIN',
            ),
        );

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort' => array(
                'attributes' => array(
                    'SubCatName' => array(
                        'asc' => 'sub_category_of_income.SubCatName',
                        'desc' => 'sub_category_of_income.SubCatName DESC',
                    ),
                    'TaxTypeName' => array(
                        'asc' => 'type_of_income.TypeName',
                        'desc' => 'type_of_income.TypeName DESC',
                    ),
                    '*',
                ),
            ),
		));
	}
}