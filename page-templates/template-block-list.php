<?php
/**
 * Template Name: Block List
 */
get_header();
?>
<section class="qs-section has-bgc bgc-darker color-white qs-block-page">
    <div class="container">
        <div class="text-center">
            <div class="qs-block-page--title text-center">
                <h1 class="text-center">The Blocked Box</h1>

            </div>
        </div>
        <p class="qs-block-page--desc text-center">On this page appear the Usernames of the men you have blocked, and the
        date blocked. You can add a notation to remind you why</p>

        <div class="qs-blist--scrl">
            <table class="qs-blist">
                <tr>
                    <th class="qs-blist--user">Username</th>
                    <th class="qs-blist--date">Date Blocked</th>
                    <th class="qs-blist--msg">Reminder</th>
                    <th class="qs-blist--check">Check to unblock</th>
                </tr>
                <tr>
                    <td class="qs-blist--user">Julia Smith</td>
                    <td class="qs-blist--date">
                        <time>May 3, 2021</time>
                    </td>
                    <td class="qs-blist--msg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque fugiat fugit incidunt odit provident quas repellendus veritatis voluptate? Amet, veritatis.</td>
                    <td class="qs-blist--check ">
                        <div class="qs-blist--check-middle">
                            <label class="qs-chk-rad chk-rad-primary">
                                <input type="checkbox" name="creative">
                                <span></span>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="qs-blist--user">Antonio Maldini</td>
                    <td class="qs-blist--date">
                        <time>Jun 12, 2021</time>
                    </td>
                    <td class="qs-blist--msg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </td>
                    <td class="qs-blist--check ">
                        <div class="qs-blist--check-middle">
                            <label class="qs-chk-rad chk-rad-primary">
                                <input type="checkbox" name="creative">
                                <span></span>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="qs-blist--user">Angela Davis</td>
                    <td class="qs-blist--date">
                        <time>Jun 12, 2021</time>
                    </td>
                    <td class="qs-blist--msg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa esse necessitatibus voluptate! </td>
                    <td class="qs-blist--check ">
                        <div class="qs-blist--check-middle">
                            <label class="qs-chk-rad chk-rad-primary">
                                <input type="checkbox" name="creative">
                                <span></span>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="qs-blist--user">Julia Smith</td>
                    <td class="qs-blist--date">
                        <time>May 3, 2021</time>
                    </td>
                    <td class="qs-blist--msg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque fugiat fugit incidunt odit provident quas repellendus veritatis voluptate? Amet, veritatis.</td>
                    <td class="qs-blist--check ">
                        <div class="qs-blist--check-middle">
                            <label class="qs-chk-rad chk-rad-primary">
                                <input type="checkbox" name="creative">
                                <span></span>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="qs-blist--user">Antonio Maldini</td>
                    <td class="qs-blist--date">
                        <time>Jun 12, 2021</time>
                    </td>
                    <td class="qs-blist--msg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </td>
                    <td class="qs-blist--check ">
                        <div class="qs-blist--check-middle">
                            <label class="qs-chk-rad chk-rad-primary">
                                <input type="checkbox" name="creative">
                                <span></span>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="qs-blist--user">Angela Davis</td>
                    <td class="qs-blist--date">
                        <time>Jun 12, 2021</time>
                    </td>
                    <td class="qs-blist--msg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa esse necessitatibus voluptate! </td>
                    <td class="qs-blist--check ">
                        <div class="qs-blist--check-middle">
                            <label class="qs-chk-rad chk-rad-primary">
                                <input type="checkbox" name="creative">
                                <span></span>
                            </label>
                        </div>
                    </td>
                </tr>

            </table>
        </div>
    </div>
</section>
<?php
get_footer();