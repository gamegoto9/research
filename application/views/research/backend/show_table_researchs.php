<table class="table-hover">
	<thead bgcolor="#0f76dc">

		<th><font color="#fff"><b>ลำดับ</b></font></th>
		<th><font color="#fff"><b>ชื่อเรื่อง</b></font></th>
		<th><font color="#fff"><b>ปีงบประมาณ</b></font></th>
		<th colspan="2" ><font color="#fff"><b><center>action</center></b></font></th>

	</thead>
	<tbody>
		<?php
		$i=1;
		foreach ($researchs as $research){

			?>
			<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $research['researchName']; ?></td>
			<td><?php echo $research['researchName_en']; ?></td>
			<td><i class="fa fa-edit" onclick="eidt_researchs('<?php echo $research['researchId']; ?>')"></i></td>
			<td><i class="fa fa-trash-o" onclick="delete_researchs('<?php echo $research['researchId']; ?>')"></i></td>
			</tr>
			<?php   
			$i++;
		}
		?>   
	</tbody>
</table>
<?php echo $this->pagination->create_links(); ?>
