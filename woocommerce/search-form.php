<form class="find_course" role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
  <label class="visuallyhidden" for="s">Search for:</label>
  <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Find a Course&hellip;" />
  <input type="submit" id="searchsubmit" value="" />
  <input type="hidden" name="post_type" value="product" />
</form>