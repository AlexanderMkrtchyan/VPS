<?php
/**
 * Template Name: Join: Step 1
 *
 * @package WordPress
 * @subpackage qs
 * @since quigleyshore
 */
get_header();
//Getting user IP and insert into DB
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
}
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
//whether ip is from remote address
else{
    $ip_address = $_SERVER['REMOTE_ADDR'];
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<style>
    .fa-eye-slash{
        margin-left: -30px;
        cursor: pointer;
        color: #906016;
        position: absolute;
        right: 30px;
        top: 16px;
    }
    .fa-eye:before {
        content: "\f06e" !important;
    }
    .check_box_a{
        color: #c1a700 !important;
        font-weight: bold;
    }
    .check_box_a:active{
        color: #46e0f0 !important;
    }
    .check_box_a:focus{
        color: #46e0f0 !important;
    }
    #city_search_result, #state_search_result{
        position: absolute;
        top: 54px;
        background: #fff;
        color: #000000;
        z-index: 10000;
        width: 100%;
        border-radius: 10px;

    }
    #city_search_result ul, #state_search_result ul{
        list-style-type: none;
        padding-inline-start: 0px !important;
        margin: 0;
        height: auto;
    }
    #city_search_result ul li, #state_search_result ul li{
        margin-bottom: 0;
        padding: 10px 15px;
        border-bottom: 1px solid #d5caca;
        background: #eeeeee;
        cursor:pointer
    }
    #city_search_result ul li:hover, #state_search_result ul li:hover{
        background: #ffffff;
    }
.col-sm-3.right-txt {
	height: 100vh;
	width: 100%;
	float: right;
	flex: unset !important;
	max-width: 30%;
}
#right-txt {
	display: table;
	height: 100vh;
	width: 100%;
	text-align: left;
}
.social_media a {
	font-size: 22px;
	color: #fff;
	margin: 0px 5px;
}
#right-txt .h2 {
	display: table-cell;
	vertical-align: top;
}
.middle {
	padding: 30px;
	background-color: rgba(128,125,125,.5);
	border-radius: 15px;
}
.middle h2 {
	font-family: 'Times Roman' !important;
	font-size: 28px;
	color: #fff;
}
.qs-section.qs-reg--section.bgc-darker.has-bgi.bgi-parallax {
	float: left;
	width: 100%;
}
.qs-section.qs-reg--section.bgc-darker.has-bgi.bgi-parallax {
	float: left;
	width: 100%;
	margin: 0px !important;
}
@media screen and (max-width:768px){
    .col-sm-3.right-txt {
    	max-width: 100%;
    	margin-top: 50px;
    }
}
</style>

<section class="qs-section qs-reg--section bgc-darker has-bgi bgi-parallax" style="background-image: url(<?php echo get_template_directory_uri().'/images/join.png' ?>)" style='float:left;'>
    <div class="container">
        <div class="row" style='display:block;'>
            <div class="col-lg-7" style='float:left;'>
                <h2 class="color-white" style="text-align:center;">Join the Quest at Quigley Shores</h2>
                <div class="qs-reg">
                    <form class="qs-reg--form">
                        <div class="row gutter-y-20 inputs"> 
                            <div class="col-sm-6">
                                <div class="qs-input-attention first-name-attention">Please correct this entry</div>
                                <input required class="qs-input input-primary first-name" name="first-name" placeholder="First Name" type="text">
                                <input class="qs-input input-primary gender" name="gender" value="<?php echo $_POST['gender'] ?>" placeholder="Gender" type="hidden">
                            </div>
                            <div class="col-sm-6">
                                <div class="qs-input-attention last-name-attention">Please correct this entry</div>
                                <input required class="qs-input input-primary last-name" name="last-name" placeholder="Last Name" type="text">
                            </div>
                            <div class="col-sm-4">
                                <div class="qs-input-attention city-attention">Please correct this entry</div>
                                <input required class="qs-input input-primary city" id="city_input" name="city" placeholder="City" type="text">
                                <div id="city_search_result"></div>
                            </div>
                            <div class="col-sm-4">
                                <div id="hid" hidden> klri glox</div>
                                <div class="qs-input-attention state-attention">Please correct this entry</div>
                                <input required class="qs-input input-primary state" name="state" id="state_input" placeholder="State" type="text">
                                <div id="state_search_result"></div>
                            </div>
                            <div class="col-sm-4">
                                <div class="qs-input-attention zip-attention">Please correct this entry</div>
                                <input required class="qs-input input-primary zip" name="zip" placeholder="zip" type="text" pattern="[0-9]{5}" >
                            </div>
                            <div class="col-sm-6">
                                <div class="qs-input-attention email-attention">Please correct this entry</div>
                                <input required class="qs-input input-primary email" name="email" placeholder="Email" type="email">
                            </div>
                            <div class="col-sm-6"> 
                                <div class="qs-input-attention confirm-email-attention">Please correct this entry</div>
                                <input required class="qs-input input-primary email-confirm" name="email-confirm" placeholder="Confirm Email" type="email">
                            </div>
                            <div  class="pidorstvo col-sm-12 pb0">
                            </div>
                            <div class="col-sm-6">
                                <div class="qs-input-attention dob-attention">Please correct this entry</div>
                                <input required class="qs-input input-primary date" name="birth-date" type="date">
                            </div>
                            <div class="col-sm-6">
                                <span class="zidorstvo qs-rg--massage">*Do not use email address*</span>
                            <div class="qs-input-attention username-attention">Please correct this entry</div>
                                <input required class="qs-input input-primary username" id="username" name="username" placeholder="Username" type="text">
                            </div>
                            <div class="col-sm-12 pb0">
                                <span class="qs-reg--massage">*Must be at least 8 characters, at least 1 lowercase, 1 uppercase, 1 number and 1 special character.*</span>
                            </div>
                            <div class="col-sm-6">
                            <div class="qs-input-attention password-attention">Please correct this entry</div>
                                <input required class="qs-input input-primary password" name="password" placeholder="Password" type="password" minlength="8" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[A-Z])(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" >
                                <i class="far fa-eye-slash" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                            </div>
                            <div class="col-sm-6">
                            <div class="qs-input-attention confirm-password-attention">Please correct this entry</div>
                                <input required class="qs-input input-primary password-confirm" name="password-confirm" placeholder="Confirm Password" minlength="8" type="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[A-Z])(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$"  />
                                <i class="far fa-eye-slash" id="toggleConfirmPassword" style="margin-left: -30px; cursor: pointer;"></i>
                            </div>
                            <div class="col-sm-12">
                                <label class="qs-chk-rad chk-rad-primary">
                                    <input required type="checkbox" class="checkbox"  name="acknowledgement">
                                    <span class="qs-reg--massage">I acknowledge I have read, understand and agree to the <a target="_blank" class="check_box_a" href="<?php echo home_url() . '/privacy-policy/' ?>">Privacy Policy</a>  and <a target="_blank" class="check_box_a" href="<?php echo home_url() . '/terms-of-use/' ?>">Terms of Agreement</a></span>
                                </label>
                            </div>
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="qs-btn btn-primary submit"> Submit
                                <!-- <a href="<?php echo esc_url( home_url( '/join-step-2/' ) ); ?>" class="qs-btn btn-primary">Next step</a> -->
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class='col-sm-3 right-txt'>
                <div id='right-txt'>
                    <div class='h2'><div class='middle'>
                        <h2 style='text-align:left;'>Join for Free<br><br>Watch for our launch date.<br><br>  First 10,000 members will pay nothing for the first 30-days membership</h2>
                        <div class='social_media'>
                            <a href='https://www.facebook.com/QuigleyShores/' target='_blank'><i class='fab fa-facebook'></i></a>
                            <a href='https://www.instagram.com/QuigleyShores/' target='_blank' target='_blank'><i class='fab fa-instagram'></i></a>
                            <a href='https://twitter.com/QuigleyShores' target='_blank' target='_blank' target='_blank'><i class='fab fa-twitter'></i></a>
                            <a href='https://www.pinterest.com/quigleyshoresdating/' target='_blank' target='_blank' target='_blank'><i class='fab fa-pinterest'></i></a>
                            <a href='https://www.youtube.com/channel/UCogrH5NoeyZpLNc7AWXE_aw' target='_blank'><i class='fab fa-youtube'></i></a>
                        </div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<!--script type="text/javascript">

    $(document).ready(function(){
		$("#city_input").on("keyup", function(){
		    
           $('#state_search_result').hide();
			var city_input = $(this);
			var city_name = $(this).val();
			if (city_name !== "") {
			    $('#city_search_result').show();
			    var city_input = $(this);
				$.ajax({
					url:
					type:"POST",
					cache:false,
					data:{city_name:city_name},
					success:function(data){
						city_input.next().html(data);
						city_input.next().fadeIn();
					}  
				});
			}else{
				$(this).next().find('#city_search_result').html("");
			//	$(this).next().find('#city_search_result').fadeOut();
				$('#city_search_result').hide();
			}
		});

        		// click one particular city name it's fill in textbox
		$(document).on("click","#city_search_result ul li", function(){
			$(this).parent().parent().prev().val($(this).text());                
			$(this).parent().parent().fadeOut("fast");
			$(this).parent().parent().css("height","auto");
		});
    });

    $(document).ready(function(){
		$("#state_input").on("keyup", function(){
           $('#city_search_result').hide();

            var state_input = $(this);
			var state_name = $(this).val();
			if (state_name !== "") {
			     $('#state_search_result').show();
				$.ajax({
					url:
					type:"POST",
					cache:false,
					data:{state_name:state_name},
					success:function(data){
						state_input.next().html(data);
						state_input.next().fadeIn();
					}  
				});
			}else{
				$(this).next().find('#state_search_result').html("");
				//$(this).next().find('#state_search_result').fadeOut();
				 $('#city_search_result').hide();
			}
		});

        		// click one particular city name it's fill in textbox
		$(document).on("click","#state_search_result ul li", function(){
			$(this).parent().parent().prev().val($(this).text());                
			$(this).parent().parent().fadeOut("fast");
			$(this).parent().parent().css("height","auto");
		});
    });
    
    
    $(document).on("click",".qs-input", function(){
        $('#state_search_result').hide();
        $('#city_search_result').hide();
    });


</script-->

<?php
get_footer();
?>




