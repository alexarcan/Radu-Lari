<div class="widget">
	<h2>Users</h2>
	<div class="inner">
		<?php
			$user_count = user_count();
			$suffix = ($user_count != 1 ) ? 's' : '' ; //ca sa puna s la users daca sunt mai multi 
		?>
		We current have <?php echo $user_count; ?> registered user<?php echo $suffix ?>.
	</div>
</div>