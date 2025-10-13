<?php

/**
 * This is the model class for table "expenditure".
 *
 * The followings are the available columns in table 'expenditure':
 * @property integer $ExpenditureId
 * @property string $PersonalFoodingConfirm
 * @property string $PersonalFoodingFOrT
 * @property double $PersonalFoodingTotal
 * @property double $TotalTaxPaidLastYear
 * @property string $AccommodationConfirm
 * @property string $AccommodationFOrT
 * @property double $AccommodationTotal
 * @property string $TransportConfirm
 * @property string $TransportFOrT
 * @property double $TransportTotal
 * @property string $ElectricityBillConfirm
 * @property string $ElectricityBillFOrT
 * @property double $ElectricityBillTotal
 * @property string $WasaBillConfirm
 * @property string $WasaBillFOrT
 * @property double $WasaBillTotal
 * @property string $GasBillConfirm
 * @property string $GasBillFOrT
 * @property double $GasBillTotal
 * @property string $TelephoneBillConfirm
 * @property string $TelephoneBillFOrT
 * @property double $TelephoneBillTotal
 * @property string $ChildrenEducationConfirm
 * @property string $ChildrenEducationFOrT
 * @property double $ChildrenEducationTotal
 * @property string $PersonalForeignTravelConfirm
 * @property string $PersonalForeignTravelFOrT
 * @property double $PersonalForeignTravelTotal
 * @property string $FestivalOtherSpecialConfirm
 * @property string $FestivalOtherSpecialFOrT
 * @property double $FestivalOtherSpecialTotal
 * @property double $TotalExpenditure
 * @property string $CerateAt
 * @property string $LastUpdateAt
 * @property integer $CPIId
 * @property string $EntryYear
 * @property integer $trash
 *
 * The followings are the available model relations:
 * @property ExpAccommodation[] $expAccommodations
 * @property ExpChildrenEducation[] $expChildrenEducations
 * @property ExpElectricityBill[] $expElectricityBills
 * @property ExpFestivalOtherSpecial[] $expFestivalOtherSpecials
 * @property ExpGasBill[] $expGasBills
 * @property ExpPersonalFooding[] $expPersonalFoodings
 * @property ExpPersonalForeignTravel[] $expPersonalForeignTravels
 * @property ExpTelephoneBill[] $expTelephoneBills
 * @property ExpTransport[] $expTransports
 * @property ExpWasaBill[] $expWasaBills
 * @property PersonalInformation $cPI
 */
class Expenditure extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Expenditure the static model class
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
		return 'expenditure';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CPIId, EntryYear', 'required'),
			array('CPIId, trash', 'numerical', 'integerOnly'=>true),
			array('PersonalFoodingTotal, TotalTaxPaidLastYear, AccommodationTotal, TransportTotal, ElectricityBillTotal, WasaBillTotal, GasBillTotal, TelephoneBillTotal, ChildrenEducationTotal, PersonalForeignTravelTotal, FestivalOtherSpecialTotal, TotalExpenditure, HolidayTotal, DonationTotal, OtherSpecialTotal, OtherTotal, OtherTransportTotal, OtherHouseholdTotal, TaxAtSourceTotal, SurchargeOtherTotal', 'numerical'),
			array('PersonalFoodingConfirm, AccommodationConfirm, TransportConfirm, ElectricityBillConfirm, WasaBillConfirm, GasBillConfirm, TelephoneBillConfirm, ChildrenEducationConfirm, PersonalForeignTravelConfirm, FestivalOtherSpecialConfirm, HolidayConfirm, DonationConfirm, OtherSpecialConfirm, OtherConfirm, OtherTransportConfirm, OtherHouseholdConfirm, TaxAtSourceConfirm, SurchargeOtherConfirm', 'length', 'max'=>3),
			array('PersonalFoodingFOrT, AccommodationFOrT, TransportFOrT, ElectricityBillFOrT, WasaBillFOrT, GasBillFOrT, TelephoneBillFOrT, ChildrenEducationFOrT, PersonalForeignTravelFOrT, FestivalOtherSpecialFOrT, HolidayFOrT, DonationFOrT, OtherSpecialFOrT, OtherFOrT, OtherTransportFOrT, OtherHouseholdFOrT, TaxAtSourceFOrT, SurchargeOtherFOrT', 'length', 'max'=>8),
			array('EntryYear', 'length', 'max'=>9),
			array('CerateAt, LastUpdateAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ExpenditureId, PersonalFoodingConfirm, PersonalFoodingFOrT, PersonalFoodingTotal, TotalTaxPaidLastYear, AccommodationConfirm, AccommodationFOrT, AccommodationTotal, TransportConfirm, TransportFOrT, TransportTotal, ElectricityBillConfirm, ElectricityBillFOrT, ElectricityBillTotal, WasaBillConfirm, WasaBillFOrT, WasaBillTotal, GasBillConfirm, GasBillFOrT, GasBillTotal, TelephoneBillConfirm, TelephoneBillFOrT, TelephoneBillTotal, ChildrenEducationConfirm, ChildrenEducationFOrT, ChildrenEducationTotal, PersonalForeignTravelConfirm, PersonalForeignTravelFOrT, PersonalForeignTravelTotal, FestivalOtherSpecialConfirm, FestivalOtherSpecialFOrT, FestivalOtherSpecialTotal, HolidayConfirm, HolidayFOrT, HolidayTotal, HolidayComment, DonationConfirm, DonationFOrT, DonationTotal, DonationComment, OtherSpecialConfirm, OtherSpecialFOrT, OtherSpecialTotal, OtherSpecialComment, OtherConfirm, OtherFOrT, OtherTotal, OtherComment, OtherTransportConfirm, OtherTransportFOrT, OtherTransportTotal, OtherTransportComment, OtherHouseholdConfirm, OtherHouseholdFOrT, OtherHouseholdTotal, OtherHouseholdComment, TaxAtSourceConfirm, TaxAtSourceFOrT, TaxAtSourceTotal, TaxAtSourceComment, SurchargeOtherConfirm, SurchargeOtherFOrT, SurchargeOtherTotal, SurchargeOtherComment ,TotalExpenditure, CerateAt, LastUpdateAt, CPIId, EntryYear, trash', 'safe', 'on'=>'search'),
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
			'expAccommodations' => array(self::HAS_MANY, 'ExpAccommodation', 'ExpenditureId'),
			'expChildrenEducations' => array(self::HAS_MANY, 'ExpChildrenEducation', 'ExpenditureId'),
			'expElectricityBills' => array(self::HAS_MANY, 'ExpElectricityBill', 'ExpenditureId'),
			'expFestivalOtherSpecials' => array(self::HAS_MANY, 'ExpFestivalOtherSpecial', 'ExpenditureId'),
			'expGasBills' => array(self::HAS_MANY, 'ExpGasBill', 'ExpenditureId'),
			'expPersonalFoodings' => array(self::HAS_MANY, 'ExpPersonalFooding', 'ExpenditureId'),
			'expPersonalForeignTravels' => array(self::HAS_MANY, 'ExpPersonalForeignTravel', 'ExpenditureId'),
			'expTelephoneBills' => array(self::HAS_MANY, 'ExpTelephoneBill', 'ExpenditureId'),
			'expTransports' => array(self::HAS_MANY, 'ExpTransport', 'ExpenditureId'),
			'expWasaBills' => array(self::HAS_MANY, 'ExpWasaBill', 'ExpenditureId'),
			'cPI' => array(self::BELONGS_TO, 'PersonalInformation', 'CPIId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ExpenditureId' => 'Expenditure',
			'PersonalFoodingConfirm' => 'Personal Fooding Confirm',
			'PersonalFoodingFOrT' => 'Personal Fooding F or T',
			'PersonalFoodingTotal' => 'Personal Fooding Total',
            'PersonalFoodingComment' => 'Personal Fooding Comment',
			'TotalTaxPaidLastYear' => 'Total Tax Paid Last Year',

			'AccommodationConfirm' => 'Accommodation Confirm',
			'AccommodationFOrT' => 'Accommodation F or T',
			'AccommodationTotal' => 'Accommodation Total',
			'TransportConfirm' => 'Transport Confirm',
			'TransportFOrT' => 'Transport F or T',
			'TransportTotal' => 'Transport Total',
			'OtherTransportConfirm' => 'Other Transport Confirm',
			'OtherTransportFOrT' => 'Other Transport F or T',
			'OtherTransportTotal' => 'Other Transport Total',
			'OtherTransportComment' => 'Other Transport Comment',
			'ElectricityBillConfirm' => 'Electricity Bill Confirm',
			'ElectricityBillFOrT' => 'Electricity Bill F or T',
			'ElectricityBillTotal' => 'Electricity Bill Total',
			'WasaBillConfirm' => 'Wasa Bill Confirm',
			'WasaBillFOrT' => 'Wasa Bill F or T',
			'WasaBillTotal' => 'Wasa Bill Total',
			'GasBillConfirm' => 'Gas Bill Confirm',
			'GasBillFOrT' => 'Gas Bill F or T',
			'GasBillTotal' => 'Gas Bill Total',
			'OtherHouseholdConfirm' => 'Other Household Confirm',
			'OtherHouseholdFOrT' => 'Other Household F or T',
			'OtherHouseholdTotal' => 'Other Household Total',
			'OtherHouseholdComment' => 'Other Household Comment',
			'TelephoneBillConfirm' => 'Telephone Bill Confirm',
			'TelephoneBillFOrT' => 'Telephone Bill F or T',
			'TelephoneBillTotal' => 'Telephone Bill Total',
			'ChildrenEducationConfirm' => 'Children Education Confirm',
			'ChildrenEducationFOrT' => 'Children Education F or T',
			'ChildrenEducationTotal' => 'Children Education Total',
			'PersonalForeignTravelConfirm' => 'Personal Foreign Travel Confirm',
			'PersonalForeignTravelFOrT' => 'Personal Foreign Travel F or T',
			'PersonalForeignTravelTotal' => 'Personal Foreign Travel Total',
			'FestivalOtherSpecialConfirm' => 'Festival Other Special Confirm',
			'FestivalOtherSpecialFOrT' => 'Festival Other Special F or T',
			'FestivalOtherSpecialTotal' => 'Festival Other Special Total',
            'FestivalOtherSpecialComment' => 'Festival Other Special Comment',
            'HolidayConfirm' => 'Tour and Holiday Confirm',
            'HolidayFOrT' => 'Tour and Holiday F or T',
            'HolidayTotal' => 'Tour and Holiday Total',
            'HolidayComment' => 'Tour and Holiday Comment',
            'DonationConfirm' => 'Donation Confirm',
            'DonationFOrT' => 'Donation F or T',
            'DonationTotal' => 'Donation Total',
            'DonationComment' => 'Donation Comment',
            'OtherSpecialConfirm' => 'Other Special Confirm',
            'OtherSpecialFOrT' => 'Other Special F or T',
            'OtherSpecialTotal' => 'Other Special Total',
            'OtherSpecialComment' => 'Other Special Comment',
            'OtherConfirm' => 'Other Confirm',
            'OtherFOrT' => 'Other F or T',
            'OtherTotal' => 'Other Total',
            'OtherComment' => 'Other Comment',
            'TaxAtSourceConfirm' => 'Tax At Source Confirm',
            'TaxAtSourceFOrT' => 'Tax At Source F or T',
            'TaxAtSourceTotal' => 'Tax At Source Total',
            'TaxAtSourceComment' => 'Tax At Source Comment',
            
            'SurchargeOtherConfirm' => 'Surcharge Other Confirm',
            'SurchargeOtherFOrT' => 'Surcharge Other F or T',
            'SurchargeOtherTotal' => 'Surcharge Other Total',
            'SurchargeOtherComment' => 'Surcharge Other Comment',

            'LossDeductionsConfirm' => 'Loss, Deductions, Expenses, etc.',
            'LossDeductionsFOrT' => 'Loss, Deductions, Expenses, etc. F or T',
            'LossDeductionsTotal' => 'Loss, Deductions, Expenses, etc. Total',
            'LossDeductionsComment' => 'Loss, Deductions, Expenses, etc. Comment',

            'GiftDonationContributionConfirm' => 'Gift, Donation and Contribution Confirm',
            'GiftDonationContributionFOrT' => 'Gift, Donation and Contribution F or T',
            'GiftDonationContributionTotal' => 'Gift, Donation and Contribution Total',
            'GiftDonationContributionComment' => 'Gift, Donation and Contribution Comment',

			'TotalExpenditure' => 'Total Expenditure',
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

		$criteria->compare('ExpenditureId',$this->ExpenditureId);
		$criteria->compare('PersonalFoodingConfirm',$this->PersonalFoodingConfirm,true);
		$criteria->compare('PersonalFoodingFOrT',$this->PersonalFoodingFOrT,true);
		$criteria->compare('PersonalFoodingTotal',$this->PersonalFoodingTotal);
        $criteria->compare('PersonalFoodingComment',$this->PersonalFoodingComment);
		$criteria->compare('TotalTaxPaidLastYear',$this->TotalTaxPaidLastYear);
		$criteria->compare('AccommodationConfirm',$this->AccommodationConfirm,true);
		$criteria->compare('AccommodationFOrT',$this->AccommodationFOrT,true);
		$criteria->compare('AccommodationTotal',$this->AccommodationTotal);
		$criteria->compare('TransportConfirm',$this->TransportConfirm,true);
		$criteria->compare('TransportFOrT',$this->TransportFOrT,true);
		$criteria->compare('TransportTotal',$this->TransportTotal);
		$criteria->compare('OtherTransportConfirm',$this->OtherTransportConfirm,true);
		$criteria->compare('OtherTransportFOrT',$this->OtherTransportFOrT,true);
		$criteria->compare('OtherTransportTotal',$this->OtherTransportTotal);
		$criteria->compare('OtherTransportComment',$this->OtherTransportComment);
		$criteria->compare('ElectricityBillConfirm',$this->ElectricityBillConfirm,true);
		$criteria->compare('ElectricityBillFOrT',$this->ElectricityBillFOrT,true);
		$criteria->compare('ElectricityBillTotal',$this->ElectricityBillTotal);
		$criteria->compare('WasaBillConfirm',$this->WasaBillConfirm,true);
		$criteria->compare('WasaBillFOrT',$this->WasaBillFOrT,true);
		$criteria->compare('WasaBillTotal',$this->WasaBillTotal);
		$criteria->compare('GasBillConfirm',$this->GasBillConfirm,true);
		$criteria->compare('GasBillFOrT',$this->GasBillFOrT,true);
		$criteria->compare('GasBillTotal',$this->GasBillTotal);
		$criteria->compare('OtherHouseholdConfirm',$this->OtherHouseholdConfirm,true);
		$criteria->compare('OtherHouseholdFOrT',$this->OtherHouseholdFOrT,true);
		$criteria->compare('OtherHouseholdTotal',$this->OtherHouseholdTotal);
		$criteria->compare('OtherHouseholdComment',$this->OtherHouseholdComment);
		$criteria->compare('TelephoneBillConfirm',$this->TelephoneBillConfirm,true);
		$criteria->compare('TelephoneBillFOrT',$this->TelephoneBillFOrT,true);
		$criteria->compare('TelephoneBillTotal',$this->TelephoneBillTotal);
		$criteria->compare('ChildrenEducationConfirm',$this->ChildrenEducationConfirm,true);
		$criteria->compare('ChildrenEducationFOrT',$this->ChildrenEducationFOrT,true);
		$criteria->compare('ChildrenEducationTotal',$this->ChildrenEducationTotal);
		$criteria->compare('PersonalForeignTravelConfirm',$this->PersonalForeignTravelConfirm,true);
		$criteria->compare('PersonalForeignTravelFOrT',$this->PersonalForeignTravelFOrT,true);
		$criteria->compare('PersonalForeignTravelTotal',$this->PersonalForeignTravelTotal);
		$criteria->compare('FestivalOtherSpecialConfirm',$this->FestivalOtherSpecialConfirm,true);
		$criteria->compare('FestivalOtherSpecialFOrT',$this->FestivalOtherSpecialFOrT,true);
		$criteria->compare('FestivalOtherSpecialTotal',$this->FestivalOtherSpecialTotal);
		$criteria->compare('HolidayConfirm',$this->HolidayConfirm,true);
		$criteria->compare('HolidayFOrT',$this->HolidayFOrT,true);
		$criteria->compare('HolidayTotal',$this->HolidayTotal,true);
		$criteria->compare('HolidayComment',$this->HolidayComment,true);
		$criteria->compare('DonationConfirm',$this->DonationConfirm,true);
		$criteria->compare('DonationFOrT',$this->DonationFOrT,true);
		$criteria->compare('DonationTotal',$this->DonationTotal,true);
		$criteria->compare('DonationComment',$this->DonationComment,true);
		$criteria->compare('OtherSpecialConfirm',$this->OtherSpecialConfirm,true);
		$criteria->compare('OtherSpecialFOrT',$this->OtherSpecialFOrT,true);
		$criteria->compare('OtherSpecialTotal',$this->OtherSpecialTotal,true);
		$criteria->compare('OtherSpecialComment',$this->OtherSpecialComment,true);
		$criteria->compare('OtherConfirm',$this->OtherConfirm,true);
		$criteria->compare('OtherFOrT',$this->OtherFOrT,true);
		$criteria->compare('OtherTotal',$this->OtherTotal,true);
		$criteria->compare('OtherComment',$this->OtherComment,true);
		$criteria->compare('TaxAtSourceConfirm',$this->TaxAtSourceConfirm,true);
		$criteria->compare('TaxAtSourceFOrT',$this->TaxAtSourceFOrT,true);
		$criteria->compare('TaxAtSourceTotal',$this->TaxAtSourceTotal,true);
		$criteria->compare('TaxAtSourceComment',$this->TaxAtSourceComment,true);
		$criteria->compare('SurchargeOtherConfirm',$this->SurchargeOtherConfirm,true);
		$criteria->compare('SurchargeOtherFOrT',$this->SurchargeOtherFOrT,true);
		$criteria->compare('SurchargeOtherTotal',$this->SurchargeOtherTotal,true);
		$criteria->compare('SurchargeOtherComment',$this->SurchargeOtherComment,true);
		$criteria->compare('TotalExpenditure',$this->TotalExpenditure);
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