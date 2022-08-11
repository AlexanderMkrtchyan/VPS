<?php

/**

 * Template Name: Flirting

 *

 * @package WordPress

 * @subpackage qs

 * @since quigleyshores

 */

get_header();





?>
<style>
    .qs-section.has-bgc.bgc-darker.bg_top_search_mmb.bg_top_search_mmbb.bg_blocked_box_pg {
    	background: url('https://kleoseo.com/indica/wp-content/themes/dating/images/blocked_bg.jpeg') no-repeat !important;
    	background-size: cover !important;
    }
    .blocked_ristrict_mmbr .tabsall_sc .tabcontent .tab_cnt_cnt .descriptn_area {
	position: relative;
}
.blocked_ristrict_mmbr .tabsall_sc .tabcontent .tab_cnt_cnt .descriptn_area {
	position: relative;
	margin-top: 10px;
}
.fa-heart { color:red !important; }
.smily span {
	width: 17px !important;
	position: relative;
}
.smily form span input {
	position: absolute;
	left: 0;
	top: -3px;
	opacity: 0;
	cursor: pointer;
}
.fa-heart {
	color: red !important;
	float: left;
}
.res {
	color: green;
	font-size: 10px;
}
.blockd_bx_btm_pgntn nav .pagination {
	margin: 0;
	display: inline-flex;
	list-style: none;
}#clear_emoj {
	background: blue;
	float: left;
	font-size: 10px;
	color: #fff;
	padding: 0px 9px;
	border-radius: 4px;
	cursor: pointer;
	margin-left: 10px;
}.smily {
	width: auto;
	float: right;
	margin-top: 20px;
}
.descriptn_area {
	width: 100% !important;
	float: left;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">

<section class="qs-section has-bgc bgc-darker bg_top_search_mmb bg_top_search_mmbb bg_blocked_box_pg">

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
<!--                     <div class="top_back_btn_hd">
                        <a href="#"><i class="fas fa-angle-left"></i> Go back</a>

                        <div class="right_drp_top">
                            <button onclick="myFunction()">Settings <i class="fas fa-angle-down"></i></button>
                            <div id="myDIV" class="drpodwn_menu_top_rght">
                                <a href="#">Profile</a>
                                <a href="#">Account</a>
                                <a href="#">Privacy & Safety</a>
                                <a href="#">Notifications</a>
                                <a href="#">Membership</a>
                            </div>
                        </div>
                    </div> -->
            </div>

<!--        <div class="col-lg-8 col-md-10 mauto bg_trans_new_lk" style="background: none;padding-bottom: 20px;">
               <div class="col-lg-12 top_hd_srch_mmbr top_hd_srch_mmbrr">
                   <h1 class="color-black text-center mb-5" style="font-size: 35px;">Privacy & Safety</h1>
                </div> 

                <div class="col-lg-12">
                    <div class="top_nav_blockd_ls">
                        <a href="#">Privacy</a>
                        <a href="#" class="active">Blocked List</a>
                        <a href="#">Face Recognition</a>
                        <a href="#">Passwords and Login</a>
                    </div>
                </div>
            </div>
 -->
<?php
    $cid = get_current_user_id();
    if(isset($_GET['id'])){
        $cid = $_GET['id'];
    }
  
?>
            <div class="col-lg-8 col-md-12 mauto">
                <div class="blocked_ristrict_mmbr">
                    <h1>Flirting</h1>
                    <input type="hidden" value="<?php echo $cid; ?>" name="my_user_id" id="my_user_id" />
                    <div class="tabsall_sc">
                        <div class="tabcontent">
                            <?php 
                            
                            for($i=0;$i<5;$i++){ $t=0; ?>
                           <div class="tab_cnt_cnt">
                               <div class="descriptn_area">
                                <div class="smily">
                                    <form action="" method="post">
                                        <?php
                                         $idd = '45'.$i;
                                          $emoji = get_user_meta($cid, 'emoji_send_'.$idd); 
                                          for($r=0;$r<sizeof($emoji);$r++){
                                           if($idd!==$cid){
                                             $emoji = get_user_meta($cid, 'emoji_send_'.$idd);
                                            if(!empty($emoji[$r])){
                                                 $data = json_decode($emoji[$r]);
                                                 if($data->u_id==$idd){ ?>
                                                    <input type="hidden" value="45<?php echo $i; ?>" name="user_id" id="user_id" />
                                                    <?php if(strpos($data->smily, 'wink') === false) { ?>
                                                    <span><input type="radio" name="smily[]" value="128521;" />&#128521;</span><?php } ?>
                                                    <?php if(strpos($data->smily, 'smile') === false) { ?>
                                                    <span><input type="radio" name="smily[]" value="128522;" />&#128522;</span>
                                                    <?php } ?>
                                                    <?php if(strpos($data->smily, 'kiss') === false) { ?>
                                                    <span><input type="radio" name="smily[]" value="128536;" />&#128536;</span><?php } ?>
                                                    <?php if(strpos($data->smily, 'heart') === false) { ?>
                                                    <span><input type="radio" name="smily[]" value="heart" /><i class="fa fa-heart"></i></span><?php } ?>
                                                    
                                                <?php  $t=1;  }
                                            }}}
                                            
                                            if($t==0){
                                                 ?>
                                                  <input type="hidden" value="45<?php echo $i; ?>" name="user_id" id="user_id" />
                                       
                                        <span><input type="radio" name="smily[]" value="128521;" />&#128521;</span>
                                        <span><input type="radio" name="smily[]" value="128522;" />&#128522;</span>
                                        
                                        <span><input type="radio" name="smily[]" value="128536;" />&#128536;</span>
                                        <span><input type="radio" name="smily[]" value="heart" /><i class="fa fa-heart"></i></span>
                                          
                                         <?php  
                                            }
                                        ?>
                                        
                                    </form>
                                    <div class="res"></div>
                                </div>
                                   <span class="img_area">
                                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" />
                                   </span>
                                  
                                   <span>
                                      
                                      <h6>Alaxander  Marcus</h6>
                                      <p>Blocked May 3, 2021</p>
                                   </span>

                                   
                               </div>

                               
                           </div>
                        <?php } ?>
                        </div>
            
                        <div class="blockd_bx_btm_pgntn">
                            <nav aria-label="Page navigation example">
                              <ul class="pagination">
                                <li class="page-item">
                                  <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                  </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                  <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                  </a>
                                </li>
                              </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>


        </div>

    </div>



    <div class="container">

        <div class="row">

        </div>

    </div>

</section>

<?php

get_footer();

