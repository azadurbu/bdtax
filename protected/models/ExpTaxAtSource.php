<?php

/**
 * This is the model class for table "exp_tax_at_source".
 *
 * The followings are the available columns in table 'exp_tax_at_source':
 * @property integer $Id
 * @property integer $ExpenditureId
 * @property string $Description
 * @property double $Cost
 * @property string $CerateAt
 * @property string $LastUpdateAt
 *
 * The followings are the available model relations:
 * @property Expenditure $expenditure
 */
class ExpTaxAtSource extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ExpTransport the static model class
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
		return 'exp_tax_at_source';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ExpenditureId', 'numerical', 'integerOnly'=>true),
			array('Cost', 'numerical'),
			array('Description, CerateAt, LastUpdateAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, ExpenditureId, Description, Cost, CerateAt, LastUpdateAt', 'safe', 'on'=>'search'),
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
			'expenditure' => array(self::BELONGS_TO, 'Expenditure', 'ExpenditureId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'ExpenditureId' => 'Expenditure',
			'Description' => 'Description',
			'Cost' => 'Cost',
			'CerateAt' => 'Cerate At',
			'LastUpdateAt' => 'Last Update At',
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
		$criteria->compare('ExpenditureId',$this->ExpenditureId);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('Cost',$this->Cost);
		$criteria->compare('CerateAt',$this->CerateAt,true);
		$criteria->compare('LastUpdateAt',$this->LastUpdateAt,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}