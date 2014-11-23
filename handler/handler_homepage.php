<?php

class handler_homepage extends handler
{

    function run()
    {

        /* get data from the models */
        $categories = model_category::getList();
		
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

        /* display data */
		$page = new layout_homepage( $categories, $bookmarks );
        $page->render();

    }

}