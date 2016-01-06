<?php
if (isset($_GET["search2"]) && !empty($_GET["search2"])){
	require 'config/config.php';
	$data= $_GET["search2"];
	try{
		$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
	$stmt = $conn->prepare("SELECT * FROM instimaps WHERE locname=:data");
	$stmt->bindParam(':data', $data);
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo "<td>". $row['lat'] ."</td>";
		echo "<td>". $row['lng'] ."</td>";
		echo "<td>". $row['locname'] ."</td>";
		echo "<td>". $row['locdescrip'] ."</td>";
		echo "<td>". $row['depname'] ."</td>";
	}
}
?>
