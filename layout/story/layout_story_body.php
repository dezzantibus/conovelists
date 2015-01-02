<?php

class layout_story_body extends layout
{

	function __construct(
		data_statistics $footerStats,
		data_chapter    $chapter, 
		data_array      $popular, 
		data_array      $branches, 
		data_array      $comments,
        data_array      $tags
	)
	{
		
		$this->addChild( new layout_main_navigation() );
		
		$this->addChild( new layout_hero( 
			$chapter->story->category->name, 
			$chapter->story->category->description, 
			'category' . $chapter->story->category->id . '_header_bg' 
		) );
		
		$this->addChild( new layout_story_content( $chapter, $popular, $branches, $comments ) );
		
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