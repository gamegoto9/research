<table>
	<thead>
		<th>ลำดับ</th>
		<th>ชื่อเอกสาร</th>
		<th>ประเภทเอกสาร</th>
		<th colspan="2" >action</th>
	</thead>
	<tbody>
		<?php
		$i=1;
		foreach ($peples as $peple){

			?>
			<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $peple['nameLink']; ?></td>
			<td><?php echo $peple['typeLink']; ?></td>
			<td><i class="fa fa-edit" onclick="eidt_link('<?php echo $peple['researchIdLink']; ?>')"></i></td>
			<td><i class="fa fa-trash-o" onclick="delete_link('<?php echo $peple['researchIdLink']; ?>')"></i></td>
			</tr>
			<?php   
			$i++;
		}
		?>   
	</tbody>
</table>
