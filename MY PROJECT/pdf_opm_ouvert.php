
<?php

 require ('mysql_db_connect.php');

 ob_start();


?>
<style>
table{
font-size:15px;}
th{padding-bottom:6px;padding-right:3px;padding-top:6px;}
td{padding-bottom:3px;padding-right:3px;padding-top:3px;}
div{ text-align:center;margin-bottom:10px;margin-top:10px;font-size:40px;
}
.lo{background-color:#B9FFC5;}
td{border-top:1px black solide ;background-color:#EDF7D9;border-bottom:1px black solide ;}
.brev{ width:350px;}
.aff{width:250px;}
</style>
 <page backtop="12%" backbottom="5%" backimg="bg.png"> 
	<div><?php echo utf8_encode("Tikects  OPM Ouvert")?></div>
     <table style="width:100%;margin:auto;">
		<tr class="lo">
			<th><?php echo utf8_encode("Numéro")?></th>
			<th><?php echo utf8_encode("État")?></th>
			<th class="aff"><?php echo utf8_encode("Affectation")?></th>
			<th><?php echo utf8_encode("Responsable")?></th>
			<th class="brev"><?php echo utf8_encode("Brève description")?></th>
			<th><?php echo utf8_encode("Gravité")?></th>
			<th><?php echo utf8_encode("Date/Heure d'ouverture")?></th>
			<th><?php echo utf8_encode("Temps écoulé en (H)")?></th>
		</tr>
			<?php
			$que = "SELECT *FROM `table 1`WHERE ((`État` Not Like '%closed%') AND (`Brève description` Like '%opm%' Or `Brève description` Like '%saisi%' Or `Brève description` Like '%firewal%' Or `Brève description` Like '%instrumen%' Or `Brève description` Like '%tonnage%')) OR ((`État` Not Like 'closed') AND (`Brève description` Like '%formule%' Or `Brève description` Like '%bascule%' Or `Brève description` Like '%opm%')) OR ((`État` Not Like 'closed') AND (`Brève description` Like '%étalonnage%' Or `Brève description` Like '%compteur%' Or `Brève description` Like '%remontée%')) OR ((`État` Not Like 'closed') AND (`Brève description` Like '%débimètre%' Or `Brève description` Like '%automate%' Or `Brève description` Like '% tag %')) OR ((`État` Not Like 'closed') AND (`Brève description` Like '%capteur%' Or `Brève description` Like '%forçage%')) OR ((`État` Not Like 'closed') AND (`Brève description` Like '%écart%' Or `Brève description` Like '%coefficient%')) OR ((`État` Not Like 'closed') AND (`Brève description` Like 'formation%' Or `Brève description` Like '%instrument%')) OR ((`État` Not Like 'closed') AND (('Ou') Like '%rapport%')) OR ((`État` Not Like 'closed') AND (`Brève description` Like '%opc%' Or `Brève description` Like '%NACHA%' Or `Brève description` Like '%NAEPI%' Or `Brève description` Like '%NALAV%' Or `Brève description` Like '%NACA%' Or `Brève description` Like 'NAC%' Or `Brève description` Like 'NASE%' Or `Brève description` Like '%NAGEF%' Or `Brève description` Like '%NAGEFL%' Or `Brève description` Like '% PB-GA%')) OR ((`État` Not Like 'closed') AND (`Brève description` Like '%export%' And `Brève description` Like '%pdf%'))";		
			$result =mysql_query($que);
			
			while ($row = mysql_fetch_array($result) ) {
		 ?>
			<tr class="li">
			
			<td><?php echo $row['Numéro'];  ?></td>
			<td><?php echo $row['État']  ;?></td>
			<td class="aff"><?php echo $row['Affectation'];  ?></td>
			<td><?php echo $row['Responsable'] ; ?></td>
			<td class="brev""><?php echo utf8_encode($row['Brève description'] ); ?></td>
			<td><?php echo $row['Code Priorité']  ;?></td>
			<td><?php echo $row['Date/Heure d\'ouverture'] ;?></td>
			<td><?php echo $row['duree'] ;?></td>
			
			</tr>
			
		<?php
			}
		?>
     </table>
    
 </page> 

 <?php
	$content = ob_get_clean();
	
	require('html2pdf/html2pdf.class.php');
	
    $pdf = new HTML2PDF('L','A3','fr','true','utf-8');
    $pdf->WriteHTML($content);
	ob_end_clean();
    $pdf->Output();
 ?>
 