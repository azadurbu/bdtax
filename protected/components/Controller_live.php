<?php
//date_default_timezone_set("Asia/Dhaka");

class Controller extends CController {
	public $showTrialEndModal = false;
	public $v = 1.19;

	public function __construct($id, $module = null) {
		//Yii::app()->assetManager->forceCopy = true;
		/*echo "<pre>";
		print_r($this->payableTax(Yii::app()->user->CPIId));
		echo "</pre>";
		exit;*/
		parent::__construct($id, $module);
		
		$this->saveUserStatistic();

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
			//$_POST['language'] = "en";
			$lang = $_POST['language'];
			$MultilangReturnUrl = $_POST[$lang];
			$this->redirect($MultilangReturnUrl);
		}
		// Set the application language if provided by GET, session or cookie
		if (isset($_GET['language'])) {
			//$_GET['language'] = "en";
			Yii::app()->language = $_GET['language'];
			Yii::app()->user->setState('language', $_GET['language']);
			$cookie = new CHttpCookie('language', $_GET['language']);
			$cookie->expire = time() + (60 * 60 * 24 * 365); // (1 year)
			Yii::app()->request->cookies['language'] = $cookie;
		} else if (Yii::app()->user->hasState('language')) {
			Yii::app()->language = Yii::app()->user->getState('language');
			//Yii::app()->language = "en";
		} else if (isset(Yii::app()->request->cookies['language'])) {
			Yii::app()->language = Yii::app()->request->cookies['language']->value;
			//Yii::app()->language = "en";
		}

		//CHECK/SHOW TRIAL PERIOD MODAL
		if ( isset(Yii::app()->user->role) && (Yii::app()->user->role == "companyAdmin" || Yii::app()->user->role == "companyUser") && isset(Yii::app()->user->org_id) ) {
			$org = Organizations::model()->find(array('condition' => "id=".Yii::app()->user->org_id));
			$trialPeriod = CompanyPlan::model()->find(array('condition' => "plan='Trial'"))->trial_period;

			if ($org->org_plan == "Trial") {
				$date1=date_create( $org->trial_start_date );
				$date2=date_create(date("Y-m-d"));
		    	$diff=date_diff($date1, $date2);

    			$days = $diff->format("%R%a");
    			if ( $days > $trialPeriod ) {
    				$this->showTrialEndModal = true;
    				$allowURL = ["customers/dashboard", "user/logout", "organizations/update/", "Voucher/redeem", "user/admin/update/"];
    				$url = Yii::app()->urlManager->parseUrl(Yii::app()->request);

    				$tmp = explode ("id/", $url);
    				$url = $tmp[0];

    				if ( !in_array($url, $allowURL) ) {
    					$this->redirect($this->createUrl('/customers/dashboard'));
    				}
    			}
			}
		}
		//CHECK/SHOW TRIAL PERIOD MODAL - ENDS

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
		return Yii::app()->user->TAX_YEAR;
		/*
		$currentMonth = date('m');

		$startMonth = 11;
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
		*/
	}
	public function calculateTaxYear() {
		
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
		$totalIncomeHouseProperties = IncomeHouseProperties::model()->find(array('select' => ' SUM(ShareOfIncome) as SumRentalIncome', 'condition' => 'IncomeId=:data', 'params' => array(':data' => @$model->IncomeId)));
		$totalIncomeShareProfit = IncomeShareProfit::model()->find(array('select' => ' SUM(NetValueOfShare) as SumValueOfShare', 'condition' => 'IncomeId=:data', 'params' => array(':data' => @$model->IncomeId)));

		/*
		$IncomeOtherSourceData = IncomeOtherSource::model()->find('IncomeId=:data', array(':data' => @$model->IncomeId));
		
		$TotalIncomeOtherSource = (@$IncomeOtherSourceData->InterestIncome+@$IncomeOtherSourceData->DividendIncome+@$IncomeOtherSourceData->WinningsIncome+@$IncomeOtherSourceData->OthersIncome);
		*/
		
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
			@$model->Income82cTotal
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

		$initialTaxWaiver=0;

		$CPIInfo = $this->loadCPIInfo($id);
		$totalIncome = $this->totalIncome($id);
		
		$CalculationModel = CalculationDataSource::model()->find('EntryYear=:data', array(':data' => $this->taxYear()));

		if ($CalculationModel != null && $CPIInfo != null) {

			$TaxPercentAmount = $this->GetTaxPercentAmount($CPIInfo, $CalculationModel);

			$initialTaxWaiver = (isset($TaxPercentAmount['0'] )) ? $TaxPercentAmount['0'] : 0;

			//##################<<<<<ONLY---AGRICULTURE---INCOME---START>>>>>################################################################//

			$Agri = Income::model()->find('CPIId=:data AND EntryYear=:data2', array(':data' => $id, ':data2' => $this->taxYear()));
			
			//new change 18 September 2016
			$IncomeOtherSourceData = IncIncomeOtherSource::model()->find('IncomeId=:data', array(':data' => @$Agri->IncomeId));
			if ($IncomeOtherSourceData) {
				$totalIncome = $totalIncome - $IncomeOtherSourceData->SanchaypatraIncome;
			}
			//END - new change 18 September 2016

			if ($totalIncome != 0) {
				if (($totalIncome == @$Agri->IncomeAgriculture)) {

					$initialTaxWaiver = ($initialTaxWaiver + $CalculationModel->AgricultureTaxWaiverAmount);

				}

			}

			if (($CPIInfo->ResidentialStatus == 'N')) {

				return ($totalIncome * ($CalculationModel->NRBStatusPercent / 100));

			}
			//Removing 82c Total Amount form total income.
			$totalIncome -= @$Agri->Income82cTotal;

			//Poultry Farm Slab Calculation
			$PoultryFarm = IncIncomeBusinessOrProfession::model()->find('IncomeId=:data', array(':data' => @$Agri->IncomeId));

			if (!isset($PoultryFarm->PoultryFarm)){
				$PoultryFarm =0;
			}else{
				$PoultryFarm =$PoultryFarm->PoultryFarm;
			}

			$payAbleTax = 0;

			$totalIncome -= $PoultryFarm;

			$PoultryFarmTax = 0;
			if ( $PoultryFarm <= 1000000 ) {
				// Apply 0%
			}
			else if ( $PoultryFarm > 1000000 && $PoultryFarm <= (1000000*2) ) {
				$PoultryFarmTax += ($PoultryFarm - 1000000) * (5/100);
			}
			else if ( $PoultryFarm > (1000000*2) ) {
				$PoultryFarmTax += 1000000 * (5/100);
				$PoultryFarmTax += ($PoultryFarm - (1000000*2)) * (10/100);
			}

			//End of Poultry Farm Slab Calculation
			
			if ($totalIncome > $initialTaxWaiver) {

				$restTaxableIncome = ($totalIncome - $initialTaxWaiver);
				unset($TaxPercentAmount['0']);
				foreach ($TaxPercentAmount as $key => $value) {

					if ($restTaxableIncome >= $value) {
						$tmp = ($value * ($key / 100));
						$payAbleTax += ($value * ($key / 100));

						$restTaxableIncome = ($restTaxableIncome - $value);

					} else {

						if (($restTaxableIncome >= 0) && ($restTaxableIncome <= $value)) {
							$tmp = ($restTaxableIncome * ($key / 100));
							$payAbleTax += ($restTaxableIncome * ($key / 100));

							$restTaxableIncome = ($restTaxableIncome - $value);

							if ($restTaxableIncome <= 0) {
								$restTaxableIncome = 0;
							}
						}
					}

				}
			}

			if (!isset($Agri->Income82cTdsTotal)){
				$totalTdsAmount =0;
			}else{
				$totalTdsAmount =$Agri->Income82cTdsTotal;
			}
			return round(($payAbleTax + $PoultryFarmTax + $totalTdsAmount), 0);

		}

	}

	public function GetTaxPercentAmount($CPIInfo, $CalculationModel) {
		$TaxPercentAmount = [];
		$increasedAmount = 0;

		$age = $this->CalculateAge($CPIInfo->DOB);
		if($CPIInfo->Status == "Married" && $CPIInfo->AnyDisabledChild == "Y" && $CPIInfo->AvailChildDisabilityExemp == "N") {
			$increasedAmount = $CalculationModel->ChildDisableTaxWaiverAmount;
		}

		if ($CPIInfo->FreedomFighter == 'Y') {
			$TaxPercentAmount['0'] = $CalculationModel->FreedomFighterTaxWaiverAmount + $increasedAmount;
		}
		else if($CPIInfo->Disability == "YES") {
			$TaxPercentAmount['0'] = $CalculationModel->DisableTaxWaiverAmount + $increasedAmount;
		}

		else if ($age >= 65) {
			$TaxPercentAmount['0'] = $CalculationModel->AgedTaxWaiverAmount + $increasedAmount;
		}
		
		else if ($CPIInfo->Gender == "Male") {
			$TaxPercentAmount['0'] = $CalculationModel->NormalTaxWaiverAmount + $increasedAmount;
		}
		else if ($CPIInfo->Gender == "Female") {
			$TaxPercentAmount['0'] = $CalculationModel->FemaleTaxWaiverAmount + $increasedAmount;
		}

		if ($CPIInfo->Gender == "Male") {
			$TaxPercentAmount['10'] = 400000;
			$TaxPercentAmount['15'] = 500000;
			$TaxPercentAmount['20'] = 600000;
			$TaxPercentAmount['25'] = 3000000;
			$TaxPercentAmount['30'] = 999999999999;
                        /*$TaxPercentAmount['5'] = 100000;
			$TaxPercentAmount['10'] = 300000;
			$TaxPercentAmount['15'] = 400000;
			$TaxPercentAmount['20'] = 5000000;
			$TaxPercentAmount['25'] = 999999999999;*/
		}
		else if ($CPIInfo->Gender == "Female") {
			$TaxPercentAmount['10'] = 400000;
			$TaxPercentAmount['15'] = 500000;
			$TaxPercentAmount['20'] = 600000;
			$TaxPercentAmount['25'] = 3000000;
			$TaxPercentAmount['30'] = 999999999999;
                        /*$TaxPercentAmount['5'] = 100000;
			$TaxPercentAmount['10'] = 300000;
			$TaxPercentAmount['15'] = 400000;
			$TaxPercentAmount['20'] = 5000000;
			$TaxPercentAmount['25'] = 999999999999;*/
		}
		return $TaxPercentAmount;

		
		/*$TaxPercentAmount['0'] = 250000;
		$TaxPercentAmount['10'] = 400000;
		$TaxPercentAmount['15'] = 500000;
		$TaxPercentAmount['20'] = 600000;
		$TaxPercentAmount['25'] = 3000000;
		$TaxPercentAmount['30'] = Rest;*/
	}

	public function StoredDataForCalculation() {
		return $CalculationModel = CalculationDataSource::model()->find('EntryYear=:data', array(':data' => $this->taxYear()));
	}

	public function RebateAmount($id, $IncomeOtherSourceModel) {

		//$id = Yii::app()->user->CPIId;

		if ($this->StoredDataForCalculation() != null) {

			$model = $this->modelByCPIId($id); //INCOME MODEL

			if ( $model == NULL ) return 0;
			
			$Y = $model->IncomeTaxRebateTotal; //Investment
			$Z = $this->totalIncome($id) - @$IncomeOtherSourceModel->SanchaypatraIncome; 
			$Z -= $model->Income82cTotal;

			$LV = min( ($Z *(25/100)), 15000000, $Y );

			/*********Added for tax year2019-2020***********/
			// CONDITION 1
			if ( $Z <= 1500000 ) {
				return round( $LV * (15/100) );
			}

			// CONDITION 2
			else {
				// $R = 0;
				// if ( $LV <= 150000 ) {
				// 	$R += $LV * (15/100);
				// }
				// else{
				// 	$R += 1500000 * (15/100);
				// 	$R += ($LV-1500000) * (10/100);
				// }
				// return round($R);

				return round( $LV * (10/100) );
			} 

			/*// CONDITION 1
			if ( $Z <= 1000000 ) {
				return round( $LV * (15/100) );
			}

			// CONDITION 2
			else if ( $Z > 1000000 && $Z <= 3000000 ) {
				$R = 0;
				if ( $LV <= 250000 ) {
					$R += $LV * (15/100);
				}
				else {
					$R += 250000 * (15/100);
					$R += ($LV-250000) * (12/100);
				}
				return round($R);
			}

			// CONDITION 3
			else if ( $Z > 3000000 ) {
				$R = 0;
				if ( $LV <= 250000 ) {
					$R += $LV * (15/100);
				}
				else if ( $LV > 250000 && $LV <= 750000 ) {
					$R += 250000 * (15/100);
					$R += $LV * (12/100);
				}
				else if ( $LV > 750000 ) {
					$R += 250000 * (15/100);
					$R += 500000 * (12/100);
					$R += ($LV-750000) * (10/100);
				}
				return round($R);
			}*/

			/*********Added for tax year2019-2020***********/
		}
	}

	/*public function No15AmountOfRaxRebate($No34TotalIncome, $No14EligibleAmountForRebate) {
		$X = $No34TotalIncome;
		$Y = $No14EligibleAmountForRebate;
		// CONDITION 1
		if ( $X <= 1000000 ) {
			return round( $Y * (15/100) );
		}

		// CONDITION 2
		else if ( $X > 1000000 && $X <= 3000000 ) {
			$R = 0;
			if ( $Y <= 250000 ) {
				$R += $Y * (15/100);
			}
			else {
				$R += 250000 * (15/100);
				$R += ($Y-250000) * (12/100);
			}
			return round($R);
		}

		// CONDITION 3
		else if ( $X > 3000000 ) {
			$R = 0;
			if ( $Y <= 250000 ) {
				$R += $Y * (15/100);
			}
			else if ( $Y > 250000 && $Y <= 750000 ) {
				$R += 250000 * (15/100);
				$R += $Y * (12/100);
			}
			else if ( $Y > 750000 ) {
				$R += 250000 * (15/100);
				$R += 500000 * (12/100);
				$R += ($Y-750000) * (10/100);
			}
			return round($R);
		}
	}*/

	public function ActualRebateAmount($id) {
		$actualRebateAmount;
		
		$CPIInfo = $this->loadCPIInfo($id);
		$val = 0;
		if ($CPIInfo->AreaOfResidence == 1) {
			$val = 5000;
		} elseif ($CPIInfo->AreaOfResidence == 2) {
			$val = 4000;
		} elseif ($CPIInfo->AreaOfResidence == 3) {
			$val = 3000;
		}

		$advanceTaxOfCar = Yii::app()->db->createCommand("SELECT SUM(Cost) AS car_advance FROM income LEFT JOIN inc_income_tax_in_advance ON (inc_income_tax_in_advance.IncomeId = income.IncomeId AND Description = 'Car Advance Tax') Where income.CPIID = ". $id . " AND income.EntryYear = '" . $this->taxYear()."'")->queryRow()['car_advance'];

		$model = Income::model()->findbyattributes(array('CPIId' => Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear(), 'trash' => 0));
		$CarTdsTotal = 0;// @$model->Income82cTdsTotal + $advanceTaxOfCar;

		//NEW ADDED
		$IncomeOtherSourceModel = IncIncomeOtherSource::model()->find('IncomeId=:data', array(':data' => @$model->IncomeId));


		$X = $this->TaxLeviableOnTotalIncome($id);
		$Y = $this->RebateAmount($id, $IncomeOtherSourceModel);

		$A = $CarTdsTotal;
		if ($X == 0) {
			$B = 0;
		}
		else {
			$B = $val;
		}
		

		$Max_A_B = max($A,$B);

		//IF B IS HIGHER
		if ($B >= $A) {
			//VALUE OF Y CAN NOT BE MORE THAN X-B
			if ( $Y > ($X-$B) ) {
				// return ($X-$B);
				$actualRebateAmount = ($X-$B);
			}
			else {
				// return $Y;
				$actualRebateAmount = $Y;
			}
		}
		else {
			//VALUE OF Y CAN NOT BE MORE THAN X-A
			if ( $Y > ($X-$A) ) {
				// return ($X-$A);
				$actualRebateAmount = ($X-$A);
			}
			else {
				// return $Y;
				$actualRebateAmount = $Y;
			}
		}

		/*********Added for tax year2019-2020***********/
		$totalIncome = $this->totalIncome($id);
		$rebate_on_share_of_profit_in_firm = 0;

		$model = Income::model()->find('CPIId=:data AND EntryYear=:data2', array(':data' => $id, ':data2' => $this->taxYear()));

		$totalIncomeShareProfit = $this->totalOutputInNumber($model, 'IncomeShareProfit');

		if($totalIncome>0){
			$rebate_on_share_of_profit_in_firm = ($X*$totalIncomeShareProfit)/$totalIncome;
		}
		
		return ($actualRebateAmount + $rebate_on_share_of_profit_in_firm);

		/*********Added for tax year2019-2020***********/

	}

	public function TaxLeviableOnTotalIncome($id) {
		$CPIInfo = $this->loadCPIInfo($id);
		$payAbleTax = $this->PayableTax($id);
		//$payAbleTax = ($payAbleTax - $this->RebateAmount($id));
		$val = 0;
		if ($CPIInfo->AreaOfResidence == 1) {
			$val = 5000;
		} elseif ($CPIInfo->AreaOfResidence == 2) {
			$val = 4000;
		} elseif ($CPIInfo->AreaOfResidence == 3) {
			$val = 3000;
		}

		$advanceTaxOfCar = Yii::app()->db->createCommand("SELECT SUM(Cost) AS car_advance FROM income LEFT JOIN inc_income_tax_in_advance ON (inc_income_tax_in_advance.IncomeId = income.IncomeId AND Description = 'Car Advance Tax') Where income.CPIID = ". $id . " AND income.EntryYear = '" . $this->taxYear()."'")->queryRow()['car_advance'];

		$model = Income::model()->findbyattributes(array('CPIId' => Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear(), 'trash' => 0));
		$CarTdsTotal = @$model->Income82cTdsTotal + $advanceTaxOfCar;

		//new change 18 September 2016
		$IncomeOtherSourceData = IncIncomeOtherSource::model()->find('IncomeId=:data', array(':data' => @$model->IncomeId));
		if ($IncomeOtherSourceData) {
			$TDSFromSanchaypatra = $IncomeOtherSourceData->TDSFromSanchaypatra;
		}
		else {
			$TDSFromSanchaypatra = 0;
		}
		//END - new change 18 September 2016

		if ($payAbleTax == 0) {
			return (0 + $TDSFromSanchaypatra);
		}
		else if ($payAbleTax < $val) {
			return (max($val,$CarTdsTotal) + $TDSFromSanchaypatra);
		}
		else if($payAbleTax > $val && $payAbleTax < $CarTdsTotal) {
			return ($CarTdsTotal + $TDSFromSanchaypatra);
		}
		else {
			return ($payAbleTax + $TDSFromSanchaypatra);
		}
	}

	public function netPayableTax($id) {

		$TaxLeviableOnTotalIncome = $this->TaxLeviableOnTotalIncome($id);
		$ActualRebateAmount = round($this->ActualRebateAmount($id));

		/*********Added for tax year2019-2020***********/
		// $totalIncome = $this->totalIncome($id);
		// $rebate_on_share_of_profit_in_firm = 0;

		// $model = Income::model()->find('CPIId=:data AND EntryYear=:data2', array(':data' => $id, ':data2' => $this->taxYear()));

		// $totalIncomeShareProfit = $this->totalOutputInNumber($model, 'IncomeShareProfit');

		// if($totalIncome>0){
		// 	$rebate_on_share_of_profit_in_firm = ($TaxLeviableOnTotalIncome*$totalIncomeShareProfit)/$totalIncome;
		// }
		
		// $GrandTotalPayableTax = round( ($TaxLeviableOnTotalIncome - $ActualRebateAmount) - $rebate_on_share_of_profit_in_firm);
		$GrandTotalPayableTax = round( ($TaxLeviableOnTotalIncome - $ActualRebateAmount) );
		/*********Added for tax year2019-2020***********/

  		$surCharge = $this->surCharge($GrandTotalPayableTax);

  		if($GrandTotalPayableTax>0){
  			$GrandTotalPayableTax += $surCharge['surchargeAmount'];  
  		}

		return $GrandTotalPayableTax;

		
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

		if (@$model->$Confirm) {
			if ($model->$Confirm == "Yes") {

				if ($model->$FOrT == "Total") {
					return $val2 = $model->$val;
				} elseif ($model->$FOrT == "Fraction") {

					if ($val == "InterestOnSecurities") {
						$val2 = $Inc::model()->find(array('select' => 'SUM(Cost) as ' . $sumOf, 'condition' => 'IncomeId=:data AND Type != :data2', 'params' => array(':data' => @$model->IncomeId, ':data2' => "Zero Coupon Bond")))->$sumOf;
					}
					else {
						$val2 = $Inc::model()->find(array('select' => 'SUM(Cost) as ' . $sumOf, 'condition' => 'IncomeId=:data', 'params' => array(':data' => @$model->IncomeId)))->$sumOf;
					}

					return $val2;
				} else {
					return 0;
				}
			} elseif ($model->$Confirm == "No") {
				return 0;
			}
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
		if($total<500000000){
			if($getSurCharge == null || $tax == 0) {
				if($asset_model != null && ($asset_model->HousePropertyInCityCorporation == 'Yes' || $asset_model->MultipleCar == 'Yes') && $tax>0){
					$minSurchargeAmount = 3000;
					$surchargePercent = 10;
					$surchargeAmount = (($surchargePercent * $tax) / 100);
					if($surchargeAmount <= $minSurchargeAmount){
						$surchargeAmount = $minSurchargeAmount;
						$t_tax = $surchargeAmount + $tax;
					}else{
						$t_tax = $surchargeAmount + $tax;
					}
				}else{
					$surchargePercent = 0;
					$t_tax = $tax;
					$surchargeAmount = 0;
				}

				return ['sur_charge' => $surchargePercent, 'tax' => $t_tax, 'surchargeAmount'=>$surchargeAmount];
			}else {
				if(in_array($getSurCharge->Percent, array('10','15'))){
					$minSurchargeAmount = 3000;
					$surchargeAmount = (($getSurCharge->Percent * $tax) / 100);
					if($surchargeAmount <= $minSurchargeAmount){
						$surchargeAmount = $minSurchargeAmount;
						$t_tax = $surchargeAmount + $tax;
					}else{
						$t_tax = $surchargeAmount + $tax;
					}
				}else{
					$minSurchargeAmount = 5000;
					$surchargeAmount = (($getSurCharge->Percent * $tax) / 100);
					if($surchargeAmount <= $minSurchargeAmount){
						$surchargeAmount = $minSurchargeAmount;
						$t_tax = $surchargeAmount + $tax;
					}else{
						$t_tax = $surchargeAmount + $tax;
					}
				}
				return ['sur_charge' => $getSurCharge->Percent, 'tax' => $t_tax, 'surchargeAmount' => $surchargeAmount];
			}
		}else{
			$surChargeA = $total*0.1/100;
			$surChargeB = $lia_total*30/100;

			$max_surChargeA_surChargeB = max($surChargeA,$surChargeB);
			if($tax>0){
				$t_tax = $tax + $max_surChargeA_surChargeB;
			}else{
				$t_tax = $tax;
			}

			return ['sur_charge' => '', 'tax' => $t_tax, 'surchargeAmount' => $max_surChargeA_surChargeB];

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
			// if ($model->TotalTaxPaidLastYearConfirm == "No") {
			// 	$TaxPaidLastYearCount = 1;
			// } else if ($model->TotalTaxPaidLastYearConfirm == "Yes") {
			// 	if ($model->TotalTaxPaidLastYear == "") {
			// 		$TaxPaidLastYearCount = 0;
			// 	} else {
			// 		$TaxPaidLastYearCount = 1;
			// 	}
			// } else {
			// 	$TaxPaidLastYearCount = 0;
			// }
			$AccommodationCount = ExpenditureController::checkActiveInactive($model, "AccommodationConfirm", "AccommodationFOrT", "ExpAccommodation", "AccommodationTotal");

			$TransportCount = ExpenditureController::checkActiveInactive($model, "TransportConfirm", "TransportFOrT", "ExpTransport", "TransportTotal");

			$ElectricityBillCount = ExpenditureController::checkActiveInactive($model, "ElectricityBillConfirm", "ElectricityBillFOrT", "ExpElectricityBill", "ElectricityBillTotal");

			$WasaBillCount = ExpenditureController::checkActiveInactive($model, "WasaBillConfirm", "WasaBillFOrT", "ExpWasaBill", "WasaBillTotal");

			$GasBillCount = ExpenditureController::checkActiveInactive($model, "GasBillConfirm", "GasBillFOrT", "ExpGasBill", "GasBillTotal");

			$TelephoneBillCount = ExpenditureController::checkActiveInactive($model, "TelephoneBillConfirm", "TelephoneBillFOrT", "ExpTelephoneBill", "TelephoneBillTotal");

			$ChildrenEducationCount = ExpenditureController::checkActiveInactive($model, "ChildrenEducationConfirm", "ChildrenEducationFOrT", "ExpChildrenEducation", "ChildrenEducationTotal");

			$PersonalForeignTravelCount = ExpenditureController::checkActiveInactive($model, "PersonalForeignTravelConfirm", "PersonalForeignTravelFOrT", "ExpPersonalForeignTravel", "PersonalForeignTravelTotal");

			$FestivalOtherSpecialCount = ExpenditureController::checkActiveInactive($model, "FestivalOtherSpecialConfirm", "FestivalOtherSpecialFOrT", "ExpFestivalOtherSpecial", "FestivalOtherSpecialTotal");

			$OtherTransportCount = ExpenditureController::checkActiveInactive($model, "OtherTransportConfirm", "OtherTransportFOrT", "ExpOtherTransport", "OtherTransportTotal");

			$OtherHouseholdCount = ExpenditureController::checkActiveInactive($model, "OtherHouseholdConfirm", "OtherHouseholdFOrT", "ExpOtherHousehold", "OtherHouseholdTotal");

			$DonationCount = ExpenditureController::checkActiveInactive($model, "DonationConfirm", "DonationFOrT", "ExpDonation", "DonationTotal");

			$OtherSpecialCount = ExpenditureController::checkActiveInactive($model, "OtherSpecialConfirm", "OtherSpecialFOrT", "ExpOtherSpecial", "OtherSpecialTotal");

			$OtherCount = ExpenditureController::checkActiveInactive($model, "OtherConfirm", "OtherFOrT", "ExpOther", "OtherTotal");

			$TaxAtSourceCount = ExpenditureController::checkActiveInactive($model, "TaxAtSourceConfirm", "TaxAtSourceFOrT", "ExpTaxAtSource", "TaxAtSourceTotal");

			$SurchargeOtherCount = ExpenditureController::checkActiveInactive($model, "SurchargeOtherConfirm", "SurchargeOtherFOrT", "ExpSurchargeOther", "SurchargeOtherTotal");

			$LossDeductionsCount = ExpenditureController::checkActiveInactive($model, "LossDeductionsConfirm", "LossDeductionsFOrT", "ExpLossDeductions", "LossDeductionsTotal");

			$GiftDonationContributionCount = ExpenditureController::checkActiveInactive($model, "GiftDonationContributionConfirm", "GiftDonationContributionFOrT", "ExpGiftDonationContribution", "GiftDonationContributionTotal");

			// $total = $PersonalFoodingCount + $TaxPaidLastYearCount + $AccommodationCount + $TransportCount + $ElectricityBillCount + $WasaBillCount + $GasBillCount + $TelephoneBillCount + $ChildrenEducationCount + $PersonalForeignTravelCount + $FestivalOtherSpecialCount + $OtherTransportCount+ $OtherHouseholdCount + $DonationCount + $OtherSpecialCount + $OtherCount + $TaxAtSourceCount + $SurchargeOtherCount + $LossDeductionsCount + $GiftDonationContributionCount;
			$total = $PersonalFoodingCount + $AccommodationCount + $TransportCount + $ElectricityBillCount + $WasaBillCount + $GasBillCount + $TelephoneBillCount + $ChildrenEducationCount + $PersonalForeignTravelCount + $FestivalOtherSpecialCount + $OtherTransportCount+ $OtherHouseholdCount + $DonationCount + $OtherSpecialCount + $OtherCount + $TaxAtSourceCount + $SurchargeOtherCount + $LossDeductionsCount + $GiftDonationContributionCount;

			return floor($total * 100 /19);

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
			$data[] = $model->OtherAssetsReceiptConfirm;
			$data[] = $model->NetWealthConfirm;

			$value = 0;

			$totalItem = 0;

			foreach ($data as $key => $Confirm) {
				if ($Confirm == "Yes" || $Confirm == "No") {
					$value++;
				}

				++$totalItem;
			}

			return floor($value * 100 / $totalItem);
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

			//$data[] = $IncomeSalariesData = IncomeSalaries::model()->findAll('IncomeId=:data', array(':data' => @$model->IncomeId));
			$data[] = $model->IncomeSalariesConfirm;
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
			//$data[] = $model->Income82cConfirm;
			// $data[] =	$model->TaxExemptedConfirm;

			$value = 0;

			$totalItem = 0;

			foreach ($data as $key => $Confirm) {

				if (($Confirm == "Yes") || ($Confirm == "No") || ($Confirm != null)) {

					$value += 1;
				}
				++$totalItem;
			}

			// return $value;

			return $percentDone = floor(($value / $totalItem) * 100);

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

			$totalItem = 0;

			foreach ($data as $key => $Confirm) {

				if ($Confirm != null) {

					$value += 1;
				}
				++$totalItem;
			}

			return $percentDone = floor(($value / $totalItem) * 100);

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
			// if ($model->TotalTaxPaidLastYearConfirm == "No") {
			// 	$TaxPaidLastYearCount = 1;
			// } else if ($model->TotalTaxPaidLastYearConfirm == "Yes") {
			// 	if ($model->TotalTaxPaidLastYear == "") {
			// 		$TaxPaidLastYearCount = 0;
			// 	} else {
			// 		$TaxPaidLastYearCount = 1;
			// 	}
			// } else {
			// 	$TaxPaidLastYearCount = 0;
			// }
			$AccommodationCount = ExpenditureController::checkActiveInactive($model, "AccommodationConfirm", "AccommodationFOrT", "ExpAccommodation", "AccommodationTotal");

			$TransportCount = ExpenditureController::checkActiveInactive($model, "TransportConfirm", "TransportFOrT", "ExpTransport", "TransportTotal");

			$ElectricityBillCount = ExpenditureController::checkActiveInactive($model, "ElectricityBillConfirm", "ElectricityBillFOrT", "ExpElectricityBill", "ElectricityBillTotal");

			$WasaBillCount = ExpenditureController::checkActiveInactive($model, "WasaBillConfirm", "WasaBillFOrT", "ExpWasaBill", "WasaBillTotal");

			$GasBillCount = ExpenditureController::checkActiveInactive($model, "GasBillConfirm", "GasBillFOrT", "ExpGasBill", "GasBillTotal");

			$TelephoneBillCount = ExpenditureController::checkActiveInactive($model, "TelephoneBillConfirm", "TelephoneBillFOrT", "ExpTelephoneBill", "TelephoneBillTotal");

			$ChildrenEducationCount = ExpenditureController::checkActiveInactive($model, "ChildrenEducationConfirm", "ChildrenEducationFOrT", "ExpChildrenEducation", "ChildrenEducationTotal");

			$PersonalForeignTravelCount = ExpenditureController::checkActiveInactive($model, "PersonalForeignTravelConfirm", "PersonalForeignTravelFOrT", "ExpPersonalForeignTravel", "PersonalForeignTravelTotal");

			$FestivalOtherSpecialCount = ExpenditureController::checkActiveInactive($model, "FestivalOtherSpecialConfirm", "FestivalOtherSpecialFOrT", "ExpFestivalOtherSpecial", "FestivalOtherSpecialTotal");

			$OtherTransportCount = ExpenditureController::checkActiveInactive($model, "OtherTransportConfirm", "OtherTransportFOrT", "ExpOtherTransport", "OtherTransportTotal");

			$OtherHouseholdCount = ExpenditureController::checkActiveInactive($model, "OtherHouseholdConfirm", "OtherHouseholdFOrT", "ExpOtherHousehold", "OtherHouseholdTotal");

			$DonationCount = ExpenditureController::checkActiveInactive($model, "DonationConfirm", "DonationFOrT", "ExpDonation", "DonationTotal");

			$OtherSpecialCount = ExpenditureController::checkActiveInactive($model, "OtherSpecialConfirm", "OtherSpecialFOrT", "ExpOtherSpecial", "OtherSpecialTotal");

			$OtherCount = ExpenditureController::checkActiveInactive($model, "OtherConfirm", "OtherFOrT", "ExpOther", "OtherTotal");

			$TaxAtSourceCount = ExpenditureController::checkActiveInactive($model, "TaxAtSourceConfirm", "TaxAtSourceFOrT", "ExpTaxAtSource", "TaxAtSourceTotal");

			$SurchargeOtherCount = ExpenditureController::checkActiveInactive($model, "SurchargeOtherConfirm", "SurchargeOtherFOrT", "ExpSurchargeOther", "SurchargeOtherTotal");

			$LossDeductionsCount = ExpenditureController::checkActiveInactive($model, "LossDeductionsConfirm", "LossDeductionsFOrT", "ExpLossDeductions", "LossDeductionsTotal");

			$GiftDonationContributionCount = ExpenditureController::checkActiveInactive($model, "GiftDonationContributionConfirm", "GiftDonationContributionFOrT", "ExpGiftDonationContribution", "GiftDonationContributionTotal");

			// $total = $PersonalFoodingCount + $TaxPaidLastYearCount + $AccommodationCount + $TransportCount + $ElectricityBillCount + $WasaBillCount + $GasBillCount + $TelephoneBillCount + $ChildrenEducationCount + $PersonalForeignTravelCount + $FestivalOtherSpecialCount + $OtherTransportCount+ $OtherHouseholdCount + $DonationCount + $OtherSpecialCount + $OtherCount + $TaxAtSourceCount + $SurchargeOtherCount + $LossDeductionsCount + $GiftDonationContributionCount;
			
			$total = $PersonalFoodingCount + $AccommodationCount + $TransportCount + $ElectricityBillCount + $WasaBillCount + $GasBillCount + $TelephoneBillCount + $ChildrenEducationCount + $PersonalForeignTravelCount + $FestivalOtherSpecialCount + $OtherTransportCount+ $OtherHouseholdCount + $DonationCount + $OtherSpecialCount + $OtherCount + $TaxAtSourceCount + $SurchargeOtherCount + $LossDeductionsCount + $GiftDonationContributionCount;

			return floor($total * 100 / 19);

			// $total = $PersonalFoodingCount + $TaxPaidLastYearCount + $AccommodationCount + $TransportCount + $ElectricityBillCount + $WasaBillCount + $GasBillCount + $TelephoneBillCount + $ChildrenEducationCount + $PersonalForeignTravelCount + $FestivalOtherSpecialCount;

			// return floor($total * 100 / 11);

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
			$totalItem = 0;

			foreach ($data as $key => $Confirm) {
				if ($Confirm == "Yes" || $Confirm == "No") {
					$value++;
				}
				++$totalItem;
			}

			return floor($value * 100 / $totalItem);
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

			// $data[] = $IncomeSalariesData = IncomeSalaries::model()->findAll('IncomeId=:data', array(':data' => @$model->IncomeId));
			$data[] = $model->IncomeSalariesConfirm;
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
			//$data[] = $model->Income82cConfirm;
			// $data[] =	$model->TaxExemptedConfirm;

			$value = 0;

			
			$totalItem = 0;

			foreach ($data as $key => $Confirm) {

				if (($Confirm == "Yes") || ($Confirm == "No") || ($Confirm != null)) {

					$value += 1;
				}
				++$totalItem;
			}
			// $percentDone = floor(($value / 15) * 100);
			
			// return $value;

			return $percentDone = floor(($value / $totalItem) * 100);

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
			$data[] = $model->TaxesCircle;
			$data[] = $model->TaxesZone;
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
			$totalItem = 0;

			foreach ($data as $key => $Confirm) {

				if ($Confirm != null) {

					$value += 1;
				}
				++$totalItem;
			}

			return $percentDone = floor(($value / $totalItem) * 100);

		}

	}
//%%%%%%%%%%%%%%%%%Income PIStatusBar END%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

//END%%%%%%%%%%%%%%%%%%%%Professional%%%%%%---PARTBDTAXPRO---%%%%%%%%%%%%%%%%%%%%%%%%

	public function _encode($str='') {
	    $str1 = base64_encode($str);
	    $str2 = base64_encode($str1);
	    $str3 = base64_encode($str2);
	    $str4 = base64_encode($str3);
	    $str5 = strrev($str4);
	    $encrypt = bin2hex($str5);
	    return $encrypt;
	}

	public function _decode($encrypt='') {
	    $str = '';
	    for ($i = 0; $i < strlen($encrypt) - 1; $i+=2) {
	        $str .= chr(hexdec($encrypt[$i] . $encrypt[$i + 1]));
	    }
	    $str5 = strrev($str);
	    $str4 = base64_decode($str5);
	    $str3 = base64_decode($str4);
	    $str2 = base64_decode($str3);
	    $decode = base64_decode($str2);
	    return $decode;
	}


	//Saving progress percentage in the UsersStatistic table
	public function saveUserStatistic()
	{
		$userId = Yii::app()->user->id;

		if($userId){
			$cpiId = Yii::app()->user->CPIId;

			if($cpiId>0){
				$progressPercent = (($this->personalInformationStatusBar() + $this->incomeStatusBar() + $this->expenseStatusBar() + $this->assetsStatusBar() + $this->liabilityStatusBar()) / 5);

				$model_update = UsersStatistic::model()->find('CPIId=:data1', array(':data1'=>$cpiId));
				// var_dump($model_update);die;
				if($model_update == null){

					$data = new UsersStatistic;
					$data->CPIId = $cpiId;
					$data->pdf_print_date = null;
					$data->progress_percent_date = date('Y-m-d h:i:s');
					$data->progress_percent = $progressPercent;
					$data->progress_percent_month = date('F');
					$data->save(false);

				}else{

					// $model_update->pdf_print_date = null;
					$model_update->progress_percent_date = date('Y-m-d h:i:s');
					$model_update->progress_percent = $progressPercent;
					$model_update->progress_percent_month = date('F');
					$model_update->save(false);

				}
			}
		}
	}

	//Saving Pdf statistic in the UsersStatistic table
	public function saveUserPdfStatistic()
	{
		$userId = Yii::app()->user->id;

		if($userId){
			$cpiId = Yii::app()->user->CPIId;

			if($cpiId>0){
				$progressPercent = (($this->personalInformationStatusBar() + $this->incomeStatusBar() + $this->expenseStatusBar() + $this->assetsStatusBar() + $this->liabilityStatusBar()) / 5);

				$model_update = UsersStatistic::model()->find('CPIId=:data1', array(':data1'=>$cpiId));
				if($model_update == null){

					$data = new UsersStatistic;
					$data->CPIId = $cpiId;
					$data->pdf_print_date = date('Y-m-d h:i:s');
					$data->pdf_print_count = 1;
					$data->pdf_print_month = date('F');
					// $data->progress_percent_date = null;
					// $data->progress_percent = $progressPercent;
					$data->save(false);

				}else{

					$model_update->pdf_print_count += 1;
					$model_update->pdf_print_date = date('Y-m-d h:i:s');
					$model_update->pdf_print_month = date('F');
					// $model_update->progress_percent_date = date('Y-m-d h:i:s');
					// $model_update->progress_percent = $progressPercent;
					$model_update->save(false);

				}
			}
		}
	}

	public function CalculateAge($birthday) {
		if ($birthday == "0000-00-00" || $birthday == "" || $birthday == NULL) return 0;

		$date1 = date("Y-m-d", strtotime($birthday));
		$date2 = date("Y-m-d");
		$diff = abs(strtotime($date2) - strtotime($date1));
		return floor($diff / (365*60*60*24));
	}



	/**************************START Of Total Exempted Value***************************/

	public function totalExemptedValue(){
		$income_model=	Income::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear()));

		$totalSalaryExempted = IncomeSalaries::model()->find(array('select' => ' SUM(NetTaxWaiver) as NetTaxWaiver', 'condition' => 'IncomeId=:data', 'params' => array(':data' => @$income_model->IncomeId)))->NetTaxWaiver;

		$totalInterestOnSecuritiesExempted = IncInterestOnSecurities::model()->find(array('select' => ' SUM(NetAmount) as NetAmount', 'condition' => 'IncomeId=:data AND Type=:data1', 'params' => array(':data' => @$income_model->IncomeId, 'data1'=>'Zero Coupon Bond')))->NetAmount;

		$totalBusinessExtempted = IncIncomeBusinessOrProfession::model()->find(array('select' => ' (SUM(TotalAmountIncome) - SUM(Cost)) as TotalAmountIncome', 'condition' => 'IncomeId=:data', 'params' => array(':data' => @$income_model->IncomeId)))->TotalAmountIncome;

		$totalCapitalGainExempted = IncIncomeCapitalGains::model()->find(array('select' => ' SUM(SaleOfShare) as SaleOfShare', 'condition' => 'IncomeId=:data AND Type=:data1 AND MoreThanTenPercentHolder=:data2', 'params' => array(':data' => @$income_model->IncomeId, 'data1'=>'Sale of Share', 'data2'=>'NO')))->SaleOfShare;

		$totalOtherSourceExtempted = IncIncomeOtherSource::model()->find(array('select' => ' (SUM(TotalAmountIncome) - SUM(Cost)) as TotalAmountIncome', 'condition' => 'IncomeId=:data', 'params' => array(':data' => @$income_model->IncomeId)))->TotalAmountIncome;


		$totalForeignIncomeExtempted = @$this->totalOutputInNumber($income_model, 'ForeignIncome');

		$rebate_model = IncomeTaxRebate::model()->find(array('select' => '*', 'condition' => 'IncomeId=:data', 'params' => array(':data' => @$income_model->IncomeId)));

		$totalRebateExtempted = (@$rebate_model->LifeInsurancePremium_1 + @$rebate_model->ProvidentFund_1 + @$rebate_model->SCECProvidentFund_1 + @$rebate_model->SuperAnnuationFund_1 + @$rebate_model->DepositPensionScheme_1 + @$rebate_model->InvestInStockOrShare_1 + @$rebate_model->BenevolentFund_1 + @$rebate_model->ZakatFund_1 + @$rebate_model->DonationEduInstitutionGov_1 + @$rebate_model->MutualFund + @$rebate_model->ContributionAhsaniaMissionCancerHospital_1 + @$rebate_model->Computer_1 + @$rebate_model->Laptop_1 + @$rebate_model->SavingsCertificates_1 + @$rebate_model->BangladeshGovtTreasuryBond_1 + @$rebate_model->DonationNLInstitutionFON_1 + @$rebate_model->DonationCharityHospitalNBR_1 + @$rebate_model->DonationOrganizationRetardPeople_1 + @$rebate_model->ContributionNLInstituionLW_1 + @$rebate_model->ContributionLiberationWarMuseum_1 + @$rebate_model->ContributionAgaKhanDN_1 + @$rebate_model->ContributionAsiaticSocietyBd_1 + @$rebate_model->DonationICDDRB_1 + @$rebate_model->DotationCRP_1) - @$income_model->IncomeTaxRebateTotal;

		// $totalTaxWaiver = @$totalSalaryExempted + @$totalInterestOnSecuritiesExempted + @$totalBusinessExtempted + @$totalCapitalGainExempted + @$totalOtherSourceExtempted + @$totalForeignIncomeExtempted;
		$totalTaxWaiver = @$totalSalaryExempted + @$totalInterestOnSecuritiesExempted + @$totalBusinessExtempted + @$totalCapitalGainExempted + @$totalOtherSourceExtempted;

		// var_dump($totalTaxWaiver);die;
		return $totalTaxWaiver;
	}


	/**************************END Of Total Exempted Value***************************/
	public function completedPercent() {
		return (($this->personalInformationStatusBar() + $this->incomeStatusBar() + $this->expenseStatusBar() + $this->assetsStatusBar() + $this->liabilityStatusBar()) / 5);
	}

	public function outsandtingTaxLiability(){
		//$personal_info_model=$this->loadPersonalModelByCPIId(Yii::app()->user->CPIId);
		$income_model=Income::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear()));
		
		$GrandTotalPayableTax = round($this->netPayableTax(Yii::app()->user->CPIId));
		$tds = @$this->totalOutputInNumber($income_model, 'IncomeTaxDeductedAtSource') + @$income_model->Income82cTdsTotal;

		$totalAdjustment = ($GrandTotalPayableTax - (@$tds + @$this->totalOutputInNumber($income_model, 'IncomeTaxInAdvance') + @$income_model->AdjustmentTaxRefund));
		return @$totalAdjustment;
	}

	public function minimumTaxValue($id){
		$CPIInfo = $this->loadCPIInfo($id);

		$taxLeviableOnTotalIncome = 0;// $this->TaxLeviableOnTotalIncome(Yii::app()->user->CPIId);

		$val = 0;
		if ($CPIInfo->AreaOfResidence == 1 && $taxLeviableOnTotalIncom > 0) {
			$val = 5000;
		} elseif ($CPIInfo->AreaOfResidence == 2 && $taxLeviableOnTotalIncome > 0) {
			$val = 4000;
		} elseif ($CPIInfo->AreaOfResidence == 3 && $taxLeviableOnTotalIncome > 0) {
			$val = 3000;
		}

		$advanceTaxOfCar = Yii::app()->db->createCommand("SELECT SUM(Cost) AS car_advance FROM income LEFT JOIN inc_income_tax_in_advance ON (inc_income_tax_in_advance.IncomeId = income.IncomeId AND Description = 'Car Advance Tax') Where income.CPIID = ". $id . " AND income.EntryYear = '" . $this->taxYear()."'")->queryRow()['car_advance'];
		if($val<$advanceTaxOfCar){
			$minTax = $advanceTaxOfCar;
		}else{
			$minTax = $val;
		}
		
		return $minTax;
	}

	public function addMailchimpSubscriber($type, $fname, $lname, $email) {
		//add email to mailchimp
	    if ($type == "individual") {
	    	$listID = Yii::app()->params['mailchimp_individual_listid'];
	    }
	    else if ($type == "company") {
	    	$listID = Yii::app()->params['mailchimp_company_listid'];
	    }
	    
	    $apiKey = Yii::app()->params['mailchimp_apiKey'];

	    $memberID = md5(strtolower($email));
	    $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
	    $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/' . $memberID;

	    // member information
	    $json = json_encode([
	        'email_address' => $email,
	        'status'        => 'subscribed',
	        'merge_fields'  => [
	            'FNAME'     => $fname,
	            'LNAME'     => $lname
	        ]
	    ]);

	    // send a HTTP POST request with curl
	    $ch = curl_init($url);
	    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	    $result = curl_exec($ch);
	    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	    curl_close($ch);
		//add email to mailchimp - END 
	}

	public function get_client_ip() {
	    $ipaddress = '';
	    if (getenv('HTTP_CLIENT_IP'))
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
	        $ipaddress = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	       $ipaddress = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
	        $ipaddress = getenv('REMOTE_ADDR');
	    else
	        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
	}
}