<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
} else {
    $_GET['id'] = get_current_user_id();
    $id = get_current_user_id();
}

if (is_user_logged_in()) {
    $user = get_user_meta($_GET['id']);
    $author_pic = get_user_meta($id, 'author_pic', true);
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
<style>
    
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
	width:100px;
	height:100px;
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
}.smily {
	width: 100%;
	display: table-cell;
}
.smily span {
	width: 122px !important;
	position: relative;
	text-align: center !important;
}
.blocked_ristrict_mmbr .tabsall_sc .tabcontent .tab_cnt_cnt .descriptn_area img {
	width: 100px;
	height: 100px;
	object-fit: fill;
	margin-right: 0px;
	float: left;
	border-radius: 0px;
	border: 1px solid #eae7e7;
}.res {
	background: green;
	font-size: 10px;
	width: 100%;
	float: left;
	margin-top: 10px;
	text-align: center;
}
</style>
<section class="qs-section has-bgc bgc-darker">
    <div class="container qs-profile--top">
        <div class="qs-profile--head">
            <div class="qs-profile--border text-center">
                <h1 class="color-white qs-profile--title bgc-dark">
                    <?php echo $user['nickname'][0]; ?>
                </h1>
            </div>
            <div class="qs-profile--avatar-col text-center">
                <div class="qs-profile--avatar">
                    <a href="">
                        <img src="<?php echo get_site_url().'/profile/user_' . $id.'/'.$author_pic; ?>" alt="">
                    </a>
                </div>
                <div class="qs-profile--meta">
                    <b>Click on my profile picture to learn more about me :)</b>
                </div>
            </div>
        </div>
        
        
        
        
        
        <?php
/*
        
        $servername = "localhost";
        $username = "harryent_qr";
        $password = "Datin@321!";
        $dbname = "harryent_qr";
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
                            <img style="max-width: 100px;" src="https://cdn-icons-png.flaticon.com/512/3239/3239767.png" alt="">
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
            }
        } 
        $conn->close();
*/
        ?>
    </div>
</section>
