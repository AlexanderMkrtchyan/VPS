<?php
/**
 * Template Name: Search
 *
 * @package WordPress
 * @subpackage qs
 * @since quigleyshores
 */
get_header();


?>

<section class="qs-section has-bgc bgc-darker">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mauto">
                <h1 class="color-white text-center"><?php echo the_title() ?></h1>
            </div>
        </div>
    </div>
</section>
<section class="qs-section bgc-gray-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="qs-filter">
                    <div class="qs-filter--part">
                        <h3 class="qs-filter--title">
                                Celebrity Match
                        </h3>
                        <div class="qs-filter--box">
                            <button class="qs-btn btn-primary">
                                Search
                            </button>
                        </div>
                    </div>
                    <div class="qs-filter--part">
                        <h3 class="qs-filter--title">
                            Age
                        </h3>
                        <div class="qs-filter--box filter-labels">
                            <label class="qs-filter--label">
                                <input name="age" type="radio">
                                <span>18-25</span>
                            </label>
                            <label class="qs-filter--label">
                                <input name="age" type="radio">
                                <span>26-30</span>
                            </label>
                            <label class="qs-filter--label">
                                <input name="age" type="radio">
                                <span>31-40</span>
                            </label>
                            <label class="qs-filter--label">
                                <input name="age" type="radio">
                                <span>41-49</span>
                            </label>
                            <label class="qs-filter--label">
                                <input name="age" type="radio">
                                <span>50+</span>
                            </label>
                        </div>
                    </div>
                    <div class="qs-filter--part">
                        <h3 class="qs-filter--title">
                            Distance
                        </h3>
                        <div class="qs-filter--box filter-range">
                            <input type="range">
                        </div>
                    </div>
                    <div class="qs-filter--part">
                        <h3 class="qs-filter--title">
                            Seeking
                        </h3>
                        <div class="qs-filter--box filter-checks">
                            <label class="qs-chk-rad chk-rad-primary">
                                <input type="checkbox" name="casual-dating">
                                <span>Casual Dating</span>
                            </label>
                            <label class="qs-chk-rad chk-rad-primary">
                                <input type="checkbox" name="serious-relationship">
                                <span>Serious Relationship</span>
                            </label>
                            <label class="qs-chk-rad chk-rad-primary">
                                <input type="checkbox" name="friendship">
                                <span>Friendship</span>
                            </label>
                            <label class="qs-chk-rad chk-rad-primary">
                                <input type="checkbox" name="marriage">
                                <span>Marriage</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">

            </div>
        </div>
    </div>
</section>
<?php
get_footer();
