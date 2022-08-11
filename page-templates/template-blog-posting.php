<?php

/**

 * Template Name: Blog Posting

 *

 * @package WordPress

 * @subpackage qs

 * @since quigleyshores

 */

get_header();





?>



<section class="qs-section has-bgc bgc-darker bg_top_search_mmb bg_top_search_mmbb bg_blocked_box_pg blog-posting_bg_pg">

    <div class="container">

        <div class="row">
            <div class="col-lg-7 col-md-12 mauto">
               <!--
               <div class="col-lg-12 top_hd_srch_mmbr blog_posting_top_hd">
                        <h1 class="color-black text-center">Quigley Shores</h1>
                    </div>
                -->


                <div class="blocked_ristrict_mmbr write_blog_all_cnt">
                    <h1>Write a Blog</h1>
                    

                    <div class="write_blog_area">
                        <div class="upload_img_cnt_are">
                            <div class="upload-btn-wrapper">
                                  <button class="btn">
                                      <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2022/03/upload_img_i.png" />
                                      Upload cover image
                                  </button>
                                  <input type="file" name="myfile" />
                            </div>
                        </div>

                        <div class="tiitle_area">
                            <input type="text"  placeholder="Blog Title"/>
                        </div>

                        <div class="text_cnt_area">
                            <textarea placeholder="Text area content"></textarea>
                        </div>

                        <div class="ready_to_publish">
                            <h1>Ready to Publish?</h1>
                            <div class="all_btns_area_publish">
                                <span>
                                    <button>Preview</button>
                                    <button>Save Draft</button>
                                    <button>Publish</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

</section>

<?php

get_footer();

