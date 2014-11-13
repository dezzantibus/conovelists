<?php

class layout_homepage_content extends layout
{

	function __construct()
	{
		
		$this->addChild( new layout_homepage_highlights() );
		
		$this->addChild( new layout_homepage_popular() );
		
	}
	
	private function renderTop()
    {
		echo 
		'<div id="start" class="container content">',
			'<div class="row">',
				'<div class="col-md-10 col-md-offset-1">';
    }

    private function renderBottom()
    {
				echo
				'</div>',	
			'</div>', //end row -->
		'</div>';		
    }

	
}
