<?php

class layout_admin_profile_body extends layout
{

	function __construct( data_statistics $footerStats, data_user $userData, data_array $tags )
	{

		$this->addChild( new layout_main_navigation() );
		
		$this->addChild( new layout_hero( 'User Registration', 'Join us!', 'register_header_bg' ) );
		
		$formText = new data_array();
		
		$formText->add( '<p>Experimenting with the text</p>' );
		$formText->add( '<p>I\'ll have to get some proper copy</p>' );
		$formText->add( '<p>But it can wait \'till the functionality is there</p>' );
		
		$form = $this->addChild( new layout_form( 
			'/action/profile.html',
			'form_profile',
			'form_profile',
			'/profile.html',
			'/admin/profile.html',
			$formText
		) );

        $form->addChild( new layout_form_text	 ( 'first_name', 		   'First Name', $userData->first_name ) );
        $form->addChild( new layout_form_text	 ( 'last_name',    		   'Last Name',   $userData->last_name ) );
        $form->addChild( new layout_form_text	 ( 'email',    		   'E-Mail',   $userData->email ) );
        $form->addChild( new layout_form_text	 ( 'date_of_birth',    		   'Date of Birth',   $userData->date_of_birth ) );


        $form->addChild( new layout_form_dropdown
        ( 'gender',    		   'Gender',   $userData->email ) );
        $form->addChild( new layout_form_text	 ( 'email',    		   'E-Mail',   $userData->email ) );
        $form->addChild( new layout_form_text	 ( 'email',    		   'E-Mail',   $userData->email ) );
        $form->addChild( new layout_form_text	 ( 'email',    		   'E-Mail',   $userData->email ) );
        $form->addChild( new layout_form_text	 ( 'email',    		   'E-Mail',   $userData->email ) );
        $form->addChild( new layout_form_text	 ( 'email',    		   'E-Mail',   $userData->email ) );

        $form->addChild( new layout_form_password( 'password', 		   'Password' ) );
		$form->addChild( new layout_form_password( 'confirm_password', 'Confirm Password' ) );
						
		$this->addChild( new layout_footer( $footerStats, $tags ) );
		
	}

/*
CREATE TABLE `user` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`first_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
`last_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
`username` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
`email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
`pass` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
`date_of_birth` date DEFAULT NULL,
`gender` int(11) DEFAULT NULL,
`catchphrase` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
`created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
`avatar` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
`twitter` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
`facebook` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
`google` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
PRIMARY KEY (`id`),
UNIQUE KEY `login_idx` (`email`,`pass`),
UNIQUE KEY `email_idx` (`email`),
KEY `created` (`created`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
*/

    protected function renderTop()
    {
		echo '<div id="wrap">';
    }

    protected function renderBottom()
    {
		echo '</div>';
    }
	
}