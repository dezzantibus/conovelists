<?php

class layout_faq extends layout_page
{

    function __construct(
        data_array      $categories,
        data_array      $bookmarks,
        data_statistics $footerStats,
        data_array      $popular,
        data_array      $tags
    )
    {

        $this->title = 'Frequently Asked Questions - Co-Novelists';

        $this->description = 'Description';

		$this->page_id = 'faq';
		
		$this->addChild( new layout_menu( $categories, $bookmarks ) );

		$this->addChild( new layout_faq_body( $footerStats, $popular, $tags ) );

    }

}