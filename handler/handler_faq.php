<?php

class handler_faq extends handler
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
            'FAQ'         => 1,
            'questions'   => 1,
            'stories'     => 1,
            'answers'     => 1,
            'frequent'    => 1,
            'conovelists' => 1,
            'asking'      => 1,
            'literature'  => 1,
            'context'     => 1,
            'listed'      => 1,
        );
        $tags = new data_array( $tags );

        /* display data */
		$page = new layout_faq( $categories, $bookmarks, $footerStats, $popular, $tags );
        $page->render();

    }

}