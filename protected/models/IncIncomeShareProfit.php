<?php

/**
 * This is the model class for table "inc_income_share_profit".
 *
 * The followings are the available columns in table 'inc_income_share_profit':
 * @property integer $IncomeShareProfitId
 * @property integer $IncomeId
 * @property string $NameOfFirm
 * @property double $IncomeOfFirm
 * @property double $ShareOfFirm
 * @property double $Cost
 * @property string $CerateAt
 * @property string $LastUpdateAt
 * @property integer $CPIId
 * @property string $EntryYear
 * @property integer $trash
 */
class IncIncomeShareProfit extends CActiveRecord
{

	public $SumOfIncomeShareProfit;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return IncIncomeShareProfit the static model class
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
		return 'inc_income_share_profit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IncomeOfFirm, ShareOfFirm, Cost, CerateAt, EntryYear', 'required'),
			array('IncomeId, CPIId, trash', 'numerical', 'integerOnly'=>true),
			array('IncomeOfFirm, ShareOfFirm, Cost', 'numerical'),
			array('NameOfFirm', 'length', 'max'=>100),
			array('EntryYear', 'length', 'max'=>9),
			array('LastUpdateAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IncomeShareProfitId, IncomeId, NameOfFirm, IncomeOfFirm, ShareOfFirm, Cost, CerateAt, LastUpdateAt, CPIId, EntryYear, trash', 'safe', 'on'=>'search'),
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
			'IncomeShareProfitId' => 'Income Share Profit',
			'IncomeId' => 'Income',
			'NameOfFirm' => 'Name Of Firm',
			'IncomeOfFirm' => 'Income Of Firm',
			'ShareOfFirm' => 'Share Of Firm',
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

		$criteria->compare('IncomeShareProfitId',$this->IncomeShareProfitId);
		$criteria->compare('IncomeId',$this->IncomeId);
		$criteria->compare('NameOfFirm',$this->NameOfFirm,true);
		$criteria->compare('IncomeOfFirm',$this->IncomeOfFirm);
		$criteria->compare('ShareOfFirm',$this->ShareOfFirm);
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