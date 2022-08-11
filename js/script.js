jQuery(document).ready( function() {
   jQuery(".smily form span").each(function(){
       var thiss = jQuery(this);
      jQuery(this).find('input').click(function(e) {
        e.preventDefault(); 
        thiss.parent().parent().find('.res').html('Sending...');
        var smily = jQuery(this).val();
        var my_user_id = jQuery('#my_user_id').val();
        var user_id = thiss.parent().find('#user_id').val();
         jQuery.ajax({
             type : "get",
             dataType : "json",
             url : myAjax.ajaxurl,
             data : {action: "my_user_vote", smily : smily, my_user_id : my_user_id, user_id : user_id, add_emo:1},
             success: function(response) {
                 if(response.type == "success") {
                  thiss.parent().parent().find('.res').html('Emoji Sent');
                  thiss.remove();
                  var timeDelay = 5000;       // DELAY IN MILLISECONDS (OR SIMPLY, 5 SECONDS DELAY).
                    setTimeout(clearContents, timeDelay);
                    function clearContents() {
                        thiss.parent().parent().find('.res').html('');
                    }
                }
                else {
                   alert("Your vote could not be added")
                }
             }
          });   
      });
   });
   
   jQuery(".tab_cnt_cnt").each(function(){
       var thiss = jQuery(this);
       jQuery(this).find('#clear_emoj').click(function(e) {
           
        e.preventDefault(); 
        var my_user_id = jQuery('#my_user_id').val();
        var user_id = thiss.find('#user_id').val();
         jQuery.ajax({
             type : "get",
             dataType : "json",
             url : myAjax.ajaxurl,
             data : {action: "my_user_vote", user_id : user_id, my_user_id : my_user_id, delete_emo: 1},
             success: function(response) {
                 if(response.type == "success") {
                  window.location.href = 'https://kleoseo.com/indica/blocked-box/';
                }
                else {
                   alert("Your Emojis could not be added")
                }
             }
          });   
      });
   });
 });