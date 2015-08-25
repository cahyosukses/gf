<?php
	$power_sum = $this->User_model->get_power_sum();
?>

<div id="CntShortCut" style="position: fixed; top: 10px; right: 10px; text-align: right;">
	<div class="link">&nbsp;</div>
	<div class="action">
		<div class="update"><input type="button" name="EntryForm" value="Update Database" /></div>
		<div class="commit"><input type="button" name="EntryForm" value="Generate TXT File" /></div>
	</div><br />
	<div><a href="https://www.kabam.com/games/the-godfather/play" target="_blank" style="text-decoration: none;">Play</a></div>
	<div>
		<a href="<?php echo base_url(''); ?>" style="text-decoration: none;">Home</a> |
		<a href="<?php echo base_url('user'); ?>" style="text-decoration: none;">User</a>
	</div>
	<br />
	
	<div>Power : <?php echo MoneyFormat($power_sum); ?></div>
	<div>20 Week for idle town</div>
	<div>5 Production 49 City = 559 | 455</div>
	<div>1500 min Black Widow for all town</div>
	<div style="padding: 0 0 25px 0;">Penthouse Box max 175, power lebih utama</div>
	<div style="padding: 0 0 25px 0;">Murder Inc Lv 1<br />700 Assassin + 70 Black Widow + 70 Transport</div>
	<div style="padding: 0 0 25px 0;">Murder Inc Lv 2<br />10000 DRC + 1000 Crooked Cop + 150 Thug + 500 Transport</div>
	<div style="padding: 0 0 25px 0;">Murder Inc Lv 3<br />10000 DRC + 1000 Crooked Cop + 200 Thug + 500 Transport</div>
	<div style="padding: 0 0 25px 0;">
		Attack ISB<br />
		Daily Token<br />
		Daily Doria<br />
		Doria Random<br />
		Council<br />
		Build<br />
	</div>
	<div style="padding: 0 0 25px 0;">
		Buat perhitungan setelah power diatas 30 jt
	</div>
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