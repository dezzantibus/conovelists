<?php

class layout_new_chapter_body extends layout
{

	function __construct( data_statistics $footerStats, $story_id, $parent_id, $level, data_chapter $chapterData )
	{

		$this->addChild( new layout_main_navigation() );
		
		$this->addChild( new layout_hero( 'New chapter', 'Continue the narrative!', 'newchapter_header_bg' ) );
		
		$form = $this->addChild( new layout_form( 
			'/action/new/chapter.html', 
			'form_new_chapter', 
			'form_new_chapter', 
			'#',
			'#'
		) );
		
		$form->addChild( new layout_form_hidden( 'story_id', $story_id ) );
		
		$form->addChild( new layout_form_hidden( 'parent_id', $parent_id ) );
		
		$form->addChild( new layout_form_hidden( 'level', $level ) );
		
		$form->addChild( new layout_form_text( 'title', 'Title', $chapterData->title ) );
		
		$form->addChild( new layout_form_textarea( 'body', 'Body', $chapterData->body, 15 ) );
				
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