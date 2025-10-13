<?php

/**
 * This is the model class for table "my_documents".
 *
 * The followings are the available columns in table 'my_documents':
 * @property string $id
 * @property integer $user_id
 * @property string $tax_year
 * @property string $doc_type
 * @property string $doc_name
 * @property string $file_location
 * @property string $notes
 * @property string $created_at
 * @property string $updated_at
 */
class MyDocuments extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MyDocuments the static model class
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
		return 'my_documents';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, tax_year, doc_type, doc_name, file_location, notes', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('tax_year, doc_type', 'length', 'max'=>50),
			array('doc_name, file_location', 'length', 'max'=>150),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, tax_year, doc_type, doc_name, file_location, notes, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'tax_year' => 'Tax Year',
			'doc_type' => 'Doc Type',
			'doc_name' => 'Doc Name',
			'file_location' => 'File Location',
			'notes' => 'Notes',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('tax_year',$this->tax_year,true);
		$criteria->compare('doc_type',$this->doc_type,true);
		$criteria->compare('doc_name',$this->doc_name,true);
		$criteria->compare('file_location',$this->file_location,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}