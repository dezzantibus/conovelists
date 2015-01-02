<?php

class handler_admin_register extends handler
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
		
		$userData = new data_user();

        $tags = array(
            'user'        => 1,
            'register'    => 1,
            'sign up'     => 1,
            'form'        => 1,
            'record'      => 1,
            'enter'       => 1,
            'participate' => 1,
            'join'        => 1,
            'apply'       => 1,
            'submit'      => 1,

        );
        $tags = new data_array( $tags );

        /* display data */
		$page = new layout_admin_register( $categories, $bookmarks, $footerStats, $userData, $tags );
        $page->render();

    }

}