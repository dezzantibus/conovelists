<?php

class handler_user_profile extends handler
{

    public function run()
    {

        $profile = new data_profile();
        if( isset( $this->data['nick'] ) )
        {
            $profile->user = model_user::getByUsername( $this->data['nick'] );
            if( empty( $profile->user->id ) )
            {
                $this->data['nick'] = null;
            }
        }

        if( !isset( $this->data['nick'] ) || empty( $this->data['nick'] ) )
        {
            /**
             * if $GET['nick'] is empty then
             * view the user's profile
             */
            if( $_SESSION['user'] instanceof data_user )
            {
                $profile->user = $_SESSION['user'];
                $_SESSION['self_profile'] = true;
            }
            else
            {
                /**
                 * if the user isn't logged in
                 * take to registration form
                 */
                $handler = new handler_admin_register();
                $handler->run();
                exit;
            }
        }

        $profile->latest = model_chapter::getLatestByUserId( $profile->user->id );
        $profile->viewed = model_chapter::getPopularByUserId( $profile->user->id );

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

        $tags = array(
            'User profile'             => 1,
            $profile->user->first_name => 1,
            $profile->user->last_name  => 1,
            $profile->user->username   => 1,
            'writer'                   => 1,
            'conovelists'              => 1,
            'personal'                 => 1,
            'chapters'                 => 1,
            'novelist'                 => 1,
            'owner'                    => 1,
        );
        $tags = new data_array( $tags );

        /* display data */
        $page = new layout_profile( $categories, $bookmarks, $footerStats, $profile, $tags );
        $page->render();

    }

}