<!DOCTYPE html>
<html>
	<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
		<style>
		body{background-image:url("images/14.png");
		background-size:100%;
		background-repeat:no-repeat;}
		ul {
  text-align: left;
  display: inline;
  margin: 0;
  padding: 15px 4px 17px 0;
  list-style: none;
  -webkit-box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
}
ul li {
  font: bold 12px/18px sans-serif;
  display: inline-block;
  margin-right: -4px;
  position: relative;
  padding: 15px 20px;
  background: #fff;
  cursor: pointer;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -ms-transition: all 0.2s;
  -o-transition: all 0.2s;
  transition: all 0.2s;
}
a{text-decoration:non;}
a hover:{text-decoration:non;}
a action:{text-decoration:non;}
a visited:{text-decoration:non;}
ul li:hover {
  background: #7D27A1;
  color: #fff;
}
ul li ul {
  padding: 0;
  position: absolute;
  top: 48px;
  left: 0;
  width: 150px;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  display: none;
  opacity: 0;
  visibility: hidden;
  -webkit-transiton: opacity 0.2s;
  -moz-transition: opacity 0.2s;
  -ms-transition: opacity 0.2s;
  -o-transition: opacity 0.2s;
  -transition: opacity 0.2s;
}
ul li ul li { 
  background: #FFF; 
  display: block; 
  color: #B0AFAE;
  border-bottom:1px  solid #7D27A1;

}
ul li ul li:hover { background: #E5E4E3;color:#7e27A1; }
ul li:hover ul {
  display: block;
  opacity: 1;
  visibility: visible;
}
#cssmenu{margin-top:80px;}
.has-sub{width:80px;}
.has-sub,active{height:48px}
ul li ul li{height:40px;width:200px;}
		</style>
	</head>
	<body><center>
	<br><br><br>
	<img width="150px" src="images/logo_ocp.png">
	<div id='cssmenu'>
			<ul>
			  <a href='index.php'><li class='active'><span><span class="glyphicon glyphicon-home" aria-hidden="true"></span></span></li></a>
			   <li class='has-sub'><a href='#'><center><span><span class="glyphicon glyphicon-tag" aria-hidden="true"></span><center></a>
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
			   <li class='has-sub'><center><a href='#'><span><img  height="18px"src="images/15.png"/></span><center></a>
				  <ul>
					 <a href='graphe_bare_oracle_ouvert.php'><li><center><span>Tickets Oracle ouvert</span><center></li></a>
					 <?php echo utf8_encode("<a href='graphe_bare_oracle_cloture.php'><li><center><span>Tickets Oracle cloturé</span><center></li></a>");?>
					 <a href='graphe_bare_opm_ouvert.php'><li><center><span>Tickets OPM ouvert</span><center></li></a>
					 <?php echo utf8_encode("<a href='graphe_bare_opm_cloture.php'><li class='last'><center><span>Tickets OPM cloturé</span><center></li></a>");?>
				  </ul>
			   
			   </li>
			   <li class='has-sub'><center><a href='#'><span><img  height="18px"src="images/16.png"/></span><center></a>
				  <ul>
					 <a href='graphe_pie_oracle_ouvert.php'><li><center><span>Tickets Oracle ouvert</span><center></li></a>
					 <?php echo utf8_encode("<a href='graphe_pie_oracle_cloture.php'><li><center><span>Tickets Oracle cloturé</span><center></li></a>");?>
					 <a href='graphe_pie_opm_ouvert.php'><li><center><span>Tickets OPM ouvert</span><center></li></a>
					 <?php echo utf8_encode("<a href='graphe_pie_opm_cloture.php'><li class='last'><center><span>Tickets OPM cloturé</span><center></li></a>");?>
				  </ul>
			   
			   </li>
			   <li class='has-sub'><center><a href='#'><span><span class="glyphicon glyphicon-print" aria-hidden="true"></span><center></a>
				  <ul>
					 <a href='pdf_oracle_opm.php'><li><center><span>Tickets Oracle OPM </span></li></a>
					 <a href='pdf_oracle_opm_ouvert.php'><li><center><span>Tickets Oracle OPM ouvert</span><center></li></a>
					 <?php echo utf8_encode("<a href='pdf_oracle_opm_cloture.php'><li><center><span>Tickets Oracle OM cloturé</span><center></li></a>");?>
					 <a href='pdf_oracle_ouvert.php'><li><center><span>Tickets Oracle ouvert</span><center></li></a>
					 <?php echo utf8_encode("<a href='pdf_oracle_cloture.php'><li><center><span>Tickets Oracle cloturé</span><center></li></a>");?>
					 <a href='pdf_opm_ouvert.php'><li><center><span>Tickets OPM ouvert</span><center></li></a>
					 
					  <?php echo utf8_encode("<a href='pdf_opm_cloture.php'><li class='last'><center><span>Tickets OM cloturé</span><center></li></a>");?>
				  </ul>
			   
			   </li>
			</ul>
		</div>
	</center></body>
</html>