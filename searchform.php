<?php
//  Custom search form
?>
<div class="qs-search search-style-2">
    <form class="qs-search--form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="qs-search--field">
            <input type="text" class="qs-input input-primary search-input" name="s" placeholder="Search" value="<?php echo get_search_query(); ?>">
            <span class="search-clear"></span>
        </div>
        <button class="qs-btn btn-secondary" type="submit">
            <?php esc_html_e('Search', 'qs');?>
        </button>
    </form>
</div>
