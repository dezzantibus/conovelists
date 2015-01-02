<?php

class layout_tnc_body extends layout
{

	function __construct( data_statistics $footerStats, data_array $popular, data_array $tags )
	{
		
		$this->addChild( new layout_main_navigation() );
		
		$this->addChild( new layout_hero( 'Terms and Conditions', '', 'tnc_header_bg' ) );
		
		$this->addChild( new layout_tnc_content( $popular ) );
		
		$this->addChild( new layout_footer( $footerStats, $tags ) );
		
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