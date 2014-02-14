

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
  <label class="sr-only" for="s">Search</label>
  <input type="search" value="<?php echo ( isset($_GET['s']) && !is_search() ) ? $_GET['s'] : ''; ?>" placeholder="Search…" class="form-control search-query" name="s" id="s" />
  
  <?php if (is_home() || is_archive()) { ?>
    <input type="hidden" name="post_type" value="post" />
  <?php } ?>
  
  <div class="search-btn-wrap">
  	<input type="submit" id="searchsubmit" value="Start search" class="search-submit" /><i class="fa fa-angle-right fa-lg btn-pointer"></i>
  </div>
</form>