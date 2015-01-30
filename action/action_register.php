<?php


class action_register extends action
{

	public function run()
    {

		$this->validate();
	
		if( message::containsErrors() )
		{
			$this->returnToRegister();
		}
		else
		{
			$user = model_user::create(
				null, 
				null, 
				$this->data['email'], 
				$this->data['username'], 
				$this->data['password'], 
				null, 
				data_user::UNKNOWN
			);
			
			if( is_null( $user ) )
			{
				$this->returnToRegister();				
			}
			else
			{
				$_SESSION['user'] = $user;
				header( 'Location: ' . $this->data['success_url'] );
			}
			
		}

    }
	
	private function validate()
	{
		
		if( empty( $this->data['username'] ) )
		{
			message::addError( 'The Username is a required field' );
		}
		elseif( model_user::uniqueEntityExists( $this->data['username'], 'username' ) )
		{
			message::addError( 'The Username is already taken' );
		}

		if( empty( $this->data['email'] ) )
		{
			message::addError( 'The E-Mail is a required field' );
		}
		elseif( model_user::uniqueEntityExists( $this->data['email'], 'email' ) )
		{
			message::addError( 'The E-Mail is already in the database' );
		}

		if( empty( $this->data['password'] ) )
		{
			message::addError( 'The Password is a required field' );
		}
		elseif( empty( $this->data['confirm_password'] ) )
		{
			message::addError( 'The Password must be confirmed' );
		}
		elseif( $this->data['password'] != $this->data['confirm_password'] )
		{
			message::addError( 'The two Passwords don\'t match' );
		}
		
	}
	
	private function returnToRegister()
	{

		$categories  = model_category::getList();
		$footerStats = model_statistics::footer();
		$bookmarks   = new data_array();
		$userData    = new data_user( $this->data );

        $tags = array(
            'user'        => 1,
            'register'    => 1,
            'sign up'     => 1,
            'form'        => 1,
            'record'      => 1,
            'enter'       => 1,
            'participate' => 1,
            'join'        => 1,
            'apply'       => 1,
            'submit'      => 1,
        );
        $tags = new data_array( $tags );

        $page = new layout_admin_register( $categories, $bookmarks, $footerStats, $userData, $tags );
		$page->render();

	}


}