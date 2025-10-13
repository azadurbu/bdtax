<table width="100%" cellspacing="0" cellpadding="2" border="1">

			<tbody><tr>

				<td valign="top" align="center"><strong>Pay &amp; Allowance</strong></td>

				<td width="135px" max-width="140px" valign="top" align="center"><strong>Amount of Income (<?=$this->currency?> )</strong></td>

				<td width="135px" max-width="140px" valign="top" align="center"><strong style="font-size:12px;">Amount of exempted income (<?=$this->currency?> )</strong></td>

				<td width="135px" max-width="140px" valign="top" align="center"><strong>Net taxable income (<?=$this->currency?> )</strong></td>

			</tr>

			<tr>

				<td valign="middle" align="left">Basic pay</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->BasicPay; ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->BasicPay; ?></td>

			</tr>

			<tr>

				<td valign="middle" align="left">Special pay</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->SpecialPay_1; ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->SpecialPay_1; ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

			</tr>

			<tr>

				<td valign="middle" align="left">Dearness allowance</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->DearnessAllowance_1 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->DearnessAllowance_1 ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

			</tr>

			<tr>

				<td valign="middle" align="left">Conveyance allowance</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->ConveyanceAllowance_1; ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->ConveyanceAllowance_1; ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

			</tr>

			<tr>

				<td valign="middle" align="left">House rent allowance</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->HouseRentAllowance_1; ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->HouseRentAllowance_1; ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

			</tr>

			<tr>

				<td valign="middle" align="left">Medical allowance</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->MedicalAllowance_1; ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->MedicalAllowance_1; ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

			</tr>

			<tr>

				<td valign="middle" align="left">Servant allowance</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->ServantAllowance_1 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->ServantAllowance_1 ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

			</tr>

			<tr>

				<td valign="middle" align="left">Leave allowance</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->LeaveAllowance_1 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->LeaveAllowance_1 ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

			</tr>

			<tr>

				<td valign="middle" align="left">Honorarium / Reward/ Fee</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->HonorariumOrReward_1 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->HonorariumOrReward_1 ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

			</tr>

			<tr>

				<td valign="middle" align="left">Overtime allowance</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->OvertimeAllowance_1 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->OvertimeAllowance_1 ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

			</tr>

			<tr>

				<td valign="middle" align="left">Bonus / Ex-gratia</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->Bonus ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->Bonus ?></td>

			</tr>

			<tr>

				<td valign="middle" align="left">Other allowances</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->OtherAllowances_1 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->OtherAllowances_1 ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

			</tr>

			<tr>

				<td valign="middle" align="left" style="font-size:12px;">Employers contribution to Recognized Provident Fund</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->EmployersContributionProvidentFund_1 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->EmployersContributionProvidentFund_1 ?></td>

				<td valign="middle" align="right"></td>

			</tr>

			<tr>

				<td valign="middle" align="left">Interest accrued on Recognized Provident Fund</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->InterestAccruedProvidentFund_1; ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->InterestAccruedProvidentFund_1; ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

			</tr>

			<tr>

				<td valign="middle" align="left">Deemed income for transport facility </td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->DeemedIncomeTransport_1 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->DeemedIncomeTransport_1 ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

			</tr>

			<tr>

				<td valign="middle" align="left" style="font-size:11px;">Deemed income for free furnished/unfurnished accommodation</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->DeemedFreeAccommodation_1 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->DeemedFreeAccommodation_1 ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

			</tr>

			<tr>

				<td valign="middle" align="left">Festival Bonus </td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->FestivalBonus_1 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->FestivalBonus_1 ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

			</tr>

			<tr>

				<td valign="middle" align="left">Bengali New Year </td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->BengaliNewYearBonus_1 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->BengaliNewYearBonus_1 ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

			</tr>

			<tr>

				<td valign="middle" align="left">Entertainment Allowance </td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->EntertainmentAllowance_1 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->EntertainmentAllowance_1 ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

			</tr>

			<tr>

				<td valign="middle" align="left">Pension</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->Pension_1 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->Pension_1 ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

			</tr>

			<tr>

				<td valign="middle" align="left" style="font-size:11px;">Income Received from Recognized Provident Fund and Recognized Super Annuation Fund </td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->RecognizedProvidentFundIncome_1 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->RecognizedProvidentFundIncome_1 ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

			</tr>

			<tr>

				<td valign="middle" align="left">Other, if any (give detail) </td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->Others_1 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->Others_1 ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

			</tr>

			<tr>

				<td valign="middle" align="center"><strong>Net taxable income from salary</strong></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->NetSalaryIncome ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->NetTaxWaiver ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->NetTaxableIncome ?></td>

			</tr>

		</tbody></table>