
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
			<th><?php echo utf8_encode("Num�ro")?></th>
			<th><?php echo utf8_encode("�tat")?></th>
			<th class="aff"><?php echo utf8_encode("Affectation")?></th>
			<th><?php echo utf8_encode("Responsable")?></th>
			<th class="brev"><?php echo utf8_encode("Br�ve description")?></th>
			<th><?php echo utf8_encode("Gravit�")?></th>
			<th><?php echo utf8_encode("Date/Heure d'ouverture")?></th>
			<th><?php echo utf8_encode("Temps �coul� en (H)")?></th>
		</tr>
			<?php
			$que = "SELECT *FROM `table 1`WHERE ((`�tat` Not Like '%closed%') AND (`Br�ve description` Like '%opm%' Or `Br�ve description` Like '%saisi%' Or `Br�ve description` Like '%firewal%' Or `Br�ve description` Like '%instrumen%' Or `Br�ve description` Like '%tonnage%')) OR ((`�tat` Not Like 'closed') AND (`Br�ve description` Like '%formule%' Or `Br�ve description` Like '%bascule%' Or `Br�ve description` Like '%opm%')) OR ((`�tat` Not Like 'closed') AND (`Br�ve description` Like '%�talonnage%' Or `Br�ve description` Like '%compteur%' Or `Br�ve description` Like '%remont�e%')) OR ((`�tat` Not Like 'closed') AND (`Br�ve description` Like '%d�bim�tre%' Or `Br�ve description` Like '%automate%' Or `Br�ve description` Like '% tag %')) OR ((`�tat` Not Like 'closed') AND (`Br�ve description` Like '%capteur%' Or `Br�ve description` Like '%for�age%')) OR ((`�tat` Not Like 'closed') AND (`Br�ve description` Like '%�cart%' Or `Br�ve description` Like '%coefficient%')) OR ((`�tat` Not Like 'closed') AND (`Br�ve description` Like 'formation%' Or `Br�ve description` Like '%instrument%')) OR ((`�tat` Not Like 'closed') AND (('Ou') Like '%rapport%')) OR ((`�tat` Not Like 'closed') AND (`Br�ve description` Like '%opc%' Or `Br�ve description` Like '%NACHA%' Or `Br�ve description` Like '%NAEPI%' Or `Br�ve description` Like '%NALAV%' Or `Br�ve description` Like '%NACA%' Or `Br�ve description` Like 'NAC%' Or `Br�ve description` Like 'NASE%' Or `Br�ve description` Like '%NAGEF%' Or `Br�ve description` Like '%NAGEFL%' Or `Br�ve description` Like '% PB-GA%')) OR ((`�tat` Not Like 'closed') AND (`Br�ve description` Like '%export%' And `Br�ve description` Like '%pdf%'))";		
			$result =mysql_query($que);
			
			while ($row = mysql_fetch_array($result) ) {
		 ?>
			<tr class="li">
			
			<td><?php echo $row['Num�ro'];  ?></td>
			<td><?php echo $row['�tat']  ;?></td>
			<td class="aff"><?php echo $row['Affectation'];  ?></td>
			<td><?php echo $row['Responsable'] ; ?></td>
			<td class="brev""><?php echo utf8_encode($row['Br�ve description'] ); ?></td>
			<td><?php echo $row['Code Priorit�']  ;?></td>
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
 