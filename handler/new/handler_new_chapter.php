<?php

class handler_new_chapter extends handler
{

    public function run()
    {

		/** @var data_array $categories */
        $categories = model_category::getList();
		
		/** @var data_statistics $footerStats */
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

		$chapterData = new data_chapter();

        $page = new layout_new_chapter( $categories, $bookmarks, $footerStats, $_GET['story_id'], $_GET['parent_id'], $_GET['level'], $chapterData );
        $page->render();

    }

}