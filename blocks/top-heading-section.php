<?php
$queried_object = get_queried_object();
//
$prefix_top_background_image = get_field('heading_top_image', $queried_object);
$prefix_top_background_color = get_field('heading_top_background_color', $queried_object);

function has_top_bg(){
    global $prefix_top_background_image,
           $prefix_top_background_color
    ;

    if(!empty($prefix_top_background_image) || !empty($prefix_top_background_color)){
        $class = 'qs-top--bg';
    }
    else{
        $class = 'qs-top--hero';
    }
    return $class;
}

$prefix_top_class = has_top_bg();

if(!empty($prefix_top_background_image)): ?>
    <style>
        <?php
            echo '.'.$prefix_top_class . '{background-image: url('. $prefix_top_background_image['sizes']['lg-screen'] .');}'
        ?>
        @media screen and (max-width: 1024px) {
        <?php echo '.'.$prefix_top_class . '{background-image: url('.$prefix_top_background_image['sizes']['md-screen'] .');}' ?>
        }
        @media screen and (max-width: 768px) {
        <?php echo '.'.$prefix_top_class . '{background-image: url('.$prefix_top_background_image['sizes']['sm-screen'] .');}' ?>
        }
        @media screen and (max-width: 576px) {
        <?php echo '.'.$prefix_top_class . '{background-image: url('.$prefix_top_background_image['sizes']['xs-screen'] .');}' ?>
        }
    </style>
<?php  elseif(!empty($prefix_top_background_color)): ?>
    <style>
        <?php
            echo '.'.$prefix_top_class . '{background-color: ' . $prefix_top_background_color .';}'
        ?>
    </style>
<?php endif; ?>

<?php
