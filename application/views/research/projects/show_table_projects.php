<table id="mMenuTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead bgcolor="#0f76dc">

		<th width="50" ><center><font color="#fff"><b>ลำดับ</b></font></center></th>
		<th><center><font color="#fff"><b>ชื่อเรื่อง</b></font></center></th>
		<th width="150"><center><font color="#fff"><b>ปีงบประมาณ</b></font></center></th>
		<!-- <th width="150"><center><font color="#fff"><b>สถานะ</b></font></center></th> -->
		<th colspan="2" ><font color="#fff"><b><center>action</center></b></font></th>

	</thead>
	<tbody>
		<?php
		$i=1;
		foreach ($researchs as $research){

			?>
			<tr>
			<td><center><?php echo $i; ?></center></td>
			<td><?php echo $research['researchName']; ?></td>
			<td><center><?php echo $research['researchYear']; ?></center></td>
			
			<td width="50"><center><center><i class="fa fa-edit" onclick="eidt_researchs('<?php echo $research['researchId']; ?>')"></i></center></td>
			<td width="50"><center><i class="fa fa-trash-o" onclick="delete_researchs('<?php echo $research['researchId']; ?>')"></i></center></td>
			</tr>
			<?php   
			$i++;
		}
		?>   
	</tbody>
</table>
<input type="hidden" name="totlepageSeR" id="totlepageSeR" value="<?php echo $total_row; ?>">
<!-- <?php //echo $this->pagination->create_links(); ?> -->
<script type="text/javascript">
	$(document).ready(function() {
    
    console.log($('#totlepageSeR').val());
    var totalTop = '<?php echo $total_row; ?>';
   
    $('#page-selection_gen').bootpag({
                total: totalTop,
                maxVisible: 2
            }).on("page", function(event, /* page number here */ num) {
                var faction = '<?php echo site_url('main/search_projects/'); ?>';
                var fdata = {
                    page: num,
                    Rname: $('#Rname').val(),
                    data_year: $('#data_year').val()
                };
                console.log(fdata);
                //$('#calen_gen').html('');
                $.post(faction, fdata, function(rData) {
                    //$('#calen_gen').fadeOut('1200');
                    //setTimeout(function() {
                        $('#showTableData').html(rData);
                        //$('#calen_gen').fadeIn('1200');
                    //}, 200);
                });

                //console.log(fdata);
            });
  });

</script>