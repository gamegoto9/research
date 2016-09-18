<table>
	<thead>
		<th>ลำดับ</th>
		<th>ชื่อ-สกุล</th>
		<th>สถานะ</th>
		<th colspan="2" >action</th>
	</thead>
	<tbody>
		<?php
		$i=1;
		foreach ($peples as $peple){

			?>
			<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $peple['uName']; ?></td>
			<td><?php echo $peple['status']; ?></td>
			<td><i class="fa fa-edit" onclick="eidt_peple('<?php echo $peple['researchPepleId']; ?>')"></i></td>
			<td><i class="fa fa-trash-o" onclick="delete_peple('<?php echo $peple['researchPepleId']; ?>')"></i></td>
			</tr>
			<?php   
			$i++;
		}
		?>   
	</tbody>
</table>
