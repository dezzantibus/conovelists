<?php

class layout_footer extends layout
{

	/** @var $statistics data_statistics */
	private $statistics;

	function __construct( data_statistics $statistics )
	{
		$this->statistics = $statistics;
	}
	
	public function render()
	{
		
		echo
		'<footer>',
			'<div class="footer">',
				'<div class="container">',
					'<div class="row">';
					
						$this->stats();

						$this->recentPosts();
						
						$this->tags();

					echo
					'</div>',
				'</div>',
			'</div>',
			'<div class="copyright">',
				'<div class="container">',
					'<p class="pull-left">Designed by <a href="http://angelostudio.net">Angelo Studio.</a></p>',
					'<ul class="social-links pull-right">',
						'<li><a href="#link"><i class="icon-twitter"></i></a></li>',
						'<li><a href="#link"><i class="icon-facebook"></i></a></li>',
						'<li><a href="#link"><i class="icon-googleplus"></i></a></li>',
					'</ul>',
				'</div>',
			'</div>',
		'</footer>';
	
	}
	
	private function stats()
	{
		
		echo
		'<div class="col-sm-4 col-md-4 footer-widget">',
			'<h3>Statistics</h3>',

			'<span>In the last ', $this->statistics->days, ' days there have been</span>',

			'<div class="stats">',
				'<div class="line">',
					'<span class="counter">', $this->statistics->stories, '</span>',
					'<span class="caption">New stories</span>',
				'</div>',
				'<div class="line">',
					'<span class="counter">', $this->statistics->chapters, '</span>',
					'<span class="caption">New chapters</span>',
				'</div>',
				'<div class="line">',
					'<span class="counter">', $this->statistics->users, '</span>',
					'<span class="caption">New users</span>',
				'</div>',                 
			'</div>',
		'</div>';
	
	}
	
	private function recentPosts()
	{
		
		echo
		'<div class="col-sm-4 col-md-4 footer-widget">',
			'<h3>Recent posts</h3>',
			'<div class="post-recent-widget">',
				'<div class="row">',
					'<div class="col-sm-12">',
						'<div class="media">',
							'<a class="pull-left" href="post-video.html"><img class="media-object" src="img/img2.jpg" width="80" alt=""></a>',
							'<div class="media-body">',
								'<h4 class="media-heading"><a href="post-video.html">But I\'ve never been to the moon!</a></h4>',
								'<p class="post-date">may 10, 2014</p>',
							'</div>',
						'</div>',
						'<div class="media">',
							'<a class="pull-left" href="post-typography.html"><img class="media-object" src="img/img1.jpg" width="80" alt=""></a>',
							'<div class="media-body">',
								'<h4 class="media-heading"><a href="post-typography.html">We don\'t have a brig</a></h4>',
								'<p class="post-date">september 27, 2014</p>',
							'</div>',
						'</div>',
						'<div class="media">',
							'<a class="pull-left" href="post-image.html"><img class="media-object" src="img/img3.jpg" width="80" alt=""></a>',
							'<div class="media-body">',
								'<h4 class="media-heading"><a href="post-image.html">Every other day it\'s food, food, food.</a></h4>',
								'<p class="post-date">april 2, 2014</p>',
							'</div>',
						'</div>',
						
					'</div>',
				'</div>',
			'</div>',
		'</div>';
		
	}
	
	private function tags()
	{
		
		echo
		'<div class="col-sm-4 col-md-4 footer-widget clearfix">',
			'<h3>Tags</h3>',
			'<ul class="tags">',
				'<li><a href="#">OpenPGP</a></li>',
				'<li><a href="#">Django</a></li>',
				'<li><a href="#">Bitcoin</a></li>',
				'<li><a href="#">Security</a></li>',
				'<li><a href="#">GNU/Linux</a></li>',
				'<li><a href="#">Git</a></li>',
				'<li><a href="#">Homebrew</a></li>',
				'<li><a href="#">Debian</a></li> ',                           
			'</ul>',
		'</div>';

	}
	
}