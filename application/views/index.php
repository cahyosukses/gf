<?php
	$ArrayCity = $this->City_model->GetArray(array( 'limit' => 150 ));
?>
<?php $this->load->view( 'meta' ); ?>
<body>
<div class="cnt-user">
	<?php $Last = array('User' => ''); ?>
	<?php foreach ($ArrayCity as $Key => $Array) { ?>
		<div class="User">
			<div class="hidden"><?php echo json_encode($Array); ?></div>
			<div class="Display" style="position: relative;">
				<?php if ($Array['user_display'] == $Last['User']) { ?>
					
				<?php } else { ?>
					<span class="UserAccess cursor"><?php echo $Array['user_display']; ?></span>
					<div class="troop" style="position: absolute; top: 15px; left: 0px;;"><?php echo (empty($Array['user_troop'])) ? '-' : $Array['user_troop']; ?></div>
				<?php } ?>
			</div>
			<div class="Display"><?php echo $Array['city']; ?></div>
			<div class="Time"><div class="Render"><?php echo ShowGfTime($Array['city_time']); ?></div></div>
			<div class="Message"><div class="Render"><?php echo (empty($Array['city_desc'])) ? '---' : $Array['city_desc']; ?></div></div>
			<div class="clear"></div>
		</div>
		<?php $Last['User'] = $Array['user_display']; ?>
	<?php } ?>
</div>
<?php $this->load->view( 'sidebar' ); ?>

<script type="text/javascript">
	var Func = {
		GodFatherLink: 'https://www.kabam.com/games/the-godfather/',
		InitForm: function() {
			$('input[name="EntryForm"]').keypress(function(event) {
				var input = $(this);
				var ActionType = {
					Time: 'ModifyCityTime',
					Message: 'UpdateCity',
					troop: 'update_troop'
				}
				var ClassName = $(this).parent('div').attr('class');
				
				if (event.keyCode == 13) {
					var RawRecord = $(this).parents('.User').children('.hidden').text();
					eval('var Record = ' + RawRecord);
					
					console.log(Record);
					
					var AjaxParam = { Action: ActionType[ClassName], city_id: Record.city_id }
					if (ActionType[ClassName] == 'ModifyCityTime') {
						AjaxParam.city_time = $(this).val();
					} else if (ActionType[ClassName] == 'UpdateCity') {
						AjaxParam.city_desc = $(this).val();
					} else if (ActionType[ClassName] == 'update_troop') {
						AjaxParam.user_troop = $(this).val();
					}
					
					$.post(Host.Link + '/index.php/welcome/ajax', AjaxParam, function() {
						input.val('done');
						// window.location.href = window.location.href;
					});
				}
			});
		}
	}
	
	// Create Link Shortcut
	$('.UserAccess').click(function() {
		var RawRecord = $(this).parent('div').parent('.User').children('.hidden').text();
		eval('var Record = ' + RawRecord);
		
		var UserLink = Func.GodFatherLink + '?user_email=' + Record.user_email + '&user_pass=' + Record.user_pass;
		$('#CntShortCut .link').html('<input type="text" value="' + UserLink + '" readonly="readonly" />');
	});
	
	// Generate Form
	$('.Time .Render, .Message .Render').click(function() {
		var UnixTime = new Date().getTime();
		var Text = ($(this).parent('div').attr('class') == 'Time') ? '' : $(this).text();
		$(this).parent('div').html('<input type="text" name="EntryForm" class="' + UnixTime + '" value="' + Text + '" />');
		$('.' + UnixTime).focus();
		
		Func.InitForm();
	} );
	$('.cnt-user .troop').click(function() {
		var input = $(this).find('input');
		if (input.length == 1) {
			return;
		}
		
		var value = $(this).text();
		var UnixTime = new Date().getTime();
		$(this).html('<input type="text" name="EntryForm" class="' + UnixTime + '" value="' + value + '" />');
		$('.' + UnixTime).focus();
		
		Func.InitForm();
	} );
</script>
</body>