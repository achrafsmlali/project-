<!DOCTYPE html>

<html>
	<head>
		<meta  charset="utf-8" /> 
		<title>oracle cloture</title>
	
   <link rel="stylesheet" href="styles.css">
   <script src="script.js"></script>
     <link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<style>
	.lala{
margin-left:5%;
margin-right:5%;}
body {
  font-family: "Open Sans", arial;
}
table {
  max-width: 600px;
  
  border-collapse: collapse;
  border: 1px solid #46BCFF;
  margin : 30px auto;
  background: white;
}
th {
  background: #A8E3FF;
  height: 54px;
 
  font-weight: bold;
  text-shadow: 0 1px  0 #1B8CF5;
  color: black;
  border: 1px solid #A8E3FF;
  box-shadow: inset 0px 1px 2px #54FFE0;
  transition: all 0.2s;
  text-align:center;
}

tr {
  border-bottom: 1px solid #54FFE0
}
tr:last-child {
  border-bottom: 0px;
}
td {
  
  padding: 10px;
  transition: all 0.2s;
}
.bare_next{text-align:center;margin-bottom:30px;text-color:#cccccc;}
body{
	
  background-image: url(images/11.jpg);
  
 
  background-position: center;
}
	</style>
	<div style="width:100%;margin-left:5%;">
	
			<img width="90%" src="images/Group-1.png"/><br><br>
	</div>
	<body>
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
		<?php
	echo utf8_encode('<h1 style="text-align:center;">Tickets OPM cloturé </h1>');
	    
		//connection to mysql end db 
		include('mysql_db_connect.php')
		?>
		
		
		<?php
		
		//execute the SQL query and return records
		$req = "SELECT *FROM `table 1`WHERE ((`État` Like 'closed') AND (`Brève description` Like '%opm%' Or `Brève description` Like '%saisi%' Or `Brève description` Like '%firewal%' Or `Brève description` Like '%instrumen%' Or `Brève description` Like '%tonnage%')) OR ((`État` Like 'closed') AND (`Brève description` Like '%formule%' Or `Brève description` Like '%bascule%' Or `Brève description` Like '%opm%')) OR ((`État` Like 'closed') AND (`Brève description` Like '%étalonnage%' Or `Brève description` Like '%compteur%' Or `Brève description` Like '%remontée%')) OR ((`État` Like 'closed') AND (`Brève description` Like '%débimètre%' Or `Brève description` Like '%automate%' Or `Brève description` Like '% tag %')) OR ((`État` Like 'closed') AND (`Brève description` Like '%capteur%' Or `Brève description` Like '%forçage%')) OR ((`État` Like 'closed') AND (`Brève description` Like '%écart%' Or `Brève description` Like '%coefficient%')) OR ((`État` Like 'closed') AND (`Brève description` Like 'formation%' Or `Brève description` Like '%instrument%' Or `Brève description` Like '%rapport%')) OR ((`État` Like 'closed') AND (`Brève description` Like '%opc%' Or `Brève description` Like '%NACHA%' Or `Brève description` Like '%NAEPI%' Or `Brève description` Like '%NALAV%' Or `Brève description` Like '%NACA%' Or `Brève description` Like 'NAC%' Or `Brève description` Like 'NASE%' Or `Brève description` Like '%NAGEF%' Or `Brève description` Like '%NAGEFL%' Or `Brève description` Like '% PB-GA%')) OR ((`État` Like 'closed') AND (`Brève description` Like '%export%' And `Brève description` Like '%pdf%'))";
		$result = mysql_query($req)or die(mysql_error());
		
		 ?>
		 
		 <table class="table">
		<?php
		
		//fetch the data from the database 
		
		/*..*/if(!isset($_GET['page']))
		/*..*/	$page = 1;
		/*..*/else
		/*..*/	$page = (int)$_GET['page'];
	
		/*..*/$records_at_page = 50;
		/*..*/$records_count = mysql_num_rows($result);
		/*..*/mysql_free_result($result);
		/*..*/$page_count = (int)ceil($records_count/$records_at_page);
		/*..*/if(($page > $page_count) || ($page <= 0)){
		/*..*/	mysql_close($dbhandle);die("no more page");}
		/*..*/$start = ($page - 1) * $records_at_page;
		/*..*/$end = $records_at_page;
		
		/*..*/if($records_count != 0){
		/*..*/$que = "SELECT *FROM `table 1`WHERE ((`État` Like 'closed') AND (`Brève description` Like '%opm%' Or `Brève description` Like '%saisi%' Or `Brève description` Like '%firewal%' Or `Brève description` Like '%instrumen%' Or `Brève description` Like '%tonnage%')) OR ((`État` Like 'closed') AND (`Brève description` Like '%formule%' Or `Brève description` Like '%bascule%' Or `Brève description` Like '%opm%')) OR ((`État` Like 'closed') AND (`Brève description` Like '%étalonnage%' Or `Brève description` Like '%compteur%' Or `Brève description` Like '%remontée%')) OR ((`État` Like 'closed') AND (`Brève description` Like '%débimètre%' Or `Brève description` Like '%automate%' Or `Brève description` Like '% tag %')) OR ((`État` Like 'closed') AND (`Brève description` Like '%capteur%' Or `Brève description` Like '%forçage%')) OR ((`État` Like 'closed') AND (`Brève description` Like '%écart%' Or `Brève description` Like '%coefficient%')) OR ((`État` Like 'closed') AND (`Brève description` Like 'formation%' Or `Brève description` Like '%instrument%' Or `Brève description` Like '%rapport%')) OR ((`État` Like 'closed') AND (`Brève description` Like '%opc%' Or `Brève description` Like '%NACHA%' Or `Brève description` Like '%NAEPI%' Or `Brève description` Like '%NALAV%' Or `Brève description` Like '%NACA%' Or `Brève description` Like 'NAC%' Or `Brève description` Like 'NASE%' Or `Brève description` Like '%NAGEF%' Or `Brève description` Like '%NAGEFL%' Or `Brève description` Like '% PB-GA%')) OR ((`État` Like 'closed') AND (`Brève description` Like '%export%' And `Brève description` Like '%pdf%'))LIMIT $start,$end";
		/*..*/	$result =mysql_query("$que");	
		
		
		echo utf8_encode("
			<tr>
		<th>Numéro</th>
		<th>État</th>
		<th>Affectation</th>
		<th>Responsable</th>
		<th>Brève description</th>
		<th>Code Priorité</th>
		<th>Clôturé par</th>
		<th>Date/Heure d'ouverture</th>
		<th>Date/Heure de clôture</th>
		<th>duree</th>
		</tr>");
		
			while ($row = mysql_fetch_assoc($result) ) {
		 ?>
			<tr>
			
			<td><?php echo $row['Numéro']  ?></td>
			<td><?php echo $row['État']  ?></td>
			<td><?php echo $row['Affectation']  ?></td>
			<td><?php echo $row['Responsable']  ?></td>
			<td><?php echo utf8_encode($row['Brève description'])  ?></td>
			<td><?php echo $row['Code Priorité']  ?></td>
			<td><?php echo $row['Clôturé par']  ?></td>
			<td><?php echo $row['Date/Heure d\'ouverture'] ?></td>
			<td><?php echo $row['Date/Heure de clôture'] ?></td>
			<td><?php echo $row['duree']?></td>
			</tr>
			
		<?php
		
				}
		/*..*/}
		?>	
		
			<div class="bare_next">
			<?php	
			/*..*/if($records_count > 50){
			?><table><tr>
			<?php			
			/*..*/for($x = 1; $x <= $page_count ; $x++){
					echo"<td style='border-left:1px solid #A8E3FF'>";
			/*..*/	if($page == $x)
			/*..*/		echo $page;
			/*..*/	else 
			/*..*/		echo '<a href ="opm_cloture.php?page=' . $x . '">' . $x . '</a>';
			/*..*/	echo"</td>";
			/*..*/		}}
				//close the connection
				mysql_close($dbhandle); 
			?>
			</tr></table>
			</div>
		</div>
		
		
	</body>
<div style="width:100%;margin:auto;height:50px;background-color:#5CFFFF;margin-top:50px; opacity: 0.3;">
<?php echo utf8_encode("<center><p style='font-size:18px;'>Copyright © 2015 OCP S.I All rights reserved.</p><center>");?>
</div>
</html>