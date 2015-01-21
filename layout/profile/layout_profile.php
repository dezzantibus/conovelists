<?php

class layout_profile extends layout_page
{

    function __construct(
        data_array      $categories,
        data_array      $bookmarks,
        data_statistics $footerStats,
        data_profile    $profile,
        data_array      $tags
    )
    {

        $this->title = $profile->user->username;

        $this->description = $profile->user->catchphrase;
		
		$this->addChild( new layout_menu( $categories, $bookmarks ) );

		$this->addChild( new layout_profile_body( $footerStats, $profile, $tags ) );

    }

}