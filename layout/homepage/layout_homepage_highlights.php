<?php

class layout_homepage_highlights extends layout
{

	private $stories;

	function __construct()
	{
		$this->stories = new data_array();
		$this->stories->add( new data_user )
			 		  ->add( new data_user )
			 		  ->add( new data_user );
	}
	
	public function render()
    {
		
		while( $story = $this->stories->first()  )
		{

            if( $this->stories->isEmpty() )
            {
                $class = 'clearfix last';
            }
            else
            {
                $class = 'clearfix';
            }

			echo 
			'<article class="', $class, '">',
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

