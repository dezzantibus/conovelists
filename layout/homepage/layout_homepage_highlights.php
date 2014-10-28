<?php

class layout_homepage_highlights extends layout
{

	private $stories;

	function __construct( data_array $stories )
	{
		$this->stories = $stories;
	}
	
	private function render()
    {
		
		foreach( $this->stories->getData() as $story )
		{
			echo 
			'<article class="clearfix">',
				'<div class="post-date">',
					'May 26, 2014 | <a href="">Melissa Sing </a> <span><a href="">11 Comments</a></span>',
				'</div>',	
				'<h2><a href="post-typography.html">We don\'t have a brig</a></h2>',
				'<p>',
					'Use this resource to highlight the points of interest of your products. Just a click ',
					'to open a brief description of each point, allowing your user to get a deep and fast ',
					'understanding of your product features. <a class="" href="post-typography.html">Read more</a>',
				'</p>',
			'</article>';
		}
				
    }
	
}

