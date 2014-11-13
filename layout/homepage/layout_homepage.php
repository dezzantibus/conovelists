<?php

class layout_homepage extends layout_page
{

    function __construct( $menuData )
    {

        $this->title = 'Co-Novelists';

        $this->description = 'Description';

		$this->page_id = 'home';
		
		$this->addChild( new layout_menu( $menuData ) );

		$this->addchild( new layout_homepage_body() );	

    }

}