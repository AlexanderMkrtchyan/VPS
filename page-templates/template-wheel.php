<?php
/**
 * Template Name: Wheel
 *
 * @package WordPress
 * @subpackage qs
 * @since quigleyshore
 */
get_header();
?>
<style type="text/css">
    #join_now_modal{
        display:none;
        position: fixed;
        width: 60%;
        background: #000000;
        margin-left: 20%;
        padding: 58px;
        top: 30%;
        border-radius: 22px;
    }
    .modal_heading{
        color:#ffffff;
        font-family: Catamaran,sans-serif;
    }
    #join_now_modal {
    	border: 2px solid #c9a933;
    	box-shadow: 0px 0px 15px #c9a93378;
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
@media screen and (max-width:480px){
    #join_now_modal {
    	display: none;
    	position: fixed;
    	width: 76%;
    	background: #000000;
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

</style>

<section class="qs-section text-center bgc-darker wheel-section">
    <div class="container">
        <!-- <h1 class="color-white"><?php the_title() ?></h1> -->
        <!-- <div class="qs-wheel" id="carousel"> -->
        <div id="drag-container">
            <div id="spin-container">
                    <?php
                    $i = 0;
                    $gender = '';
                if(is_user_logged_in(  )){
                    if(get_user_meta(get_current_user_id(  ), 'gender')[0] == 'male'){
                        $gender = 'female';
                    }else{
                        $gender = 'male';
                    }
                    foreach (get_users() as $user) {
                        if(isset(get_user_meta($user->ID, 'gender')[0]) && metadata_exists('user', $user->ID, 'profile_image') && $i < 50 && get_user_meta( $user->ID, 'gender')[0] == $gender )
                        {
                            $user_image = get_user_meta($user->ID, 'profile_image')[0];
                            $check = @fopen($user_image, 'r');

                            if($user->ID != '320' && $user->ID != '323' && $user->ID != '186' && $user->ID != '344' && $user->ID != '161' && !$check){
                            ?>
                                <div class="prof_image" user_id="<?=$user->ID;?>" user_name="<?=$user->first_name;?>">
                                <img src="<?php echo get_user_meta($user->ID, 'profile_image')[0] ?>" alt="">
                                <a href="<?php echo  esc_url(add_query_arg( 'id',$user->ID, get_home_url() . '/profile/' )) ?>"
                                    target="_blank" style="display:none"></a>
                            </div>
                            <?php }
                            $i++;
                        }
                    }
                }else{
                    $gender = 'male';
                    foreach (get_users() as $user) {
                                // var_dump($user);
                        if(isset(get_user_meta($user->ID, 'profile_image')[0]) && metadata_exists('user', $user->ID, 'profile_image') && isset(get_user_meta($user->ID, 'gender')[0]) && $i < 50 && get_user_meta( $user->ID, 'gender')[0] == $gender )
                        {
                            $user_image = get_user_meta($user->ID, 'profile_image')[0];
                            $check = @fopen($user_image, 'r');
                            if($user->ID != '320' && $user->ID != '323' && $user->ID != '186' && $user->ID != '344' && $user->ID != '161' && $check){

                        ?>
                            <div class="prof_image bozi_txa" user_id="<?=$user->ID;?>" user_name="<?=$user->first_name;?>">
                                <img src="<?php echo get_user_meta($user->ID, 'profile_image')[0] ?>" alt="">
                                <a data-fancybox data-src="<?php echo '#' .$i?>" href="javascript:;"
                                    style="display:none"></a>
                            </div>
                            <?php
                            }
                            $i++;
                            if($i % 2 == 0){
                                $gender = 'female';
                            }else{
                                $gender = 'male';
                            }
                        }
                    }
                }
                    ?>
                </div>
                <!-- Text at center of ground -->
                <!-- <p>QuigleyShores</p> -->
            </div>
        <div id="ground"></div>
        </div>
        <div id="button_controls">
		<button class="qs-btn btn-primary" id="play">Stop</button>
		</div>
    </div>
</section>
<div id="join_now_modal">
    <div id="join_now_modal_inner">
        <div class="text-center">
            <button class="close_btn_modal" type="button">x</button>
            <h3 class="modal_heading">Sorry, babe. If you want to see this member's profile, you have to first join Quigley Shores.</h3>
            <a href="<?php echo get_site_url() . '/join-the-quest/join-step-1/' ?>" class="qs-btn btn-primary mt30">Join The
                Quest</a>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.bozi_txa').click(function(){
            $('#join_now_modal').show();
        });     
        $('.close_btn_modal').click(function(){
            $('#join_now_modal').hide();
        }); 
    });

</script>

<?php
get_footer();
