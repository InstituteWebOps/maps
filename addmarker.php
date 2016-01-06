<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require 'config/config.php';
$q=$_GET["q"];
try{
	$conn=new PDO("mysql:host=$host;dbname=$db",$user,$pwd);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	echo "Connection failed: ". $e->getMessage();
}
$stmt = $conn->prepare("SELECT * FROM instimaps JOIN category ON category.cat_id=instimaps.cat_id WHERE category.category=:q");
$stmt->bindParam(':q',$q);
$stmt->execute();
$outp = "[";
while($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
    	if ($outp != "[") {$outp .= ",";}
		$outp .= '{"room":"'  . $rs["locname"] . '",';
		$outp .= '"dept":"'   . $rs["depname"] . '",';
		$outp .= '"location":"'. $rs["locdescrip"] . '",';
		$outp .= '"lat":"'    . $rs["lat"] . '",';
		$outp .= '"lng":"'    . $rs["lng"] . '"}';
}
$outp .="]";


echo($outp);
?>
