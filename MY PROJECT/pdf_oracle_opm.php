
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
</style>
 <page backtop="12%" backbottom="5%" backimg="bg.png"> 
	<p>Tikects Oracle OPM</p>
     <table style="width:100%";margin:auto;>
		<tr class="lo">
			<th><?php echo utf8_encode("Num�ro")?></th>
			<th><?php echo utf8_encode("�tat")?></th>
			<th><?php echo utf8_encode("Affectation")?></th>
			<th><?php echo utf8_encode("Responsable")?></th>
			<th><?php echo utf8_encode("Br�ve description")?></th>
			<th><?php echo utf8_encode("Code Priorit�")?></th>
			<th><?php echo utf8_encode("Date/Heure d'ouverture")?></th>
			<th><?php echo utf8_encode("Date/Heure de cl�ture")?></th>
		</tr>
			<?php
			$que = "SELECT * FROM `table 1` WHERE ((`Br�ve description` Like '%opm%' Or `Br�ve description` Like '%oracl%' Or `Br�ve description` Like '%gmao%' Or `Br�ve description` Like '%opm%' Or `Br�ve description` Like '%saisi%' Or `Br�ve description` Like '%firewal%' Or `Br�ve description` Like '%instrumen%' Or `Br�ve description` Like '%tonnage%')) OR ((`Br�ve description` Like '%export%' And `Br�ve description` Like '%pdf%')) OR ((`Br�ve description` Like '%formule%' Or `Br�ve description` Like '%bascule%' Or `Br�ve description` Like '%opm%' Or `Br�ve description` Like '%capteur%')) OR ((`Br�ve description` Like '%�talonnage%' Or `Br�ve description` Like '%compteur%' Or `Br�ve description` Like '%remont�e%')) OR ((`Br�ve description` Like '%d�bim�tre%' Or `Br�ve description` Like '%automate%' Or `Br�ve description` Like '% tag %' Or `Br�ve description` Like '%jinitiator%')) OR ((`Br�ve description` Like '%capteur%' Or `Br�ve description` Like '%for�age%' Or `Br�ve description` Like ' AP ' Or `Br�ve description` Like ' FA ' Or `Br�ve description` Like ' GTA ')) OR ((`Br�ve description` Like '%�cart%' Or `Br�ve description` Like '%coefficient%' Or `Br�ve description` Like '%GPAO%' Or `Br�ve description` Like ' INV ' Or `Br�ve description` Like ' PO ' Or `Br�ve description` Like ' AR ')) OR ((`Br�ve description` Like 'formation%' Or `Br�ve description` Like '%d�bim�tre%' Or `Br�ve description` Like '%EAM%' Or `Br�ve description` Like '%instrument%')) OR ((('Ou') Like '%rapport%')) OR ((`Br�ve description` Like '%opc%'))";
			$result =mysql_query($que);
			
			while ($row = mysql_fetch_array($result) ) {
		 ?>
			<tr class="li">
			
			<td><?php echo $row['Num�ro'];  ?></td>
			<td><?php echo $row['�tat']  ;?></td>
			<td><?php echo $row['Affectation'];  ?></td>
			<td><?php echo $row['Responsable'] ; ?></td>
			<td><?php echo utf8_encode($row['Br�ve description'] ); ?></td>
			<td><?php echo $row['Code Priorit�']  ;?></td>
			<td><?php echo $row['Date/Heure d\'ouverture']; ?></td>
			<td><?php echo $row['Date/Heure de cl�ture'] ;?></td>
			
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
 