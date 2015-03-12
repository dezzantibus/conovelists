<?php

class layout_admin_profile_body extends layout
{

	function __construct( data_statistics $footerStats, data_user $userData, data_array $tags )
	{

		$this->addChild( new layout_main_navigation() );
		
		$this->addChild( new layout_hero( 'Profile update', 'What changed?', 'profile_header_bg' ) );
		
		$formText = new data_array();
		
		$formText->add( '<p>Experimenting with the text</p>' );
		$formText->add( '<p>I\'ll have to get some proper copy</p>' );
		$formText->add( '<p>But it can wait \'till the functionality is there</p>' );
		
		$form = $this->addChild( new layout_form( 
			'/action/admin_profile.html',
			'form_profile',
			'form_profile',
			'/profile.html',
			'/admin/profile.html',
			$formText
		) );

        $form->addChild( new layout_form_text	   ( 'first_name', 	  'First Name',      $userData->first_name ) );
        $form->addChild( new layout_form_text	   ( 'last_name',     'Last Name',       $userData->last_name ) );
        $form->addChild( new layout_form_text	   ( 'email',         'E-Mail',          $userData->email ) );
        $form->addChild( new layout_form_datepicker( 'date_of_birth', 'Date of Birth',   $userData->date_of_birth ) );
        $form->addChild( new layout_form_dropdown  ( 'gender',        'Gender',          data_user::getGenderList(), $userData->gender ) );

        $form->addChild( new layout_form_text( 'catchphrase', 'Catchphrase',   $userData->catchphrase ) );
        $form->addChild( new layout_form_text( 'facebook',    'Facebook',   $userData->facebook ) );
        $form->addChild( new layout_form_text( 'twitter',  	  'Twitter',   $userData->twitter ) );
        $form->addChild( new layout_form_text( 'google',      'Google+',   $userData->google ) );
        $form->addChild( new layout_form_file( 'avatar',      'Avatar' ) );

        $form->addChild( new layout_form_password( 'password', 		   'Password' ) );
		$form->addChild( new layout_form_password( 'confirm_password', 'Confirm Password' ) );
						
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