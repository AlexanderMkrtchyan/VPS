<?php
/**
 * Template Name: Profile Page
 *
 * @package WordPress
 * @subpackage qs
 * @since quigleyshore
 */
get_header(); 
$id = '';
if(!is_user_logged_in(  )){
    return "klri glox gna login exi ara";
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $_GET['id'] = get_current_user_id(  );
    $id = get_current_user_id(  );
}
// $age = date_diff(date_create(get_user_meta( $id, 'birth-date')[0]), date_create('now'))->y;


function zidorg(){

    $args = array(
        'post_type' => 'attachment',
        'post_mime_type' => array('image/jpeg', 'image/png', 'video/mp4', 'image/gif'),
        'post_status' => 'inherit',
        'posts_per_page' => 500,
        'author' => $_GET['id'],
        'orderby' => 'title',
        );
    $query_images = new WP_Query($args);

    $images = array();

    foreach ($query_images->posts as $image) {
        $images[] = $image->ID;
    }
    return $images;
}
$img = zidorg();
?>

<?php get_template_part( 'blocks/block-profile-top', get_post_type() );?>
<section class="qs-section has-bgc bgc-gray-light ">
    <div class="container">
        <div class="row gutter-y-30">
            <div class="col-md-4 text-center">
                <div class="qs-profile--info">
                    <h4 class="qs-profile--info-title">Age</h4>
                    <span class="qs-profile--info-span">23</span>
                </div>
                <div class="qs-profile--info">
                    <h4 class="qs-profile--info-title">Gender</h4>
                    <span class="qs-profile--info-span">Female</span>
                </div>
                <div class="qs-profile--info">
                    <h4 class="qs-profile--info-title">Height</h4>
                    <span class="qs-profile--info-span">5’7”</span>
                </div>
                <div class="qs-profile--info">
                    <h4 class="qs-profile--info-title">Hair color</h4>
                    <span class="qs-profile--info-span">Brunette</span>
                </div>
                <div class="qs-profile--info">
                    <h4 class="qs-profile--info-title">Eye color</h4>
                    <span class="qs-profile--info-span">Brown</span>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="qs-profile--info">
                    <h4 class="qs-profile--info-title tex">Personality</h4>
                    <ul class="qs-profile--tags">
                        <li>
                            Creative
                        </li>
                        <li>
                            Outgoing
                        </li>
                        <li>
                            Romantic
                        </li>
                        <li>
                            Confident
                        </li>
                        <li>
                            Artistic
                        </li>
                    </ul>
                </div>
                <div class="qs-profile--info">
                    <h4 class="qs-profile--info-title tex">Occupation</h4>
                    <span class="qs-profile--info-span">Dental Assistant</span>
                </div>
                <div class="qs-profile--info">
                    <h4 class="qs-profile--info-title tex">Music</h4>
                    <ul class="qs-profile--tags">
                        <li>
                            Rock
                        </li>
                        <li>
                            Indie
                        </li>
                        <li>
                            Pop
                        </li>
                    </ul>
                </div>
                <div class="qs-profile--info">
                    <h4 class="qs-profile--info-title tex">Astrological Sign</h4>
                    <span class="qs-profile--info-span">Leo</span>
                </div>
                <div class="qs-profile--info">
                    <h4 class="qs-profile--info-title tex">Relationship Status</h4>
                    <span class="qs-profile--info-span">Single</span>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="qs-profile--info">
                    <h4 class="qs-profile--info-title tex">Hobbies/Interests</h4>
                    <ul class="qs-profile--tags">
                        <li>
                            Hiking
                        </li>
                        <li>
                            Travel
                        </li>
                        <li>
                            Movies
                        </li>
                    </ul>
                </div>
                <div class="qs-profile--info">
                    <h4 class="qs-profile--info-title tex">Body type</h4>
                    <span class="qs-profile--info-span">Athletic</span>
                </div>
                <div class="qs-profile--info">
                    <h4 class="qs-profile--info-title tex">Looking for</h4>
                    <span class="qs-profile--info-span">Relationship</span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="qs-section bgc-dark">
    <div class="container">
        <div class="row gutter-y-30">
            <div class="col-lg-6 col-left">
                <h3>My public photos</h3>
                <div class="row gutter-y-30">
                    <div class="col-md-8">
                        <div class="row gutter-y-30">
                            <?php
                            $i = 0;
                            $syodr = [];
                            foreach ($img as $key=>$value) {
                                if($i < 4 && metadata_exists( 'post', $value, 'privacy_status' ) && get_post_meta($value, 'privacy_status')[0] == 'public_image' ){
                                    $i++;
                                        ?> 
                                <div class="col-xsm-6">
                                <div class="qs-profile--item bgc-darker h175">
                                    <a data-fancybox="gallery" href="<?php echo wp_get_attachment_image_src( $value, 'tumbnail', true )[0]; ?>" >
                                        <img src="<?php echo  wp_get_attachment_image_src( $value, 'full', false )[0];?>" alt="">
                                    </a>
                                    </div>
                                </div>
                                    <?php 
                            }
                            if($i == 4 && metadata_exists( 'post', $value, 'privacy_status' )){
                                array_push($syodr, $value);
                            }
                             
                                }
                            ?>
                        </div>
                    </div>
                        <?php if(count($syodr) >0): ?>
                        <div class="col-md-4">
                            <div class="qs-profile--items bgc-darker h380">
                            <a data-fancybox="gallery" href="<?php echo wp_get_attachment_image_src( $syodr[0], 'tumbnail', true )[0]; ?>" >
                                        <img src="<?php echo  wp_get_attachment_image_src( $syodr[0], 'full', false )[0];?>" alt="">
                                    </a>
                            </div>
                        </div>
                        <?php endif; ?>

                </div>
            </div>
            <div class="col-lg-6">
                <h3>My public videos</h3>
                <div class="qs-profile--item bgc-darker h380">
                    <?php
                        foreach ($img as $key=>$value) {
                            if(metadata_exists( 'post', $value, 'privacy_status' ) && get_post_meta($value, 'privacy_status')[0] == 'public_video' ){
                            ?> 
                                <video preload="none" controls class="play-controls--video" src="<?php echo wp_get_attachment_url( $value)  ?>"></video>
                            <?php
                            } 
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="qs-section has-bgc bgc-darker">
    <div class="container">
        <div class="row gutter-y-30"> 
            <div class="col-sm-4">
                <a data-fancybox data-src="#selectableModal" href="javascript:;" class="qs-profile--locked h235">
                    <img src="<?php echo get_template_directory_uri().'/images/profile/v2.png' ?>" alt="">
                    <span class="qs-profile--locked-title">Photo Gallery</span>
                    <i class="fa fa-lock"></i>
                </a>
            </div>
            <div class="col-sm-4">
                <a data-fancybox data-src="#selectableModal" href="javascript:;" class="qs-profile--locked h235">
                    <img src="<?php echo get_template_directory_uri().'/images/profile/v2.png' ?>" alt="">
                    <span class="qs-profile--locked-title">Hologram Museum</span>
                    <i class="fa fa-lock"></i>
                </a>
            </div>
            <div class="col-sm-4">
                <a data-fancybox data-src="#selectableModal" href="javascript:;" class="qs-profile--locked h235">
                    <img src="<?php echo get_template_directory_uri().'/images/profile/v3.png' ?>" alt="">
                    <span class="qs-profile--locked-title">Video Arcade</span>
                    <i class="fa fa-lock"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="qs-section has-bgc bgc-darker">
    <div class="container">
        <div class="row gutter-y-30">
            <div id="upload-group-2" class="col-lg-7 col-left">
                <h3>My private photos</h3>
                <div class="row gutter-y-30">
                    <div class="col-md-12 ">
                        <div class="row gutter-y-10 gutter-x-5">
                            <?php
                            foreach ($img as $key=>$value) {
                                if(metadata_exists( 'post', $value, 'privacy_status' ) && get_post_meta($value, 'privacy_status')[0] == 'private_image' ){
                                ?> 
                                <div class="col-sm col-private">
                                    <div class="qs-profile--item bgc-dark h140">
                                        <a data-fancybox="gallery" href="<?php echo wp_get_attachment_image_src( $value, 'tumbnail', true )[0]; ?>">
                                            <img src="<?php echo wp_get_attachment_image_src( $value, 'full', false )[0]; ?>" alt="">
                                        </a>
                                    </div>
                                </div>
                                <?php
                                } 
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div> 
            <div id="upload-group-3" class="col-lg-5">
                <h3>My private videos</h3>
                <div class="row gutter-y-30">
                    <?php
                            foreach ($img as $key=>$value) {
                                if(metadata_exists( 'post', $value, 'privacy_status' ) && get_post_meta($value, 'privacy_status')[0] == 'private_video' ){
                                ?> 
                                <div class="col-sm-12">
                                    <div class="qs-profile--item bgc-dark h227">
                                        <video preload="none" controls class="play-controls--video" src="<?php  echo wp_get_attachment_url( $value) ?>"></video>
                                    </div>
                                </div>
                                <?php
                                } 
                            }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="bgc-gray-light fs-20" style="max-width: 650px; display: none;" id="selectableModal">
    <div class="text-center">
        <p data-selectable="true">Hey babe, in order to access my private vaults, you first have to Join The Quest at <strong>Quigley Shores!</strong> </p>
        <p data-selectable="true">Click here and I'll help you get started! ;</p>
        <a href="" class="qs-btn btn-primary mt30">Join The Quest</a>
    </div>
</div>

<?php
get_footer();
