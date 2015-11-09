<?php
 //conction to database 
 include('mysql_db_connect.php') ;
 // Execute the query (the recordset $rs contains the result)
 $req="SELECT Count(`Num�ro`) AS CompteDeNum�ro, `Affectation`,AVG(`duree`)AS 'Durr�e Avant cloture' FROM `table 1`WHERE ((`�tat` Like 'closed') AND (`Br�ve description` Like '%opm%' Or `Br�ve description` Like '%saisi%' Or `Br�ve description` Like '%firewal%' Or `Br�ve description` Like '%instrumen%' Or `Br�ve description` Like '%tonnage%')) OR (((�tat) Like 'closed') AND (`Br�ve description` Like '%formule%' Or `Br�ve description` Like '%bascule%' Or `Br�ve description` Like '%opm%')) OR ((`�tat` Like 'closed') AND (`Br�ve description` Like '%�talonnage%' Or `Br�ve description` Like '%compteur%' Or `Br�ve description` Like '%remont�e%')) OR ((`�tat` Like 'closed') AND (`Br�ve description` Like '%d�bim�tre%' Or `Br�ve description` Like '%automate%' Or `Br�ve description` Like '% tag %')) OR ((`�tat` Like 'closed') AND (`Br�ve description` Like '%capteur%' Or `Br�ve description` Like '%for�age%')) OR ((`�tat` Like 'closed') AND (`Br�ve description` Like '%�cart%' Or `Br�ve description` Like '%coefficient%')) OR ((`�tat` Like 'closed') AND (`Br�ve description` Like 'formation%' Or `Br�ve description` Like '%instrument%' Or `Br�ve description` Like '%rapport%')) OR ((`�tat` Like 'closed') AND (`Br�ve description` Like '%opc%' Or `Br�ve description` Like '%NACHA%' Or `Br�ve description` Like '%NAEPI%' Or `Br�ve description` Like '%NALAV%' Or `Br�ve description` Like '%NACA%' Or `Br�ve description` Like 'NAC%' Or `Br�ve description` Like 'NASE%' Or `Br�ve description` Like '%NAGEF%' Or `Br�ve description` Like '%NAGEFL%' Or `Br�ve description` Like '% PB-GA%')) OR ((`�tat` Like 'closed') AND (`Br�ve description` Like '%export%' And `Br�ve description` Like '%pdf%')) GROUP BY `Affectation` ORDER BY Count(`Num�ro`)";
 $result=mysql_query($req)or die(mysql_error());
 
 $Affectation[]=array();
 $CompteDeNum�ro[]=array();
 $duree[]=array();
  $i=0;
  while($row=mysql_fetch_assoc($result)){
   
   $Affectation[$i]=$row['Affectation'];
     $CompteDeNum�ro[$i]=$row['CompteDeNum�ro'];
   $duree[$i]=$row['Durr�e Avant cloture'];
   $i=$i+1;
    }
    
 ?>
 
 <!doctype html>
<html>
 <head>
  <meta  charset="utf-8 " /> 
		<title>graphe_bar_opm_cloture</title>
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
					 <?php echo utf8_encode("<a href='oracle_opm_cloture.php'><li><center><span>Tickets Oracle OM clotur�</span><center></li></a>");?>
					 <a href='oracle_ouvert.php'><li><center><span>Tickets Oracle ouvert</span><center></li></a>
					 <?php echo utf8_encode("<a href='oracle_cloture.php'><li><center><span>Tickets Oracle clotur�</span><center></li></a>");?>
					 <a href='opm_ouvert.php'><li><center><span>Tickets OPM ouvert</span><center></li></a>
					 
					  <?php echo utf8_encode("<a href='opm_cloture.php'><li class='last'><center><span>Tickets OM clotur�</span><center></li></a>");?>
				  </ul>
			   </li>
			   <li class='has-sub'><a href='#'><span><img  height="18px"src="images/charts-combo-icon.png"/></span></a>
				  <ul>
					 <li><a href='graphe_bare_oracle_ouvert.php'><span>Tickets Oracle ouvert</span></a></li>
					 <?php echo utf8_encode("<li><a href='graphe_bare_oracle_cloture.php'><span>Tickets Oracle clotur�</span></a></li>");?>
					 <li><a href='graphe_bare_opm_ouvert.php'><span>Tickets OPM ouvert</span></a></li>
					 <?php echo utf8_encode("<li class='last'><a href='graphe_bare_opm_cloture.php'><span>Tickets OPM clotur�</span></a></li>");?>
				  </ul>
			   
			   </li>
			   <li class='has-sub'><a href='#'><span><img  height="18px"src="images/pie-chart-4.png"/></span></a>
				  <ul>
					 <li><a href='graphe_pie_oracle_ouvert.php'><span>Tickets Oracle ouvert</span></a></li>
					 <?php echo utf8_encode("<li><a href='graphe_pie_oracle_cloture.php'><span>Tickets Oracle clotur�</span></a></li>");?>
					 <li><a href='graphe_pie_opm_ouvert.php'><span>Tickets OPM ouvert</span></a></li>
					 <?php echo utf8_encode("<li class='last'><a href='graphe_pie_opm_cloture.php'><span>Tickets OPM clotur�</span></a></li>");?>
				  </ul>
			   
			   </li>
			  <li class='has-sub'><a href='#'><span><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
				  <ul>
					 <li><a href='pdf_oracle_opm.php'><span>Tickets Oracle OPM </span></a></li>
					 <li><a href='pdf_oracle_opm_ouvert.php'><span>Tickets Oracle OPM ouvert</span></a></li>
					 <?php echo utf8_encode("<li><a href='pdf_oracle_opm_cloture.php'><span>Tickets Oracle OPM clotur�</span></a></li>");?>
					 <li><a href='pdf_oracle_ouvert.php'><span>Tickets Oracle ouvert</span></a></li>
					 <?php echo utf8_encode("<li><a href='pdf_oracle_cloture.php'><span>Tickets Oracle clotur�</span></a></li>");?>
					 <li><a href='pdf_opm_ouvert.php'><span>Tickets OPM ouvert</span></a></li>
					 
					  <?php echo utf8_encode("<li class='last'><a href='pdf_opm_cloture.php'><span>Tickets OPM clotur�</span></a></li>");?>
				  </ul>
			   
			   </li>
			</ul>
		</div>
		
		<?php echo utf8_encode("<h1 style='text-align:center;'>graphe des Tickets OPM clotur�</h1>");?>
	<div  style="background-color:#fff;width:90%;margin:auto;border: 1px solid #46BCFF;">
	  <div style="width: 70%;margin:auto;">
	   <canvas id="canvas" height="450" width="600"></canvas>
	  </div>
	</div>
</div>
<div style="width:100%;margin:auto;height:50px;background-color:#5CFFFF;margin-top:50px; opacity: 0.3;">
<?php echo utf8_encode("<center><p style='font-size:18px;'>Copyright � 2015 OCP S.I All rights reserved.</p><center>");?>
</div>


 <script>
 var tab1 = <?php echo json_encode($Affectation); ?>;
  var tab2 = <?php echo json_encode($CompteDeNum�ro); ?>;
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