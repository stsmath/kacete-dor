<nav class="grid-12 header_menu">
	<?php
	$args = array(
		'menu' => 'principal',
		'theme_location' => 'menu-principal',
		'container' => false,
	);
	wp_nav_menu($args);
	?>
</nav>