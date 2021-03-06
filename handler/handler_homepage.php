<?php

class handler_homepage extends handler
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

        $stories = model_story::getLatest();
		
		$popular = model_chapter::getPopular();

        $tags = model_statistics::tagsForHomepage( $stories );

        /* display data */
		$page = new layout_homepage( $categories, $bookmarks, $footerStats, $stories, $popular, $tags );
        $page->render();

    }

}