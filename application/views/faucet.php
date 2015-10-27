<?php
	$array_faucet_daily = $this->faucet_model->get_array(array( 'delay_time_min' => 700, 'active_only' => 1, 'limit' => 100 ));
	$array_faucet_hourly = $this->faucet_model->get_array(array( 'delay_time_min' => 60, 'delay_time_max' => 699, 'active_only' => 1, 'limit' => 100 ));
	$array_faucet_minute = $this->faucet_model->get_array(array( 'delay_time_max' => 59, 'active_only' => 1, 'limit' => 100 ));
	$array_faucet = $this->faucet_model->get_array();
?>

<?php $this->load->view( 'meta', array( 'page_title' => 'Faucet' ) ); ?>
<body>
<div class="cnt-user" style="font-size: 13px; line-height: 20px;">
	<?php if (count($array_faucet_daily) > 0) { ?>
		<div class="User">
			<div style="float: left; width: 350px; text-align: center; font-weight: bold;">Daily</div>
			<div class="clear"></div>
		</div>
		<div class="User">
			<div style="float: left; width: 150px;">Site</div>
			<div class="Display right">Avg Satoshi</div>
			<div class="Display right">Delay</div>
			<div class="clear"></div>
		</div>
		<?php foreach ($array_faucet_daily as $key => $row) { ?>
			<div class="User">
				<div class="hidden"><?php echo json_encode($row); ?></div>
				<div style="float: left; width: 150px;"><span class="link cursor"><?php echo $row['domain']; ?></span></div>
				<div class="Display right"><?php echo $row['satoshi_avg']; ?></div>
				<div class="Display right"><?php echo $row['delay_time']; ?></div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<br />
	<?php } ?>
	
	<?php if (count($array_faucet_hourly) > 0) { ?>
		<div class="User">
			<div style="float: left; width: 350px; text-align: center; font-weight: bold;">Hourly</div>
			<div class="clear"></div>
		</div>
		<div class="User">
			<div style="float: left; width: 150px;">Site</div>
			<div class="Display right">Avg Satoshi</div>
			<div class="Display right">Delay</div>
			<div class="clear"></div>
		</div>
		<?php foreach ($array_faucet_hourly as $key => $row) { ?>
			<div class="User">
				<div class="hidden"><?php echo json_encode($row); ?></div>
				<div style="float: left; width: 150px;"><span class="link cursor"><?php echo $row['domain']; ?></span></div>
				<div class="Display right"><?php echo $row['satoshi_avg']; ?></div>
				<div class="Display right"><?php echo $row['delay_time']; ?></div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<br />
	<?php } ?>
	
	<?php if (count($array_faucet_minute) > 0) { ?>
		<div class="User">
			<div style="float: left; width: 350px; text-align: center; font-weight: bold;">Every Minute</div>
			<div class="clear"></div>
		</div>
		<div class="User">
			<div style="float: left; width: 150px;">Site</div>
			<div class="Display right">Avg Satoshi</div>
			<div class="Display right">Delay</div>
			<div class="clear"></div>
		</div>
		<?php foreach ($array_faucet_minute as $key => $row) { ?>
			<div class="User">
				<div class="hidden"><?php echo json_encode($row); ?></div>
				<div style="float: left; width: 150px;"><span class="link cursor"><?php echo $row['domain']; ?></span></div>
				<div class="Display right"><?php echo $row['satoshi_avg']; ?></div>
				<div class="Display right"><?php echo $row['delay_time']; ?></div>
				<div class="clear"></div>
			</div>
		<?php } ?>
		<br />
	<?php } ?>
</div>

<div style="position: absolute; top: 0px; right: 0px;">
	<div style="padding: 20px;">Bitcoin : 1Krx9EasTuKGfXersE5gPW9X9dc6C1AtXN</div>
</div>

<script type="text/javascript">
	$('.cnt-user .link').click(function() {
		var raw = $(this).parents('.User').find('.hidden').html();
		eval('var row = ' + raw);
		window.open(row.link);
		
		$.post(Host.Link + '/faucet/action', { action: 'collect', id: row.id }, function() {
			// console.log('ok');
		});
	});
</script>
</body>
