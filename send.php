<?php
require('dbconfig.php');
//$no=$_POST['no'];
$setno=$_POST['setno'];
$sqlData=0;
if ($db) {

	for($i=0;$i<50;$i++){
		$sqlData=$setno[$i];
		$no=$i+1;
		echo $sqlData ;
		echo " ";
		$sql = "insert into gamecycle (no, setno) values (?,?)";
		$stmt = mysqli_prepare($db, $sql); //prepare sql statement
		mysqli_stmt_bind_param($stmt, "ii", $no, $sqlData); //bind parameters with variables
		mysqli_stmt_execute($stmt);  //執行SQL
	}


	
	echo "已新增";
	echo "</br><a href='50th.php'>返回</a>";
} else {
	echo "empty title, cannot insert.";
}
?>


