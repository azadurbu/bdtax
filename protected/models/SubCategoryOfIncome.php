<?php

/**
 * This is the model class for table "sub_category_of_income".
 *
 * The followings are the available columns in table 'sub_category_of_income':
 * @property integer $SubCatIncomeId
 * @property integer $TypeOfIncomeId
 * @property string $SubCatName
 *
 * The followings are the available model relations:
 * @property TypeOfIncome $typeOfIncome
 * @property TaxZoneCircle[] $taxZoneCircles
 */
class SubCategoryOfIncome extends CActiveRecord
{
	public $TypeName;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SubCategoryOfIncome the static model class
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
		return 'sub_category_of_income';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TypeOfIncomeId,SubCatName', 'required'),
			array('TypeOfIncomeId', 'numerical', 'integerOnly'=>true),
			array('SubCatName', 'length', 'max'=>50),
			//array('TypeOfIncomeId,SubCatName', 'unique', 'message' => 'This data already exists.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('SubCatIncomeId, TypeOfIncomeId, SubCatName, TypeName', 'safe', 'on'=>'search'),
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
			'tax_zone_circle' => array(self::HAS_MANY, 'TaxZoneCircle', 'SubCatIncomeId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'SubCatIncomeId' => 'Sub Cat Income',
			'TypeOfIncomeId' => 'Type of Income',
			'SubCatName' => 'Sub Cat Name',
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

		$criteria->compare('SubCatIncomeId',$this->SubCatIncomeId);
		$criteria->compare('TypeOfIncomeId',$this->TypeOfIncomeId);
		$criteria->compare('SubCatName',$this->SubCatName,true);
		$criteria->compare('type_of_income.TypeName', $this->TypeName, true);

		$criteria->with = array(
            'type_of_income' => array(
                'select' => false,
                'together' => true,
                'search' => true,
                'joinType' => 'LEFT JOIN',
            ),
        );
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,

            'sort' => array(
                'attributes' => array(
                    'TypeName' => array(
                        'asc' => 'type_of_income.TypeName',
                        'desc' => 'type_of_income.TypeName DESC',
                    ),
                    '*',
                ),
            ),
		));
	}
}