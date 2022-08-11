<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
} else {
    $_GET['id'] = get_current_user_id();
    $id = get_current_user_id();
}

if (is_user_logged_in()) {
    $user = get_user_meta($_GET['id']);
    $img_id = $user['profile_image'];

    $originalDate = $user['birth-date'][0];
    $b_date = new DateTime($originalDate);
    $age = $b_date->diff(new DateTime())->y;
} else {
    $user = get_user_meta(1);
    $img_id = wp_get_attachment_image_src(9719, 'thumbnail');
    $age = 600;
}

?>
<section class="qs-section has-bgc bgc-darker">
    <div class="container qs-profile--top">
        <div class="qs-profile--head">
            <div class="qs-profile--border text-center">
                <h1 class="color-white qs-profile--title bgc-dark">
                    <?php echo get_userdata($id)->user_login. ', ' . $age; ?>
                </h1>
            </div>
            <div class="qs-profile--avatar-col text-center">
                <div class="qs-profile--avatar">
                    <a href="">
                        <img id="user_profile_image" src="<?php echo wp_get_attachment_image_src($img_id[0], 'thumbnail')[0]; ?>" alt="">
                    </a>
                </div>
                <div class="qs-profile--meta">
                    <b>klir</b>
                </div>
            </div>
        </div>
        <?php

        
        $servername = "localhost";
        $username = "alex_admin";
        $password = "Boxing1112_!";
        $dbname = "alex_dating";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            

        }  

        if ($_GET['id'] !== get_current_user_id()) {
            $flirt = "SELECT status, fr1, fr2, fr3, fr4 FROM friend_request WHERE accepter_id=" . $_GET['id'] . " AND requester_id=" . get_current_user_id() . "";
            $sql = mysqli_query($conn, $flirt);
            $data = mysqli_fetch_array($sql);
            if ($data) {
                    ?>
                    <ul class="qs-profile--smile" id="friend_request">
                    <?php
                    if($data['status']){
                        ?>
                        <li class="ismile" data-fr="fr1" data-id="<?php echo get_current_user_id(); ?>">
                            <img style="max-width: 100px;" src="<?php echo get_stylesheet_directory_uri() ?>/icons/support.png" alt="">
                        </li>
                        <?php
                    }
                    if (!$data['fr1'] && !$data['status']) {
                        ?>
                        <li class="ismile" data-fr="fr1" data-id="<?php echo get_current_user_id(); ?>">
                            <svg role="img">
                                <use href="<?php echo get_stylesheet_directory_uri() ?>/icons/icons.svg#smile"/>
                            </svg>
                        </li>
                        <?php
                    }
                    if (!$data['fr2'] && !$data['status']) {
                        ?>
                        <li class="iwink" data-fr="fr2" data-id="<?php echo get_current_user_id(); ?>">
                            <svg role="img">
                                <use href="<?php echo get_stylesheet_directory_uri() ?>/icons/icons.svg#wink"/>
                            </svg>
                        </li>
                        <?php
                    }
                    if (!$data['fr3'] && !$data['status']) {
                        ?>
                        <li class="iflower" data-fr="fr3" data-id="<?php echo get_current_user_id(); ?>">
                            <svg role="img">
                                <use href="<?php echo get_stylesheet_directory_uri() ?>/icons/icons.svg#flower"/>
                            </svg>
                        </li>
                        <?php
                    }
                    if (!$data['fr4'] && !$data['status']) {
                        ?>
                        <li class="iheart" data-fr="fr4" data-id="<?php echo get_current_user_id(); ?>">
                            <svg role="img">
                                <use href="<?php echo get_stylesheet_directory_uri() ?>/icons/icons.svg#heart"/>
                            </svg>
                        </li>
                        <?php
                    }
                ?>
                </ul>
                <?php
        $conn->close();
        

            }
            if (mysqli_num_rows($sql) == 0) {
                ?>
                <ul class="qs-profile--smile" id="friend_request">
                    <li class="ismile" data-fr="fr1" data-id="<?php echo get_current_user_id(); ?>">
                        <svg role="img">
                            <use href="<?php echo get_stylesheet_directory_uri() ?>/icons/icons.svg#smile"/>
                        </svg>
                    </li>
                    <li class="iwink" data-fr="fr2" data-id="<?php echo get_current_user_id(); ?>">
                        <svg role="img">
                            <use href="<?php echo get_stylesheet_directory_uri() ?>/icons/icons.svg#wink"/>
                        </svg>
                    </li>
                    <li class="iflower" data-fr="fr3" data-id="<?php echo get_current_user_id(); ?>">
                        <svg role="img">
                            <use href="<?php echo get_stylesheet_directory_uri() ?>/icons/icons.svg#flower"/>
                        </svg>
                    </li>
                    <li class="iheart" data-fr="fr4" data-id="<?php echo get_current_user_id(); ?>">
                        <svg role="img">
                            <use href="<?php echo get_stylesheet_directory_uri() ?>/icons/icons.svg#heart"/>
                        </svg>
                    </li>
                </ul>
                <?php
        $conn->close();
        

            }
        } 

        ?>
    </div>
</section>
