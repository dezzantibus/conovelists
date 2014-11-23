<?php

class layout_about extends layout_page
{

    function __construct( data_array $categories, data_array $bookmarks, data_statistics $footerStats )
    {

        $this->title = 'Co-Novelists';

        $this->description = 'Description';

		$this->page_id = 'about';
		
		$this->addChild( new layout_menu( $categories, $bookmarks ) );

		$this->addChild( new layout_about_body( $footerStats ) );	

    }

}