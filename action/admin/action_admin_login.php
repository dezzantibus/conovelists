<?php


class action_admin_login extends action
{

	public function run()
    {

		$user = model_user::login( $this->data['email'], $this->data['password'] );
		
		if( $user instanceof data_user )
		{
			$_SESSION['user'] = $user;
		}
		
		header( 'Location: ' . $this->data['success_url'] );

    }


}