<div id="CntShortCut" style="position: fixed; top: 10px; right: 10px; text-align: right;">
	<div class="link">&nbsp;</div>
	<div class="action">
		<div class="update"><input type="button" name="EntryForm" value="Update Database" /></div>
		<div class="commit"><input type="button" name="EntryForm" value="Generate TXT File" /></div>
	</div>
	<div><a href="https://www.kabam.com/games/the-godfather/play" target="_blank" style="text-decoration: none;">Play</a></div>
	<div>
		<a href="<?php echo base_url(''); ?>" style="text-decoration: none;">Home</a> |
		<a href="<?php echo base_url('user'); ?>" style="text-decoration: none;">User</a>
	</div>
	<div>Power : 3.000.000</div>
	<div>20 Week for idle town</div>
	<div>5 Production 49 City = 559 | 455</div>
	<div>Fokus 1 Player dulu, sisanya bangun yang lama</div>
</div>

<script type="text/javascript">
	// Subversion
	$('.action .update input').click(function() {
		var Input = $(this);
		$.post(Host.Link + '/index.php/welcome/ajax', { Action: 'UpdateTable' }, function() {
			Input.parent('.update').remove();
		});
	});
	$('.action .commit input').click(function() {
		var Input = $(this);
		$.post(Host.Link + '/index.php/welcome/ajax', { Action: 'CommitChange' }, function() {
			Input.parent('.commit').remove();
		});
	});
</script>