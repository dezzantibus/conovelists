<?php

class layout_footer extends layout
{

	/** @var $statistics data_statistics */
	private $statistics;

    /** @var $tags data_array */
    private $tags;

	function __construct( data_statistics $statistics, data_array $tags )
	{
		$this->statistics = $statistics;
        $this->tags       = $tags;
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
					'<div class="col-sm-12">';

                        /** @var $chapter data_chapter */
                        foreach( $this->statistics->chapters as $chapter )
                        {

                            echo
                            '<div class="media">',
                                '<a class="pull-left" href="', $chapter->getLink(), '"><img class="media-object" src="', $chapter->user->avatar, '" width="80" alt=""></a>',
                                '<div class="media-body">',
                                    '<h4 class="media-heading"><a href="', $chapter->getLink(), '">', $chapter->title , '</a></h4>',
                                    '<p class="post-date">', $chapter->getDate(), '</p>',
                                '</div>',
                            '</div>';

                        }

                    echo
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
			'<ul class="tags">';

                foreach( $this->tags->getData() as $tag => $number )
                {
                    echo
                    '<li><a href="#" data-number"', $number, '">', $tag, '</a></li>';
                }

            echo
			'</ul>',
		'</div>';

	}
	
}