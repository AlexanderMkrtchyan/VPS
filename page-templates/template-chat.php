<?php
/**
 * Template Name: Chat
 *
 * @package WordPress
 * @subpackage qs
 * @since quigleyshore
 */
get_header();

?>

<?php get_template_part( 'blocks/block-profile-top', get_post_type() );?>


<section style="background-color:#353434;" class="qs-section qs-chat bgc-black">
    <div class="container">
        <h1>Trying to get media connection</h1>
        <h3 style="color:#b12005;font-weight: 450;">Realtime communication with WebRTC</h3>

        <div id="videos">
    <video id="localVideo" autoplay muted></video>
    <video id="remoteVideo" autoplay></video>

    <button id="mute">Mute</button>
    <button id="unmute">Unmute</button>
    <button id="stop_video">Hide video</button>
    <button id="start_video">Show video</button>
    <button id="video_call">Video call</button>
    <button id="audio_call">Audio call</button>
    <button id="video_answer">Video Answer</button>
    <button id="audio_answer">Audio Answer</button>
    <button id="no_answer">No Answer</button>

  </div>

    </div>
</section>
<style>
video {
  max-width: 100%;
  width: 320px;
}
</style>


















































<section class="qs-section qs-chat bgc-black">
    <div class="container">
        <div class="qs-chat--box">
            <div class="qs-chat--users">
                <div class="qs-chat--col first">
                    <div class="qs-chat--blocks">
                        <div class="qs-chat--user">
                            <div class="qs-chat--user-img">
                                <span class="online-status online"></span>
                                <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                            </div>
                            <div class="qs-chat--user-details">
                                <div class="qs-chat--user-name">
                                    <div>Robert Stone</div>
                                    <div class="qs-chat--user-msg-count">5</div>
                                    <div class="qs-chat--user-time">5:33PM</div>
                                </div>
                                <div class="qs-chat--user-msg">
                                    Hey Beautiful how was your day? Hey Beautiful how was your day? Hey Beautiful how was your day?
                                </div>
                            </div>
                        </div>
                        <div class="qs-chat--user">
                            <div class="qs-chat--user-img">
                                <span class="online-status online"></span>
                                <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                            </div>
                            <div class="qs-chat--user-details">
                                <div class="qs-chat--user-name">
                                    <div>Joe Baldmen</div>
                                    <div class="qs-chat--user-time">5:33PM</div>
                                </div>
                                <div class="qs-chat--user-msg">Hey Beautiful how was your day? Hey Beautiful how was your day? Hey Beautiful how was your day?  </div>
                            </div>
                        </div>
                        <div class="qs-chat--user">
                            <div class="qs-chat--user-img">
                                <span class="online-status online"></span>
                                <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                            </div>
                            <div class="qs-chat--user-details">
                                <div class="qs-chat--user-name">
                                    <div>Jerry Caine</div>
                                    <div class="qs-chat--user-time">5:33PM</div>
                                </div>
                                <div class="qs-chat--user-msg">Hey Beautiful how was your day? Hey Beautiful how was your day? Hey Beautiful how was your day?  </div>
                            </div>
                        </div>
                        <div class="qs-chat--user">
                            <div class="qs-chat--user-img">
                                <span class="online-status online"></span>
                                <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                            </div>
                            <div class="qs-chat--user-details">
                                <div class="qs-chat--user-name">
                                    <div>James Foreman</div>
                                    <div class="qs-chat--user-time">5:33PM</div>
                                </div>
                                <div class="qs-chat--user-msg">Hey Beautiful how was your day? Hey Beautiful how was your day? Hey Beautiful how was your day?  </div>
                            </div>
                        </div>
                        <div class="qs-chat--user">
                            <div class="qs-chat--user-img">
                                <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                            </div>
                            <div class="qs-chat--user-details">
                                <div class="qs-chat--user-name">
                                    <div>Scott Edwards</div>
                                    <div class="qs-chat--user-time">5:33PM</div>
                                </div>
                                <div class="qs-chat--user-msg">Hey Beautiful how was your day? Hey Beautiful how was your day? Hey Beautiful how was your day?  </div>
                            </div>
                        </div>
                        <div class="qs-chat--user">
                            <div class="qs-chat--user-img">
                                <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                            </div>
                            <div class="qs-chat--user-details">
                                <div class="qs-chat--user-name">
                                    <div>Tom Williams</div>
                                    <div class="qs-chat--user-time">5:33PM</div>
                                </div>
                                <div class="qs-chat--user-msg">Hey Beautiful how was your day? Hey Beautiful how was your day? Hey Beautiful how was your day?  </div>
                            </div>
                        </div>
                        <div class="qs-chat--user">
                            <div class="qs-chat--user-img">
                                <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                            </div>
                            <div class="qs-chat--user-details">
                                <div class="qs-chat--user-name">
                                    <div>Alex McShane</div>
                                    <div class="qs-chat--user-time">5:33PM</div>
                                </div>
                                <div class="qs-chat--user-msg">Hey Beautiful how was your day? Hey Beautiful how was your day? Hey Beautiful how was your day?  </div>
                            </div>
                        </div>
                        <div class="qs-chat--user">
                            <div class="qs-chat--user-img">
                                <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                            </div>
                            <div class="qs-chat--user-details">
                                <div class="qs-chat--user-name">
                                    <div>John Smith</div>
                                    <div class="qs-chat--user-time">5:33PM</div>
                                </div>
                                <div class="qs-chat--user-msg">Hey Beautiful how was your day? Hey Beautiful how was your day? Hey Beautiful how was your day?  </div>
                            </div>
                        </div>
                        <div class="qs-chat--user">
                            <div class="qs-chat--user-img">
                                <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                            </div>
                            <div class="qs-chat--user-details">
                                <div class="qs-chat--user-name">
                                    <div>Sean Stone</div>
                                    <div class="qs-chat--user-time">5:33PM</div>
                                </div>
                                <div class="qs-chat--user-msg">Hey Beautiful how was your day? Hey Beautiful how was your day? Hey Beautiful how was your day?  </div>
                            </div>
                        </div>
                        <div class="qs-chat--user">
                            <div class="qs-chat--user-img">
                                <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                            </div>
                            <div class="qs-chat--user-details">
                                <div class="qs-chat--user-name">
                                    <div>Axel Morenstein</div>
                                    <div class="qs-chat--user-time">5:33PM</div>
                                </div>
                                <div class="qs-chat--user-msg">Hey Beautiful how was your day? Hey Beautiful how was your day? Hey Beautiful how was your day?  </div>
                            </div>
                        </div>
                        <div class="qs-chat--user">
                            <div class="qs-chat--user-img">
                                <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                            </div>
                            <div class="qs-chat--user-details">
                                <div class="qs-chat--user-name">
                                    <div>Robert Stone</div>
                                    <div class="qs-chat--user-time">5:33PM</div>
                                </div>
                                <div class="qs-chat--user-msg">Hey Beautiful how was your day? Hey Beautiful how was your day? Hey Beautiful how was your day?  </div>

                            </div>
                        </div>
                        <div class="qs-chat--user">
                            <div class="qs-chat--user-img">
                                <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                            </div>
                            <div class="qs-chat--user-details">
                                <div class="qs-chat--user-name">
                                    <div>Joe Baldmen</div>
                                    <div class="qs-chat--user-time">5:33PM</div>
                                </div>
                                <div class="qs-chat--user-msg">Hey Beautiful how was your day? Hey Beautiful how was your day? Hey Beautiful how was your day?  </div>
                            </div>
                        </div>
                        <div class="qs-chat--user">
                            <div class="qs-chat--user-img">
                                <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                            </div>
                            <div class="qs-chat--user-details">
                                <div class="qs-chat--user-name">
                                    <div>Jerry Caine</div>
                                    <div class="qs-chat--user-time">5:33PM</div>
                                </div>
                                <div class="qs-chat--user-msg">Hey Beautiful how was your day? Hey Beautiful how was your day? Hey Beautiful how was your day?  </div>
                            </div>
                        </div>
                        <div class="qs-chat--user">
                            <div class="qs-chat--user-img">
                                <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                            </div>
                            <div class="qs-chat--user-details">
                                <div class="qs-chat--user-name">
                                    <div>James Foreman</div>
                                    <div class="qs-chat--user-time">5:33PM</div>
                                </div>
                                <div class="qs-chat--user-msg">Hey Beautiful how was your day? Hey Beautiful how was your day? Hey Beautiful how was your day?  </div>
                            </div>
                        </div>
                        <div class="qs-chat--user">
                            <div class="qs-chat--user-img">
                                <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                            </div>
                            <div class="qs-chat--user-details">
                                <div class="qs-chat--user-name">
                                    <div>Scott Edwards</div>
                                    <div class="qs-chat--user-time">5:33PM</div>
                                </div>
                                <div class="qs-chat--user-msg">Hey Beautiful how was your day? Hey Beautiful how was your day? Hey Beautiful how was your day?  </div>
                            </div>
                        </div>
                        <div class="qs-chat--user">
                            <div class="qs-chat--user-img">

                                <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                            </div>
                            <div class="qs-chat--user-details">
                                <div class="qs-chat--user-name">
                                    <div>Tom Williams</div>
                                    <div class="qs-chat--user-time">5:33PM</div>
                                </div>
                                <div class="qs-chat--user-msg">Hey Beautiful how was your day? Hey Beautiful how was your day? Hey Beautiful how was your day?  </div>
                            </div>
                        </div>
                        <div class="qs-chat--user">
                            <div class="qs-chat--user-img">
                                <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                            </div>
                            <div class="qs-chat--user-details">
                                <div class="qs-chat--user-name">
                                    <div>Alex McShane</div>
                                    <div class="qs-chat--user-time">5:33PM</div>
                                </div>
                                <div class="qs-chat--user-msg">Hey Beautiful how was your day? Hey Beautiful how was your day? Hey Beautiful how was your day?  </div>
                            </div>
                        </div>
                        <div class="qs-chat--user">
                            <div class="qs-chat--user-img">
                                <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                            </div>
                            <div class="qs-chat--user-details">
                                <div class="qs-chat--user-name">
                                    <div>John Smith</div>
                                    <div class="qs-chat--user-time">5:33PM</div>
                                </div>
                                <div class="qs-chat--user-msg">Hey Beautiful how was your day? Hey Beautiful how was your day? Hey Beautiful how was your day?  </div>
                            </div>
                        </div>
                        <div class="qs-chat--user">
                            <div class="qs-chat--user-img">
                                <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                            </div>
                            <div class="qs-chat--user-details">
                                <div class="qs-chat--user-name">
                                    <div>Sean Stone</div>
                                    <div class="qs-chat--user-time">5:33PM</div>
                                </div>
                                <div class="qs-chat--user-msg">Hey Beautiful how was your day? Hey Beautiful how was your day? Hey Beautiful how was your day?  </div>
                            </div>
                        </div>
                        <div class="qs-chat--user">
                            <div class="qs-chat--user-img">
                                <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                            </div>
                            <div class="qs-chat--user-details">
                                <div class="qs-chat--user-name">
                                    <div>Axel Morenstein</div>
                                    <div class="qs-chat--user-time">5:33PM</div>
                                </div>
                                <div class="qs-chat--user-msg">Hey Beautiful how was your day? Hey Beautiful how was your day? Hey Beautiful how was your day?  </div>
                            </div>
                        </div>
                    </div>

                    <div class="qs-chat--paging">
                        <ul>
                            <li>
                                <span>1</span>
                            </li>
                            <li>
                                <a href="">
                                    2
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    3
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    4
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="qs-chat--display">
                <div class="qs-chat--col second">
                    <div class="qs-chat--display-head">
                        <a class="back-label" href="#back">
                            <i class="fa fa-chevron-left"></i>
                            Back
                        </a>
                        <label class="qs-switch switch-primary">
                            <input type="checkbox" name="" value="">
                            <span></span>
                        </label>
                    </div>

                    <div class="qs-chat--display-body">
                        <div class="qs-chat--display-active-user">
                            <div class="qs-chat--user">
                                <div class="qs-chat--user-img">
                                    <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                                </div>
                                <div class="qs-chat--user-details">
                                    <div class="qs-chat--user-name">
                                        <div>Axel Morenstein</div>
                                        <div class="qs-chat--user-time">5:33PM</div>
                                    </div>
                                    <div class="qs-chat--user-msg"> 34, Austin TX  </div>
                                </div>
                            </div>
                        </div>
                        <div class="qs-chat--display-chat">
                            <div class="qs-chat--display-msg in">
                                <div class="msg-left">
                                    <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                                </div>
                                <div class="msg-right">
                                    <div class="qs-chat--display-msg-name">
                                        Robert
                                    </div>
                                    <div class="qs-chat--display-msg-text">
                                        Just coming home from work, and you?
                                    </div>
                                    <div class="qs-chat--display-msg-text">
                                        ;)
                                    </div>
                                    <div class="qs-chat--display-msg-date">
                                        6:33pm, Today
                                    </div>
                                </div>
                            </div>
                            <div class="qs-chat--display-msg out">
                                <div class="msg-right">
                                    <div class="qs-chat--display-msg-name">
                                        Madison
                                    </div>
                                    <div class="qs-chat--display-msg-text">
                                        Just coming home from work, and you?
                                    </div>
                                    <div class="qs-chat--display-msg-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lacinia elit id enim iaculis, ac posuere felis venenatis.
                                    </div>
                                    <div class="qs-chat--display-msg-date">
                                        6:33pm, Today
                                    </div>
                                </div>
                                <div class="msg-left">
                                    <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                                </div>
                            </div>

                            <div class="qs-chat--display-msg in">
                                <div class="msg-left">
                                    <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                                </div>
                                <div class="msg-right">
                                    <div class="qs-chat--display-msg-name">
                                        Robert
                                    </div>
                                    <div class="qs-chat--display-msg-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lacinia elit id enim iaculis, ac posuere felis venenatis.
                                    </div>
                                    <div class="qs-chat--display-msg-text">
                                        :D
                                    </div>
                                    <div class="qs-chat--display-msg-date">
                                        6:33pm, Today
                                    </div>
                                </div>
                            </div>
                            <div class="qs-chat--display-msg in">
                                <div class="msg-left">
                                    <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                                </div>
                                <div class="msg-right">
                                    <div class="qs-chat--display-msg-name">
                                        Robert
                                    </div>
                                    <div class="qs-chat--display-msg-text">
                                        Just coming home from work, and you?
                                    </div>
                                    <div class="qs-chat--display-msg-text">
                                        ;)
                                    </div>
                                    <div class="qs-chat--display-msg-date">
                                        6:33pm, Today
                                    </div>
                                </div>
                            </div>
                            <div class="qs-chat--display-msg out">
                                <div class="msg-right">
                                    <div class="qs-chat--display-msg-name">
                                        Madison
                                    </div>
                                    <div class="qs-chat--display-msg-text">
                                        Just coming home from work, and you?
                                    </div>
                                    <div class="qs-chat--display-msg-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lacinia elit id enim iaculis, ac posuere felis venenatis.
                                    </div>
                                    <div class="qs-chat--display-msg-date">
                                        6:33pm, Today
                                    </div>
                                </div>
                                <div class="msg-left">
                                    <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                                </div>
                            </div>

                            <div class="qs-chat--display-msg in">
                                <div class="msg-left">
                                    <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                                </div>
                                <div class="msg-right">
                                    <div class="qs-chat--display-msg-name">
                                        Robert
                                    </div>
                                    <div class="qs-chat--display-msg-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lacinia elit id enim iaculis, ac posuere felis venenatis.
                                    </div>
                                    <div class="qs-chat--display-msg-text">
                                        :D
                                    </div>
                                    <div class="qs-chat--display-msg-date">
                                        6:33pm, Today
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="qs-chat--display-foot">
                        <div class="qs-chat--display-foot-img">
                            <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                        </div>
                        <div class="qs-chat--display-foot-input">
                            <textarea placeholder="Type something ..." name="" id=""></textarea>
                        </div>
                        <button class="qs-btn btn-primary">
                            <i class="fa fa-send-o"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
