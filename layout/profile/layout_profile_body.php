<?php

class layout_profile_body extends layout
{

	function __construct( data_statistics $footerStats, data_profile $profile, data_array $tags )
	{
		
		if( isset( $_SESSION['self_profile'] ) && $_SESSION['self_profile'])
        {
            $this->addChild( new layout_profile_navigation() );
        }
        else
        {
            $this->addChild( new layout_main_navigation() );
        }
		
		$this->addChild( new layout_profile_hero( $profile ) );

		$this->addChild( new layout_profile_content( $profile ) );
		
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