<?php

class layout_category_body extends layout
{

	function __construct( data_category $category, data_array $stories, data_statistics $footerStats )
	{
		
		$this->addChild( new layout_main_navigation() );
		
		$this->addChild( new layout_hero( $category->name, $category->description, 'category' . $category->id . '_header_bg' ) );
		
		$this->addChild( new layout_category_content( $stories ) );
		
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