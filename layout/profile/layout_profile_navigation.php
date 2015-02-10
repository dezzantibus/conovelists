<?php

class layout_profile_navigation extends layout
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
					'<a class="menu-link nav-icon" href="#"><i class="icon-menu2"></i></a>',
                    '<a class="btn btn-blog outline-white pull-right" href="/admin/profile.html">Edit profile</a>',
				'</div>',
			'</div>',
		'</div>';
    }

}