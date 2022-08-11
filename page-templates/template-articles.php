<?php

/**

 * Template Name: Articles

 *

 * @package WordPress

 * @subpackage qs

 * @since quigleyshores

 */

get_header();


global $wpdb;
   $user_id = get_current_user_id();
   


?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
<style>
    .col-lg-11.col-md-12.mauto {
    	display: flex;
    	float: left;
    	width: 100%;
    }
    #mauto .col-md-4 {
    	float: left;
    }
    .pagination li a {
    	background: #fff;
    	padding: 5px 10px !important;
    }
    .article_displays a span h2 {
    	height: 30px;
    }
    .page-numbers {
    	display: inline-block;
    	padding-left: 0;
    	margin: 20px 0;
    	list-style:none;
    	border-radius: 4px;
    }
    .page-numbers li a, .page-numbers li span {
    	color: #000;
    	padding: 4px 12px;
    	margin: 0 3px;
    	border-radius: 50px;
    	border: 1px solid #999;
    	background: #fff;
    }
    .page-numbers.current {
    	background-color: #222222;
    	border-color: #222222;
    	color: #fff;
    }
    .page-numbers {
    	float: right;
    	margin: 0px;
    }
    .page-numbers li {
    	float: left;
    }
    .article_displays a span p {
    	height: 45px;
    }
    .qs-btn.btn-primary.btn-sm {
	background: #c9a933;
	float: left;
}.col-lg-8.mauto.parah_srch_mmbr {
	margin: auto;
	float: none;
}.col-lg-8.mauto.parah_srch_mmbr .search_bar_mmbr_srch.search_bar_mmbr_srch2 {
	margin: 0px !important;
	margin-top: -5px !important;
}.color-black.text-center {
	margin-top: 60px;
}.search_bar_mmbr_srch.search_bar_mmbr_srch2 select {
	background: none !important;
	width: auto;
	border: none !important;
	float: left;
	height: 37px;
	padding: 0px;
	outline: none;
	box-shadow: none !important;
}.search_bar_mmbr_srch.search_bar_mmbr_srch2 button {
	float: right;
	width: 35px;
}.search_bar_mmbr_srch input {
	margin: 9px 10px 7px 10px;
	padding: 0px;
	border-right: 1px solid #000 !important;
	float: left;
}.search_bar_mmbr_srch.search_bar_mmbr_srch2 select {
	background: none !important;
	width: 168px;
	border: none !important;
	float: left;
	height: 37px;
	padding: 0px;
	outline: none;
	box-shadow: none;
	-webkit-appearance: auto;
}.color-black.text-center {
	margin-top: 30px;
	margin-bottom: 40px;
}.qs-btn.btn-primary.btn-sm {
	background: none;
	float: left;
	padding: 0px !important;
	margin-top: 9px;
	text-decoration: underline !important;
	outline: none !important;
	border: none !important;
}
</style>


<section class="qs-section has-bgc bgc-darker bg_top_search_mmb bg_top_search_mmbb bg_articles_pg">

    <div class="container">
       
        <div class="row">
            <div class="col-md-12" style="display:none;">
             <div class="button-s">
        <?php if($user_id!=0){
            $gender = get_user_meta( $user_id, 'gender');
            $gender = $gender[0];
          
        }
        if($gender=='female') { ?>
            <?php if($user_id!=0){ ?><a style="display:none;" class="qs-btn btn-primary btn-sm" href="<?php echo get_site_url(); ?>/women-articles/"><?php }else{ ?><a href="<?php echo get_site_url(); ?>/choose-gender/" class="qs-btn btn-primary btn-sm"><?php } ?>
                           <i class="fa fa-angle-left"></i> Articles for Women
                        </a>
        <?php }
        
        if($gender=='male') { ?>
            <?php if($user_id!=0){ ?><a style="display:none;" class="qs-btn btn-primary btn-sm" href="<?php echo get_site_url(); ?>/men-articles/"><?php }else{ ?><a href="<?php echo get_site_url(); ?>/choose-gender/"><?php } ?>
                          <i class="fa fa-angle-left"></i>  Articles for Women
                        </a>
        <?php }?>
        </div></div>
            <div class="col-lg-11 col-md-12 mauto" style="display:none;">
               
                <div class="col-lg-12 top_hd_srch_mmbr">
                    <h1 class="color-black text-center">Articles for Both Women and Men</h1>
                </div>
            </div>
            
            <div class="col-lg-8 mauto parah_srch_mmbr">
                    <div class="search_bar_mmbr_srch search_bar_mmbr_srch2">
                        <form>
                            <input type="text" name="search" placeholder="search articles">
                            <select name="category">
                                <option value="title">Search by Title</option>
                                <option value="author">Search by Author</option>
                                <option value="keyword">Search keywords</option>
                                <option value="subject">Search by subject matter</option>
                            </select>
                            <button><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div id="mauto">
                    <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
 
                        $the_query = new WP_Query( array( 
                            'category_name' => "women, men", 
                            'paged' => $paged,
                            'posts_per_page' => 9
                           
                        ) ); 
                        if ( $the_query->have_posts() ) {
                            while ( $the_query->have_posts() ) {
                                $the_query->the_post();
                             
                    ?>
                     <div class="col-md-4">
                         <div class="article_displays">
                             <?php $content_arr = get_extended($the_query->post->post_content); 
                             $url = preg_match('/<a href="(.+)">/', $content_arr['extended'], $match);
                             $info = parse_url($match[1]);
                              ?>  
                             <a target="_blank" href="<?php echo $info['scheme'].'://'.$info['host']; ?>">
                                 <?php if ( has_post_thumbnail() ) { 
                                   echo get_the_post_thumbnail(get_the_id());
                                 } ?>
                                 <span>
                                     <h2><?php the_title(); ?></h2>
                                     <p><?php echo strip_tags(get_the_content()); ?></p>
                                 </span>
                             </a>
                             <span class="icons_article_share">
                                 <a href="#"><i class="fab fa-facebook-f"></i></a>
                                 <a href="#"><i class="fab fa-twitter"></i></a>
                                 <a href="#"><i class="fab fa-linkedin-in"></i></a>
                             </span>
                         </div>
                     </div>
                    <?php }}  ?>
                     
                            
                  <div class="col-md-12 articles_pagination">
                     <div class="blockd_bx_btm_pgntn">
                            <nav aria-label="Page navigation example">
                                <?php wpex_pagination();   ?>
                            </nav>
                      </div>
                 </div>
            </div>


        </div>

    </div>

</section>

<?php

get_footer();

