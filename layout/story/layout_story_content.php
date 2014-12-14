<?php

class layout_story_content extends layout
{

	/** @var $chapter data_chapter */
	private $chapter;
	
	/** @var $popular layout_popular */
	private $popular;

	/** @var $branches data_array */
	private $branches;

	/** @var $comments data_array */
	private $comments;

	function __construct( data_chapter $chapter, data_array $popular, data_array $branches, data_array $comments )
	{
		
		$this->chapter  = $chapter;
		
		$this->popular  = new layout_popular( $popular );
		
		$this->branches = $branches;
	
		$this->comments = $comments;
		
	}
	
	protected function render()
    {
		
		echo 
		'<div class="archives container content">',
			'<div class="row">',
				'<div class="col-md-10 col-md-offset-1">';
				
				$this->chapterContent();
				
				$this->chapterAuthor();
				
				$this->popular->render();
				
				$this->chapterBranches();

				$this->chapterComments();

				echo
				'</div>',
			'</div>',
		'</div>';		

    }
	
	private function chapterContent()
	{
		
		echo
		'<div class="post-date">',
			$this->chapter->dateForDisplay( $this->chapter->created ), ' | <a href="">', $this->chapter->user->username ,'</a> <!--span><a href="">11 Comments</a></span-->',
		'</div>',
		'<h1>', $this->chapter->title, '</h1>';
		
		if( $this->chapter->level == 1 )
		{
			echo
			'<div class="post-intro">', $this->chapter->story->brief, '</div>';
		}
		else
		{
			echo
			'<h4>A chapter of:', $this->chapter->story->title, '</h4>';
		}

		$link = $this->chapter->getLink();

		echo
		'<ul class="social-links outline text-center">',
			'<li><a href="https://twitter.com/home?status=', $link, '" onclick="window.open(\'https://twitter.com/home?status=', $link, '\', \'newwindow\', \'width=600, height=229\'); return false;"><i class="icon-twitter"></i></a></li>',
			'<li><a href="https://www.facebook.com/sharer/sharer.php?u=', $link, '" onclick="window.open(\'https://www.facebook.com/sharer/sharer.php?u=', $link, '\', \'newwindow\', \'width=600, height=229\'); return false;"><i class="icon-facebook"></i></a></li>',
			'<li><a href="https://plus.google.com/share?url=', $link, '" onclick="window.open(\'https://plus.google.com/share?url=', $link, '\', \'newwindow\', \'width=600, height=450\'); return false;"><i class="icon-googleplus"></i></a></li>',
		'</ul>';
		
	}
	
	private function chapterAuthor()
	{
		echo
		'<div id="author" class="clearfix">',
			'<img class="img-circle" alt="" src="img/author-sing.jpg" height="96" width="96">',
			'<div class="author-info">',
				'<h3>', $this->chapter->user->username, '</h3>',
				'<p>', $this->chapter->user->catchphrase, ' <!--You can follow her on <a href="">Twitter</a> -->.</p>',
			'</div>',
		'</div>';
	}
	
	private function chapterBranches()
	{
		
		$number = $this->branches->count();
		
		if( $number > 0 )
		{
			
			echo
			'<h3>', $number, ' Branch', $number == 1 ? '' : 'es', '</h3>',
			'<div class="media">';
			
				foreach( $this->branches->getData() as $chapter )
				{
					
					echo
					'<div class="media">',
						'<a class="pull-left avatar" href="', $chapter->user->profileLink(), '">',
							'<img class="media-object img-circle" src="', $chapter->user->avatar(), '" width="40" height="40" alt="">',
						'</a>',
						'<div class="media-body">',
							'<h4 class="media-heading"><a href="', $chapter->user->profileLink(), '">', $chapter->user->username, '</a><span>', $chapter->dateForDisplay( $comment->created ), '</span></h4>',
							'<p><a href="">', $chapter->title, '</a></p>',
						'</div>',
					'</div>';
				
				}
			
			echo
			'</div>';
		
		}
		
		// @TODO add new branch link
	
	}
	
	private function chapterComments()
	{
		
		$number = $this->comments->count();
		
		echo
		'<h3>', $number, ' Comment', $number == 1 ? '' : 's', '</h3>',
		'<div class="media">';
		
			foreach( $this->comments->getData() as $comment )
			{
				
				echo
				'<div class="media">',
					'<a class="pull-left avatar" href="', $comment->user->profileLink(), '">',
						'<img class="media-object img-circle" src="', $comment->user->avatar(), '" width="40" height="40" alt="">',
					'</a>',
					'<div class="media-body">',
						'<h4 class="media-heading"><a href="', $comment->user->profileLink(), '">', $comment->user->username, '</a><span>', $comment->dateForDisplay( $comment->created ), '</span></h4>',
						$comment->body,
					'</div>',
				'</div>';
			
			}
		
		echo
		'</div>';
		
		// @TODO add new comment form
	
	}

}












