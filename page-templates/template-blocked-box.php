<?php

/**

 * Template Name: Blocked Box

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
}.smily {
	position: absolute;
	top: -23px;
	width: 100%;
}.blocked_ristrict_mmbr .tabsall_sc .tabcontent .tab_cnt_cnt .descriptn_area {
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
}.blocked_ristrict_mmbr .tabsall_sc .tabcontent .tab_cnt_cnt .descriptn_area {
	position: relative;
	margin-top: -10px;
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

            <div class="col-lg-8 col-md-12 mauto">
                <div class="blocked_ristrict_mmbr">
                    <h1>My Blocked Box</h1>
                    <p class="parah_tp">..where you toss the rejects</p>
                    <input type="hidden" value="<?php echo $cid; ?>" name="my_user_id" id="my_user_id" />
                    <div class="tabsall_sc">
                        <div class="tabcontent">
                            <?php 
                            $my_user_id = get_current_user_id();
                            $user[0] = 61;
                            $user[1] = 60;
                            $user[2] = 450;
                            $user[3] = 130;
                            $user[4] = 105;
                            
                            for($i=0;$i<5;$i++){ $t=0; ?>
                           <div class="tab_cnt_cnt">
                               <form action="" method="post">
                                   <input type="hidden" value="<?php echo $user[$i]; ?>" id="user_id" name="userid" />
                                   <input type="hidden" value="<?php echo get_current_user_id(); ?>"  id="my_user_id" name="cuserid" />
                                   <div class="descriptn_area">
                                       <span class="img_area">
                                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" />
                                       </span>
                                      
                                       <span>
                                          <?php
                                            $user_data = get_userdata($user[$i]);
                                            print_r($user_Data);
                                          ?>
                                          <h6>Alaxander  Marcus</h6>
                                          <p>Blocked May 3, 2021</p>
                                       </span>
    
                                       <span class="reson_wy_spn">
                                           <?php 
                                             $block = get_user_meta($my_user_id, 'block_user'.$user[$i]); 
                                             $unbloc = json_decode($block[0]); 
                                           ?>
                                           <input name="msg" type="text" placeholder="Type reason here" />
                                       </span>
                                   </div>
    
                                   <div class="descriptn_area_right">
                                       <?php
                                       if(isset($unbloc->unblock)){
                                           if($unbloc->unblock==0){
                                        ?>
                                            <input type="hidden" value="1" id="unblock" name="unblock" />
                                            <input type="submit" class="bozi_txa" value="Unblock" />
                                       <?php }else{ ?>
                                            <input type="hidden" value="0" id="unblock" name="unblock" />
                                            <input type="submit" class="bozi_txa" value="Block" />
                                       <?php }
                                            }else{ ?>
                                             <input type="hidden" value="1" id="unblock" name="unblock" />
                                            <input type="submit" class="bozi_txa" value="Unblock" />
                                    <?php } ?>
                                   </div>
                               </form>
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

<style type="text/css">

    .modal_heading{
        color:#000;
        font-family: Catamaran,sans-serif;
    }
    
    .close_btn_modal{
        position: absolute;
        top: 22px;
        right: 40px;
        background: transparent;
        color: #fff;
        font-size: 20px;
        box-shadow: none;
        border: 0;
    }
    #drag-container img, #drag-container .register_req, #drag-container video {
	filter: blur(0px) !important;
}
#join_now_modal {
	width: 100%;
	float: left;
	position: fixed;
	z-index: 999;
	height: 100%;
	top: 0;
	left: 0;
}
.confirmationn span {
	width: auto;
	float: left;
	text-align: center;
	font-family: 'Poppins', sans-serif;
	font-size: 19px;
	font-weight: 500;
	padding: 6px 30px;
	border-radius: 5px;
	background: #055399;
	border: 1px solid #fff;
	color: #fff;
	margin: 0px 15px;
}
.tab_cnt_cnt form {
	float: left;
	width: 100%;
}
@media screen and (max-width:480px){
    #join_now_modal_inner {
        position: fixed;
    	width: 76%;
    	background: #fff;
    	margin-left: 10%;
    	padding: 40px 20px 0px 20px;
    	top: 10%;
    	border-radius: 22px;
    }
    .close_btn_modal {
    	position: absolute;
    	top: 2px;
    	right: 7px;
    	background: transparent;
    	color: #fff;
    	font-size: 20px;
    	box-shadow: none;
    	border: 0;
    }
}
#join_now_modal_inner {
	width: 460px;
	padding: 0px;
	border-radius: 22px;
	display: table-cell;
	vertical-align: middle;
	height: 180px;
}
#join_now_modal {
	width: 100%;
	float: left;
	position: fixed;
	z-index: 999;
	height: 100%;
	top: 0;
	left: 0;
	display:none;
}
.join_now_modal_inner {
	display: table;
	width: 480px;
	height: 100%;
	margin: auto;
}
#join_now_modal_inner .text-center {
	background: #fff;
	float: left;
	padding: 50px 30px;
	text-align: center;
	border-radius: 10px;
	position: relative;
}
.close_btn_modal {
	color: #fff;
	background: #000;
	border-radius: 100px;
	height: 22px;
	width: 22px;
	line-height: 0px;
	font-size: 13px;
}
#confirmationn {
	width: 100%;
	float: left;
	display: table;
	margin-top: 20px;
}.confirmationn {
	text-align: center;
	width: 100%;
	display: flex;
	justify-content: center;
}
.modal_heading {
	margin: 0px !important;
	font-size: 20px;
	line-height: normal;
}
.confirmationn span {
	cursor: pointer;
}
.bozi_txa {
	width: 100%;
	float: left;
	text-align: center;
	font-family: 'Poppins', sans-serif;
	font-size: 11px;
	font-weight: 500;
	padding: 8px 0;
	border-radius: 5px;
	background: #055399;
	border: 1px solid #fff;
	color: #fff;
}
</style>
<div id="join_now_modal">
    <div class="join_now_modal_inner"><div id="join_now_modal_inner">
        <div class="text-center">
            <button class="close_btn_modal" type="button">x</button>
            <h3 class="modal_heading">Are you sure you want to unblock this member?</h3>
            <div id="confirmationn">
                <div class="confirmationn">
                    <span id="yes_confirm">Yes</span>
                    <span id="no_confirm">No</span>
                </div>
            </div>
        </div>
    </div> </div>
</div>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<script>
    $(document).ready(function(){
        $('.tab_cnt_cnt').each(function(){
            var thiss = $(this);
            $(this).find('.bozi_txa').click(function(e){
            
            var thisss = $('.bozi_txa');
            e.preventDefault();
            $('#join_now_modal').show();
            $('#yes_confirm').click(function(){
                $('#join_now_modal').hide();
                var my_user_id = thiss.find('#my_user_id').val();
                var user_id = thiss.find('#user_id').val();
                var unblock = thiss.find('#unblock').val();
               
                 jQuery.ajax({
                     type : "get",
                     dataType : "json",
                     url : myAjax.ajaxurl,
                     data : {action: "my_user_vote", my_user_id : my_user_id, user_id : user_id, unblock:unblock},
                     success: function(response) {
                         if(response.type == "success") {
                          window.location.href="https://kleoseo.com/indica/blocked-box/";
                          thiss.remove();
                          var timeDelay = 5000;       // DELAY IN MILLISECONDS (OR SIMPLY, 5 SECONDS DELAY).
                            setTimeout(clearContents, timeDelay);
                            function clearContents() {
                                thiss.parent().parent().find('.res').html('');
                            }
                        }
                        else {
                           alert("Your vote could not be added")
                        }
                     }
                  });
            });
            }); });     
        
        $('.close_btn_modal, #no_confirm').click(function(){
            $('#join_now_modal').hide();
        }); 
    });

</script>
<?php

get_footer();

