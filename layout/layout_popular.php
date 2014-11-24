<?php

class layout_popular extends layout
{
	
	private $popular;

	function __construct()
	{
		$this->popular = new data_array();
				$this->popular->add( new data_user )
			 		  ->add( new data_user )
			 		  ->add( new data_user );

	}
	
	public function render()
    {
		
		echo 
		'<div class="post-popular">',
			'<div class="row hidden-xs">';
			
				foreach( $this->popular->getData() as $story )
				{
					echo
					'<div class="col-sm-4 col-md-4">',
						'<a href="post-video.html"><img src="img/img2.jpg" class="img-responsive" alt="img2"></a>',
						'<h4 class="text-center"><a href="post-video.html">But I\'ve never been to the moon!</a></h4>',
						'<p class="post-date text-center">MAY 10, 2014</p>',
					'</div>';
				}
		
			echo
			'</div>',
			'<div class="row visible-xs">',
				'<div class="col-sm-12">';
				
					foreach( $this->popular->getData() as $story )
					{
						echo
						'<div class="media">',
							'<a class="pull-left" href="post-video.html"><img class="media-object" src="img/img2.jpg" width="100" alt=""></a>',
							'<div class="media-body">',
								'<h4 class="media-heading"><a href="post-video.html">But I\'ve never been to the moon!</a></h4>',
								'<p class="post-date">may 10, 2014</p>',
							'</div>',
						'</div>';
					}
				
				echo
				'</div>',
			'</div>',
		'</div>';

    }
	
}

