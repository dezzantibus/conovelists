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
                    '<img class="bordered img-circle" alt="" src="', $this->profile->user->getAvatar(), '" height="96" width="96">',
                    '<h2><b>', $this->profile->user->username,'</b></h2>',
                    '<p>', $this->profile->user->catchphrase, '</p>',
                    '<ul class="social-links outline-white">';

                        if( !empty( $this->profile->user->twitter ) )
                        {
                            echo '<li><a href="http://twitter.com/', $this->profile->user->twitter,'"><i class="icon-twitter"></i></a></li>';
                        }

                        if( !empty( $this->profile->user->facebook ) )
                        {
                            echo '<li><a href="http://www.facebook.com/', $this->profile->user->facebook, '"><i class="icon-facebook"></i></a></li>';
                        }

                        if( !empty( $this->profile->user->google ) )
                        {
                            echo '<li><a href="https://plus.google.com/u/0/', $this->profile->user->google, '/about"><i class="icon-googleplus"></i></a></li>';
                        }

                    echo
                    '</ul>',
                '</div>',
            '</div>',
        '</section>';

	}
	
}


