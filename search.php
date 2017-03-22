<?php
session_start();
?>
<?php
require 'config/config.php';
$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT * FROM instimaps");
$stmt->execute();
$places= array();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  array_push($places,$row["locname"]);
}
//get the q parameter from URL
$q=$_GET["q"];
$_SESSION["string"]=$q;
$hint = "";
$stlen=strlen($q);
$id=1;
//lookup all links from the xml file if length of q>0
if ($stlen<3){
	$response="Minimum number of character is 3";
  echo "<ul><li id='xml-1' class='xml2 xml1'>".$response."</li></ul>";
}
else {
  $q=strtolower($q);
  $len= strlen($q);
  for($i=0;$i< sizeof($places);$i++){
	$places_0[$i]= strtolower($places[$i]);
      if (stristr($places_0[$i],$q)){
        if ($hint==="") {
          $hint="<li id='".$id."' name='xml' onclick='road(this); submit();' class='xml1'>" .$places[$i]. "</li>";
        } else {
          $hint=$hint . "<li id='".$id."' name='xml' onclick='road(this); submit();' class='xml1'>" . $places[$i] . "</li>";
        }
				$id++;
      }
	}
}

// Set output to "no suggestion" if no hint was found
// or to the correct values

if ($hint=="" && strlen($q)>=3) {
  $response="no suggestions";
  echo "<ul><li id='xml0' class='xml2 xml1'>".$response."</li></ul>";
}
else {
	$id--;
  $hint .= "<li name='counter' id='counter' style='display:none'>".$id."</li>";
	$response=$hint;
  echo "<ul>".$response."</ul>";
}
?>
