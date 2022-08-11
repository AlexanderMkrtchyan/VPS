<?php
$queried_object = get_queried_object();
$prefix_top_background_image_blog = get_field('top_background_image', 'option_blog', $queried_object);
$prefix_top_background_color_blog = get_field('top_background_color', 'option_blog', $queried_object);
$prefix_top_description_blog = get_field('top_description', 'option_blog', $queried_object);
$prefix_top_title_blog = get_field('top_title', 'option_blog', $queried_object);

function has_top_bg(){
    global $prefix_top_background_image_blog,
           $prefix_top_background_color_blog
    ;

    if(!empty($prefix_top_background_image_blog) || !empty($prefix_top_background_color_blog)){
        $class = 'qs-top--bg';
    }
    else{
        $class = 'qs-top--hero';
    }
    return $class;
}

$prefix_top_class = has_top_bg();

if(!empty($prefix_top_background_image_blog)): ?>
    <style>
        <?php
            echo '.'.$prefix_top_class . '{background-image: url('. $prefix_top_background_image_blog['sizes']['lg-screen'] .');}'
        ?>
        @media screen and (max-width: 1024px) {
        <?php echo '.'.$prefix_top_class . '{background-image: url('.$prefix_top_background_image_blog['sizes']['md-screen'] .');}' ?>
        }
        @media screen and (max-width: 768px) {
        <?php echo '.'.$prefix_top_class . '{background-image: url('.$prefix_top_background_image_blog['sizes']['sm-screen'] .');}' ?>
        }
        @media screen and (max-width: 576px) {
        <?php echo '.'.$prefix_top_class . '{background-image: url('.$prefix_top_background_image_blog['sizes']['xs-screen'] .');}' ?>
        }
    </style>
<?php  elseif(!empty($prefix_top_background_color_blog)): ?>
    <style>
        <?php
            echo '.'.$prefix_top_class . '{background-color: ' . $prefix_top_background_color_blog .';}'
        ?>
    </style>
<?php endif; ?>