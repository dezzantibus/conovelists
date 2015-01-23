<?php

class layout_popular extends layout
{
	
	private $popular;

	function __construct( data_array $popular )
	{
		$this->popular = $popular;
	}
	
	public function render()
    {
		
		echo 
		'<div class="post-popular">',
			'<div class="row hidden-xs">';
			
				/** @var $chapter data_chapter */
                foreach( $this->popular->getData() as $chapter )
				{
					echo
					'<div class="col-sm-4 col-md-4">',
						'<a href="' . $chapter->getLink() . '"><img src="img/img2.jpg" class="img-responsive" alt="img2"></a>',
						'<h4 class="text-center"><a href="' . $chapter->getLink() . '">' . $chapter->title . '</a></h4>',
						'<p class="post-date text-center">' . $chapter->getDate() . '</p>',
					'</div>';
				}
		
			echo
			'</div>',
			'<div class="row visible-xs">',
				'<div class="col-sm-12">';

                    /** @var $chapter data_chapter */
					foreach( $this->popular->getData() as $chapter )
					{
						echo
						'<div class="media">',
							'<a class="pull-left" href="' . $chapter->getLink() . '"><img class="media-object" src="img/img2.jpg" width="100" alt=""></a>',
							'<div class="media-body">',
								'<h4 class="media-heading"><a href="' . $chapter->getLink() . '">' . $chapter->title . '</a></h4>',
								'<p class="post-date">' . $chapter->getDate() . '</p>',
							'</div>',
						'</div>';
					}
				
				echo
				'</div>',
			'</div>',
		'</div>';

    }
	
}

