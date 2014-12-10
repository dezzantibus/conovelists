<?php

class layout_homepage_highlights extends layout
{

	private $stories;

	function __construct( data_array $stories )
	{
		$this->stories = $stories;
	}
	
	public function render()
    {
		
		/** @var $story data_story */
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
					$story->getDate(), ' | <a href="">', $story->user->username , '</a> <!--span><a href="">11 Comments</a></span-->',
				'</div>',	
				'<h2><a href="post-typography.html">', $story->title, '</a></h2>',
				'<p>', $story->brief, '<a class="" href="', $story->getLink(), '">Read story</a>',
				'</p>',
			'</article>';
		}
				
    }
	
}

