<?php

class layout_story_chapter_cell extends layout
{

	/** @var $chapter data_chapter  */
    private $chapter;
	
	private $last;

	function __construct( data_chapter $chapter, $last=false )
	{
		
		$this->chapter = $chapter;
		
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
				$this->chapter->getDate(), ' | <a href="/profile/', $this->chapter->user->username, '.html">', $this->chapter->user->username, '</a>',
			'</div>',	
			'<h2><a href="', $this->chapter->getLink(), '">', $this->chapter->title, '</a></h2>',
			'<p>', $this->chapter->story->brief, '</p>',
		'</article>';
	
	}
		
}