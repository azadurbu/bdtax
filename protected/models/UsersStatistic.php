<?php

/**
 * This is the model class for table "users_statistic".
 *
 * The followings are the available columns in table 'users_statistic':
 * @property integer $id
 * @property integer $CPIId
 * @property string $pdf_print_date
 * @property integer $pdf_print_count
 * @property string $pdf_print_month
 * @property string $progress_percent_date
 * @property string $progress_percent
 * @property string $progress_percent_month
 */
class UsersStatistic extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UsersStatistic the static model class
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
		return 'users_statistic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CPIId, pdf_print_count, progress_percent', 'required'),
			array('CPIId, pdf_print_count', 'numerical', 'integerOnly'=>true),
			array('pdf_print_month, progress_percent_month', 'length', 'max'=>45),
			array('progress_percent', 'length', 'max'=>11),
			array('pdf_print_date, progress_percent_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, CPIId, pdf_print_date, pdf_print_count, pdf_print_month, progress_percent_date, progress_percent, progress_percent_month', 'safe', 'on'=>'search'),
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
			'CPIId' => 'Cpiid',
			'pdf_print_date' => 'Pdf Print Date',
			'pdf_print_count' => 'Pdf Print Count',
			'pdf_print_month' => 'Pdf Print Month',
			'progress_percent_date' => 'Progress Percent Date',
			'progress_percent' => 'Progress Percent',
			'progress_percent_month' => 'Progress Percent Month',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('CPIId',$this->CPIId);
		$criteria->compare('pdf_print_date',$this->pdf_print_date,true);
		$criteria->compare('pdf_print_count',$this->pdf_print_count);
		$criteria->compare('pdf_print_month',$this->pdf_print_month,true);
		$criteria->compare('progress_percent_date',$this->progress_percent_date,true);
		$criteria->compare('progress_percent',$this->progress_percent,true);
		$criteria->compare('progress_percent_month',$this->progress_percent_month,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}