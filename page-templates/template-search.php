<?php

/**

 * Template Name: Search

 *

 * @package WordPress

 * @subpackage qs

 * @since quigleyshores

 */

get_header();

$ipaddress = '';
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		}

$url = "http://api.ipstack.com/".$ipaddress."?access_key=04bc96aa325c6a0e3676e4ee016b8b1b&format=1";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$response = curl_exec($ch);
curl_close($ch);
$response = json_decode($response);
$lat1 = $response->latitude;
$long1 = $response->longitude;

?>
<!--Plugin CSS file with desired skin-->
   
<style>
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
    .qs-filter--label.selected input + span {
	background-color: #c1a700;
	color: #fff;
}.qs-filter--box.filter-range input {
	width: 100% !important;
}.range-slider {
	float: left;
	width: 100%;
}
</style>

<section class="qs-section has-bgc bgc-darker bg_top_search_mmb">

    <div class="container">

        <div class="row">
            <div class="col-lg-8 col-md-10 mauto bg_trans_new_lk">
                    <div class="col-lg-12 top_hd_srch_mmbr">

                    
                    <h1 class="color-black text-center">Member Search</h1>
                   <!--  <h2 class="color-black text-center">Members and Celebrities</h2> -->

                </div>

                <div class="col-lg-12  parah_srch_mmbr">
                    <p><!-- Use our advanced search system to find members quickly and easily using any combination of parameters. Want to find someone who looks like your celebrity crush? Switch to Celebrity Search instead. -->
                    Use our advanced search system to find your perfect match quickly and accurately using any combination of parameters. Looking for someone who looks like your celebrity crush? Switch to Celebrity Search instead.
                    </p>
                </div>

               <!--  <div class="col-lg-8 mauto parah_srch_mmbr">
                    <div class="search_bar_mmbr_srch">
                        <form>
                            <div class="custom-select">
                                <select>   
                                      <option selected="">Category</option>
                                      <option value="1">All</option>
                                      <option value="2">Username</option>
                                      <option value="3">Location</option>
                                      <option value="3">Age</option>
                                      <option value="3">My Favorites</option>
                                </select>

                                <img src="/wp-content/uploads/2022/03/Group.png">
                            </div>

                            <input type="text" placeholder="Search...">
                            <button><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div> -->
                
            </div>

        </div>

    </div>



    <div class="container scnd_rw_filtr_srch">

        <div class="row">

            <div class="col-lg-3 col-md-4">
                <form>
                <h6 class="qs-filter_tp_hd">Filter By</h6>
                <div class="qs-filter qs-filterr qs-filter_re-dsgn_ad">
                    <?php 
                    $age = 0;
                    if(isset($_GET['age'])){
                        $age = $_GET['age'];
                    } ?>
                    <div class="filter_bg_op">
                    <div class="qs-filter--part">

                        <h3 class="qs-filter--title float-left"> Age </h3>
                        <div class="range-slider">
                             <input type="text" class="js-range-slider" name="age" value="" />
                             <input name="search" type="hidden" value="1">
                        </div>

                    </div>

                    <div class="qs-filter--part qs-filter--part_middle">

                        <h3 class="qs-filter--title">

                            Distance in Miles

                        </h3>

                        <div class="qs-filter--box filter-range">
                          <!--   <div class="slider-container">
                               <input type="text" id="slider" class="slider"/>
                            </div> -->
                            <input type="text" class="js-range-slider-miles" name="miles" value="" />
                           <!--  <input type="range" min="1" max="100" class="in_rng" /> -->

                        </div>

                    </div>

                    <div class="qs-filter--part" style="display:none;">

                        <h3 class="qs-filter--title">

                            Seeking

                        </h3>

                        <div class="qs-filter--box filter-checks">

                            <label class="qs-chk-rad chk-rad-primary">

                                <input type="checkbox" name="relation[]">

                                <span>Casual Dating</span>

                            </label>

                            <label class="qs-chk-rad chk-rad-primary">

                                <input type="checkbox" name="relation[]">

                                <span>Serious Relationship</span>

                            </label>

                            <label class="qs-chk-rad chk-rad-primary">

                                <input type="checkbox" name="relation[]">

                                <span>Friendship</span>

                            </label>

                            <label class="qs-chk-rad chk-rad-primary">

                                <input type="checkbox" name="relation[]">

                                <span>Marriage</span>

                            </label>

                        </div>

                    </div>
                    </div>
                </div>


                <div class="qs-filter_re-dsgn_add">
                    <div class="qs-filter--part filter_bx_btm_btn">
                            <button class="qs-btn btn-primary float-right">Search</button>
                    </div>
                </div>
                </form>
            </div>

            <div class="col-lg-9 col-md-8">

               <div class="row">
                <div class="col-md-12">
                    <div class="row ">
                        <?php 
                        $no=8;// total no of author to display

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    if($paged==1){
      $offset=0;  
    }else {
       $offset= ($paged-1)*$no;
    }
     $miles=0;
    if(isset($_GET['search']) && isset($_GET['age'])){
        $agee = explode(';',$_GET['age']);
       if($agee[0]=='39' && $agee[1]=='39'){
          $agee[0]=39;
          $agee[1]=1000;
       }
       $miles = $_GET['miles'];
       
       
        $blogusers = new WP_User_Query( array(
                'role' => 'subscriber', 
                'number' => $no, 
                'offset' => $offset ,
                'meta_query' => array(
                        array(
                            'key' => 'age',
                            'value' => array($agee[0],$agee[1]),
                            'compare' => 'BETWEEN',
                        
                        )
                )));
    }else{
         $blogusers = new WP_User_Query( array(
            'role' => 'subscriber', 
            'number' => $no, 
            'offset' => $offset));
            $agee[0] = 18;
            $agee[1] = 39;
            
            $miles=0;
    }
 $mil = 0;
foreach ( $blogusers->results as $user ) {
    $all_meta_for_user = get_user_meta($user->ID );
   
    $id = $user->ID;
    $author_pic = get_user_meta($id, 'author_pic', true);
    if(empty($author_pic)){
        $author_pic = get_avatar_url($id);
    }else{
        $author_pic = get_site_url().'/profile/user_' . $id.'/'.$author_pic;
    }
   $ipadress = get_user_meta( $id, 'ip_address', 'true');
   if(empty($ipadress)){
      $ipadress = get_user_meta( $id, 'community-events-location', 'true'); 
      $ipadress = $ipadress['ip'];
   }
   
   $url = "http://api.ipstack.com/".$ipadress."?access_key=04bc96aa325c6a0e3676e4ee016b8b1b&format=1";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response1 = curl_exec($ch);
    curl_close($ch);
    $response1 = json_decode($response1);
    $lat2 = $response1->latitude;
    $long2 = $response1->longitude;
    
    //Calculate the distance from latitude and longitude
          $theta = $long1 - $long2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles1 = $dist * 60 * 1.1515; 
          
          $unit = strtoupper($unit);
    if($miles<=$miles1){
              ?>
                    <div class="col-lg-3 col-md-6">
                       <div class="profile_find_rslt">
                           <a href="<?php echo get_site_url(); ?>/public-profile/?id=<?php echo $user->ID; ?>">
                               
                              <img src="<?php echo $author_pic; ?>" alt="">
                               <span>
                                   <strong><?php echo esc_html( $user->display_name ); ?></strong>
                                  <?php echo $all_meta_for_user['city'][0]; ?>,<?php echo $all_meta_for_user['state'][0]; ?>
                               </span>
                           </a>
                       </div>
                   </div>
                    
                   <?php $mil++; }} if($blogusers->total_users==0 || $mil == 0){
                       echo "No result Found";
                   }
                  
                   $total_user = $blogusers->total_users;  
                 $total_pages=ceil($total_user/$no);
                 $big = 99999;
    ?>
    <div class="col-md-12 articles_pagination">
                     <div class="blockd_bx_btm_pgntn">
                            <nav aria-label="Page navigation example">
                                <?php 
              echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'class'         => 'pagination',
				'prev_text'		=> "«",
				'next_text'		=> "»",
			
                  'total' => $total_pages,  
                  
                  
			 ) ); ?>
			    </nav>
                        </div>
                </div>
                    </div>
                </div>

               </div>

            </div>

        </div>

    </div>
</section>
 <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/ion.rangeSlider.min.css"/>
    
    <!--jQuery-->
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
    
    <!--Plugin JavaScript file-->
    <script src="<?php echo get_template_directory_uri(); ?>/js/ion.rangeSlider.min.js"></script>
<script>
   // 1. Initialise range slider instance
     var custom_values = [18, 21, 24, 27, 30, 33, 36, 39];
    
    // be careful! FROM and TO should be index of values array
    var my_from = custom_values.indexOf(<?php echo $agee[0]; ?>);
    var my_to = custom_values.indexOf(<?php echo $agee[1]; ?>);
    
    jQuery(".js-range-slider").ionRangeSlider({
        type: "double",
        grid: true,
        from: my_from,
        to: my_to,
        skin: "round",
        values: custom_values
    });
   
   
   var custom_values = [0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50];
    
    // be careful! FROM and TO should be index of values array
    var my_from = custom_values.indexOf(<?php echo $miles; ?>);
 
    
    jQuery(".js-range-slider-miles").ionRangeSlider({
        grid: true,
        from: my_from,
        to: my_to,
        skin: "round",
        values: custom_values
    });
   
    
    jQuery('.qs-filter--label').each(function(){
        jQuery(this).click(function(){
            jQuery('.qs-filter--label').removeClass('selected');
        });
    });
</script>

<?php

get_footer();

