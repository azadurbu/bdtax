<?php

/**
 * This is the model class for table "liabilities".
 *
 * The followings are the available columns in table 'liabilities':
 * @property integer $LiabilityId
 * @property string $MortgagesOnPropertyConfirm
 * @property string $MortgagesOnPropertyFOrT
 * @property double $MortgagesOnPropertyTotal
 * @property string $UnsecuredLoansConfirm
 * @property string $UnsecuredLoansFOrT
 * @property double $UnsecuredLoansTotal
 * @property string $BankLoansConfirm
 * @property string $BankLoansFOrT
 * @property double $BankLoansTotal
 * @property string $OthersLoanConfirm
 * @property string $OthersLoanFOrT
 * @property double $OthersLoanTotal
 * @property string $CerateAt
 * @property string $LastUpdateAt
 * @property integer $CPIId
 * @property string $EntryYear
 * @property integer $trash
 *
 * The followings are the available model relations:
 * @property LiaBankLoans[] $liaBankLoans
 * @property LiaMortgagesOnProperty[] $liaMortgagesOnProperties
 * @property LiaOthersLoan[] $liaOthersLoans
 * @property LiaUnsecuredLoans[] $liaUnsecuredLoans
 * @property PersonalInformation $cPI
 */
class Liabilities extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Liabilities the static model class
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
		return 'liabilities';
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
			array('CPIId, trash', 'numerical', 'integerOnly'=>true),
			array('MortgagesOnPropertyTotal, UnsecuredLoansTotal, BankLoansTotal, OthersLoanTotal', 'numerical'),
			array('MortgagesOnPropertyConfirm, UnsecuredLoansConfirm, BankLoansConfirm, OthersLoanConfirm', 'length', 'max'=>3),
			array('MortgagesOnPropertyFOrT, UnsecuredLoansFOrT, BankLoansFOrT, OthersLoanFOrT', 'length', 'max'=>8),
			array('EntryYear', 'length', 'max'=>9),
			array('LastUpdateAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('LiabilityId, MortgagesOnPropertyConfirm, MortgagesOnPropertyFOrT, MortgagesOnPropertyTotal, UnsecuredLoansConfirm, UnsecuredLoansFOrT, UnsecuredLoansTotal, BankLoansConfirm, BankLoansFOrT, BankLoansTotal, OthersLoanConfirm, OthersLoanFOrT, OthersLoanTotal, CerateAt, LastUpdateAt, CPIId, EntryYear, trash', 'safe', 'on'=>'search'),
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
			'liaBankLoans' => array(self::HAS_MANY, 'LiaBankLoans', 'LiabilityId'),
			'liaMortgagesOnProperties' => array(self::HAS_MANY, 'LiaMortgagesOnProperty', 'LiabilityId'),
			'liaOthersLoans' => array(self::HAS_MANY, 'LiaOthersLoan', 'LiabilityId'),
			'liaUnsecuredLoans' => array(self::HAS_MANY, 'LiaUnsecuredLoans', 'LiabilityId'),
			'cPI' => array(self::BELONGS_TO, 'PersonalInformation', 'CPIId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'LiabilityId' => 'Liability',
			'MortgagesOnPropertyConfirm' => 'Mortgages On Property Confirm',
			'MortgagesOnPropertyFOrT' => 'Mortgages On Property For T',
			'MortgagesOnPropertyTotal' => 'Mortgages On Property Total',
			'UnsecuredLoansConfirm' => 'Unsecured Loans Confirm',
			'UnsecuredLoansFOrT' => 'Unsecured Loans For T',
			'UnsecuredLoansTotal' => 'Unsecured Loans Total',
			'BankLoansConfirm' => 'Bank Loans Confirm',
			'BankLoansFOrT' => 'Bank Loans For T',
			'BankLoansTotal' => 'Bank Loans Total',
			'OthersLoanConfirm' => 'Others Loan Confirm',
			'OthersLoanFOrT' => 'Others Loan For T',
			'OthersLoanTotal' => 'Others Loan Total',
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

		$criteria->compare('LiabilityId',$this->LiabilityId);
		$criteria->compare('MortgagesOnPropertyConfirm',$this->MortgagesOnPropertyConfirm,true);
		$criteria->compare('MortgagesOnPropertyFOrT',$this->MortgagesOnPropertyFOrT,true);
		$criteria->compare('MortgagesOnPropertyTotal',$this->MortgagesOnPropertyTotal);
		$criteria->compare('UnsecuredLoansConfirm',$this->UnsecuredLoansConfirm,true);
		$criteria->compare('UnsecuredLoansFOrT',$this->UnsecuredLoansFOrT,true);
		$criteria->compare('UnsecuredLoansTotal',$this->UnsecuredLoansTotal);
		$criteria->compare('BankLoansConfirm',$this->BankLoansConfirm,true);
		$criteria->compare('BankLoansFOrT',$this->BankLoansFOrT,true);
		$criteria->compare('BankLoansTotal',$this->BankLoansTotal);
		$criteria->compare('OthersLoanConfirm',$this->OthersLoanConfirm,true);
		$criteria->compare('OthersLoanFOrT',$this->OthersLoanFOrT,true);
		$criteria->compare('OthersLoanTotal',$this->OthersLoanTotal);
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