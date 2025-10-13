<?php
date_default_timezone_set("Asia/Dhaka");

class Controller extends CController {

	public function __construct($id, $module = null) {
		parent::__construct($id, $module);

		if ($this->id == "dashboard" || $this->id == "user" || $this->id == "login" || $this->id == "site" || $this->id == "logout" || $this->id == "taxZoneCircle") {

		} else {
			$this->linkHistory();
		}

		// echo $lastUrl = 	Yii::app()->request->urlReferrer.'<br>';
		// exit;

		if (!isset(Yii::app()->request->cookies['language'])) {
			$daysExpires = 100;
			Yii::app()->setLanguage('en');
			$cookie = new CHttpCookie('language', 'en');
			$cookie->expire = time() + 60 * 60 * 24 * $daysExpires;
			Yii::app()->request->cookies['language'] = $cookie;
		}

		// If there is a post-request, redirect the application to the provided url of the selected language
		if (isset($_POST['language'])) {
			$lang = $_POST['language'];
			$MultilangReturnUrl = $_POST[$lang];
			$this->redirect($MultilangReturnUrl);
		}
		// Set the application language if provided by GET, session or cookie
		if (isset($_GET['language'])) {
			Yii::app()->language = $_GET['language'];
			Yii::app()->user->setState('language', $_GET['language']);
			$cookie = new CHttpCookie('language', $_GET['language']);
			$cookie->expire = time() + (60 * 60 * 24 * 365); // (1 year)
			Yii::app()->request->cookies['language'] = $cookie;
		} else if (Yii::app()->user->hasState('language')) {
			Yii::app()->language = Yii::app()->user->getState('language');
		} else if (isset(Yii::app()->request->cookies['language'])) {
			Yii::app()->language = Yii::app()->request->cookies['language']->value;
		}

	}

	private function getUserIP() {
		if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') > 0) {
				$addr = explode(",", $_SERVER['HTTP_X_FORWARDED_FOR']);
				return trim($addr[0]);
			} else {
				return $_SERVER['HTTP_X_FORWARDED_FOR'];
			}
		} else {
			return $_SERVER['REMOTE_ADDR'];
		}
	}

	public function linkHistory() {

		$present_link = Yii::app()->request->getUrl();
		$last_link = Yii::app()->request->urlReferrer;
		$user_id = Yii::app()->user->id;

		$LinkHistory = LinkHistory::model()->find('user_id=:data', array(':data' => $user_id));

		if ($LinkHistory == null) {

			$LinkHistoryModel = new LinkHistory;
			$LinkHistoryModel->present_link = $present_link;
			$LinkHistoryModel->last_link = $last_link;
			$LinkHistoryModel->user_id = $user_id;
			$LinkHistoryModel->CerateAt = date("Y-m-d H:i:s");

			$LinkHistoryModel->save(false);
		} else {
			$model = new LinkHistory;
			$model->updateByPk($LinkHistory->id, array(
				"present_link" => $present_link,
				"last_link" => $last_link,
				'LastUpdateAt' => date("Y-m-d H:i:s"),
			));
		}
	}

	public function createMultilanguageReturnUrl($lang = 'en') {
		if (count($_GET) > 0) {
			$arr = $_GET;
			//$arr['language']= $lang;
			return $this->createUrl($lang . '/', $arr);
		} else {
			return $this->createUrl('../' . $lang . '/' . Yii::app()->urlManager->parseUrl(Yii::app()->request));
		}

	}

	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	// public $layout='//layouts/columnLess';

	public $currency = ' BDT';
	public $layout = '//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu = array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs = array();

	public function commonTerm() {

		// echo 'baseUrl='.Yii::app()->baseUrl;
		if (Yii::app()->baseUrl) {

			//echo getcwd();

			return '<div class="container"><div class="row"><div class="label col-lg-12" style="text-align:center;color:black;">Welcome to BDTAX its in development phase. you are in localhost</div></div></div>';
		}
		return '<div class="container"><div class="row"><div class="label col-lg-12" style="text-align:center;color:black;">Welcome to BDTAX its in development phase</div></div></div>';
	}

	public function loadCPIInfo($id) {
		$model = PersonalInformation::model()->findByPk($id);
		// if($model===null)
		// 	throw new CHttpException(404,'The requested info of income salaries does not exist with this given id.');
		return $model;
	}

	public function taxYear() {

		$currentMonth = date('m');

		$startMonth = 7;
		$taxYear = '';
		$presentYear = date("Y");

		$lastYear = ($presentYear - 1);
		$nextYear = ($presentYear + 1);

		if ($currentMonth < $startMonth) {

			$taxYear = $lastYear . "-" . $presentYear;

		} else {
			$taxYear = $presentYear . "-" . $nextYear;
		}

		return $taxYear;
	}

	public function totalIncome($id) {

		$model = Income::model()->find('CPIId=:data AND EntryYear=:data2', array(':data' => $id, ':data2' => $this->taxYear()));

		$totalIncomeSalaries = IncomeSalaries::model()->find(array('select' => ' SUM(NetTaxableIncome) as SumTaxableIncome', 'condition' => 'IncomeId=:data', 'params' => array(':data' => @$model->IncomeId)));
		$totalIncomeHouseProperties = IncomeHouseProperties::model()->find(array('select' => ' SUM(NetIncome) as SumRentalIncome', 'condition' => 'IncomeId=:data', 'params' => array(':data' => @$model->IncomeId)));
		$totalIncomeShareProfit = IncomeShareProfit::model()->find(array('select' => ' SUM(NetValueOfShare) as SumValueOfShare', 'condition' => 'IncomeId=:data', 'params' => array(':data' => @$model->IncomeId)));

		$IncomeOtherSourceData = IncomeOtherSource::model()->find('IncomeId=:data', array(':data' => @$model->IncomeId));
		$TotalIncomeOtherSource = (@$IncomeOtherSourceData->InterestIncome+@$IncomeOtherSourceData->DividendIncome+@$IncomeOtherSourceData->WinningsIncome+@$IncomeOtherSourceData->OthersIncome);

		return $totalIncome =
			(
			@$totalIncomeSalaries->SumTaxableIncome+
			@$this->totalOutputInNumber($model, 'InterestOnSecurities')+
			@$totalIncomeHouseProperties->SumRentalIncome+
			@$this->totalOutputInNumber($model, 'IncomeAgriculture')+
			@$this->totalOutputInNumber($model, 'IncomeBusinessOrProfession')+
			@$this->totalOutputInNumber($model, 'IncomeShareProfit')+
			@$this->totalOutputInNumber($model, 'IncomeSpouseOrChild')+
			@$this->totalOutputInNumber($model, 'IncomeCapitalGains')+
			@$this->totalOutputInNumber($model, 'IncomeOtherSource')+
			@$this->totalOutputInNumber($model, 'ForeignIncome')
		);

	}

	function totalOutputMain($val) {

		// return 10;

		$model = $this->modelByCPIId(Yii::app()->user->CPIId);

		$Confirm = $val . 'Confirm';
		$FOrT = $val . 'FOrT';
		$sumOf = 'SumOf' . $val;
		$Inc = 'Inc' . $val;

		if ($model->$Confirm == "Yes") {

			if ($model->$FOrT == "Total") {
				return $val2 = floor($model->$val);
			} elseif ($model->$FOrT == "Fraction") {
				return $val2 = floor($Inc::model()->find(array('select' => 'SUM(Cost) as ' . $sumOf, 'condition' => 'IncomeId=:data', 'params' => array(':data' => @$model->IncomeId)))->$sumOf);
			} else {
				return '';
			}
		} elseif ($model->$Confirm == "No") {
			return '';
		} else {
			return '';
		}
	}

//$initialTaxWaiver = Starting minimum amount of income which is deducted from tax payable income like 220000 , 270000, 400000 etc
	//$totalIncome = Total taxable income
	//$TaxPercentAmount = An array of tax slave with percent as a key and amount as a value
	//$payAbleTax = The amount which we have to pay and come out of final calculation.But its initial value is = 0

	public function payableTax($id) {

		// $initialTaxWaiver=0;

		$CPIInfo = $this->loadCPIInfo($id);
		$totalIncome = $this->totalIncome($id);
		$CalculationModel = CalculationDataSource::model()->find('EntryYear=:data', array(':data' => $this->taxYear()));

		if ($CalculationModel != null && $CPIInfo != null) {

			$age = (date("Y") - date('Y', strtotime($CPIInfo->DOB)));

			if (($CPIInfo->FreedomFighter == 'Y')) {

				$initialTaxWaiver = $CalculationModel->FreedomFighterTaxWaiverAmount;

			} elseif ($CPIInfo->Disability == 'YES') {

				$initialTaxWaiver = $CalculationModel->DisableTaxWaiverAmount;

			} elseif (($CPIInfo->Gender == 'Female') || ($age > 65)) {

				$initialTaxWaiver = $CalculationModel->FemaleTaxWaiverAmount;

			} else {

				$initialTaxWaiver = $CalculationModel->NormalTaxWaiverAmount;

			}

			//##################<<<<<ONLY---AGRICULTURE---INCOME---START>>>>>################################################################//

			$Agri = Income::model()->find('CPIId=:data AND EntryYear=:data2', array(':data' => $id, ':data2' => $this->taxYear()));
			@$Agri->IncomeAgriculture;

			if ($totalIncome != 0) {
				if (($totalIncome == @$Agri->IncomeAgriculture)) {

					$initialTaxWaiver = ($initialTaxWaiver + $CalculationModel->AgricultureTaxWaiverAmount);

				}

			}

			//##################<<<<<ONLY---AGRICULTURE---INCOME---END>>>>>##################################################################//

			// echo 'initial Tax Waiver ='.$initialTaxWaiver.'<br />';
			// echo 'total Income ='.$totalIncome.'<br />';

			//##################<<<<<ONLY---NRB---INCOME---START>>>>>################################################################//
			if (($CPIInfo->ResidentialStatus == 'N')) {

				return ($totalIncome * ($CalculationModel->NRBStatusPercent / 100));

			}

			//##################<<<<<ONLY---NRB---INCOME---START>>>>>################################################################//
			$payAbleTax = 0;

			if ($totalIncome > $initialTaxWaiver) {

				$restTaxableIncome = ($totalIncome - $initialTaxWaiver);

				$TaxPercentAmount['10'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data' => 10, ':data1' => $this->taxYear()))->Amount;
				$TaxPercentAmount['15'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data' => 15, ':data1' => $this->taxYear()))->Amount;
				$TaxPercentAmount['20'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data' => 20, ':data1' => $this->taxYear()))->Amount;
				$TaxPercentAmount['25'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data' => 25, ':data1' => $this->taxYear()))->Amount;
				$TaxPercentAmount['30'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data' => 30, ':data1' => $this->taxYear()))->Amount;

				foreach ($TaxPercentAmount as $key => $value) {

					if ($restTaxableIncome >= $value) {

						$payAbleTax += ($value * ($key / 100));

						$restTaxableIncome = ($restTaxableIncome - $value);

					} else {

						if (($restTaxableIncome >= 0) && ($restTaxableIncome <= $value)) {

							$payAbleTax += ($restTaxableIncome * ($key / 100));

							$restTaxableIncome = ($restTaxableIncome - $value);

							if ($restTaxableIncome <= 0) {
								$restTaxableIncome = 0;
							}

						}
					}

				}

			}

			return round($payAbleTax, 0);

		}

	}

	public function StoredDataForCalculation() {
		return $CalculationModel = CalculationDataSource::model()->find('EntryYear=:data', array(':data' => $this->taxYear()));
	}

	public function RebateAmount() {

		$id = Yii::app()->user->CPIId;

		if ($this->StoredDataForCalculation() != null) {

			$model = $this->modelByCPIId($id);

			$IncomeTaxRebateData = IncomeTaxRebate::model()->find('IncomeId=:data', array(':data' => @$model->IncomeId));

			$totalIncome = $this->totalIncome($id); //$id==CPIID of Taxpayer

			$totalCPF = IncomeSalaries::model()->find(array('select' => ' SUM(EmployersContributionProvidentFund) as SumTaxableIncome', 'condition' => 'IncomeId=:data', 'params' => array(':data' => @$model->IncomeId)));

			if ($totalCPF != null) {
				$totalIncome = ($totalIncome - $totalCPF->SumTaxableIncome);
			}

			$TIX = $totalIncome * (30 / 100);

			$TR = (@$IncomeTaxRebateData->LifeInsurancePremium+@$IncomeTaxRebateData->DeferredAnnuity+@$IncomeTaxRebateData->ProvidentFund+@$IncomeTaxRebateData->SCECProvidentFund+@$IncomeTaxRebateData->SuperAnnuationFund+@$IncomeTaxRebateData->InvestInStockOrShare+@$IncomeTaxRebateData->DepositPensionScheme+@$IncomeTaxRebateData->BenevolentFund+@$IncomeTaxRebateData->ZakatFund+@$IncomeTaxRebateData->Others);

			// START%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%TAX___REBATE----CALCULATION%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%//

			if ($TR <= $TIX) {

				$finalRebate = $TR;

			} else {

				$finalRebate = $TIX;
			}

			return $calculatedAmountOfRebate = round(($finalRebate * ($this->StoredDataForCalculation()->TaxRebatePercent / 100)), 0);

			// END%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%TAX___REBATE----CALCULATION%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%//
		}

	}

	public function netPayableTax($id) {

		if ($this->StoredDataForCalculation() != null) {

			$CPIInfo = $this->loadCPIInfo($id);
			$payAbleTax = $this->PayableTax($id);
			// START%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%TAX___REBATE----CALCULATION%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%//

			$payAbleTax = ($payAbleTax - $this->RebateAmount());

			// END%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%TAX___REBATE----CALCULATION%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%//

			// if($payAbleTax <=0){

			if ($CPIInfo->AreaOfResidence == 1) {

				if ($payAbleTax <= 5000) {

					$payAbleTax = 5000;

				}
				return $payAbleTax;

			} elseif ($CPIInfo->AreaOfResidence == 2) {

				if ($payAbleTax <= 4000) {

					$payAbleTax = 4000;

				}
				return $payAbleTax;
			} elseif ($CPIInfo->AreaOfResidence == 3) {

				if ($payAbleTax <= 3000) {

					$payAbleTax = 3000;

				}
				return $payAbleTax;
			}

			// }

			return $payAbleTax;

		}
	}

	public function modelByCPIId($id) {
		$model = Income::model()->find('CPIId=:data AND EntryYear=:data2', array(':data' => $id, ':data2' => $this->taxYear()));
		// if($model===null)
		// 	throw new CHttpException(404,'There is no list with this id.');
		return $model;

	}

	function totalOutputInNumber($model, $val) {

		$Confirm = $val . 'Confirm';
		$FOrT = $val . 'FOrT';
		$sumOf = 'SumOf' . $val;
		$Inc = 'Inc' . $val;

		if ($model->$Confirm == "Yes") {

			if ($model->$FOrT == "Total") {
				return $val2 = $model->$val . $this->currency;
			} elseif ($model->$FOrT == "Fraction") {

				$val2 = $Inc::model()->find(array('select' => 'SUM(Cost) as ' . $sumOf, 'condition' => 'IncomeId=:data', 'params' => array(':data' => @$model->IncomeId)))->$sumOf . $this->currency;

				return $val2;
			} else {
				return 0;
			}
		} elseif ($model->$Confirm == "No") {
			return 0;
		} else {
			return 0;
		}
	}

######################################################################################
	################## SUR CHARGE CALCULATION START ######################################
	######################################################################################
	public function surCharge($tax) {

################## ASSET CALCULATION START ######################################
		Yii::import('application.controllers.AssetsController');
		$asset_model = Assets::model()->findbyattributes(array('CPIId' => Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear(), 'trash' => 0));

		$asset_total = (double) AssetsController::sum_of_particular_field($asset_model, "BusinessCapital", "assets_business_capital") +
		(double) AssetsController::sum_of_particular_field($asset_model, "ShareholdingCompany", "assets_shareholding_company_list") +
		(double) AssetsController::sum_of_particular_field($asset_model, "NonAgricultureProperty", "assets_non_agriculture_property") +
		(double) AssetsController::sum_of_particular_field($asset_model, "AgricultureProperty", "assets_agriculture_property") +
		(double) AssetsController::sum_of_particular_field($asset_model, "Investment", "assets_investment") +
		(double) AssetsController::sum_of_particular_field($asset_model, "MotorVehicle", "assets_motor_vehicles") +
		(double) AssetsController::sum_of_particular_field($asset_model, "Jewelry", "assets_jewelry") +
		(double) AssetsController::sum_of_particular_field($asset_model, "Furniture", "assets_furniture") +
		(double) AssetsController::sum_of_particular_field($asset_model, "ElectronicEquipment", "assets_electronic_equipment") +
		(double) AssetsController::sum_of_particular_field($asset_model, "OutsideBusiness", "assets_outside_business") +
		(double) AssetsController::sum_of_particular_field($asset_model, "AnyOtherAssets", "assets_any_other");
		$asset_total = round($asset_total, 2);
################## ASSET CALCULATION ENDS ######################################

################## Liabilities CALCULATION START ######################################
		Yii::import('application.controllers.LiabilitiesController');
		$lia_model = LiabilitiesController::loadModelByUserYear(Yii::app()->user->CPIId, $this->taxYear());
		$lia_total = (double) LiabilitiesController::sum_of_particular_field($lia_model, "MortgagesOnProperty", "lia_mortgages_on_property") +
		(double) LiabilitiesController::sum_of_particular_field($lia_model, "UnsecuredLoans", "lia_unsecured_loans") +
		(double) LiabilitiesController::sum_of_particular_field($lia_model, "BankLoans", "lia_bank_loans") +
		(double) LiabilitiesController::sum_of_particular_field($lia_model, "OthersLoan", "lia_others_loan");

		$lia_total = round($lia_total, 2);

################## Liabilities CALCULATION ENDS ######################################
		// $getSurCharge = SurCharge::model()->findbyattributes(array('EntryYear' => $this->taxYear(), 'MinAmount' => $total ));
		$total = $asset_total - $lia_total;

		$getSurCharge = SurCharge::model()->find('EntryYear=:d1 AND MinAmount < :d2 AND MaxAmount >= :d3', array('d1' => $this->taxYear(), 'd2' => $total, 'd3' => $total));

		if ($getSurCharge == null) {
			return ['sur_charge' => 0, 'tax' => $tax];
		} else {
			$t_tax = (($getSurCharge->Percent * $tax) / 100) + $tax;
			return ['sur_charge' => $getSurCharge->Percent, 'tax' => $t_tax];
		}

	}

######################################################################################
	################## SUR CHARGE CALCULATION ENDS #######################################
	######################################################################################

################## expense StatusBar START ######################################
	public function expenseStatusBar() {

		Yii::import('application.controllers.ExpenditureController');

		if (isset(Yii::app()->user->CPIId)) {
			# code...

			$model = Expenditure::model()->findbyattributes(array('CPIId' => Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear(), 'trash' => 0));

		} else {
			$model = null;
		}

		if ($model == null) {
			return 0;
		} else {
			$PersonalFoodingCount = ExpenditureController::checkActiveInactive($model, "PersonalFoodingConfirm", "PersonalFoodingFOrT", "ExpPersonalFooding", "PersonalFoodingTotal");
			if ($model->TotalTaxPaidLastYearConfirm == "No") {
				$TaxPaidLastYearCount = 1;
			} else if ($model->TotalTaxPaidLastYearConfirm == "Yes") {
				if ($model->TotalTaxPaidLastYear == "") {
					$TaxPaidLastYearCount = 0;
				} else {
					$TaxPaidLastYearCount = 1;
				}
			} else {
				$TaxPaidLastYearCount = 0;
			}
			$AccommodationCount = ExpenditureController::checkActiveInactive($model, "AccommodationConfirm", "AccommodationFOrT", "ExpAccommodation", "AccommodationTotal");

			$TransportCount = ExpenditureController::checkActiveInactive($model, "TransportConfirm", "TransportFOrT", "ExpTransport", "TransportTotal");

			$ElectricityBillCount = ExpenditureController::checkActiveInactive($model, "ElectricityBillConfirm", "ElectricityBillFOrT", "ExpElectricityBill", "ElectricityBillTotal");

			$WasaBillCount = ExpenditureController::checkActiveInactive($model, "WasaBillConfirm", "WasaBillFOrT", "ExpWasaBill", "WasaBillTotal");

			$GasBillCount = ExpenditureController::checkActiveInactive($model, "GasBillConfirm", "GasBillFOrT", "ExpGasBill", "GasBillTotal");

			$TelephoneBillCount = ExpenditureController::checkActiveInactive($model, "TelephoneBillConfirm", "TelephoneBillFOrT", "ExpTelephoneBill", "TelephoneBillTotal");

			$ChildrenEducationCount = ExpenditureController::checkActiveInactive($model, "ChildrenEducationConfirm", "ChildrenEducationFOrT", "ExpChildrenEducation", "ChildrenEducationTotal");

			$PersonalForeignTravelCount = ExpenditureController::checkActiveInactive($model, "PersonalForeignTravelConfirm", "PersonalForeignTravelFOrT", "ExpPersonalForeignTravel", "PersonalForeignTravelTotal");

			$FestivalOtherSpecialCount = ExpenditureController::checkActiveInactive($model, "FestivalOtherSpecialConfirm", "FestivalOtherSpecialFOrT", "ExpFestivalOtherSpecial", "FestivalOtherSpecialTotal");

			$total = $PersonalFoodingCount + $TaxPaidLastYearCount + $AccommodationCount + $TransportCount + $ElectricityBillCount + $WasaBillCount + $GasBillCount + $TelephoneBillCount + $ChildrenEducationCount + $PersonalForeignTravelCount + $FestivalOtherSpecialCount;

			return floor($total * 100 / 11);

		}

	}
################## expense StatusBar ENDS ######################################

################## Liability StatusBar START ######################################
	public function liabilityStatusBar() {

		Yii::import('application.controllers.LiabilitiesController');

		if (isset(Yii::app()->user->CPIId)) {
			# code...

			$model = Liabilities::model()->findbyattributes(array('CPIId' => Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear(), 'trash' => 0));

		} else {
			$model = null;
		}

		if ($model == null) {
			return 0;
		} else {
			$MortgagesOnPropertyCount = LiabilitiesController::checkActiveInactive($model, "MortgagesOnPropertyConfirm", "MortgagesOnPropertyFOrT", "LiaMortgagesOnProperty", "MortgagesOnPropertyTotal");

			$UnsecuredLoansCount = LiabilitiesController::checkActiveInactive($model, "UnsecuredLoansConfirm", "UnsecuredLoansFOrT", "LiaUnsecuredLoans", "UnsecuredLoansTotal");

			$BankLoansCount = LiabilitiesController::checkActiveInactive($model, "BankLoansConfirm", "BankLoansFOrT", "LiaBankLoans", "BankLoansTotal");

			$OthersLoanCount = LiabilitiesController::checkActiveInactive($model, "OthersLoanConfirm", "OthersLoanFOrT", "LiaOthersLoan", "OthersLoanTotal");

			$total = $MortgagesOnPropertyCount + $UnsecuredLoansCount + $BankLoansCount + $OthersLoanCount;

			return floor($total * 100 / 4);

		}

	}
################## Liability StatusBar ENDS ######################################

################## Assets StatusBar START ######################################
	public function assetsStatusBar() {

		if (isset(Yii::app()->user->CPIId)) {
			# code...

			$model = Assets::model()->findbyattributes(array('CPIId' => Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear(), 'trash' => 0));

		} else {
			$model = null;
		}

		if ($model == null) {
			return 0;
		} else {
			$data = [];

			$data[] = $model->BusinessCapitalConfirm;
			$data[] = $model->ShareholdingCompanyConfirm;
			$data[] = $model->NonAgriculturePropertyConfirm;
			$data[] = $model->AgriculturePropertyConfirm;
			$data[] = $model->InvestmentConfirm;
			$data[] = $model->MotorVehicleConfirm;
			$data[] = $model->JewelryConfirm;
			$data[] = $model->FurnitureConfirm;
			$data[] = $model->ElectronicEquipmentConfirm;
			$data[] = $model->OutsideBusinessConfirm;
			$data[] = $model->AnyOtherAssetsConfirm;

			$value = 0;

			foreach ($data as $key => $Confirm) {
				if ($Confirm == "Yes" || $Confirm == "No") {
					$value++;
				}
			}

			return floor($value * 100 / 11);
		}
	}
################## Assets StatusBar ENDS ######################################

//%%%%%%%%%%%%%%%%%Income StatusBar START%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

	function incomeStatusBar($cpid = null) {

		if (isset(Yii::app()->user->CPIId)) {
			# code...

			$model = Income::model()->findbyattributes(array('CPIId' => Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear(), 'trash' => 0));

		} else {
			$model = null;
		}
		if ($model == null) {
			return 0;
		} else {

			$data[] = $IncomeSalariesData = IncomeSalaries::model()->findAll('IncomeId=:data', array(':data' => @$model->IncomeId));
			$data[] = $model->IncomeHousePropertiesConfirm;
			$data[] = $model->IncomeTaxRebateConfirm;

			$data[] = $model->InterestOnSecuritiesConfirm;
			// $data[] =	$model->IncomeHousePropertiesConfirm;
			$data[] = $model->IncomeAgricultureConfirm;
			$data[] = $model->IncomeBusinessOrProfessionConfirm;
			$data[] = $model->IncomeShareProfitConfirm;
			$data[] = $model->IncomeSpouseOrChildConfirm;
			$data[] = $model->IncomeCapitalGainsConfirm;
			$data[] = $model->IncomeOtherSourceConfirm;
			$data[] = $model->ForeignIncomeConfirm;
			// $data[] =	$model->IncomeTaxRebateConfirm;

			$data[] = $model->IncomeTaxDeductedAtSourceConfirm;
			$data[] = $model->IncomeTaxInAdvanceConfirm;
			$data[] = $model->AdjustmentTaxRefundConfirm;
			// $data[] =	$model->TaxExemptedConfirm;

			$value = 0;

			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
			// exit;

			foreach ($data as $key => $Confirm) {

				if (($Confirm == "Yes") || ($Confirm == "No") || ($Confirm != null)) {

					$value += 1;
				}
			}

			// return $value;

			return $percentDone = floor(($value / 14) * 100);

		}

	}
//%%%%%%%%%%%%%%%%%Income StatusBar END%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

//%%%%%%%%%%%%%%%%%Income PIStatusBar START%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

	function personalInformationStatusBar($cpid = null) {

		if (isset(Yii::app()->user->CPIId)) {
			# code...

			$model = PersonalInformation::model()->findbyattributes(array('CPIId' => Yii::app()->user->CPIId, 'trash' => 0));

		} else {
			$model = null;
		}

		if ($model == null) {
			return 0;
		} else {

			$data[] = $model->Name;
			$data[] = $model->ETIN;
			$data[] = $model->TaxesCircle;
			$data[] = $model->TaxesZone;
			$data[] = $model->DivisionId;
			$data[] = $model->DistrictId;
			$data[] = $model->ResidentialStatus;
			$data[] = $model->Status;
			$data[] = $model->Gender;
			$data[] = $model->GovernmentEmployee;
			$data[] = $model->FreedomFighter;
			$data[] = $model->Disability;
			$data[] = $model->AreaOfResidence;
			$data[] = $model->DOB;
			$data[] = $model->PresentAddress;

			$value = 0;

			foreach ($data as $key => $Confirm) {

				if ($Confirm != null) {

					$value += 1;
				}
			}

			return $percentDone = floor(($value / 15) * 100);

		}

	}
//%%%%%%%%%%%%%%%%%Income PIStatusBar END%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

//%%%%%%%%%%%%%%%%%Personal Information Confirmation START%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

	function personalInformationRecomendedFieldCount($cpid = null) {

		if (isset(Yii::app()->user->CPIId)) {
			# code...

			$model = PersonalInformation::model()->findbyattributes(array('CPIId' => Yii::app()->user->CPIId, 'trash' => 0));

		} else {
			$model = null;
		}

		if ($model == null) {
			return 0;
		} else {

			$data[] = $model->ETIN;
			$data[] = $model->Name;
			$data[] = $model->DOB;
			$data[] = $model->Status;
			$data[] = $model->Gender;
			$data[] = $model->ResidentialStatus;

			$data[] = $model->Disability;
			$data[] = $model->FreedomFighter;
			$data[] = $model->GovernmentEmployee;
			$data[] = $model->AreaOfResidence;
			$data[] = $model->TaxesCircle;
			$data[] = $model->TaxesZone;
			$data[] = $model->DivisionId;
			$data[] = $model->DistrictId;
			$data[] = $model->PresentAddress;

			$value = 0;

			foreach ($data as $key => $Confirm) {

				if ($Confirm != null) {

					$value += 1;
				}
			}

			return $value;

		}

	}
//%%%%%%%%%%%%%%%%%Personal Information Confirmation END%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

#####################################################################################
	######-----START------------Professional-----PARTBDTAXPRO--------------------########
	#####################################################################################

################## expense StatusBar START ######################################
	public function client_expenseStatusBar($id) {

		Yii::import('application.controllers.ExpenditureController');

		if (isset($id)) {
			# code...

			$model = Expenditure::model()->findbyattributes(array('CPIId' => $id, 'EntryYear' => $this->taxYear(), 'trash' => 0));

		} else {
			$model = null;
		}

		if ($model == null) {
			return 0;
		} else {
			$PersonalFoodingCount = ExpenditureController::checkActiveInactive($model, "PersonalFoodingConfirm", "PersonalFoodingFOrT", "ExpPersonalFooding", "PersonalFoodingTotal");
			if ($model->TotalTaxPaidLastYearConfirm == "No") {
				$TaxPaidLastYearCount = 1;
			} else if ($model->TotalTaxPaidLastYearConfirm == "Yes") {
				if ($model->TotalTaxPaidLastYear == "") {
					$TaxPaidLastYearCount = 0;
				} else {
					$TaxPaidLastYearCount = 1;
				}
			} else {
				$TaxPaidLastYearCount = 0;
			}
			$AccommodationCount = ExpenditureController::checkActiveInactive($model, "AccommodationConfirm", "AccommodationFOrT", "ExpAccommodation", "AccommodationTotal");

			$TransportCount = ExpenditureController::checkActiveInactive($model, "TransportConfirm", "TransportFOrT", "ExpTransport", "TransportTotal");

			$ElectricityBillCount = ExpenditureController::checkActiveInactive($model, "ElectricityBillConfirm", "ElectricityBillFOrT", "ExpElectricityBill", "ElectricityBillTotal");

			$WasaBillCount = ExpenditureController::checkActiveInactive($model, "WasaBillConfirm", "WasaBillFOrT", "ExpWasaBill", "WasaBillTotal");

			$GasBillCount = ExpenditureController::checkActiveInactive($model, "GasBillConfirm", "GasBillFOrT", "ExpGasBill", "GasBillTotal");

			$TelephoneBillCount = ExpenditureController::checkActiveInactive($model, "TelephoneBillConfirm", "TelephoneBillFOrT", "ExpTelephoneBill", "TelephoneBillTotal");

			$ChildrenEducationCount = ExpenditureController::checkActiveInactive($model, "ChildrenEducationConfirm", "ChildrenEducationFOrT", "ExpChildrenEducation", "ChildrenEducationTotal");

			$PersonalForeignTravelCount = ExpenditureController::checkActiveInactive($model, "PersonalForeignTravelConfirm", "PersonalForeignTravelFOrT", "ExpPersonalForeignTravel", "PersonalForeignTravelTotal");

			$FestivalOtherSpecialCount = ExpenditureController::checkActiveInactive($model, "FestivalOtherSpecialConfirm", "FestivalOtherSpecialFOrT", "ExpFestivalOtherSpecial", "FestivalOtherSpecialTotal");

			$total = $PersonalFoodingCount + $TaxPaidLastYearCount + $AccommodationCount + $TransportCount + $ElectricityBillCount + $WasaBillCount + $GasBillCount + $TelephoneBillCount + $ChildrenEducationCount + $PersonalForeignTravelCount + $FestivalOtherSpecialCount;

			return floor($total * 100 / 11);

		}

	}
################## expense StatusBar ENDS ######################################

################## Liability StatusBar START ######################################
	public function client_liabilityStatusBar($id) {

		Yii::import('application.controllers.LiabilitiesController');

		if (isset($id)) {
			# code...

			$model = Liabilities::model()->findbyattributes(array('CPIId' => $id, 'EntryYear' => $this->taxYear(), 'trash' => 0));

		} else {
			$model = null;
		}

		if ($model == null) {
			return 0;
		} else {
			$MortgagesOnPropertyCount = LiabilitiesController::checkActiveInactive($model, "MortgagesOnPropertyConfirm", "MortgagesOnPropertyFOrT", "LiaMortgagesOnProperty", "MortgagesOnPropertyTotal");

			$UnsecuredLoansCount = LiabilitiesController::checkActiveInactive($model, "UnsecuredLoansConfirm", "UnsecuredLoansFOrT", "LiaUnsecuredLoans", "UnsecuredLoansTotal");

			$BankLoansCount = LiabilitiesController::checkActiveInactive($model, "BankLoansConfirm", "BankLoansFOrT", "LiaBankLoans", "BankLoansTotal");

			$OthersLoanCount = LiabilitiesController::checkActiveInactive($model, "OthersLoanConfirm", "OthersLoanFOrT", "LiaOthersLoan", "OthersLoanTotal");

			$total = $MortgagesOnPropertyCount + $UnsecuredLoansCount + $BankLoansCount + $OthersLoanCount;

			return floor($total * 100 / 4);

		}

	}
################## Liability StatusBar ENDS ######################################

################## Assets StatusBar START ######################################
	public function client_assetsStatusBar($id) {

		if (isset($id)) {

			$model = Assets::model()->findbyattributes(array('CPIId' => $id, 'EntryYear' => $this->taxYear(), 'trash' => 0));

		} else {
			$model = null;
		}

		if ($model == null) {
			return 0;
		} else {
			$data = [];

			$data[] = $model->BusinessCapitalConfirm;
			$data[] = $model->ShareholdingCompanyConfirm;
			$data[] = $model->NonAgriculturePropertyConfirm;
			$data[] = $model->AgriculturePropertyConfirm;
			$data[] = $model->InvestmentConfirm;
			$data[] = $model->MotorVehicleConfirm;
			$data[] = $model->JewelryConfirm;
			$data[] = $model->FurnitureConfirm;
			$data[] = $model->ElectronicEquipmentConfirm;
			$data[] = $model->OutsideBusinessConfirm;
			$data[] = $model->AnyOtherAssetsConfirm;

			$value = 0;

			foreach ($data as $key => $Confirm) {
				if ($Confirm == "Yes" || $Confirm == "No") {
					$value++;
				}
			}

			return floor($value * 100 / 11);
		}
	}
################## Assets StatusBar ENDS ######################################

//%%%%%%%%%%%%%%%%%Income StatusBar START%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

	public function client_incomeStatusBar($id) {

		if (isset($id)) {
			# code...

			$model = Income::model()->findbyattributes(array('CPIId' => $id, 'EntryYear' => $this->taxYear(), 'trash' => 0));

		} else {
			$model = null;
		}
		if ($model == null) {
			return 0;
		} else {

			$data[] = $IncomeSalariesData = IncomeSalaries::model()->findAll('IncomeId=:data', array(':data' => @$model->IncomeId));
			$data[] = $model->IncomeHousePropertiesConfirm;
			$data[] = $model->IncomeTaxRebateConfirm;

			$data[] = $model->InterestOnSecuritiesConfirm;
			// $data[] =	$model->IncomeHousePropertiesConfirm;
			$data[] = $model->IncomeAgricultureConfirm;
			$data[] = $model->IncomeBusinessOrProfessionConfirm;
			$data[] = $model->IncomeShareProfitConfirm;
			$data[] = $model->IncomeSpouseOrChildConfirm;
			$data[] = $model->IncomeCapitalGainsConfirm;
			$data[] = $model->IncomeOtherSourceConfirm;
			$data[] = $model->ForeignIncomeConfirm;
			// $data[] =	$model->IncomeTaxRebateConfirm;

			$data[] = $model->IncomeTaxDeductedAtSourceConfirm;
			$data[] = $model->IncomeTaxInAdvanceConfirm;
			$data[] = $model->AdjustmentTaxRefundConfirm;
			// $data[] =	$model->TaxExemptedConfirm;

			$value = 0;

			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
			// exit;

			foreach ($data as $key => $Confirm) {

				if (($Confirm == "Yes") || ($Confirm == "No") || ($Confirm != null)) {

					$value += 1;
				}
			}

			// return $value;

			return $percentDone = floor(($value / 14) * 100);

		}

	}
//%%%%%%%%%%%%%%%%%Income StatusBar END%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

//%%%%%%%%%%%%%%%%%Income PIStatusBar START%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

	public function client_personalInformationStatusBar($id) {
		if (isset($id)) {
			# code...
			$model = PersonalInformation::model()->findbyattributes(array('CPIId' => $id, 'trash' => 0));

		} else {
			$model = null;
		}

		if ($model == null) {
			return 0;
		} else {

			$data[] = $model->Name;
			$data[] = $model->ETIN;
			$data[] = $model->TaxZoneCircleId;
			// $data[] = $model->TaxesCircle;
			// $data[] = $model->TaxesZone;
			$data[] = $model->DivisionId;
			$data[] = $model->DistrictId;
			$data[] = $model->ZipCode;
			$data[] = $model->ResidentialStatus;
			$data[] = $model->Status;
			$data[] = $model->Gender;
			$data[] = $model->GovernmentEmployee;
			$data[] = $model->FreedomFighter;
			$data[] = $model->Disability;
			$data[] = $model->AreaOfResidence;
			$data[] = $model->DOB;
			$data[] = $model->PresentAddress;

			$value = 0;

			foreach ($data as $key => $Confirm) {

				if ($Confirm != null) {

					$value += 1;
				}
			}

			return $percentDone = floor(($value / 15) * 100);

		}

	}
//%%%%%%%%%%%%%%%%%Income PIStatusBar END%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

//END%%%%%%%%%%%%%%%%%%%%Professional%%%%%%---PARTBDTAXPRO---%%%%%%%%%%%%%%%%%%%%%%%%

}