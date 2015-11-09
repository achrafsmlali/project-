
<?php

 require ('mysql_db_connect.php');

 ob_start();


?>
<style>
table{
font-size:15px;}
th{padding-bottom:6px;padding-right:3px;padding-top:6px;}
td{padding-bottom:3px;background-color:#EDF7D9 ;padding-right:3px;padding-top:3px;}
p{ text-align:center;margin-bottom:10px;margin-top:10px;font-size:40px;
}
.lo{background-color:#B9FFC5;}
td{border-top:1px black solide ;border-bottom:1px black solide ;}
.brev{ width:350px;}
</style>
 <page backtop="12%" backbottom="5%" backimg="bg.png"> 
	<p>Tikects Oracle OPM Ouverts</p>
     <table style="width:100%;margin:auto;">
		<tr class="lo">
			<th><?php echo utf8_encode("Numéro")?></th>
			<th><?php echo utf8_encode("État")?></th>
			<th><?php echo utf8_encode("Affectation")?></th>
			<th><?php echo utf8_encode("Responsable")?></th>
			<th class="brev"><?php echo utf8_encode("Brève description")?></th>
			<th><?php echo utf8_encode("Code Priorité")?></th>
			<th><?php echo utf8_encode("Date/Heure d'ouverture")?></th>
			<th><?php echo utf8_encode("Temps écoulé en H")?></th>
		</tr>
			<?php
			$que = "SELECT * FROM `table 1` WHERE ((`État` Not Like 'closed') AND (`Brève description` Like '%opm%' Or `Brève description` Like '%oracl%' Or `Brève description` Like '%gmao%' Or `Brève description` Like '%opm%' Or `Brève description` Like '%saisi%' Or `Brève description` Like '%firewal%' Or `Brève description` Like '%instrumen%' Or `Brève description` Like '%tonnage%')) OR ((`État` Not Like 'closed') AND (`Brève description` Like '%export%' And `Brève description` Like '%pdf%')) OR ((`État` Not Like 'closed') AND (`Brève description` Like '%formule%' Or `Brève description` Like '%bascule%' Or `Brève description` Like '%opm%' Or `Brève description` Like '%capteur%')) OR ((`État` Not Like 'closed') AND (`Brève description` Like '%étalonnage%' Or `Brève description` Like '%compteur%' Or `Brève description` Like '%remontée%' Or `Brève description` Like '%jinitiator%')) OR ((`État` Not Like 'closed') AND (`Brève description` Like '%débimètre%' Or `Brève description` Like '%automate%' Or `Brève description` Like '% tag %')) OR ((`État` Not Like 'closed') AND (`Brève description` Like '%capteur%' Or `Brève description` Like '%forçage%' Or `Brève description` Like '% AP %' Or `Brève description` Like '% FA %' Or `Brève description` Like '% GTA %')) OR ((`État` Not Like 'closed') AND (`Brève description` Like '%écart%' Or `Brève description` Like '%coefficient%' Or `Brève description` Like '%GPAO%' Or `Brève description` Like '% INV %' Or `Brève description` Like '% PO %' Or `Brève description` Like '% AR %')) OR ((`État` Not Like 'closed') AND (`Brève description` Like 'formation%' Or `Brève description` Like '%débimètre%' Or `Brève description` Like '% EAM %' Or `Brève description` Like '%instrument%' Or `Brève description` Like '%rapport%')) OR ((`État` Not Like 'closed') AND (`Brève description` Like '%opc%' Or `Brève description` Like '%NACHA%' Or `Brève description` Like '%NAEPI%' Or `Brève description` Like '%NALAV%' Or `Brève description` Like '%NACA%' Or `Brève description` Like '%NAC%' Or `Brève description` Like '%NASE%' Or `Brève description` Like '%NAGEF%' Or `Brève description` Like '%NAGEFL%' Or `Brève description` Like '% PB-GA%'));";
			$result =mysql_query($que);
			
			while ($row = mysql_fetch_array($result) ) {
		 ?>
			<tr class="li">
			
			<td><?php echo $row['Numéro'];  ?></td>
			<td><?php echo $row['État']  ;?></td>
			<td><?php echo $row['Affectation'];  ?></td>
			<td><?php echo $row['Responsable'] ; ?></td>
			<td class="brev"><?php echo utf8_encode($row['Brève description'] ); ?></td>
			<td><?php echo $row['Code Priorité']  ;?></td>
			<td><?php echo $row['Date/Heure d\'ouverture']; ?></td>
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
 