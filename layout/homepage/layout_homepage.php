<?php

class layout_homepage extends layout_page
{

    function __construct( data_array $categories, data_array $bookmarks, data_statistics $footerStats )
    {

        $this->title = 'Co-Novelists';

        $this->description = 'Description';

		$this->page_id = 'home';
		
		$this->addChild( new layout_menu( $categories, $bookmarks ) );

		$this->addChild( new layout_homepage_body( $footerStats ) );	

    }

}