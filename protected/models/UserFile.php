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
class UserFile extends CActiveRecord
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
		return 'user_files';
	}

	
}