<?php

class handler_category extends handler
{

    public function run()
    {

        $category_url = $_GET['route'];

        /** @var data_category $category */
        $category = model_category::getByUrlName( $category_url );

        /** @var data_array $stories */
        $stories = model_story::getByCategory( $category->id );
		
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

        $tags = model_statistics::tagsForCategory( $stories, $category->id );

        $page = new layout_category( $category, $stories, $categories, $bookmarks, $footerStats, $tags );
        $page->render();

    }

}