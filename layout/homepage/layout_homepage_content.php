<?php

class layout_homepage_content extends layout
{

	function __construct( data_array $stories, data_array $popular )
	{
		
		$this->addChild( new layout_homepage_highlights( $stories ) );
		
		$this->addChild( new layout_popular( $popular ) );
		
	}
	
	protected function renderTop()
    {
		echo 
		'<div id="start" class="container content">',
			'<div class="row">',
				'<div class="col-md-10 col-md-offset-1">';
    }

    protected function renderBottom()
    {
				echo
				'</div>',	
			'</div>', //end row -->
		'</div>';		
    }

	
}
