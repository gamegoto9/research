<table>
	<thead>
		<th width="50"><center>ลำดับ</center></th>
		<th><center>ชื่อรูปภาพ</center></th>
		<th><center>ดู</center></th>
		<th colspan="2" ><center>action</center></th>
	</thead>
	<tbody>
		<?php
		$i=1;
		foreach ($peples as $peple){

			?>
			<tr>
			<td align="center"><?php echo $i; ?></td>
			<td><?php echo $peple['nameImg']; ?><?php echo $peple['researchIdImg']; ?></td>
			<td width="50" align="center"><a href="<?php echo $peple['img']; ?>" target="_blank" class="fa fa-camera"></a></td>
			<td width="50" align="center"><i class="fa fa-edit" onclick="eidt_img('<?php echo $peple['researchIdImg']; ?>')"></i></td>
			<td width="50" align="center"><i class="fa fa-trash-o" onclick="delete_img('<?php echo $peple['researchIdImg']; ?>')"></i></td>
			</tr>
			<?php   
			$i++;
		}
		?>   
	</tbody>
</table>
