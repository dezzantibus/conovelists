<?php

class layout_menu extends layout
{

    private $categories;
	
	private $bookmarks;

	function __construct( data_array $categories, data_array $bookmarks )
	{

        $this->categories = $categories;

        $this->bookmarks = $bookmarks;

	}
	
	public function render()
	{
		
		echo
		'<div id="menu" class="menu-right">',
			'<ul>',
				'<form class="menu-search" >',
					'<div class="form-group header">',
						'<i class="icon-search searchico"></i>',
						'<input type="text" placeholder="Blog Search">',
						'<a href="#" class="close-menu"><i class="icon-close"></i></a>',
					'</div>',
				'</form>',
				'<li><a href="/"><i class="icon-lime"></i>Home</a></li>',
				'<li class="submenu">',
					'<a href="#"><i class="icon-books"></i>Categories<b class="caret"></b></a>',
					'<ul class="submenu-list">';
						
						/** @var $category data_category */
						foreach( $this->categories->getData() as $category )
						{
							echo '<li><a href="/', $category->url, '.html">', $category->name, /*  this will contain some kind of stat ' <span class="badge golden">2</span>' */ '</a></li>';
						}
						
					echo
					'</ul>',	
				'</li>',
				'<li class="submenu">',
					'<a href="#"><i class="icon-share"></i>Share<b class="caret"></b></a>',
					'<ul class="submenu-list">',
						'<li><a href="post-image.html"><i class="icon-facebook"></i>Facebook</a></li>',
						'<li><a href="post-audio.html"><i class="icon-twitter"></i>Twitter</a></li>',
						'<li><a href="post-video.html"><i class="icon-googleplus"></i>Google+</a></li>',
					'</ul>',		
				'</li>';
				
				if( $_SESSION['user'] instanceof data_user )
				{
				
					echo
					'<li><a href="/admin/my-profile.html"><i class="icon-user"></i>My profile</a></li>',
					'<li class="submenu">',
						'<a href="#"><i class="icon-bookmark"></i>Bookmarks<b class="caret"></b></a>',
						'<ul class="submenu-list">';
						
							/*
							@TODO
							The links for the bookmarks are missing.
							For the moment I don't have the data do build them.
							*/
							
							if( $this->bookmarks->isEmpty() )
							{
								echo '<li><a class="not-link">You have no bookmarks</a></li>';
							}
							else
							{
								/** @var $category data_bookmark */
								foreach( $this->bookmarks->getData() as $bookmark )
								{
									echo '<li><a href="#">', $bookmark->name, '</a></li>';
								}
							}
						
						echo
						'</ul>',		
					'</li>';
				
				}
				else
				{
					echo
					'<li><a href="/admin/register.html"><i class="icon-user"></i>Register</a></li>';
				}
				
				echo
				'<li><a href="/about.html"><i class="icon-tag"></i>About Co-Novelists</a></li>',
				'<li><a href="/frequently-asked-questions.html"><i class="icon-cog"></i>F.A.Q.</a></li>',
				'<li><a href="/contacts.html"><i class="icon-envelope"></i>Contact</a></li>',
				'<li><a href="/terms-and-conditions.html"><i class="icon-file"></i>Terms and conditions</a></li>',
			'</ul>',
		'</div>';
		
	}
	
}