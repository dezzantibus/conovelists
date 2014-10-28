<?php

class layout_homepage_body extends layout
{

	function __construct()
	{
		
		$this->addChild( new layout_main_navigation() );
		
		$this->addChild( new layout_hero( 'Welcome to Co-Novelists', 'Come and enjoy a good story', 'image-bg' ) );
		
		$this->addChild( new layout_homepage_content() );
		
	}
	
	private function renderTop()
    {
		echo '<div id="wrap">';
    }

    private function renderBottom()
    {
		echo '</div>';
    }
	
}