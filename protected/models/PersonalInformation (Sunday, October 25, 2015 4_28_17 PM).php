<?php

/**
 * This is the model class for table "personal_information".
 *
 * The followings are the available columns in table 'personal_information':
 * @property integer $CPIId
 * @property string $Name
 * @property integer $ETIN
 * @property integer $NationalId
 * @property string $TaxesCircle
 * @property string $TaxesZone
 * @property integer $AssesmentYearId
 * @property string $ResidentialStatus
 * @property string $Status
 * @property string $EmployerName
 * @property string $SpouseName
 * @property string $FathersName
 * @property string $MothersName
 * @property string $DOB
 * @property string $PresentAddress
 * @property string $PermanentAddress
 * @property string $PhoneOffice
 * @property string $PhoneBusiness
 * @property string $PhoneResidential
 * @property integer $VatNumber
 * @property integer $NoOfAdultInFamily
 * @property integer $NoOfChildInFamily
 * @property integer $UserId
 * @property string $CreateAt
 * @property string $LastvisitAt
 * @property integer $trash
 *
 * The followings are the available model relations:
 * @property Assets[] $assets
 * @property AssetsAgricultureProperty[] $assetsAgricultureProperties
 * @property AssetsAnyOther[] $assetsAnyOthers
 * @property AssetsInvestment[] $assetsInvestments
 * @property AssetsMotorVehicles[] $assetsMotorVehicles
 * @property AssetsNonAgricultureProperty[] $assetsNonAgricultureProperties
 * @property AssetsShareholdingCompanyList[] $assetsShareholdingCompanyLists
 * @property Expenditure[] $expenditures
 * @property Income[] $incomes
 * @property IncomeHouseProperties[] $incomeHouseProperties
 * @property IncomeOtherSource[] $incomeOtherSources
 * @property IncomeSalaries[] $incomeSalaries
 * @property IncomeShareProfit[] $incomeShareProfits
 * @property IncomeTaxPayment[] $incomeTaxPayments
 * @property IncomeTaxRebate[] $incomeTaxRebates
 * @property Liabilities[] $liabilities
 * @property Users $user
 */
class PersonalInformation extends CActiveRecord
{

	public $OrgUserFirstName;
	public $OrgUserLastName;
	public $Org;
	public $progress;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PersonalInformation the static model class
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
		return 'personal_information';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ETIN, CreateAt', 'required'),
			array('ETIN, NationalId, AssesmentYearId, VatNumber, NoOfAdultInFamily, NoOfChildInFamily, UserId, trash', 'numerical', 'integerOnly'=>true),
			array('Name, TaxesCircle, TaxesZone, EmployerName, SpouseName, FathersName, MothersName', 'length', 'max'=>80),
			array('ResidentialStatus, Status, PhoneOffice, PhoneBusiness, PhoneResidential', 'length', 'max'=>45),
			array('DOB, PresentAddress, PermanentAddress, LastvisitAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CPIId, Name, ETIN, NationalId, TaxesCircle, TaxesZone, AssesmentYearId, ResidentialStatus, Status, EmployerName, SpouseName, FathersName, MothersName, DOB, PresentAddress, PermanentAddress, PhoneOffice, PhoneBusiness, PhoneResidential, VatNumber, NoOfAdultInFamily, NoOfChildInFamily, UserId, CreateAt, LastvisitAt, trash, OrgUserFirstName, OrgUserLastName, Org', 'safe'),
			array('CPIId, Name, ETIN, NationalId, TaxesCircle, TaxesZone, AssesmentYearId, ResidentialStatus, Status, EmployerName, SpouseName, FathersName, MothersName, DOB, PresentAddress, PermanentAddress, PhoneOffice, PhoneBusiness, PhoneResidential, VatNumber, NoOfAdultInFamily, NoOfChildInFamily, UserId, CreateAt, LastvisitAt, trash, OrgUserFirstName, OrgUserLastName, Org', 'safe', 'on'=>'search'),
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
			'assets' => array(self::HAS_MANY, 'Assets', 'CPIId'),
			'assetsAgricultureProperties' => array(self::HAS_MANY, 'AssetsAgricultureProperty', 'CPIId'),
			'assetsAnyOthers' => array(self::HAS_MANY, 'AssetsAnyOther', 'CPIId'),
			'assetsInvestments' => array(self::HAS_MANY, 'AssetsInvestment', 'CPIId'),
			'assetsMotorVehicles' => array(self::HAS_MANY, 'AssetsMotorVehicles', 'CPIId'),
			'assetsNonAgricultureProperties' => array(self::HAS_MANY, 'AssetsNonAgricultureProperty', 'CPIId'),
			'assetsShareholdingCompanyLists' => array(self::HAS_MANY, 'AssetsShareholdingCompanyList', 'CPIId'),
			'expenditures' => array(self::HAS_MANY, 'Expenditure', 'CPIId'),
			'incomes' => array(self::HAS_MANY, 'Income', 'CPIId'),
			'incomeHouseProperties' => array(self::HAS_MANY, 'IncomeHouseProperties', 'CPIId'),
			'incomeOtherSources' => array(self::HAS_MANY, 'IncomeOtherSource', 'CPIId'),
			'incomeSalaries' => array(self::HAS_MANY, 'IncomeSalaries', 'CPIId'),
			'incomeShareProfits' => array(self::HAS_MANY, 'IncomeShareProfit', 'CPIId'),
			'incomeTaxPayments' => array(self::HAS_MANY, 'IncomeTaxPayment', 'CPIId'),
			'incomeTaxRebates' => array(self::HAS_MANY, 'IncomeTaxRebate', 'CPIId'),
			'liabilities' => array(self::HAS_MANY, 'Liabilities', 'CPIId'),
			'user' => array(self::BELONGS_TO, 'Users', 'UserId'),
			'TaxZoneCircle' => array(self::BELONGS_TO, 'TaxZoneCircle', 'TaxZoneCircleId'),
			'orgUser' => array(self::BELONGS_TO, 'Users', 'org_user_id'),
			'org' => array(self::BELONGS_TO, 'Organizations', 'org_id'),
			);
}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CPIId' => Yii::t('p_info','Cpiid'),
			'Name' => Yii::t('p_info','Client Name'),
			'ETIN' => Yii::t('p_info','E-TIN'),
			'NationalId' => Yii::t('p_info','National ID'),
			'TaxesCircle' => Yii::t('p_info','Taxes Circle'),
			'TaxesZone' => Yii::t('p_info','Taxes Zone'),
			'AssesmentYearId' => Yii::t('p_info','Assesment Year'),
			'ResidentialStatus' => Yii::t('p_info','Residential Status'),
			'Status' => Yii::t('p_info','Status'),
			'EmployerName' => Yii::t('p_info','Business Name'),
			'SpouseName' => Yii::t('p_info','Spouse Name'),
			'FathersName' => Yii::t('p_info','Fathers Name'),
			'MothersName' => Yii::t('p_info','Mothers Name'),
			'DOB' => Yii::t('p_info','Dob'),
			'PresentAddress' => Yii::t('p_info','Present Address'),
			'PermanentAddress' => Yii::t('p_info','Permanent Address'),
			'PhoneOffice' => Yii::t('p_info','Phone Office'),
			'PhoneBusiness' => Yii::t('p_info','Phone Business'),
			'PhoneResidential' => Yii::t('p_info','Phone Residential'),
			'VatNumber' => Yii::t('p_info','Vat Number'),
			'NoOfAdultInFamily' => Yii::t('p_info','No Of Adult In Family'),
			'NoOfChildInFamily' => Yii::t('p_info','No Of Child In Family'),
			'UserId' => Yii::t('p_info','User'),
			'CreateAt' => Yii::t('p_info','Create At'),
			'LastvisitAt' => Yii::t('p_info','Lastvisit At'),
			'trash' => Yii::t('p_info','Trash'),
			'OrgUserFirstName' => Yii::t('p_info','Assigned User'),
			'OrgUserLastName' => Yii::t('p_info','Last Name'),
			'Org' => Yii::t('p_info','Organization'),
			'progress' => Yii::t('p_info','Progress')
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


        // $criteria->alias = 'usr';

		if (Yii::app()->user->role == 'companyAdmin') {

			$criteria->addInCondition('org_id', array(Yii::app()->user->org_id));

		} else if (Yii::app()->user->role == 'companyUser') {

			// $criteria->addInCondition('org_id', array(Yii::app()->user->org_id));

			$criteria->condition = 'org_user_id=:data AND org_id=:data1';
			$criteria->params = array(':data' => Yii::app()->user->id,':data1' => Yii::app()->user->org_id);

		}

        //-----------------------------------------------------------------------//


        $criteria->compare('org.organization_name', $this->Org,true);
        $criteria->compare('orgUser.last_name', $this->OrgUserFirstName, true);
        $criteria->compare('orgUser.first_name', $this->OrgUserLastName, true);

		$criteria->compare('CPIId',$this->CPIId);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('ETIN',$this->ETIN);
		$criteria->compare('NationalId',$this->NationalId);
		$criteria->compare('TaxesCircle',$this->TaxesCircle,true);
		$criteria->compare('TaxesZone',$this->TaxesZone,true);
		$criteria->compare('AssesmentYearId',$this->AssesmentYearId);
		$criteria->compare('ResidentialStatus',$this->ResidentialStatus,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('EmployerName',$this->EmployerName,true);
		$criteria->compare('SpouseName',$this->SpouseName,true);
		$criteria->compare('FathersName',$this->FathersName,true);
		$criteria->compare('MothersName',$this->MothersName,true);
		$criteria->compare('DOB',$this->DOB,true);
		$criteria->compare('PresentAddress',$this->PresentAddress,true);
		$criteria->compare('PermanentAddress',$this->PermanentAddress,true);
		$criteria->compare('PhoneOffice',$this->PhoneOffice,true);
		$criteria->compare('PhoneBusiness',$this->PhoneBusiness,true);
		$criteria->compare('PhoneResidential',$this->PhoneResidential,true);
		$criteria->compare('VatNumber',$this->VatNumber);
		$criteria->compare('NoOfAdultInFamily',$this->NoOfAdultInFamily);
		$criteria->compare('NoOfChildInFamily',$this->NoOfChildInFamily);
		$criteria->compare('UserId',$this->UserId);
		$criteria->compare('CreateAt',$this->CreateAt,true);
		$criteria->compare('LastvisitAt',$this->LastvisitAt,true);
		$criteria->compare('trash',$this->trash);
		$criteria->with=array(
			'org'=>array(
				'select'=>false,
				'togather'=>true,
				'joinType'=>'inner JOIN',
				), 
			// 'orgUser'=>array(
			// 	'select'=>false,
			// 	'togather'=>false,
			// 	'joinType'=>'left JOIN',
			// 	)
			);


		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
			'pagination' => array(
				'pageSize' => 10,
				),
			'sort'=>array(
				'attributes'=>array(
					'Org'=>array(
						'asc'=>'org.organization_name',
						'desc'=>'org.organization_name DESC',
						),
					'OrgUserFirstName'=>array(
						'asc'=>'orgUser.first_name',
						'desc'=>'orgUser.first_name DESC',
						),
					'OrgUserLastName'=>array(
						'asc'=>'orgUser.last_name',
						'desc'=>'orgUser.last_name DESC',
						),
					'*',
					),

				),
			));
		// return new CActiveDataProvider($this, array(
		// 	'criteria'=>$criteria,
		// 	));
	}
}