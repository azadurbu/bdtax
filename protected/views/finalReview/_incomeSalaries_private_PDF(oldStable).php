<table width="100%" cellspacing="0" cellpadding="2" border="1">

			<tbody><tr>

				<td valign="top" align="center"><strong>Pay &amp; Allowance</strong></td>

				<td width="135px" max-width="140px" valign="top" align="center"><strong>Amount of Income (<?=$this->currency?> )</strong></td>

				<td width="135px" max-width="140px" valign="top" align="center"><strong style="font-size:12px;">Amount of exempted income (<?=$this->currency?> )</strong></td>

				<td width="135px" max-width="140px"valign="top" align="center"><strong>Net taxable income (<?=$this->currency?> )</strong></td>

			</tr>

			<tr>

				<td valign="middle" align="left">Basic pay</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->BasicPay; ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->BasicPay; ?></td>

			</tr>

			<tr>

				<td valign="middle" align="left">Special pay</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->SpecialPay; ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->SpecialPay; ?></td>

			</tr>

			<tr>

				<td valign="middle" align="left">Dearness allowance</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->DearnessAllowance ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->DearnessAllowance ?></td>

			</tr>

			<tr>

				<td valign="middle" align="left">Conveyance allowance</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->ConveyanceAllowance_1; ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->ConveyanceAllowance_2; ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->ConveyanceAllowance; ?></td>

			</tr>

			<tr>

				<td valign="middle" align="left">House rent allowance</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->HouseRentAllowance_1; ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->HouseRentAllowance_2; ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->HouseRentAllowance; ?></td>

			</tr>

			<tr>

				<td valign="middle" align="left">Medical allowance</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->MedicalAllowance_1 + @$income_salaries_model->MedicalAllowanceForDisability_1 + @$income_salaries_model->Surgery_HEKLC_1; ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->MedicalAllowance_2 + @$income_salaries_model->MedicalAllowanceForDisability_2 + @$income_salaries_model->Surgery_HEKLC_2; ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->MedicalAllowance + @$income_salaries_model->MedicalAllowanceForDisability + @$income_salaries_model->Surgery_HEKLC; ?></td>

			</tr>

			<tr>

				<td valign="middle" align="left">Servant allowance</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->ServantAllowance ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->ServantAllowance ?></td>

			</tr>

			<tr>

				<td valign="middle" align="left">Leave allowance</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->LeaveAllowance ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->LeaveAllowance ?></td>

			</tr>

			<tr>

				<td valign="middle" align="left">Honorarium / Reward/ Fee</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->HonorariumOrReward ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->HonorariumOrReward ?></td>

			</tr>

			<tr>

				<td valign="middle" align="left">Overtime allowance</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->OvertimeAllowance ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->OvertimeAllowance ?></td>

			</tr>

			<tr>

				<td valign="middle" align="left">Bonus / Ex-gratia</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->Bonus ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->Bonus ?></td>

			</tr>

			<tr>

				<td valign="middle" align="left">Other allowances</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->OtherAllowances ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->OtherAllowances ?></td>

			</tr>

			<tr>

				<td valign="middle" align="left" style="font-size:12px;">Employers contribution to Recognized Provident Fund</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->EmployersContributionProvidentFund ?></td>

				<td valign="middle" align="right"></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->EmployersContributionProvidentFund ?></td>

			</tr>

			<tr>

				<td valign="middle" align="left" style="font-size:12px;">Interest accrued on Recognized Provident Fund</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->InterestAccruedProvidentFund_1; ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->InterestAccruedProvidentFund_2; ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->InterestAccruedProvidentFund; ?></td>

			</tr>

			<tr>

				<td valign="middle" align="left">Deemed income for transport facility </td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->DeemedIncomeTransport ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->DeemedIncomeTransport ?></td>

			</tr>

			<tr>

				<td valign="middle" align="left" style="font-size:11px;">Deemed income for free furnished/unfurnished accommodation</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->DeemedFreeAccommodation ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->DeemedFreeAccommodation ?></td>

			</tr>

			<tr>

				<td valign="middle" align="left">Gratuity Income</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->Gratuity_1 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->Gratuity_2 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->Gratuity ?></td>

			</tr>

			<tr>

				<td valign="middle" align="left" style="font-size:11px;">Income From Workers Profit Participation Fund</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->WorkersProfitParticipationFund_1 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->WorkersProfitParticipationFund_2 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->WorkersProfitParticipationFund ?></td>

			</tr>

			<tr>

				<td valign="middle" align="left">Pension</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->Pension_1 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->Pension_2 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->Pension ?></td>

			</tr>

			<tr>

				<td valign="middle" align="left" style="font-size:11px;">Income Received from Recognized Provident Fund and Recognized Super Annuation Fund</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->RecognizedProvidentFundIncome_1 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->RecognizedProvidentFundIncome_2 ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->RecognizedProvidentFundIncome ?></td>

			</tr>

			<tr>

				<td valign="middle" align="left">Other, if any (give detail) </td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->Others ?></td>

				<td valign="middle" align="right">0&nbsp;</td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->Others ?></td>

			</tr>

			<tr>

				<td valign="middle" align="center"><strong>Net taxable income from salary</strong></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->NetSalaryIncome ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->NetTaxWaiver ?></td>

				<td valign="middle" align="right"><?php echo @$income_salaries_model->NetTaxableIncome ?></td>

			</tr>

		</tbody></table>