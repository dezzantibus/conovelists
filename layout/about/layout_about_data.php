<?php

class layout_about_data extends layout
{

    public function render()
    {
        echo
        '<div class="col-sm-9 col-md-8 ">',
            '<div class="post-intro">Use this resource to highlight the points of interest of your products. Just a click to open a brief description of each point, allowing your user to get a deep and fast understanding of your product features.</div>',
            '<p>Fry! Quit doing the right thing, you jerk! Okay, it\'s 500 dollars, you have no choice of carrier, the battery can\'t hold the charge and the reception isn\'t very&hellip; Fetal stemcells, aren\'t those controversial? WINDMILLS DO NOT WORK THAT WAY! GOOD NIGHT! Kids don\'t turn rotten just from watching TV.</p>',
            '<p>Leela, Bender, we\'re going grave robbing. We need rest.  The spirit is willing, but the flesh is spongy and bruised. Why not indeed! Oh, I don\'t have time for this.  I have to go and buy a single piece of fruit with a coupon and then return it, making people wait behind me while I complain.</p>',
        '</div>',
        '<div class="col-sm-3 col-md-4">',
            '<img src="img/author-sing.jpg" class="img-responsive img-circle about-portrait" alt="Leela, Bender, we\'re going grave robbing." width="300" height="300">',
            '<ul class="social-links outline text-center">',
                '<li><a href="#link"><i class="icon-twitter"></i></a></li>',
                '<li><a href="#link"><i class="icon-facebook"></i></a></li>',
                '<li><a href="#link"><i class="icon-googleplus"></i></a></li>',
            '</ul>',
        '</div>';
    }

}



