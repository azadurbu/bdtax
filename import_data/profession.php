<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	
	try {
		$con = new PDO('mysql:dbname=ncbetane_bdtax;hostname=192.168.3.17;charset=utf8', 'ncbetane_bdtax', 'ncbetane_bdtax');
	} catch(PDOException $e) {
		die("Could not connect to server. " . $e -> getMessage());
	}


	include 'simple-xlsx/simplexlsx.class.php';
	$xlsx = new SimpleXLSX("profession.xlsx");

	list($num_cols, $num_rows) = $xlsx -> dimension();



	$data = [];
	$tmp_country = "";
	$i=0;
	$isFirst = true;

	$query = "INSERT INTO `tax_zone_circle` (`TypeOfIncomeId`, `SubCatIncomeId`, `EmployerName`, `CircleCode`, `CircleName`, `ZoneName`, `CircleAddress`) VALUES (:d, :d1, :d2, :d3, :d4, :d5, :d6)";
	$statement = $con -> prepare($query);

	$sheet = 5;

	foreach ($xlsx->rows($sheet) as $arr) {
		if ($isFirst) {
			$isFirst = false;
			continue;
		}
		$data = [];
		$data['d'] = 2; //MAIN TYPE
		$data['d1'] = 16;  //SUB CATEGORY
		$data['d2'] = trim($arr[0]);
		$data['d3'] = str_pad(trim($arr[1]), 3, '0', STR_PAD_LEFT);
		$data['d4'] = trim($arr[2]);
		$data['d5'] = trim($arr[3]);
		$data['d6'] = trim($arr[4]);
		
echo "<pre>";
print_r($data);
echo "</pre>";
/*
		if ($statement -> execute($data)) {
		echo "<br>" . $data['d2']." | ".$data['d3']." | ".$data['d4']." | ".$data['d5']." | ".$data['d6'] . " -- <b style='color:green;'>Inserted successfully</b>";
		} else {
			$err = $statement->errorInfo();
			echo "<br><b style='color:red;'>" . $data['d2']." | ".$data['d3']." | ".$data['d4']." | ".$data['d5']." | ".$data['d6'] . " -- FAILED TO INSERT. ERROR: ".$err[2]."</body>b>";
		}	*/
	}


?>
</body>
</html>
