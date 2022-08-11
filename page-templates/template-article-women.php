<?php

/**

 * Template Name: Women Articles

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
}.qs-section.has-bgc.bgc-darker.bg_top_search_mmb.bg_top_search_mmbb.bg_articles_pg {
	float: left;
	width: 100%;
}
</style>

<script src="https://code.jquery.com/jquery-1.12.4.js">
    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js">
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var dataa;
            $.ajax({
            type:"GET", 
            url: "https://kleoseo.com/indica/wp-content/themes/dating/page-templates/json_data.php", 
                success: function(data) {
                    dataa = JSON.stringify(data);
                   // jQuery inbuild function
                    $("#auto").autocomplete({
                        source: dataa // list of items.
                    });
                            }, 
            error: function(jqXHR, textStatus, errorThrown) {
                    alert(jqXHR.status);
                },
           dataType: "json"
        });
        
});
    </script>
<section class="qs-section has-bgc bgc-darker bg_top_search_mmb bg_top_search_mmbb bg_articles_pg">
    <div class="container">
        <div class="row">
           <div class="col-md-12" style="display:none;">
            <?php if($user_id!=0){ ?><a class="qs-btn btn-primary btn-sm" href="<?php echo get_site_url(); ?>/demo-articles/"><?php }else{ ?><a href="<?php echo get_site_url(); ?>/choose-gender/" class="qs-btn btn-primary btn-sm"><?php } ?>
                           <i class="fa fa-angle-left"></i> Articles for Both Women and Men
                        </a>
            </div>

        </div>
            <div class="col-lg-11 col-md-12 mauto" style="display:none;">
                <div class="col-lg-12 top_hd_srch_mmbr">
                    <h1 class="color-black text-center">Articles for Women</h1>
                </div>
            </div>
            <div class="col-lg-8 mauto parah_srch_mmbr">
                    <div class="search_bar_mmbr_srch search_bar_mmbr_srch2">
                        <form>
                            <input id="auto" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; } ?>" type="text" name="search" placeholder="search articles">
                            <select name="category">
                                <option value="title" <?php if(isset($_GET['category']) && $_GET['category']=='title'){ echo "selected"; } ?>>Search by Title</option>
                                <option value="author" <?php if(isset($_GET['category']) && $_GET['category']=='author'){ echo "selected"; } ?>>Search by Author</option>
                                <option value="keyword" <?php if(isset($_GET['category']) && $_GET['category']=='keyword'){ echo "selected"; } ?>>Search keywords</option>
                                <option value="subject" <?php if(isset($_GET['category']) && $_GET['category']=='subject'){ echo "selected"; } ?>>Search by subject matter</option>
                            </select>
                            <button><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
            
                <div id="mauto">
                    <?php
                       $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        if(isset($_GET['search'])){
                            $keyword = $_GET['search'];
                        }
                          $args = array(
                                'category_name' => 'women', 
                                'paged' => $paged,
                                'posts_per_page' => 9,
                                "s" => $title,
                                'author__in'=> array(1)
                            );
                        
                        
                        if(isset($_GET['category']) && $_GET['category']=='keyword'){
                            $keyword = explode(' ', $keyword);
                                $args = array(
                                'category_name' => 'women', 
                                'paged' => $paged,
                                'posts_per_page' => 9,
                            );
                            $r=0;
                            $temp = $the_query;
                            $the_query = null;
                            
                            $the_query = new WP_Query( $args );
                            
                             if ( $the_query->have_posts() ) {
                            while ( $the_query->have_posts() ) {
                               
                                 $the_query->the_post();
                                 $data = strip_tags(get_the_content(get_the_id()));
                                 $title = get_the_title(get_the_id());
                                for($i=0;$i<sizeof($keyword);$i++){
                                    if (stripos(strtolower($title), strtolower($keyword[$i]))!==false || strpos(strtolower($data), strtolower($keyword[$i]))!==false){ 
                                        if(strpos(strtolower($title), strtolower($keyword[$i]))!==false){
                                            $title = str_ireplace(strtolower($keyword[$i]),'<font style="background:yellow;font-size: 13px;text-transform: uppercase;">'.$keyword[$i].'</font>',$title);
                                        }
                                        if(strpos(strtolower($data), strtolower($keyword[$i]))!==false){
                                            $data = str_ireplace(strtolower($keyword[$i]),'<font style="background:yellow;font-size: 13px;text-transform: uppercase;">'.$keyword[$i].'</font>',$data);
                                        }
                                        $r=1;
                              
                    ?>
                     <div class="col-md-4">
                         <div class="article_displays">
                             <?php $content_arr = get_extended($the_query->post->post_content); 
                             $url = preg_match('/<a href="(.+)">/', $content_arr['extended'], $match);
                             $info = parse_url($match[1]); ?>
                              
                             <a target="_blank" href="<?php echo $info['scheme'].'://'.$info['host'].''.$info['path']; ?>">
                                 <?php if ( has_post_thumbnail() ) { 
                                   echo get_the_post_thumbnail(get_the_id());
                                 } ?>
                                 <span>
                                     <h2><?php echo $title; ?></h2>
                                     <p><?php echo $data; ?></p>
                                 </span>
                             </a>
                             <span class="icons_article_share">
                                 <a href="#"><i class="fab fa-facebook-f"></i></a>
                                 <a href="#"><i class="fab fa-twitter"></i></a>
                                 <a href="#"><i class="fab fa-linkedin-in"></i></a>
                             </span>
                         </div>
                     </div>
                    <?php }}
                    }
                        if($r==0){
                                    echo "<div class='col-md-12' style='width: 100%;margin-top: 50px;text-align: center;'>No Article Found</div>";
                                }             
                                 
                             }else{
                             echo "<div class='col-md-12' style='width: 100%;margin-top: 50px;text-align: center;'>No Article Found</div>";
                        }
                        }elseif(isset($_GET['category']) && $_GET['category']=='title'){
                            $keyword = $_GET['search'];
                            $args = array(
                                'category_name' => 'women', 
                                'paged' => $paged,
                                'posts_per_page' => 9,
                            );
                            $temp = $the_query;
                            $the_query = null;
                            $r=0;
                            $the_query = new WP_Query( $args );
                            
                             if ( $the_query->have_posts() ) {
                                 
                            while ( $the_query->have_posts() ) {
                                 $the_query->the_post();
                                 $title = get_the_title(get_the_id());
                                if (strpos(strtolower($title), strtolower($keyword))!==false) { 
                                    $r=1;
                                         $title = str_ireplace($keyword,'<font style="background:yellow;font-size: 13px;text-transform: uppercase;">'.$keyword.'</font>',$title);
                              
                    ?>
                     <div class="col-md-4">
                         <div class="article_displays">
                             <?php $content_arr = get_extended($the_query->post->post_content); 
                             $url = preg_match('/<a href="(.+)">/', $content_arr['extended'], $match);
                             $info = parse_url($match[1]); ?>
                              
                             <a target="_blank" href="<?php echo $info['scheme'].'://'.$info['host'].''.$info['path']; ?>">
                                 <?php if ( has_post_thumbnail() ) { 
                                   echo get_the_post_thumbnail(get_the_id());
                                 } ?>
                                 <span>
                                     <h2><?php echo $title; ?></h2>
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
                    <?php }
                    }}
                    
                        if($r==0){
                                    echo "<div class='col-md-12' style='width: 100%;margin-top: 50px;text-align: center;'>No Article Found</div>";
                                }
                        }elseif(isset($_GET['category']) && $_GET['category']=='author'){
                            $args = array(
                                'category_name' => 'women', 
                                'paged' => $paged,
                                'posts_per_page' => 9,
                            );
                            $temp = $the_query;
                            $the_query = null;
                            
                            $the_query = new WP_Query( $args );
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
                             <a target="_blank" href="<?php echo $info['scheme'].'://'.$info['host'].''.$info['path']; ?>">
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
                    <?php }
                    }else{
                             echo "<div class='col-md-12' style='width: 100%;margin-top: 50px;text-align: center;'>No Article Found</div>";
                        }
                        }else{
                            $args = array(
                                'category_name' => 'women', 
                                'paged' => $paged,
                                'posts_per_page' => 9,
                            );
                            $temp = $the_query;
                            $the_query = null;
                            
                            $the_query = new WP_Query( $args );
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
                             <a target="_blank" href="<?php echo $info['scheme'].'://'.$info['host'].''.$info['path']; ?>">
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
                    <?php }
                    }else{
                             echo "<div class='col-md-12' style='width: 100%;margin-top: 50px;text-align: center;'>No Article Found</div>";
                        }} 
                    ?>
                     
                            
                  <div class="col-md-12 articles_pagination">
                     <div class="blockd_bx_btm_pgntn">
                            <nav aria-label="Page navigation example">
                                <?php wpex_pagination(); ?>
                            </nav>
                      </div>
                 </div>
            </div>


        </div>

    </div>

</section>

<?php

get_footer();

