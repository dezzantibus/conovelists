<?php

class layout_tnc_body extends layout
{

	function __construct( data_statistics $footerStats )
	{
		
		$this->addChild( new layout_main_navigation() );
		
		$this->addChild( new layout_hero( 'Terms and Conditions', '', 'tnc_header_bg' ) );
		
		$this->addChild( new layout_tnc_content() );
		
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