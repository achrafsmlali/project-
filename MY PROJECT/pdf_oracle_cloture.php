
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
	<div><?php echo utf8_encode("Tikects Oracle Cl�tur�")?></div>
     <table style="width:100%;margin:auto;">
		<tr class="lo">
			<th><?php echo utf8_encode("Num�ro")?></th>
			<th><?php echo utf8_encode("�tat")?></th>
			<th class="aff"><?php echo utf8_encode("Affectation")?></th>
			<th><?php echo utf8_encode("Responsable")?></th>
			<th class="brev"><?php echo utf8_encode("Br�ve description")?></th>
			<th><?php echo utf8_encode("Code Priorit�")?></th>
			<th><?php echo utf8_encode("Cl�tur� par")?></th>
			<th><?php echo utf8_encode("Date/Heure d'ouverture")?></th>
			<th><?php echo utf8_encode("Date/Heure de cl�ture")?></th>
			<th><?php echo utf8_encode("duree")?></th>
		</tr>
			<?php
			$que = "SELECT * FROM `table 1`WHERE ((`�tat` Like 'closed') AND (`Br�ve description` Like '%oracl%' Or `Br�ve description` Like '%gmao%' Or `Br�ve description` Like '%jinitiator%')) OR ((`�tat` Like 'closed') AND (`Br�ve description` Like '% AP %' Or `Br�ve description` Like '% FA %' Or `Br�ve description` Like '% GTA %')) OR ((`�tat` Like 'closed') AND (`Br�ve description` Like '%GPAO%' Or `Br�ve description` Like '% INV %' Or `Br�ve description` Like '% PO %' Or `Br�ve description` Like '% AR %')) OR ((`�tat` Like 'closed') AND (`Br�ve description` Like '% EAM %'))";
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
			<td><?php echo $row['Cl�tur� par']  ;?></td>
			<td><?php echo $row['Date/Heure d\'ouverture']; ?></td>
			<td><?php echo $row['Date/Heure de cl�ture'] ;?></td>
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
 