<?php

class handler_user_profile extends handler
{

    public function run()
    {
        /**
        this is the shit for the homepage
        need to write the shit for the profile
        */

        /**
         * if $GET['nick'] is empty then
         * wiew the user's profile
         *
         * if the user isn't logged in
         * take to registration form
         */

        /* get data from the models */
        $categories = model_category::getList();

		$footerStats = model_statistics::footer();

//		if( $_SESSION['user'] instanceof data_user )
//		{
//			/* data for logged in users */
//			$bookmarks = model_bookmark::getForUserId( $_SESSION['user']->id );
//		}
//		else
//		{
//			/* data for non-logged in users */
//			$bookmarks = new data_array();
//		}
//
//        $tags = array(
//            'FAQ'         => 1,
//            'questions'   => 1,
//            'stories'     => 1,
//            'answers'     => 1,
//            'frequent'    => 1,
//            'conovelists' => 1,
//            'asking'      => 1,
//            'literature'  => 1,
//            'context'     => 1,
//            'listed'      => 1,
//        );
//        $tags = new data_array( $tags );
//
//        /* display data */
//		$page = new layout_homepage( $categories, $bookmarks, $footerStats, $stories, $popular, $tags );
//        $page->render();

    }

}