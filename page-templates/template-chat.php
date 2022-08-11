<?php
/**
 * Template Name: Chat
 *
 * @package WordPress
 * @subpackage qs
 * @since quigleyshore
 */
session_start();

get_header();
$_SESSION['page'] = 'chat';
?>

<?php get_template_part( 'blocks/block-profile-top', get_post_type() );?>


<section style="background-color:#353434;" class="qs-section qs-chat bgc-black">

<audio hidden id="call_music" loop muted="muted">
  <source src="<?php echo get_template_directory_uri(  ) . '/videos/call.mp3' ?>" type="audio/mpeg">
</audio>


    <div class="container">
  
    <div id="overlay"></div>
<div id="popup">
    <div class="popupcontrols">
        <span id="popupclose">X</span>
    </div>
    <div class="popupcontent">
        <div id="videos">
            <video id="localVideo" style="border: 10px yellow dashed"  autoplay muted></video>
            <video id="remoteVideo" autoplay></video>
            <button id="mute">Mute</button>
            <button id="unmute">Unmute</button>
            <button id="stop_video">Hide video</button>
            <button id="start_video">Show video</button>
            <button id="end_call">End call</button>
            <button id="video_answer">Video Answer</button>
            <button id="audio_answer">Audio Answer</button>
            <button id="no_answer">No Answer</button>
        </div>
    </div>
</div>
        

    </div>
</section>

<style>
video {
  max-width: 100%;
  width: 320px;
}

#overlay {
  display: none;
  position: absolute;
  top: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  opacity: 0.8;
  z-index: 100;
}
#popup {
    display: none;
    position: absolute;
    top: 400px;
    left: 400px;
    background: #fff;
    width: 1000px;
    height: 400px;
    margin-left: -300px;
    margin-top: -200px;
    z-index: 200;
}
#popupclose {
  float: right;
  padding: 10px;
  cursor: pointer;
}
.popupcontent {
  padding: 10px;
}
#button {
  cursor: pointer;
}
</style>
<section class="qs-section qs-chat bgc-black">
    <div class="container">
        <div class="qs-chat--box">
            <div class="qs-chat--users">
                <div class="qs-chat--col first">
                    <div id="chat_blocks" class="qs-chat--blocks">
                        <div hidden id="user_list"></div>
                        
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
                <div id="default_image"><img src="https://images.unsplash.com/photo-1521840891849-69baa8035cc7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80" alt=""></div>
                <div class="qs-chat--col second">
                    <img id="default_chat_image" src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_960_720.jpg" alt="">
                    <div class="qs-chat--display-head">
                      <button id="make_dating">Make a Dating</button>
                      <div hidden id="dating_picker">
                      <input type="datetime-local" id="dating_time" name="birthdaytime" >
                      <input id="submit_dating" type="submit">
                      </div>
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
                                <div id="chat_user_image" class="qs-chat--user-img">
                                    <img src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                                </div>
                                <div class="qs-chat--user-details">
                                    <div class="qs-chat--user-name">
                                        <div class="chat_username">Axel Morenstein</div>
                                        <div class="qs-chat--user-time">5:33PM</div>
                                    </div>
                                    <div class="qs-chat--user-msg"> 34, Austin TX  </div>
                                </div>
                            </div>
                        </div>
                        <div class="qs-chat--display-chat">
                            <div id="inserting_messages"></div>

                            
                        </div>
                    </div>

                    <div class="qs-chat--display-foot">
                        <div class="qs-chat--display-foot-img">
                            <img id="s_image" src="<?php echo get_template_directory_uri().'/images/chat.png' ?>" alt="">
                        </div>
                        <div class="qs-chat--display-foot-input">
                        <button id="record_voice">RECORD VOICE </button>
                        <button id="stop_voice">STOP RECORDING</button>
                        <button id="video_call">Video call</button>
                        <button id="audio_call">Audio call</button>
                            <textarea placeholder="Type something ..." name="" id="message" wrap=physical></textarea>
                        </div>
                        <button id="send_message" class="qs-btn btn-primary">
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
