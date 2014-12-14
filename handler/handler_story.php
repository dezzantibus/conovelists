<?php

class handler_story extends handler
{

    public function run()
    {

        /* get data from the models */
        $categories = model_category::getList();
		
		$footerStats = model_statistics::footer();
		
	    $story = model_story::getById( data_story::decode_id( $this->data['story_id'] ) );
		
		$chapter_id = isset( $this->data['chapter_id'] ) ? $this->data['chapter_id'] : $story->first_chapter_id;
		
		$chapter = model_chapter::getById( $chapter_id );

		$chapter->story = $story;
		
		foreach( $categories->getData() as $category )
		{
			if( $story->category_id == $category->id )
			{
				$chapter->story->category = $category;
			}
		}
		
		$chapter->user = model_user::geyById( $chapter->user_id );
		
		if( $_SESSION['user'] instanceof data_user )
		{
			/* data for logged in users */
			$bookmarks = model_bookmark::getForUserId( $_SESSION['user']->id );
			model_view::logUserView( $_SESSION['user']->id, $chapter_id );
		}
		else
		{
			/* data for non-logged in users */
			$bookmarks = new data_array();
			model_view::logUserView( 0, $chapter_id );
		}		
		

        /* display data */
	    $page = new layout_story( $categories, $bookmarks, $footerStats, $chapter );
        $page->render();

    }

}