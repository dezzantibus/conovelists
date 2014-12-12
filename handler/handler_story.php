<?php

class handler_story extends handler
{

    public function run()
    {

        /* get data from the models */
        $categories = model_category::getList();
		
		$footerStats = model_statistics::footer();
		
		if( $_SESSION['user'] instanceof data_user )
		{
			/* data for logged in users */
			$bookmarks = model_bookmark::getForUserId( $_SESSION['user']->id );
		}
		else
		{
			/* data for non-logged in users */
			$bookmarks = new data_array();
		}

        $story = model_story::getById( data_story::decode_id( $this->data['story_id'] ) );

        /* display data */
	    $page = new layout_story( $categories, $bookmarks, $footerStats );
        $page->render();

    }

}