<?php
	$ArrayCity = $this->City_model->GetArray();
?>
<head>
	<title>God Father</title>
	<script type="text/javascript">var Host = { Link: '<?php echo $this->config->item('base_url'); ?>' }</script>
	<script type="text/javascript" src="static/jquery/jquery.min.js"></script>
	<style>
	.hidden { display: none; }
	.cursor { cursor: pointer; }
	.red { color: #FF0000; }
	.clear { clear: both; }

	.User .Display { float: left; width: 100px; padding: 2px 0 0 0; }
	.User .Time { float: left; width: 200px; padding: 2px 0 0 0; }
	.User .Message { float: left; width: 250px; padding: 2px 0 0 0; }
	</style>
</head>

<body>
<div>
	<?php $Last = array('User' => ''); ?>
	<?php foreach ($ArrayCity as $Key => $Array) { ?>
		<div class="User">
			<div class="hidden"><?php echo json_encode($Array); ?></div>
			<div class="Display"><?php echo ($Array['user_display'] == $Last['User']) ? '&nbsp;' : '<span class="UserAccess cursor">' . $Array['user_display'] . '</span>'; ?></div>
			<div class="Display"><?php echo $Array['city']; ?></div>
			<div class="Time"><div class="Render"><?php echo ShowGfTime($Array['city_time']); ?></div></div>
			<div class="Message"><div class="Render"><?php echo (empty($Array['city_desc'])) ? '---' : $Array['city_desc']; ?></div></div>
			<div class="clear"></div>
		</div>
		<?php $Last['User'] = $Array['user_display']; ?>
	<?php } ?>
</div>

<div id="CntShortCut" style="position: absolute; top: 10px; right: 10px; text-align: right;">
	<div class="link">&nbsp;</div>
	<a href="https://www.kabam.com/games/the-godfather/" target="_blank" style="text-decoration: none;">Play</a>
</div>
	
<script type="text/javascript">
	var Func = {
		GodFatherLink: 'https://www.kabam.com/games/the-godfather/',
		InitForm: function() {
			$('input[name="EntryForm"]').keypress(function(event) {
				var ActionType = {
					Time: 'ModifyCityTime',
					Message: 'UpdateCity'
				}
				var ClassName = $(this).parent('div').attr('class');
				
				if (event.keyCode == 13) {
					var RawRecord = $(this).parent('div').parent('.User').children('.hidden').text();
					eval('var Record = ' + RawRecord);
					
					var AjaxParam = { Action: ActionType[ClassName], city_id: Record.city_id }
					if (ActionType[ClassName] == 'ModifyCityTime') {
						AjaxParam.city_time = $(this).val();
					} else if (ActionType[ClassName] == 'UpdateCity') {
						AjaxParam.city_desc = $(this).val();
					}
					
					$.post(Host.Link + '/index.php/welcome/ajax', AjaxParam, function() {
						window.location.href = window.location.href;
					});
				}
			});
		}
	}
	
	$('.UserAccess').click(function() {
		var RawRecord = $(this).parent('div').parent('.User').children('.hidden').text();
		eval('var Record = ' + RawRecord);
		
		var UserLink = Func.GodFatherLink + '?user_email=' + Record.user_email + '&user_pass=' + Record.user_pass;
		$('#CntShortCut div').html('<input type="text" value="' + UserLink + '" readonly="readonly" />');
	});
	
	$('.Time .Render, .Message .Render').click(function() {
		var Text = ($(this).parent('div').attr('class') == 'Time') ? '' : $(this).text();
		$(this).parent('div').html('<input type="text" name="EntryForm" value="' + Text + '" />');
		$('input[name="EntryForm"]').focus();
		
		Func.InitForm();
	} );
</script>
</body>