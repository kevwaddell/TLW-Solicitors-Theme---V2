<form role="search" method="get" id="searchform" class="form-inline" action="<?php echo home_url( '/' ); ?>">
  <div class="form-group">
  	<label class="sr-only" for="s">Search</label>
  	<input type="search" value="<?php echo ( isset($_GET['s']) ) ? $_GET['s'] : ''; ?>" placeholder="Search…" class="form-control input-sm search-query" name="s" id="s" />
  </div>
  <input type="submit" id="searchsubmit" value="Go" class="btn btn-default btn-sm search-submit" />
</form>