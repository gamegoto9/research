
<?php 

if($id_menu == "0"){ ?>

	<table id="mMenuTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th width="50px">#</th>
				<th>ชื่อเมนู</th>

				<th width="50px">แก้ไข</th>
				<th width="50px">ลบ</th>

			</tr>
		</thead>

		<tbody>
			<?php 
			$i = 0;
			foreach ($mainMenu as $mMenu){
				$i++;
				$sid = $mMenu['mMenuId']
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $mMenu['mMenuName']; ?></td>
					<!-- <td><a class="btn btn-primary"><i class="fa fa-exclamation-circle"></i></a></td> -->

					<?php 
					if($sid > "3"){
						?>
						<td><a class="btn btn-warning" onclick="showModel_edit(<?php echo $mMenu['mMenuId']; ?>);" ><i class="fa fa-edit"></i></a></td>
						<td><a class="btn btn-danger" onclick="showModel_delete(<?php echo $mMenu['mMenuId']; ?>);"><i class="fa fa-trash-o"></i></a></td>
						<?php
					}else{
						?>
						<td><a class="btn btn-warning" onclick="showModel_edit(<?php echo $mMenu['mMenuId']; ?>);" ><i class="fa fa-edit"></i></a></td>
						<td></td>
						<?php
						
					}
					?>


					
				</tr>
				<?php } ?>
			</tbody>
		</table>

<?php }else{?>

	<table id="mMenuTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th width="50px">#</th>
				<th>ชื่อเมนูย่อย</th>
				<th>ชื่อเมนูหลัก</th>
				<th width="50px">แก้ไข</th>
				<th width="50px">ลบ</th>

			</tr>
		</thead>

		<tbody>
			<?php 
			$i = 0;
			foreach ($mainMenu as $mMenu){
				$i++;
				$sid = $mMenu['sMenuId'];
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $mMenu['sMenuName']; ?></td>
					<td><?php echo $mMenu['mMenuName']; ?></td>

					<?php 
					if($sid > "12"){
						?>
						<td><a class="btn btn-warning" onclick="showModel_edit(<?php echo $mMenu['sMenuId'];?>);" ><i class="fa fa-edit"></i></a></td>
						<td><a class="btn btn-danger" onclick="showModel_delete(<?php echo $mMenu['sMenuId']; ?>);"><i class="fa fa-trash-o"></i></a></td>
						<?php
					}else{
						?>
						<td><a class="btn btn-warning" onclick="showModel_edit(<?php echo $mMenu['sMenuId'];?>);" ><i class="fa fa-edit"></i></a></td>
						<td></td>
						<?php
						
					}
					?>
						
						

					
				</tr>
				<?php } ?>
			</tbody>
		</table>
<?php }?>

			<script type="text/javascript">

				$(document).ready(function() {
					$('#mMenuTable').DataTable();
				} );


			</script>