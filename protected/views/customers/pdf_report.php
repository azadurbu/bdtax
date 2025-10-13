<style type="text/css" media="print">
      * {
        font-family:"Times New Roman";
        font-size: 14px;
      }
      body {
        font-weight:bold;
        font-size:13px!important;
        font-family:"Times New Roman";
      }
table td, table th{padding: 0px important;font-weight:bold;font-size:14px;vertical-align: top;}
table td{padding: 5px;}
h2{font-size: 16px;font-weight:bold;}
</style>
<h2 style="margin-left:100px;">Statement regarding filing of return of employees</h2>
                    <h2 style="margin-left:230px;">Under section 108A of</h2>
                    <h2 style="margin-left:100px;">The Income Tax Ordinance, 1984 (XXXVI of 1984)</h2>

Statement for Financial Year: <?php echo $tax_year;?> <br/>
Name of the Employer: <?php echo $model->organization_name;?> <br/>
TIN: <?php echo $this->_decode($model->etin);?><br/>
Address: <?php echo $model->address_line1;?>,<?php echo $model->address_line2;?><br/><br/>


<table  cellspacing='0' style='width:1000px;border:1px solid #000'><tr>
<td style='border:1px solid #000'>Sl. No.</td>
<td style='border:1px solid #000'>Name of the employee</td>
<td style='border:1px solid #000'>Designation</td>
<td style='border:1px solid #000'>Twelve- digit Taxpayer's Identification Number</td>
<td style='border:1px solid #000'>Taxes Circle, Taxes Zone/Unit</td>
<td style='border:1px solid #000'>Date of filing of the return of income</td>
<td style='border:1px solid #000'>The serial number provided by the Income-tax authority upon filing of the return</td>

<td style='border:1px solid #000'>Re-marks</td></tr>
<?php 
$count = 1;
 $id = 0;
 foreach($listuser as $u){?>
  <tr>
    <td style='border:1px solid #000;font-weight: normal;'><?php echo $count++; ?></td>
    <td style='border:1px solid #000;font-weight: normal;'><?php echo $u['Name']; ?></td>
    <td style='border:1px solid #000;font-weight: normal;'><?php echo $u['designation']; ?></td>
    <td style='border:1px solid #000;font-weight: normal;'><?php echo $this->_decode($u['ETIN']); ?></td>
    <td style='border:1px solid #000;font-weight: normal;'><?php echo $u['TaxesCircle']; ?>, <?php echo $u['TaxesZone']; ?></td>
    <td style='border:1px solid #000;font-weight: normal;'><?php echo $u['date_uploaded']; ?></td>
    <td style='border:1px solid #000;font-weight: normal;'><?php echo $u['serial_number']; ?></td>
    <td style='border:1px solid #000;font-weight: normal;'></td>
  </tr>
<?php } ?>
</table><br/>
<table>
  <tr>
    <td style="font-weight: normal;">
      I Certify that –<br/>
      (a) The above statement contains a complete list of employees and their particulars about their filing of the return of income;<br/>
      (b) The particulars above are correct and complete.
    </td>
  </tr>
</table>
<br/><br/><br/>
<table>
<tr>
<td style="padding-left:400px;font-weight: normal;">
Signature & Seal <br/>
Name<br/>
Designation <br/>
Date of Signature<br/>
</td>
</tr>
</table>