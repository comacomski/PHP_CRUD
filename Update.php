<?php
require_once("Include/DB.php");
$SearchQueryParametar=$_GET["id"];
if(isset($_POST["Submit"])){

		$EName=$_POST["EName"];
		$SSN=$_POST["SSN"];
		$Dept=$_POST["Dept"];
		$Salary=$_POST["Salary"];
		$HomeAddress=$_POST["HomeAddress"];
		$sql="UPDATE emp_record SET ename='$EName', ssn='$SSN', dept='$Dept',salary='$Salary',homeadress='$HomeAddress' WHERE id='$SearchQueryParametar' ";
		$stmt= $ConnectingDB->prepare($sql);
	/*	$stmt->bindValue('eName',$EName);
		$stmt->bindValue('ssN',$SSN);
		$stmt->bindValue('depT',$Dept);
		$stmt->bindValue('salarY',$Salary);
		$stmt->bindValue('homeadresS',$HomeAddress); */
		$Execute=$stmt->execute();
		if($Execute){
			echo '<script>window.open("View_From_DB.php?id=Record Updated Successfully","_self")</script>';
		}
	

}
?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>UPDATE Data into Database</title>
  <meta name="description" content="description">
  <meta name="author" content="Mico Antonic">

  <link rel="stylesheet" href="Include/style.css">

</head>

<body>
<?php
$sql="SELECT * FROM emp_record WHERE id='$SearchQueryParametar'";
$stmt=$ConnectingDB->query($sql);
while($DataRows=$stmt->fetch()){
    $ID=$DataRows['id'];
        $EName=$DataRows['ename'];
        $SSN=$DataRows['ssn'];
        $Department=$DataRows['dept'];
        $Salary=$DataRows['salary'];
        $HomeAddress=$DataRows['homeadress'];
}
?>
<div>
	<form class="" action="Update.php?id=<?php echo $SearchQueryParametar; ?>" method="post">
		<fieldset>
			<span class="FieldInfo">Employee Name:</span>
			<br>
			<input type="text" name="EName" value="<?php echo $EName ?>">
			<br>
			<span class="FieldInfo">Social Security Number:</span>
			<br>
			<input type="text" name="SSN" value="<?php echo $SSN ?>">
			<br>
			<span class="FieldInfo">Department:</span>
			<br>
			<input type="text" name="Dept" value="<?php echo $Department ?>">
			<br>
			<span class="FieldInfo">Salary:</span>
			<br>
			<input type="text" name="Salary" value="<?php echo $Salary ?>">
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