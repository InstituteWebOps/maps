<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Institute map</title>
    <link href="css/font-awesome.min.css" rel="stylesheet" type="tex/css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="css/map.css" rel="stylesheet" type="text/css">
    <link href="images/logo.png" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?AIzaSyANpptUZHCGiIj3xSKm5ugkJqRohNIJD6w"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="js/index.js" type="text/javascript"></script>
	</head>
  <body>
    <div class="wrapper">
      <div class="col-md-10 col-sm-8 hidden-xs maphead">
      <a href='#'>IITM Institute Map</a>
    </div>
      <div class="searchform col-md-10 col-sm-10 col-xs-10 col-lg-10 col-xs-offset-2 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
     	<form name="form_name" id="fname" onsubmit="return locdata();">
            <input type="text" list="sugg" name="search2" id="search1" class="box col-md-6 col-sm-6 col-xs-6 col-lg-6 col-md-offset-4 col-sm-offset-4 col-xs-offset-2 col-lg-offset-4" onkeyup="showResult(this.value,event); road_1();" autocomplete="off">
            <button class="btn btn-primary" onclick="locdata();"><i id="btn" class='fa fa-search'></i></button>
            <br><div id="livesearch" class=" col-md-offset-4 col-sm-offset-4 col-xs-offset-2 col-lg-offset-4 col-md-6 col-sm-6 col-xs-6 col-lg-6" ></div>
        </form>
	  </div>
	  
	  
	  <div id="checkboxes" style="z-index:10000000;left:10px;bottom:45px;position:fixed;background:white;font-size:110%;">
		<ul>
			<li><input type="checkbox" id="places" onclick="onchangecheckbox(this)">Places To Eat</li>
			<li><input type="checkbox" id="hostels" onclick="onchangecheckbox1(this)">Hostels</li>
			<li><input type="checkbox" id="impplaces" onclick="onchangecheckbox2(this)">Important places</li>
		</ul>
	  </div>
	  
	  
	  
      <div id="googleMap" class="col-md-12 col-sm-12 col-xs-12 col-lg-12" style="width: 100%; height: 100%; " class="col-md-offset-4">
      </div>
        <div style="display:none;">
          <table class="table table-striped table-bordered" style="margin-top:50px;" id="myTable">
            <tr>
              <th>lat</th>
              <th>lng</th>
              <th>locname</th>
              <th>locdescrip</th>
              <th>depname</th>
            </tr>
						<tr id='printing'></tr> 
        	</table>
        </div>
      </div>
     <p id="bottom">Institute Webops</p>
		</body>
</html>
