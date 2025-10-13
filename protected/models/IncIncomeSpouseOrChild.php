<?php

/**
 * This is the model class for table "inc_income_spouse_or_child".
 *
 * The followings are the available columns in table 'inc_income_spouse_or_child':
 * @property integer $IncomeSpouseOrChildId
 * @property integer $IncomeId
 * @property string $Type
 * @property string $Name
 * @property double $Cost
 * @property string $CerateAt
 * @property string $LastUpdateAt
 * @property integer $CPIId
 * @property string $EntryYear
 * @property integer $trash
 *
 * The followings are the available model relations:
 * @property PersonalInformation $cPI
 * @property Income $income
 */
class IncIncomeSpouseOrChild extends CActiveRecord
{
	public $SumOfIncomeSpouseOrChild;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return IncIncomeSpouseOrChild the static model class
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
		return 'inc_income_spouse_or_child';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CerateAt, CPIId, EntryYear', 'required'),
			array('IncomeId, CPIId, trash', 'numerical', 'integerOnly'=>true),
			array('Cost', 'numerical'),
			array('Type', 'length', 'max'=>6),
			array('EntryYear', 'length', 'max'=>9),
			array('Name, LastUpdateAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IncomeSpouseOrChildId, IncomeId, Type, Name, Cost, CerateAt, LastUpdateAt, CPIId, EntryYear, trash', 'safe', 'on'=>'search'),
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
			'income' => array(self::BELONGS_TO, 'Income', 'IncomeId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IncomeSpouseOrChildId' => 'Income Spouse Or Child',
			'IncomeId' => 'Income',
			'Type' => 'Type',
			'Name' => 'Name',
			'Cost' => 'Cost',
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

		$criteria->compare('IncomeSpouseOrChildId',$this->IncomeSpouseOrChildId);
		$criteria->compare('IncomeId',$this->IncomeId);
		$criteria->compare('Type',$this->Type,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Cost',$this->Cost);
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