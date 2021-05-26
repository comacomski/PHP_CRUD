<?php
require_once("Include/DB.php");



?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>View Data from Database</title>
  <meta name="description" content="description">
  <meta name="author" content="Mico Antonic">

  <link rel="stylesheet" href="Include/style.css">

</head>

<body>
    <h2 class="success"><?php echo @$_GET["id"]; ?></h2>
    <div>
        <fieldset>
            <form method="GET">
                <input type="text" name="Search" value="" placeholder="Search by name and ssn">
                <input type="submit" name="SearchButton" value="Search record">
            </form>
        </fieldset>
    </div>
    
    <?php
    if(isset($_GET["SearchButton"])){
        $Search=$_GET["Search"];
        if(!empty($Search)){
        ?>
        <table width="1000" align="center" border="1">
                <caption>Search results</caption>
                <th>ID</th>
                <th>Name</th>
                <th>SSN</th>
                <th>Department</th>
                <th>Salary</th>
                <th>Home address</th>
                <th>Update</th>
        <?php
        }
        $sql="SELECT * FROM emp_record WHERE ename=:searcH OR ssn=:searcH";
        $stmt =$ConnectingDB->prepare($sql);
        $stmt->bindValue(':searcH',$Search);
        $stmt->execute();
        while($DataRows=$stmt->fetch()){
            $ID=$DataRows['id'];
            $EName=$DataRows['ename'];
            $SSN=$DataRows['ssn'];
            $Department=$DataRows['dept'];
            $Salary=$DataRows['salary'];
            $HomeAddress=$DataRows['homeadress'];
            ?>
                <tr>
                <td><?php echo $ID; ?></td>
                <td><?php echo $EName; ?></td>
                <td><?php echo $SSN; ?></td>
                <td><?php echo $Department; ?></td>
                <td><?php echo $Salary; ?></td>
                <td><?php echo $HomeAddress; ?></td>
                <td><a href="Update.php?id=<?php echo $ID ?>">Update</a></td>
                </tr>

            <?php
        }
        ?>
        </table>
        <?php
    }
    ?>
    
    <table width="1000" align="center" border="1">
        <caption>Info from DB:</caption>
        <th>ID</th>
        <th>Name</th>
        <th>SSN</th>
        <th>Department</th>
        <th>Salary</th>
        <th>Home address</th>
        <th>Update</th> 
        <th>Delete</th>   

        <?php
        $sql="SELECT * FROM emp_record";
        $stmt=$ConnectingDB->query($sql);
        while($DataRows=$stmt->fetch()){
            $ID=$DataRows['id'];
            $EName=$DataRows['ename'];
            $SSN=$DataRows['ssn'];
            $Department=$DataRows['dept'];
            $Salary=$DataRows['salary'];
            $HomeAddress=$DataRows['homeadress'];
        ?>
        <tr>
            <td><?php echo $ID; ?></td>
            <td><?php echo $EName; ?></td>
            <td><?php echo $SSN; ?></td>
            <td><?php echo $Department; ?></td>
            <td><?php echo $Salary; ?></td>
            <td><?php echo $HomeAddress; ?></td>
            <td><a href="Update.php?id=<?php echo $ID ?>">Update</a></td>
            <td><a href="Delete.php?id=<?php echo $ID ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>