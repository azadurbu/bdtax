<?php

/**
 * This is the model class for table "income_other_source".
 *
 * The followings are the available columns in table 'income_other_source':
 * @property integer $IncomeOtherSourceId
 * @property double $InterestIncome
 * @property double $DividendIncome
 * @property double $WinningsIncome
 * @property double $OthersIncome
 * @property string $CerateAt
 * @property string $LastUpdateAt
 * @property integer $CPIId
 * @property string $EntryYear
 * @property integer $trash
 *
 * The followings are the available model relations:
 * @property Income[] $incomes
 * @property PersonalInformation $cPI
 */
class IncomeOtherSource extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return IncomeOtherSource the static model class
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
		return 'income_other_source';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('InterestIncome, DividendIncome, WinningsIncome, OthersIncome, CerateAt, CPIId, EntryYear', 'required'),
			array('CPIId, trash', 'numerical', 'integerOnly'=>true),
			array('InterestIncome, DividendIncome, WinningsIncome, OthersIncome', 'numerical'),
			array('EntryYear', 'length', 'max'=>9),
			array('LastUpdateAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IncomeOtherSourceId, InterestIncome, DividendIncome, WinningsIncome, OthersIncome, CerateAt, LastUpdateAt, CPIId, EntryYear, trash', 'safe', 'on'=>'search'),
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
			'incomes' => array(self::HAS_MANY, 'Income', 'IncomeOtherSourceId'),
			'cPI' => array(self::BELONGS_TO, 'PersonalInformation', 'CPIId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IncomeOtherSourceId' => 'Income Other Source',
			'InterestIncome' => 'Interest Income',
			'DividendIncome' => 'Dividend Income',
			'WinningsIncome' => 'Winnings Income',
			'OthersIncome' => 'Other Income',
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

		$criteria->compare('IncomeOtherSourceId',$this->IncomeOtherSourceId);
		$criteria->compare('InterestIncome',$this->InterestIncome);
		$criteria->compare('DividendIncome',$this->DividendIncome);
		$criteria->compare('WinningsIncome',$this->WinningsIncome);
		$criteria->compare('OthersIncome',$this->OthersIncome);
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