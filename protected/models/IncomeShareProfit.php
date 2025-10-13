<?php

/**
 * This is the model class for table "income_share_profit".
 *
 * The followings are the available columns in table 'income_share_profit':
 * @property integer $IncomeShareProfitId
 * @property integer $IncomeId
 * @property string $NameOfFirm
 * @property double $IncomeOfFirm
 * @property double $ShareOfFirm
 * @property double $NetValueOfShare
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
class IncomeShareProfit extends CActiveRecord
{

	public $SumValueOfShare;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return IncomeShareProfit the static model class
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
		return 'income_share_profit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IncomeOfFirm, ShareOfFirm, NetValueOfShare, CerateAt, EntryYear', 'required'),
			array('IncomeId, CPIId, trash', 'numerical', 'integerOnly'=>true),
			array('IncomeOfFirm, ShareOfFirm, NetValueOfShare', 'numerical'),
			array('EntryYear', 'length', 'max'=>9),
			array('LastUpdateAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IncomeShareProfitId, IncomeId, IncomeOfFirm, ShareOfFirm, NetValueOfShare, CerateAt, LastUpdateAt, CPIId, EntryYear, trash, NameOfFirm ', 'safe'),
			array('IncomeShareProfitId, IncomeId, IncomeOfFirm, ShareOfFirm, NetValueOfShare, CerateAt, LastUpdateAt, CPIId, EntryYear, trash', 'safe', 'on'=>'search'),
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
			'incomes' => array(self::HAS_MANY, 'Income', 'IncomeShareProfitId'),
			'cPI' => array(self::BELONGS_TO, 'PersonalInformation', 'CPIId'),
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
			'NameOfFirm' => 'Firm name',
			'IncomeOfFirm' => 'Income of Firm',
			'ShareOfFirm' => 'Percentage of ownership of Firm',
			'NetValueOfShare' => 'Net Value of Share',
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
		$criteria->compare('IncomeOfFirm',$this->IncomeOfFirm);
		$criteria->compare('ShareOfFirm',$this->ShareOfFirm);
		$criteria->compare('NetValueOfShare',$this->NetValueOfShare);
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