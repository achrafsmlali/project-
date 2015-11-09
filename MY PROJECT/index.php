<?php
	include('mysql_db_connect.php');
	
	$message="";
	if(isset($_FILES['file']) )
	 {
		$path = $_FILES['file']['name'];
		
		if(pathinfo($path, PATHINFO_EXTENSION)!= "csv"){$message="veuillez sélectionner un fichier .csv";}
			else{
			
					$req1 = mysql_query("SELECT * FROM `table 1` ");
					if(!empty($req1))
					{
						mysql_query('TRUNCATE TABLE `table 1`');
						
					}
					$file = $_FILES['file']['tmp_name'];
					$handle = fopen($file,"r");
					$fileop = fgetcsv($handle,1000,";");
					
					while(($fileop = fgetcsv($handle,1000,";")) !==false)
					{
						$Numéro = $fileop[0];
						$Catégorie = utf8_encode($fileop[1]);
						$État = utf8_encode($fileop[2]);
						$État_du_problème = utf8_encode($fileop[3]);
						$Affectation =  utf8_encode(addslashes($fileop[4]));
						$Responsable  = utf8_encode($fileop[5]);
						$Brève_description =  addslashes($fileop[6]);
						$Code_Priorité = utf8_encode($fileop[7]);
						$Initial_Impact = utf8_encode($fileop[8]);
						$Gravité  = utf8_encode($fileop[9]);
						$Type_de_problème = utf8_encode($fileop[10]);
						$Clôturé_par =utf8_encode( $fileop[11]);
						$Date_Heure_douverture = $fileop[12];
						$Date_Heure_de_clôture = $fileop[13];
						
						

						$sql = "INSERT INTO `table 1`  (`Numéro`,`Catégorie`,`État`,`État du problème`,`Affectation`,`Responsable`,`Brève description`,`Code Priorité`,`Initial Impact`,`Gravité`,`Type de problème`,`Clôturé par`,`Date/Heure d'ouverture`,`Date/Heure de clôture`,`open`,`close`)VALUES ('$Numéro','$Catégorie','$État','$État_du_problème','$Affectation','$Responsable','$Brève_description','$Code_Priorité','$Initial_Impact','$Gravité','$Type_de_problème','$Clôturé_par','$Date_Heure_douverture','$Date_Heure_de_clôture',STR_TO_DATE('$Date_Heure_douverture', '%d/%m/%Y %H:%i'),STR_TO_DATE('$Date_Heure_de_clôture', '%d/%m/%Y %H:%i'))";
						$result=mysql_query($sql)or die(mysql_error());
					}
						$req2 = "UPDATE `table 1` SET `close`= NOW() WHERE `close`='0000-00-00 00:00:00'";
						$result2=mysql_query($req2)or die(mysql_error);
						
						$req3 = "UPDATE `table 1` SET `duree`= TIMESTAMPDIFF(HOUR,open,close)";
						$result3=mysql_query($req3)or die(mysql_error);
			}	
			if($message==NULL){header('Location:menu.php');}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta  charset="utf-8" /> 
		<title>Title of the document</title>
	
	</head>
	<style>
	*{	margin:0px;
		padding:0px;
		font-family:tahoma;
	}
	#text{
		text-align:center;
		color:white;
	}
		#div_file{
			position:relative;
			margin-left:0px;
			margin-rigth:0px;
			
			padding:10px;

			width:300px;
			background-color: #2499e3;
			border-radius:5px;
			box-shadow:0px 3px 0px #1a71a9;
			display:inline-block;
		}
	input#putfile{
		position:absolute;
		top:0px;
		left:0px;
		right:0px;
		bottom:0px;
		width:300px;
		height:100px;
		opacity:0;
	}
	.all{
		margin-top:120px;
	}
	body{background-image:url("images/14.png");
		background-size:100% ;
		background-repeat:no-repeat;
		
		}
	</style>
	<body><center>
	<br><br><br>
	<img width="150px" src="images/logo_ocp.png">
		<div class="all">
		<form method="post" action="index.php" enctype="multipart/form-data" id="la">
			<div id="div_file">
				 <?php echo utf8_encode("<p id='text'>Sélectionner un fichier</p>");?>
				
				<input type="file" id="putfile" name="file" onchange="document.forms[0].submit()">
			</div>
			
			
			<br>
			<br>
			<?php echo utf8_encode($message);?>
		</form>
		
	</div>
	</center>		
	</body>

</html>