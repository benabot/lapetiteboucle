<form action="<?php echo home_url('/'); ?>" method="get">
    <label for="search">Recherccccher :</label>
    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
</form>