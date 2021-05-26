<?php
require_once("Include/DB.php");
if(isset($_POST["Submit"])){
	if(!empty($_POST["EName"]) && !empty($_POST["SSN"])){
		$EName=$_POST["EName"];
		$SSN=$_POST["SSN"];
		$Dept=$_POST["Dept"];
		$Salary=$_POST["Salary"];
		$HomeAddress=$_POST["HomeAddress"];
		$sql="INSERT INTO emp_record(ename,ssn,dept,salary,homeadress)
		VALUES(:eName,:ssN,:depT,:salarY,:homeadresS)";
		$stmt= $ConnectingDB->prepare($sql);
		$stmt->bindValue('eName',$EName);
		$stmt->bindValue('ssN',$SSN);
		$stmt->bindValue('depT',$Dept);
		$stmt->bindValue('salarY',$Salary);
		$stmt->bindValue('homeadresS',$HomeAddress);
		$Execute=$stmt->execute();
		if($Execute){
			echo "<span class='success'>Record has been added sucssefully</span>";
		}
	}
	else{
		echo "<span class='FieldInfoHeading'>Please add Name and SSN!</span>";
	}

}
?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Insert Data into Database</title>
  <meta name="description" content="description">
  <meta name="author" content="Mico Antonic">

  <link rel="stylesheet" href="Include/style.css">

</head>

<body>
<div>
	<form class="" action="Insert_into_DB.php" method="post">
		<fieldset>
			<span class="FieldInfo">Employee Name:</span>
			<br>
			<input type="text" name="EName" value="">
			<br>
			<span class="FieldInfo">Social Security Number:</span>
			<br>
			<input type="text" name="SSN" value="">
			<br>
			<span class="FieldInfo">Department:</span>
			<br>
			<input type="text" name="Dept" value="">
			<br>
			<span class="FieldInfo">Salary:</span>
			<br>
			<input type="text" name="Salary" value="">
			<br>
			<span class="FieldInfo">Home Address:</span>
			<br>
			<textarea name="HomeAddress" rows="8" cols="80"></textarea>
			<br>
			<input type="submit" name="Submit" value="Submit your record">
		</fieldset>
	</form>
</div>
</body>
</html>