<?php

class layout_contacts_body extends layout
{

	function __construct( data_statistics $footerStats, data_array $tags, data_contact $contactData )
	{

		$this->addChild( new layout_main_navigation() );
		
		$this->addChild( new layout_hero( 'Contact us', '', 'contacts_header_bg' ) );
		
		$formText = new data_array();

		$formText->add( '<p>Experimenting with the text</p>' );
		$formText->add( '<p>I\'ll have to get some proper copy</p>' );
		$formText->add( '<p>But it can wait \'till the functionality is there</p>' );

		$form = $this->addChild( new layout_form(
			'/action/contacts.html',
			'form_contacts',
			'form_contacts',
			'/admin/my-profile.html',
			'/admin/register.html',
			$formText
		) );

		$form->addChild( new layout_form_text	 ( 'name', 	  'Name',    $contactData->name ) );
		$form->addChild( new layout_form_text	 ( 'email',   'E-Mail',  $contactData->email ) );
		$form->addChild( new layout_form_textarea( 'message', 'Message', $contactData->message ) );

		$this->addChild( new layout_footer( $footerStats, $tags ) );
		
	}
	
	protected function renderTop()
    {
		echo '<div id="wrap">';
    }

    protected function renderBottom()
    {
		echo '</div>';
    }
	
}