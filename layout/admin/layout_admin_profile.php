<?php

class layout_admin_profile extends layout_page
{

    function __construct(
        data_array      $categories,
        data_array      $bookmarks,
        data_statistics $footerStats,
        data_user       $userData,
        data_array      $tags
    )
    {

        $this->title = 'User profile form - Co-Novelists';

        $this->description = 'Description';

		$this->page_id = 'admin_profile';
		
		$this->addChild( new layout_menu( $categories, $bookmarks ) );

		$this->addChild( new layout_admin_profile_body( $footerStats, $userData, $tags ) );

    }

}