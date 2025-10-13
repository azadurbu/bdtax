<?php

/**
 * This is the model class for table "payments".
 *
 * The followings are the available columns in table 'payments':
 * @property string $id
 * @property integer $role_id
 * @property integer $CPIId
 * @property integer $user_id
 * @property integer $org_id
 * @property string $payment_date
 * @property string $payment_year
 * @property string $payment_from
 * @property string $payment_to
 * @property string $tran_id
 * @property string $val_id
 * @property double $amount
 * @property string $card_type
 * @property double $store_amount
 * @property string $card_no
 * @property string $bank_tran_id
 * @property string $status
 * @property string $error
 * @property string $tran_date
 * @property string $currency
 * @property string $card_issuer
 * @property string $card_brand
 * @property string $card_issuer_country
 * @property string $card_issuer_country_code
 * @property string $store_id
 * @property string $verify_sign
 * @property string $verify_key
 * @property string $currency_type
 * @property double $currency_amount
 * @property double $currency_rate
 * @property double $base_fair
 * @property string $value_a
 * @property string $value_b
 * @property string $value_c
 * @property string $value_d
 * @property double $risk_level
 * @property string $risk_title
 * @property string $voucher_id
 * @property string $cus_name
 * @property string $cus_email
 * @property string $cus_phone
 * @property integer $emi_option
 */
class Payments extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Payments the static model class
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
		return 'payments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('role_id, payment_date, tran_id, status', 'required'),
			array('role_id, CPIId, user_id, org_id, emi_option', 'numerical', 'integerOnly'=>true),
			array('amount, store_amount, currency_amount, currency_rate, base_fair, risk_level', 'numerical'),
			array('payment_year, tran_id, val_id, status, currency, card_brand, card_issuer_country, card_issuer_country_code, store_id, currency_type, risk_title', 'length', 'max'=>50),
			array('card_type', 'length', 'max'=>100),
			array('card_no, bank_tran_id', 'length', 'max'=>500),
			array('card_issuer, verify_key', 'length', 'max'=>250),
			array('verify_sign, value_a, value_b, value_c, value_d, cus_name, cus_email, cus_phone', 'length', 'max'=>150),
			array('voucher_id', 'length', 'max'=>20),
			array('payment_from, payment_to, error, tran_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, role_id, CPIId, user_id, org_id, payment_date, payment_year, payment_from, payment_to, tran_id, val_id, amount, card_type, store_amount, card_no, bank_tran_id, status, error, tran_date, currency, card_issuer, card_brand, card_issuer_country, card_issuer_country_code, store_id, verify_sign, verify_key, currency_type, currency_amount, currency_rate, base_fair, value_a, value_b, value_c, value_d, risk_level, risk_title, voucher_id, cus_name, cus_email, cus_phone, emi_option', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'role_id' => 'Role',
			'CPIId' => 'Cpiid',
			'user_id' => 'User',
			'org_id' => 'Org',
			'payment_date' => 'Payment Date',
			'payment_year' => 'Payment Year',
			'payment_from' => 'Payment From',
			'payment_to' => 'Payment To',
			'tran_id' => 'Tran',
			'val_id' => 'Val',
			'amount' => 'Amount',
			'card_type' => 'Card Type',
			'store_amount' => 'Store Amount',
			'card_no' => 'Card No',
			'bank_tran_id' => 'Bank Tran',
			'status' => 'Status',
			'error' => 'Error',
			'tran_date' => 'Tran Date',
			'currency' => 'Currency',
			'card_issuer' => 'Card Issuer',
			'card_brand' => 'Card Brand',
			'card_issuer_country' => 'Card Issuer Country',
			'card_issuer_country_code' => 'Card Issuer Country Code',
			'store_id' => 'Store',
			'verify_sign' => 'Verify Sign',
			'verify_key' => 'Verify Key',
			'currency_type' => 'Currency Type',
			'currency_amount' => 'Currency Amount',
			'currency_rate' => 'Currency Rate',
			'base_fair' => 'Base Fair',
			'value_a' => 'Value A',
			'value_b' => 'Value B',
			'value_c' => 'Value C',
			'value_d' => 'Value D',
			'risk_level' => 'Risk Level',
			'risk_title' => 'Risk Title',
			'voucher_id' => 'Voucher',
			'cus_name' => 'Cus Name',
			'cus_email' => 'Cus Email',
			'cus_phone' => 'Cus Phone',
			'emi_option' => 'Emi Option',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('CPIId',$this->CPIId);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('org_id',$this->org_id);
		$criteria->compare('payment_date',$this->payment_date,true);
		$criteria->compare('payment_year',$this->payment_year,true);
		$criteria->compare('payment_from',$this->payment_from,true);
		$criteria->compare('payment_to',$this->payment_to,true);
		$criteria->compare('tran_id',$this->tran_id,true);
		$criteria->compare('val_id',$this->val_id,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('card_type',$this->card_type,true);
		$criteria->compare('store_amount',$this->store_amount);
		$criteria->compare('card_no',$this->card_no,true);
		$criteria->compare('bank_tran_id',$this->bank_tran_id,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('error',$this->error,true);
		$criteria->compare('tran_date',$this->tran_date,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('card_issuer',$this->card_issuer,true);
		$criteria->compare('card_brand',$this->card_brand,true);
		$criteria->compare('card_issuer_country',$this->card_issuer_country,true);
		$criteria->compare('card_issuer_country_code',$this->card_issuer_country_code,true);
		$criteria->compare('store_id',$this->store_id,true);
		$criteria->compare('verify_sign',$this->verify_sign,true);
		$criteria->compare('verify_key',$this->verify_key,true);
		$criteria->compare('currency_type',$this->currency_type,true);
		$criteria->compare('currency_amount',$this->currency_amount);
		$criteria->compare('currency_rate',$this->currency_rate);
		$criteria->compare('base_fair',$this->base_fair);
		$criteria->compare('value_a',$this->value_a,true);
		$criteria->compare('value_b',$this->value_b,true);
		$criteria->compare('value_c',$this->value_c,true);
		$criteria->compare('value_d',$this->value_d,true);
		$criteria->compare('risk_level',$this->risk_level);
		$criteria->compare('risk_title',$this->risk_title,true);
		$criteria->compare('voucher_id',$this->voucher_id,true);
		$criteria->compare('cus_name',$this->cus_name,true);
		$criteria->compare('cus_email',$this->cus_email,true);
		$criteria->compare('cus_phone',$this->cus_phone,true);
		$criteria->compare('emi_option',$this->emi_option);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}