<?php

/**
 * This is the model class for table "sur_charge".
 *
 * The followings are the available columns in table 'sur_charge':
 * @property integer $Id
 * @property integer $MinAmount
 * @property integer $MaxAmount
 * @property integer $Percent
 * @property string $CreateAt
 * @property string $LastUpdateAt
 * @property string $EntryYear
 */
class SurCharge extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SurCharge the static model class
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
		return 'sur_charge';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MinAmount, MaxAmount, Percent,EntryYear', 'required'),
			array('MinAmount, MaxAmount, Percent', 'numerical', 'integerOnly'=>true),
			array('EntryYear', 'length', 'max'=>9),
			array('LastUpdateAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, MinAmount, MaxAmount, Percent, CreateAt, LastUpdateAt, EntryYear', 'safe', 'on'=>'search'),
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
			'Id' => 'ID',
			'MinAmount' => 'Min Amount',
			'MaxAmount' => 'Max Amount',
			'Percent' => 'Percent',
			'CreateAt' => 'Create At',
			'LastUpdateAt' => 'Last Update At',
			'EntryYear' => 'Entry Year',
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

		$criteria->compare('Id',$this->Id);
		$criteria->compare('MinAmount',$this->MinAmount);
		$criteria->compare('MaxAmount',$this->MaxAmount);
		$criteria->compare('Percent',$this->Percent);
		$criteria->compare('CreateAt',$this->CreateAt,true);
		$criteria->compare('LastUpdateAt',$this->LastUpdateAt,true);
		$criteria->compare('EntryYear',$this->EntryYear,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}