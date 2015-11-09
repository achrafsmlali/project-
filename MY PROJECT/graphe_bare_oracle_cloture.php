<?php
 //conction to database 
 include('mysql_db_connect.php') ;
 // Execute the query (the recordset $rs contains the result)
 $req="SELECT Count(`Numéro`) AS CompteDeNuméro, `Affectation`,  AVG(`duree`)AS 'Durrée Avant cloture' FROM `table 1`WHERE ((`État` Like 'closed') AND (`Brève description` Like '%oracl%' Or `Brève description` Like '%gmao%')) OR ((`État` Like 'closed') AND (`Brève description` Like '% AP %' Or `Brève description` Like '% FA %' Or `Brève description` Like '% GTA %')) OR ((`État` Like 'closed') AND (`Brève description` Like '%GPAO%' Or `Brève description` Like '% INV %' Or `Brève description` Like '% PO %' Or `Brève description` Like '% AR %')) OR ((`État` Like 'closed') AND (`Brève description` Like '% EAM %'))GROUP BY `Affectation`";
 $result=mysql_query($req)or die(mysql_error());
 
 $Affectation[]=array();
 $CompteDeNuméro[]=array();
 $duree[]=array();
  $i=0;
  while($row=mysql_fetch_assoc($result)){
   
   $Affectation[$i]=$row['Affectation'];
     $CompteDeNuméro[$i]=$row['CompteDeNuméro'];
   $duree[$i]=$row['Durrée Avant cloture'];
   $i=$i+1;
    }
    
 ?>
 
 <!doctype html>
<html>
 <head>
  <meta  charset="utf-8 " /> 
		<title>graphe_bare_oracle_cloture</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="js/script.js"></script>
     <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/Chart.js"></script>
 </head>
 <style>
.canvas{with:50%;background-color:#fff;}
 body{background-image: url(images/11.jpg);
  background-position: center;}
  #cssmenu{with:90%;margin-left:5%;margin-right:5%;}
  
 </style>
 
 
 
 <body>
 <div style="width:100%;margin-left:5%;">
	
			<img width="90%" src="images/Group-1.png"/><br><br>
	</div>
	<div class="lala">
		
		<div id='cssmenu'>
			<ul>
			   <li class='active'><a href='index.php'><span><span class="glyphicon glyphicon-home" aria-hidden="true"></span></span></a></li>
			   <li class='has-sub'><a href='#'><span><span class="glyphicon glyphicon-tag" aria-hidden="true"></span></a>
				  <ul>
					<a href='oracle_opm.php'><li><center><span>Tickets Oracle OPM </span></li></a>
					 <a href='oracle_opm_ouvert.php'><li><center><span>Tickets Oracle OPM ouvert</span><center></li></a>
					 <?php echo utf8_encode("<a href='oracle_opm_cloture.php'><li><center><span>Tickets Oracle OM cloturé</span><center></li></a>");?>
					 <a href='oracle_ouvert.php'><li><center><span>Tickets Oracle ouvert</span><center></li></a>
					 <?php echo utf8_encode("<a href='oracle_cloture.php'><li><center><span>Tickets Oracle cloturé</span><center></li></a>");?>
					 <a href='opm_ouvert.php'><li><center><span>Tickets OPM ouvert</span><center></li></a>
					 
					  <?php echo utf8_encode("<a href='opm_cloture.php'><li class='last'><center><span>Tickets OM cloturé</span><center></li></a>");?>
				  </ul>
			   </li>
			   <li class='has-sub'><a href='#'><span><img  height="18px"src="images/charts-combo-icon.png"/></span></a>
				  <ul>
					 <li><a href='graphe_bare_oracle_ouvert.php'><span>Tickets Oracle ouvert</span></a></li>
					 <?php echo utf8_encode("<li><a href='graphe_bare_oracle_cloture.php'><span>Tickets Oracle cloturé</span></a></li>");?>
					 <li><a href='graphe_bare_opm_ouvert.php'><span>Tickets OPM ouvert</span></a></li>
					 <?php echo utf8_encode("<li class='last'><a href='graphe_bare_opm_cloture.php'><span>Tickets OPM cloturé</span></a></li>");?>
				  </ul>
			   
			   </li>
			   <li class='has-sub'><a href='#'><span><img  height="18px"src="images/pie-chart-4.png"/></span></a>
				  <ul>
					 <li><a href='graphe_pie_oracle_ouvert.php'><span>Tickets Oracle ouvert</span></a></li>
					 <?php echo utf8_encode("<li><a href='graphe_pie_oracle_cloture.php'><span>Tickets Oracle cloturé</span></a></li>");?>
					 <li><a href='graphe_pie_opm_ouvert.php'><span>Tickets OPM ouvert</span></a></li>
					 <?php echo utf8_encode("<li class='last'><a href='graphe_pie_opm_cloture.php'><span>Tickets OPM cloturé</span></a></li>");?>
				  </ul>
			   
			   </li>
			   <li class='has-sub'><a href='#'><span><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
				  <ul>
					 <li><a href='pdf_oracle_opm.php'><span>Tickets Oracle OPM </span></a></li>
					 <li><a href='pdf_oracle_opm_ouvert.php'><span>Tickets Oracle OPM ouvert</span></a></li>
					 <?php echo utf8_encode("<li><a href='pdf_oracle_opm_cloture.php'><span>Tickets Oracle OPM cloturé</span></a></li>");?>
					 <li><a href='pdf_oracle_ouvert.php'><span>Tickets Oracle ouvert</span></a></li>
					 <?php echo utf8_encode("<li><a href='pdf_oracle_cloture.php'><span>Tickets Oracle cloturé</span></a></li>");?>
					 <li><a href='pdf_opm_ouvert.php'><span>Tickets OPM ouvert</span></a></li>
					 
					  <?php echo utf8_encode("<li class='last'><a href='pdf_opm_cloture.php'><span>Tickets OPM cloturé</span></a></li>");?>
				  </ul>
			   
			   </li>
			</ul>
		</div>
		
		<?php echo utf8_encode("<h1 style='text-align:center;'>graphe des Tickets Oracle cloturé</h1>");?>
	<div  style="background-color:#fff;width:90%;margin:auto;border: 1px solid #46BCFF;">
	  <div style="width: 70%;margin:auto;">
	   <canvas id="canvas" height="450" width="600"></canvas>
	  </div>
	</div>
</div>
<div style="width:100%;margin:auto;height:50px;background-color:#5CFFFF;margin-top:50px; opacity: 0.3;">
<?php echo utf8_encode("<center><p style='font-size:18px;'>Copyright © 2015 OCP S.I All rights reserved.</p><center>");?>
</div>


 <script>
 var tab1 = <?php echo json_encode($Affectation); ?>;
  var tab2 = <?php echo json_encode($CompteDeNuméro); ?>;
  var tab3 = <?php echo json_encode($duree); ?>;
  
 var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

 var barChartData = {
  labels : tab1,
  datasets : [
   {


    fillColor : "rgba(220,220,220,0.5)",
    strokeColor : "rgba(220,220,220,0.8)",
    highlightFill: "rgba(220,220,220,0.75)",
    highlightStroke: "rgba(220,220,220,1)",
    data : tab3,
   }
   
  ]

 }
 
 
 window.onload = function(){
  var ctx = document.getElementById("canvas").getContext("2d");
  window.myBar = new Chart(ctx).Bar(barChartData, {
   responsive : true
  });
 }
 

 </script>
 
 </body>
</html>