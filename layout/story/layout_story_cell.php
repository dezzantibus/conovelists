<?php

class layout_story_cell extends layout
{

	private $story;
	
	private $last;

	function __construct( data_story $story, $last=false )
	{
		
		$this->story = $story;
		
		$this->last = $last;
		
	}
	
	public function render()
	{
	
		if( $this->last )
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
				$this->story->getDate(), ' | <a href="">Melissa Sing </a> <span><a href="">11 Comments</a></span>',
			'</div>',	
			'<h2><a href="post-typography.html">', $this->story->title, '</a></h2>',
			'<p>', $this->story->brief, '</p>',
		'</article>';	
	
	}
		
}