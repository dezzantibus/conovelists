<?php

class layout_new_story_body extends layout
{

	function __construct( data_statistics $footerStats, data_array $categories, data_story $storyData, data_chapter $chapterData )
	{

		$this->addChild( new layout_main_navigation() );
		
		$this->addChild( new layout_hero( 'New story', 'Start a new adventure!', 'newstory_header_bg' ) );
		
		$form = $this->addChild( new layout_form( 
			'/action/new/story.html', 
			'form_new_story', 
			'form_new_story', 
			'#',
			'#'
		) );
		
		$category4DD = new data_array();
		
		/** @var $item data_category */
		foreach( $categories->getData() as $item )
		{
			$category4DD->add( array(
				'value' => $item->id,
				'label' => $item->name,
			) );
		}
		
		$form->addChild( new layout_form_dropdown( 'category_id', 'Category', $category4DD, $storyData->category_id ) );
		
		$form->addChild( new layout_form_text( 'title', 'Title', $storyData->title ) );
		
		$form->addChild( new layout_form_textarea( 'brief', 'Brief', $storyData->brief, 5 ) );
		
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