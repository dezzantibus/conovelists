<?php

class layout_profile_hero extends layout
{

	private $profile;

	function __construct( data_profile $profile )
	{
		
		$this->profile = $profile;
		
	}
	
	public function render()
	{
		
        echo
        '<section id="hero" class="light-typo">',
            '<div class="container welcome-content">',
                '<div class="middle-text">',
                    '<img class="bordered img-circle" alt="" src="img/author-sing.jpg" height="96" width="96">',
                    '<h2><b>Melissa Sing</b></h2>',
                    '<p>If rubbin\' frozen dirt in your crotch is wrong, hey I don\'t wanna be right.</p>',
                    '<ul class="social-links outline-white">',
                        '<li><a href="#link"><i class="icon-twitter"></i></a></li>',
                        '<li><a href="#link"><i class="icon-facebook"></i></a></li>',
                        '<li><a href="#link"><i class="icon-googleplus"></i></a></li>',
                    '</ul>',
                '</div>',
            '</div>',
        '</section>';

	}
	
}


