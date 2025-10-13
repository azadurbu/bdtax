<?php

/**
 * This is the model class for table "tax_years".
 *
 * The followings are the available columns in table 'tax_years':
 * @property integer $id
 * @property string $tax_year
 */
class Orders extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TaxYears the static model class
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
		return 'orders';
	}

	
}