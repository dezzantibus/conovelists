<?php

class layout_admin_register_body extends layout
{

	function __construct( data_statistics $footerStats, data_user $userData )
	{

        // TO BE REMOVED, THIS IS JUST TO TRY THE FORM ELEMENT
        $genders = new data_array();
        $genders->add( array( 'value' => 1, 'label' => 'male' ) );
        $genders->add( array( 'value' => 2, 'label' => 'female' ) );
        $genders->add( array( 'value' => 3, 'label' => 'undefined' ) );

		$this->addChild( new layout_main_navigation() );
		
		$this->addChild( new layout_hero( 'User Registration', 'Join us!', 'register_header_bg' ) );
		
		$form = $this->addChild( new layout_form( '/action/register.html', 'form_register', 'form_register' ) );
		
		$form->addChild( new layout_form_text( 'first_name', 'First Name', $userData->first_name ) );
		
		$form->addChild( new layout_form_text( 'last_name', 'Last Name', $userData->last_name ) );
		
		$form->addChild( new layout_form_text( 'date_of_birth', 'Date of birth', $userData->date_of_birth ) );
		
		$form->addChild( new layout_form_checkbox( 'gender', 'Gender', $genders, $userData->gender ) );
		
		$form->addChild( new layout_form_text( 'email', 'E-mail', $userData->email ) );
		
		$form->addChild( new layout_form_password( 'password', 'Password' ) );
		
		$form->addChild( new layout_form_password( 'repeat_password', 'Repeat Password' ) );
				
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