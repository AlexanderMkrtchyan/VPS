<?php
/**
 * Template Name: Sign in
 *
 * @package WordPress
 * @subpackage qs
 * @since quigleyshores
 */
get_header();


?>

<section class="qs-section qs-sign--section has-bgi" style="background-image: url(<?php echo get_template_directory_uri().'/images/bg.jpg' ?>)">
    <div class="container">
        <div class="qs-sign">
            <div class="qs-sign--header">
                <h1 class="qs-sign--title">Account Log in</h1>
            </div>
            <div style="display:none" id="keep_smiling">Keep smiling</div>
            <div style="display:none" id="good">Good</div>
            <div  id="smile">Smile</div>

            <video id="login_video" width="460px" height="240px" autoplay muted></video>
            <canvas id="dr_canvas"></canvas>
            <div class="row gutter-y-15">
                <div class="col-md-6">
                    <div class="qs-sign--recognition">
                        <h4>Facial Recognition</h4>
                        <div class="qs-sign--canvas">
                            <!--Video Here -->
                        </div>
                        <div class="qs-sign--canvas-label">
                            <span class="qs-sign--massage">Try Facial Recognition</span>
                            <button class="qs-btn btn-primary" id="klris_login" href="#">Log in</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form class="qs-sign--form">
                        <div class="qs-sign--fields">
                            <div class="qs-sign--field">
                                <input required class="qs-input input-primary" name="username" placeholder="Username" type="text" />
                            </div>
                            <div class="qs-sign--field">
                                <input required class="qs-input input-primary" name="password" placeholder="Password" type="password" />
                            </div>
                        </div>
                        <div class="qs-sign--meta">
                            <div class="qs-sign--field-text">
                            <span class="qs-sing--reset-pass">
                                Forgot password? <a href="">Click Here</a>
                            </span>
                            </div>
                        </div>
                        <div class="qs-sign--button">
                            <button class="qs-btn btn-primary" type="submit">Sign in</button>
                        </div>
                        <div class="qs-sing--remember">
                            <label class="qs-chk-rad chk-rad-primary">
                                <input type="checkbox" name="remember">
                                <span>Remember me</span>
                            </label>
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                    <div class="qs-sign--footer">
                        <h4>Not a member yet?</h4>
                        <a class="qs-btn btn-secondary" href="">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php
get_footer();

