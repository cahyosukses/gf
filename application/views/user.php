<?php
	$array_user = $this->User_model->GetArray();
?>
<?php $this->load->view( 'meta' ); ?>
<body>
<div class="cnt-user" style="font-size: 12px;">
	<?php $Last = array('User' => ''); ?>
	<?php foreach ($array_user as $Key => $array) { ?>
		<div class="User">
			<div class="hidden"><?php echo json_encode($array); ?></div>
			<div class="Display"><?php echo $array['user_display']; ?></div>
			<div class="Display right form-user-power"><?php echo MoneyFormat($array['user_power']); ?></div>
			<div class="clear"></div>
		</div>
	<?php } ?>
</div>
<?php $this->load->view( 'sidebar' ); ?>

<script type="text/javascript">
	var Func = {
		InitForm: function() {
			$('input[name="EntryForm"]').keypress(function(event) {
				if (event.keyCode == 13) {
					var raw = $(this).parent('div').parent('.User').children('.hidden').text();
					eval('var record = ' + raw);
					
					var param = {
						action: $(this).attr('class'),
						user_id: record.user_id
					}
					
					if (param.action == 'update_power') {
						param.user_power = $(this).val();
					}
					
					$.post(Host.Link + '/user/action', param, function() {
						window.location.href = window.location.href;
					});
				}
			});
		}
	}
	
	// Generate Form
	$('.form-user-power').click(function(e) {
		if ($(this).find('input').length == 0) {
			var text = $(this).text().replace( new RegExp("[^0-9]","gi"), "");
			$(this).html('<input type="text" name="EntryForm" class="update_power" value="' + text + '" />');
			$(this).children('input').focus();
			
			Func.InitForm();
		}
	} );
</script>
</body>