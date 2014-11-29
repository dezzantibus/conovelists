<?php

class layout_category extends layout_page
{

    function __construct( data_category $category, data_array $stories, data_array $categories, data_array $bookmarks, data_statistics $footerStats  )
    {

        $this->title = $category->name;

        $this->description = $category->description;
		
		$this->addChild( new layout_menu( $categories, $bookmarks ) );

		$this->addChild( new layout_category_body( $category, $stories, $footerStats ) );	

    }

}