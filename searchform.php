<form method="get" class="m-searchform" id="searchform" action="<?php bloginfo('url'); ?>/" role="search">
	<?php if(is_post_type_archive('komponenter') || is_tax('relevans')){ ?>
		<input type="text" value="" name="s" class="m-form-input comp" id="searchField" placeholder="S&ouml;k komponenter" />
		<input type="hidden" name="post_type" value="komponenter" />
		<button type="submit" class="m-button" id="searchsubmit">S&ouml;k</button>
	<?php } else { ?>
		<input type="text" value="" name="s" class="m-form-input" id="searchField" />
		<button type="submit" class="m-button" id="searchsubmit">S&ouml;k</button>
	<?php } ?>
</form>