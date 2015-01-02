<?php

class handler_about extends handler
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

        $popular = model_chapter::getPopular();

        $tags = array(
            'conovelists'   => 1,
            'about'         => 1,
            'committed'     => 1,
            'stories'       => 1,
            'chapters'      => 1,
            'authors'       => 1,
            'participate'   => 1,
            'literature'    => 1,
            'interaction'   => 1,
            'collaboration' => 1,
        );
        $tags = new data_array( $tags );

        /* display data */
		$page = new layout_about( $categories, $bookmarks, $footerStats, $popular, $tags );
        $page->render();

    }

}