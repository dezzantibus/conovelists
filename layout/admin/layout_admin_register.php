<?php

class layout_admin_register extends layout_page
{

    function __construct( data_array $categories, data_array $bookmarks, data_statistics $footerStats, data_user $userData )
    {

        $this->title = 'User Registration - Co-Novelists';

        $this->description = 'Description';

		$this->page_id = 'admin_register';
		
		$this->addChild( new layout_menu( $categories, $bookmarks ) );

		$this->addChild( new layout_admin_register_body( $footerStats, $userData ) );	

    }

}