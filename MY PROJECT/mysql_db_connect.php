	<?php
	//to fixe the prbleme of é
	?>
	<?php
	
			$username = "root";
			$password = "";
			$hostname = "localhost"; 

			//connection to the database
			$dbhandle = mysql_connect($hostname, $username, $password) 
			 or die("Unable to connect to MySQL");
			
	
			//select a database to work with
			$selected = mysql_select_db("project",$dbhandle) 
			or die("Could not select examples");	
	?>