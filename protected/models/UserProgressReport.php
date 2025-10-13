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
class UserProgressReport extends CActiveRecord
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
		return 'user_progress_report';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('reportForDate, pdfDownloadCount, payment, userActve, userInActive, userCreated, CPIID, UserId, createdAt', 'required'),
			array('pdf_print_date, progress_percent_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('reportForDate, percent_0, percent_25, percent_50, percent_75, percent_100, pdfDownloadCount, payment, userActve, userInActive, userCreated, newUser, CPIID, UserId, createdAt', 'safe', 'on'=>'search'),
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
			'reportForDate' => 'Report For Date',
			'percent_0' => 'Percent 0-24',
			'percent_25' => 'Percent 25-49',
			'percent_50' => 'Percent 50-74',
			'percent_75' => 'Percent 75-99',
			'percent_100' => 'Percent 100',
			'pdfDownloadCount' => 'Pdf Print Count',
			'payment' => 'Payment Amount',
			'userActve' => 'User Actve',
			'userInActve' => 'User InActve',
			'userCreated' => 'User Created Date',
			'newUser' => 'New User',
			'CPIID' => 'CPIID',
			'UserId' => 'User Id',
			'createdAt' => 'Created At',
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

		$criteria->compare('reportForDate',$this->reportForDate,true);
		$criteria->compare('percent_0',$this->percent_0,true);
		$criteria->compare('percent_25',$this->percent_25,true);
		$criteria->compare('percent_50',$this->percent_50,true);
		$criteria->compare('percent_75',$this->percent_75,true);
		$criteria->compare('percent_100',$this->percent_100,true);
		$criteria->compare('pdfDownloadCount',$this->pdfDownloadCount,true);
		$criteria->compare('payment',$this->payment,true);
		$criteria->compare('userActve',$this->userActve,true);
		$criteria->compare('userInActve',$this->userInActve,true);
		$criteria->compare('userCreated',$this->userCreated,true);
		$criteria->compare('newUser',$this->newUser,true);
		$criteria->compare('CPIID',$this->CPIID,true);
		$criteria->compare('UserId',$this->UserId,true);
		$criteria->compare('createdAt',$this->createdAt,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}