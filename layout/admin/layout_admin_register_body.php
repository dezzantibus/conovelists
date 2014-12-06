<?php

class layout_admin_register_body extends layout
{

	function __construct( data_statistics $footerStats, data_user $userData )
	{

		$this->addChild( new layout_main_navigation() );
		
		$this->addChild( new layout_hero( 'User Registration', 'Join us!', 'register_header_bg' ) );
		
		$form = $this->addChild( new layout_form( 
			'/action/register.html', 
			'form_register', 
			'form_register', 
			'/admin/my-profile.html',
			'/admin/register.html'
		) );
		
		$form->addChild( new layout_form_text( 'username', 'Username', $userData->username ) );
		
		$form->addChild( new layout_form_text( 'email', 'E-Mail', $userData->email ) );
		
		$form->addChild( new layout_form_password( 'password', 'Password' ) );
		
		$form->addChild( new layout_form_password( 'confirm_password', 'Confirm Password' ) );
				
		$this->addChild( new layout_footer( $footerStats ) );
		
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