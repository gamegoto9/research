<table>
	<thead>
		<th>ลำดับ</th>
		<th>ชื่อผลงาน/แหน่วตีพิมพ์/เผยแพร่</th>
		<th>ประเภทการเผยแพร่</th>
		<th colspan="2" >action</th>
	</thead>
	<tbody>
		<?php
		$i=1;
		foreach ($peples as $peple){

			?>
			<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $peple['namePrint']; ?></td>
			<td><?php echo $peple['typePrint']; ?></td>
			<td><i class="fa fa-edit" onclick="eidt_print('<?php echo $peple['researchIdPrint']; ?>')"></i></td>
			<td><i class="fa fa-trash-o" onclick="delete_print('<?php echo $peple['researchIdPrint']; ?>')"></i></td>
			</tr>
			<?php   
			$i++;
		}
		?>   
	</tbody>
</table>
