<?php

/**
 * This is the model class for table "type_of_income".
 *
 * The followings are the available columns in table 'type_of_income':
 * @property integer $TypeOfIncomeId
 * @property string $TypeName
 *
 * The followings are the available model relations:
 * @property SubCategoryOfIncome[] $subCategoryOfIncomes
 */
class TypeOfIncome extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TypeOfIncome the static model class
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
		return 'type_of_income';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TypeName', 'required'),
			array('TypeName', 'length', 'max'=>50),
			array('TypeName', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('TypeOfIncomeId, TypeName', 'safe', 'on'=>'search'),
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
			'sub_category_of_income' => array(self::HAS_MANY, 'SubCategoryOfIncome', 'TypeOfIncomeId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'TypeOfIncomeId' => 'Type of Income ID',
			'TypeName' => 'Type Name',
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

		$criteria->compare('TypeOfIncomeId',$this->TypeOfIncomeId);
		$criteria->compare('TypeName',$this->TypeName,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}