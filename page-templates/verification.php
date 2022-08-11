<?php
/**
 * Template Name: Verification
 *
 * @package WordPress
 * @subpackage qs
 * @since quigleyshore
 */
get_header();
?>
<style>
    section {
	background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
	animation: gradient 10s ease infinite;
}

@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}
</style>
    <section class="qs-section qs-thanks--section text-center" style="background-size: 400% 400%">
        <div class="container">
            <div class="qs-thanks">
                <h1 class="qs-section--title">
                    Your account is <span id='ares'></span>
                </h1>
                <p>You will be redirected to next steps</p>
            </div>
        </div>
    </section>

<script>
window.addEventListener("load", ()=> {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const hash = urlParams.get('hash')
    const verUserId = urlParams.get('user_id')
    socket.emit('check activation', {'hash': hash, 'user_id': verUserId})
    socket.on('activation result', e=>{
        let result_text = document.getElementById('ares')
        if(e == 'success'){
             result_text.innerText = 'Activated!'
             setTimeout(() => {
			window.location.href = window.location.origin + '/join-the-quest/join-step-3/';
             }, 3000);

        }else{
            result_text.innerText = 'Failed:('
        }
})
  });


</script>
<?php
get_footer();