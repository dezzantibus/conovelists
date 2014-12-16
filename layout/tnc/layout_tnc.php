<?php

class layout_tnc extends layout_page
{

    function __construct( data_array $categories, data_array $bookmarks, data_statistics $footerStats, data_array $popular )
    {

        $this->title = 'Terms and Conditions - Co-Novelists';

        $this->description = 'Description';

		$this->page_id = 'tnc';
		
		$this->addChild( new layout_menu( $categories, $bookmarks ) );

		$this->addChild( new layout_tnc_body( $footerStats, $popular ) );

    }

}