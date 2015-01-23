<?php

class handler_admin_profile extends handler
{

    public function run()
    {

        if( $_SESSION['user'] instanceof data_user )
        {
            /* data for logged in users */
            $bookmarks = model_bookmark::getForUserId( $_SESSION['user']->id );
        }
        else
        {
            $handler = new handler_admin_register();
            $handler->run();
            exit;
        }

        /* get data from the models */
        $categories = model_category::getList();
		
		$footerStats = model_statistics::footer();

		$userData = $_SESSION['user'];

        $tags = array(
            'user'        => 1,
            'profile'     => 1,
            'update'      => 1,
            'form'        => 1,
            'record'      => 1,
            'enter'       => 1,
            'participate' => 1,
            'renew'       => 1,
            'avatar'      => 1,
            'submit'      => 1,
        );
        $tags = new data_array( $tags );

        /* display data */
		$page = new layout_admin_profile( $categories, $bookmarks, $footerStats, $userData, $tags );
        $page->render();

    }

}