<?php

class layout_about_body extends layout
{

	function __construct( data_statistics $footerStats )
	{
		
		$this->addChild( new layout_main_navigation() );
		
		$this->addChild( new layout_hero( 'About Co-Novelists', 'What is co-novelists about?', 'about_header_bg' ) );
		
		//$this->addChild( new layout_homepage_content() );
		
		$this->addChild( new layout_footer( $footerStats ) );
		
	}
	
	protected function renderTop()
    {
		echo '<div id="wrap">';
    }

    protected function renderBottom()
    {
		echo '</div>';
    }
	
}