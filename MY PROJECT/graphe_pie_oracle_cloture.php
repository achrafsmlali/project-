<?php
	//conction to database 
	include('mysql_db_connect.php')	;
	// Execute the query (the recordset $rs contains the result)
	$req="SELECT Count(`Num�ro`) AS CompteDeNum�ro, `Affectation`,  AVG(`duree`)AS 'Durr�e Avant cloture' FROM `table 1`WHERE ((`�tat` Like 'closed') AND (`Br�ve description` Like '%oracl%' Or `Br�ve description` Like '%gmao%')) OR ((`�tat` Like 'closed') AND (`Br�ve description` Like '% AP %' Or `Br�ve description` Like '% FA %' Or `Br�ve description` Like '% GTA %')) OR ((`�tat` Like 'closed') AND (`Br�ve description` Like '%GPAO%' Or `Br�ve description` Like '% INV %' Or `Br�ve description` Like '% PO %' Or `Br�ve description` Like '% AR %')) OR ((`�tat` Like 'closed') AND (`Br�ve description` Like '% EAM %'))GROUP BY `Affectation`";
	$result=mysql_query($req)or die(mysql_error());
	
	$Affectation[]=array();
	$CompteDeNum�ro[]=array();
		$i=0;
		while($row=mysql_fetch_assoc($result)){
			
			$Affectation[$i]=$row['Affectation'];
	  		$CompteDeNum�ro[$i]=$row['CompteDeNum�ro'];
			$i=$i+1;
				}
				
	
	?>


<html>
	<head>
		<title>graphe_pie_oracle_cloture</title>
		<script src="src/Chart.Core.js"></script>
		<script src="src/Chart.Doughnut.js"></script>
		<meta charset='utf-8'>
		     <link href="css/bootstrap.min.css" rel="stylesheet">

   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
		<style>
			body{
				padding: 0;
				margin: 0;
			}
			#canvas-holder{
				width:70%;margin:auto;

			}
			.canvas{with:70%;background-color:#fff;}
			body{background-image: url(images/11.jpg);
				background-position: center;}
			#cssmenu{with:90%;margin-left:5%;margin-right:5%;}
		</style>
	</head>
	<body>
	<div style="width:100%;margin-left:5%;">
	
			<img width="90%" src="images/Group-1.png"/><br><br>
	</div>
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
	<?php echo utf8_encode("<h1 style='text-align:center;'>graphe d'affectation Tickets Oracle clotur�</h1>");?>
		<div  style="background-color:#fff;width:90%;margin:auto;border: 1px solid #46BCFF;">
	  <div style="width: 50%;margin:auto;">
		<div id="canvas-holder">
			<canvas id="chart-area" width="500" height="500"/>
		</div>
		</div>
		</div>
<div style="width:100%;margin:auto;height:50px;background-color:#5CFFFF;margin-top:50px; opacity: 0.3;">
<?php echo utf8_encode("<center><p style='font-size:18px;'>Copyright � 2015 OCP S.I All rights reserved.</p><center>");?>
</div>


	<script>
		var tab1 = <?php echo json_encode($Affectation); ?>;
	 var tab2 = <?php echo json_encode($CompteDeNum�ro); ?>;
	 var x = <?php echo json_encode($i); ?>;
	
		var doughnutData = [];

for (var i = 0; i < tab1.length; i++) {
  doughnutData.push({
    value: tab2[i],
    label: tab1[i]
  });
}
			window.onload = function(){
				var ctx = document.getElementById("chart-area").getContext("2d");
				window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : true});
			};



	</script>
	</body>
</html>
