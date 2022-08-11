<?php
/*
Template Name: Account Activation
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
                    Account activation
                </h1>
                <p>Please, check your email, to activate your account</p>
            </div>
        </div>
    </section>
<?php
get_footer();
