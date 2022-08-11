<?php

/**
 * Template Name: Wheel
 * @package WordPress
 * @subpackage qs
 * @since quigleyshore
 */

get_header();
?>
<style>
    .register_req{
    display: none;
    position: absolute;
    object-fit: contain;
    margin: auto;
    padding: 20px;
    z-index: 30;
    inset: 0;
    width: 300px;
    height: 206px;
    border-radius: 10px;
}
</style>
<section class="qs-section text-center bgc-darker">
<div class="register_req bgc-gray-light fs-20" style="max-width: 650px; display: none;" id="<?php echo $i?>">
                        <div class="text-center">
                            <p data-selectable="true">Click here and I'll help you get started!</p>
                            <a href="<?php echo get_site_url() . '/take-a-tour/' ?>"
                                class="qs-btn btn-primary mt30">Join The Quest</a>
                        </div>
                    </div>
    <div class="container" id="drag-container">
            <div id="spin-container">
                <?php
            $i = 0;
            $gender = '';
            if(is_user_logged_in()){
                if(get_user_meta(get_current_user_id(  ), 'gender')[0] == 'male'){
                    $gender = 'female';
                }else{
                    $gender = 'male';
                }
                foreach (get_users() as $user) {
                    if(isset(get_user_meta($user->ID, 'gender')[0]) && metadata_exists('user', $user->ID, 'profile_image') && $i < 10 && get_user_meta( $user->ID, 'gender')[0] == $gender ){
                        $prof_img_id = get_user_meta($user->ID, 'profile_image')[0];
                        $prof_img_src = wp_get_attachment_image_src($prof_img_id, 'thumbnail');
                        ?>
                    <div class="prof_image">
                        <img src="<?php echo $prof_img_src[0]; ?>" alt="">
                        <a class="wheel_link" href="<?php echo  esc_url(add_query_arg( 'id',$user->ID, get_home_url() . '/profile/' )) ?>"
                            target="_blank" style="display:none">Visit</a>
                    </div>
                    <?php
                        $i++;
                    }
                }
            }else{
            $gender = 'male';
                foreach (get_users() as $user) {
                    // var_dump($user);
                    if(isset(get_user_meta($user->ID, 'profile_image')[0]) && metadata_exists('user', $user->ID, 'profile_image') && isset(get_user_meta($user->ID, 'gender')[0]) && $i < 10 && get_user_meta( $user->ID, 'gender')[0] == $gender ){
                    ?>
                    <div class="prof_image bozi_txa">
                        <img src="<?php echo get_user_meta($user->ID, 'profile_image')[0] ?>" alt="">
                        <a data-fancybox data-src="<?php echo '#' .$i?>" href="javascript:;" style="display:none"></a>
                    </div>
                    <?php
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
            <!-- Text at center of ground -->
            <p>QuigleyShores</p>
        </div>
        <div id="ground"></div>
    </div>
    <div id="button_controls">
        <button class="qs-btn btn-primary" id="play">Stop</button>
    </div>
    </div>
</section>
<?php

get_footer();