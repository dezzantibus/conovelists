<?php

class layout_main_navigation extends layout
{

	function __construct()
	{
	
	}
	
	public function render()
    {
		echo 
		'<div id="main-nav" class="">',
			'<div class="container">',
				'<div class="nav-header">',
					//'<a class="nav-brand" href="/"><i class="icon-lime"></i>Key Lime</a>',
					'<a class="menu-link nav-icon" href="#"><i class="icon-menu2"></i></a>';
					if( !isset( $_SESSION['user']->id ) )
					{
						echo
						'<a class="btn btn-blog outline-white pull-right" href="#" data-toggle="modal" data-target="#loginModal">Login</a>';
					}
				echo
				'</div>',
			'</div>',
		'</div>';
    }

}