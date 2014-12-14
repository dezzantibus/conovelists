<?php

class layout_story_content extends layout
{

	/** @var $chapter data_chapter */
	private $chapter;

	function __construct( data_chapter $chapter )
	{
		
		$this->chapter = $chapter;
		
	}
	
	protected function render()
    {
		
		echo 
		'<div class="archives container content">',
			'<div class="row">',
				'<div class="col-md-10 col-md-offset-1">';
				
				$this->chapterContent();
				
				$this->chapterAuthor();
				
				// popular stories should go here according to the template
				// maybe popular for the category... not yet though
				
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
	}
	
	private function chapterComments()
	{
		/*
		echo
		'<h3>11 Comments</h3>'	
		<div class="media">
			<hr>
			<a class="pull-left avatar" href="#">
				<img class="media-object img-circle" src="img/author-sing.jpg" width="40" height="40" alt="">
			</a>
			<div class="media-body">
				<h4 class="media-heading"><a href="">Melissa Sing</a><span>5h ago | <a href="#">REPLY</a></span></h4>
				<p>Good news, everyone! There's a report on TV with some very bad news! Daddy Bender, we're hungry. One hundred dollars. Leela, Bender, we're going grave robbing.</p>


				<div class="media">
					<a class="pull-left avatar" href="#">
					  <img class="media-object img-circle" src="img/author-red.jpg" width="40" height="40" alt="">
					</a>
					<div class="media-body">
						<h4 class="media-heading"><a href="">Jessica Red</a><span>17h ago | <a href="#">REPLY</a></span></h4>
						<p>Who am I making this out to? You're going back for the Countess, aren't you? Does anybody else feel jealous and aroused and worried? </p>
					</div>
				</div>


				<div class="media">
					<a class="pull-left avatar" href="#">
						 <img class="media-object img-circle" src="img/author-sans.jpg" width="40" height="40" alt="">
					</a>
					<div class="media-body">
						<h4 class="media-heading"><a href="">Dorin Sans</a><span>2d ago | <a href="#">REPLY</a></span></h4>
						<p>Fetal stemcells, aren't those controversial? Ven ve voke up, ve had zese wodies. You guys realize you live in a sewer, right? And why did 'I' have to take a cab? Why would I want to know that? Are you crazy? I can't swallow that.</p>
					</div>
				</div>
			</div>
			<div class="media">
					<a class="pull-left avatar" href="#">
					  <img class="media-object img-circle" src="img/author-red.jpg" width="40" height="40" alt="">
					</a>
					<div class="media-body">
						<h4 class="media-heading"><a href="">Jessica Red</a><span>3d ago | <a href="#">REPLY</a></span></h4>
						<p>It may comfort you to know that Fry's death took only fifteen seconds, yet the pain was so intense, that it felt to him like fifteen years.  </p>
					</div>
				</div>
		</div>
		*/
		
	}

}