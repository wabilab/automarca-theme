<?php

/**
 * The template for displaying search form
 */
?>

<form role="search" method="get" class="search-form row" action="<?php echo home_url('/'); ?>">
	<!-- <label>
		<!-- <span class="screen-reader-text"><?php echo _x('Search for:', 'label', 'jointswp') ?></span>
	<input type="search" class="search-field" placeholder="Cerca" value="<?php echo get_search_query() ?>" name="s" title="Cerca" />
	</label> -->

	<div class="col-12">
		<div class="input-group">
			<div class="input-group-text">@</div>
			<input type="search" class="form-control" id="search-field" class="search-field" placeholder="Cerca" value="<?php echo get_search_query() ?>" name="s" title="Cerca">
		</div>
	</div>
</form>