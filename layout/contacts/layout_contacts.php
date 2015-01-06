<?php

class layout_contacts extends layout_page
{

    function __construct(
        data_array      $categories,
        data_array      $bookmarks,
        data_statistics $footerStats,
        data_array      $tags,
        data_contact    $contactData
    )
    {

        $this->title = 'Contacts - Co-Novelists';

        $this->description = 'Description';

		$this->page_id = 'contacts';
		
		$this->addChild( new layout_menu( $categories, $bookmarks ) );

		$this->addChild( new layout_contacts_body( $footerStats, $tags, $contactData ) );

    }

}