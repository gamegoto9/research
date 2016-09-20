<?php
$conf = 0;
?>





<!--  <div id="tablepeple"></div> -->
<table>
	<thead>
		<th>ลำดับ</th>
		<th>รายการ</th>
		<th>สถานะ</th>
		
	</thead>
	<tbody>
		
		<tr>
			<td>1</td>
			<td>ข้อมูลทั่วไปของโครงการวิจัย</td>
			<td>
				<?php if(isset($researchs['researchId']) && isset($researchs['researchName']) && isset($researchs['tId']) && isset($researchs['researchName_en']) && isset($researchs['typebotkoum']) && isset($researchs['researchYear']) && isset($researchs['price'])){
					?>

					<i class="fa fa-check-circle" style="color:green"></i>
					<?php
					$conf++;

				}else{
					?>

					<i class="fa fa-times-circle" style="color:red"></i>
					<?php
				}
				?>
				
			</td>
			
			
		</tr>
		<tr>
			<td>2</td>
			<td>นักวิจัย/ผู้ร่วมวิจัย</td>
			<td>
				<?php if($peples > 0){
					?>

					<i class="fa fa-check-circle" style="color:green"></i>
					<?php
					$conf++;
				}else{
					?>

					<i class="fa fa-times-circle" style="color:red"></i>
					<?php
				}
				?>
				
			</td>
			
			
		</tr>
		<tr>
			<td>3</td>
			<td>ความเป็นมา/วัตถุประสงค์</td>
			<td>
				<?php if(isset($researchs['researchData_standard'])){
					?>

					<i class="fa fa-check-circle" style="color:green"></i>
					<?php
					$conf++;
				}else{
					?>

					<i class="fa fa-times-circle" style="color:red"></i>
					<?php
				}
				?>
				
			</td>
			
			
		</tr>

		<tr>
			<td>4</td>
			<td>เอกสารแนบ</td>
			<td>
				<?php if($links > 0){
					?>

					<i class="fa fa-check-circle" style="color:green"></i>
					<?php
					$conf++;
				}else{
					?>

					<i class="fa fa-times-circle" style="color:red"></i>
					<?php
				}
				?>
				
			</td>
			
			
		</tr>

	</tbody>
</table>

<div class="form-group" >
	<div class="modal-footer">

		<button type="button" class="btn btn-warning" id="summ" name="summ" onclick="btn_conf();">ยืนยัน</button>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function() {

		console.log('<?php echo $conf; ?>');

		if(<?php echo $conf; ?> >= 4){
			$("#summ").attr("disabled", false);
		}else{
			$("#summ").attr("disabled", "disabled");
		}




	});

	function btn_conf(){

		console.log($('#Rid_primary1').val());
		bootbox.confirm("ยืนยัน?", function(result) {
			if(result){
       

        var faction = "<?php echo site_url('main/conf_kortone/'); ?>";
        var fdata = {id: $('#Rid_primary1').val()};

        

        $.post(faction, fdata, function(jdata) {

        	if (jdata.is_successful) {
        		$.pnotify({
        			title: 'แจ้งให้ทราบ!',
        			text: jdata.msg,
        			type: 'success',
        			opacity: 2,
        			history: false

        		});

        		
        		show_kortone();

        	}else{

        		$.pnotify({
        			title: 'เตือน!',
        			text: jdata.msg,
        			type: 'error',
        			opacity: 1,
        			history: false
        		});

        	}

        }, 'json');
    }
});
	}
</script>